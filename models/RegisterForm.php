<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;
use yii\helpers\Url;
class RegisterForm extends Model
{
    public $login;
    public $name;
    public $surname;
    public $secondname;
    public $email;
    public $password_hash;
    public $password_hash_repeat;
    public $verifyCode;
    private $_user = false;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['login', 'name', 'surname', 'secondname', 'email', 'password_hash', 'password_hash_repeat'], 'required',
                'message' => 'Поле "{attribute}" не може бути порожнім'],

            // email has to be a valid email address
            ['login', 'validateLogin'],
            ['password_hash', 'validatePassword'],
            ['name', 'validateName'],
            ['surname', 'validateSurname'],
            ['secondname', 'validateSecondname'],
            ['email', 'validateEmail'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    public function validateLogin($attribute, $params)
    {
        if (mb_strlen($this->login) <= 5 || mb_strlen($this->login > 20)) {
            $this->addError($attribute, 'Довжина логіна повинна бути від 6 до 20 символів');
            return false;
        }
        if (preg_match('/[!,.`~|&@#$%<>^&*()"\'\\\\\/]/', $this->login) === 1) {
            $this->addError($attribute, 'Поле не може містити спец.символи: !,.`~|&@#$%^&*()/<>\"');
            return false;
        }
        return true;
    }

    public function validateName($attribute, $params)
    {
        if (preg_match('/[!,.`~|&@#$%<>^&*()"\'\\\\\/]/', $this->name) === 1) {
            $this->addError($attribute, 'Поле не може містити спец.символи: !,.`~|&@#$%^&*()/<>\"');
            return false;
        }
        return true;
    }

    public function validateSurname($attribute, $params)
    {
        if (preg_match('/[!,.`~|&@#$%<>^&*()"\'\\\\\/]/', $this->surname) === 1) {
            $this->addError($attribute, 'Поле не може містити спец.символи: !,.`~|&@#$%^&*()/<>\"');
            return false;
        }
        return true;
    }

    public function validateSecondname($attribute, $params)
    {
        if (preg_match('/[!,.`~|&@#$%<>^&*()"\'\\\\\/]/', $this->secondname) === 1) {
            $this->addError($attribute, 'Поле не може містити спец.символи: !,.`~|&@#$%^&*()/<>\"');
            return false;
        }
        return true;
    }

    public function validateEmail($attribute, $params)
    {
        if (preg_match('/^\w+@[a-z]{1,5}\.[a-z]{2,5}$/', $this->email) === 0) {
            $this->addError($attribute, 'Не валідна електронна адреса');
            return false;
        }
        return true;
        //return filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

    public function validatePassword($attribute, $params)
    {
        if (preg_match('/[!,.`~|&@#$%<>^&*()"\'\\\\\/]/', $this->password_hash) === 1) {
            $this->addError($attribute, 'Пароль не може містити спец.символи: !,.`~|&@#$%^&*()/<>\"');
            return false;
        }
        if (preg_match('/[a-z]/', $this->password_hash) === 0 || preg_match('/[A-z]/', $this->password_hash) === 0 || preg_match('/[0-9]/', $this->password_hash) === 0) {
            $this->addError($attribute, 'Пароль повинен містити прописні та строкові латинські букви та цифри');
            return false;
        }
        if (mb_strlen($this->password_hash) <= 7) {
            $this->addError($attribute, 'Пароль закороткий');
            return false;
        }
        if (mb_strlen($this->password_hash) > 20) {
            $this->addError($attribute, 'Пароль задовгий');
            return false;
        }
        if ($this->password_hash != $this->password_hash_repeat) {
            $this->addError($attribute, 'Паролі не співпадають');
            return false;
        }
        return true;
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'login' => 'Логін',
            'surname' => 'Прізвище',
            'name' => "Ім'я",
            'secondname' => 'По батькові',
            'password_hash' => 'Пароль',
            'password_hash_repeat' => 'Підтвердіть пароль',
            'email' => 'Елетронна пошта',
            'verifyCode' => 'Капча',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function register()
    {
        if ($this->validate()) {
            $this->_user = $this->getUser();
            if ($this->_user !== false) {
                $this->_user->setAttributes([
                    'login' => $this->login,
                    'name' => $this->name,
                    'surname' => $this->surname,
                    'secondname' => $this->secondname,
                    'auth_key' => $this->randomGenerator(),
                    'password_hash' => password_hash($this->password_hash . Yii::$app->params['SALT'], PASSWORD_ARGON2I),
                    'password_reset_token' => $this->randomGenerator(),
                    'access_token' => $this->randomGenerator(),
                    'email' => $this->email,
                    'status' => 1,
                ]);
            } else
                return false;
            Yii::$app->mailer->compose()
                ->setFrom(Yii::$app->params['mailerMail'])
                ->setTo($this->email)
                ->setSubject("BestShop реєстрація")
                ->setHtmlBody('Для завершення реєстрації перейдіть '.Html::a('по посиланню',Url::to(['site/finish-registration?login='.$this->login],true)))
                ->send();
            $this->_user->save();
            return true;
        }
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->login);
            if ($this->_user !== null) {
                Yii::$app->session->setFlash('AlreadyExists', 'Користувач з таким логіном існує');
            } else {
                $this->_user = User::findByEmail($this->email);
                if ($this->_user !== null)
                    Yii::$app->session->setFlash('AlreadyExists', 'Користувач з такою поштою існує');
            }
            if ($this->_user === null) {
                $this->_user = new User();
            } else return false;

        }
        return $this->_user;
    }

    private function randomGenerator()
    {
        $str = "";
        for ($i = 0; $i < 25; $i++) {
            $tmp = rand(0, 57);
            if ($i == 12)
                $str .= $this->login;
            $str .= Yii::$app->params['LETTERS'][$tmp];
        }
        return $str;
    }
}
