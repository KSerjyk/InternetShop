<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class RecoveryForm extends Model
{
    public $email;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            ['email', 'required',
                'message' => 'Поле "{attribute}" не може бути порожнім'],
            // username and password are both required
            ['email', 'required'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'email' => 'Пошта'
        ];
    }
    public function recover()
    {
        $this->_user = User::findByEmail($this->email);
        if($this->_user === null)
        {
            Yii::$app->session->setFlash('NotRecovered', 'Така електронна адреса не зареєстрована!');
            return false;
        }
        Yii::$app->mailer->compose()
            ->setFrom(Yii::$app->params['mailerMail'])
            ->setTo($this->_user->email)
            ->setSubject("BestSHop відновлення доступу")
            ->setHtmlBody('Для відновлення доступу перейдіть по посиланню:<br>'
                .Html::a(Url::to('/user/finish-recover?password_reset_token='.$this->_user->password_reset_token, true),
                    Url::to('/user/finish-recover?password_reset_token='.$this->_user->password_reset_token, true)))
            ->send();
        return true;
    }

    public function finsihRegistration()
    {
        $this->_user = User::findByUsername(Yii::$app->request->get()['login']);
        if($this->_user !== null){
            $this->_user->status = 2;
            $this->_user->save();
            Yii::$app->mailer->compose()
                ->setFrom(Yii::$app->params['mailerMail'])
                ->setTo($this->_user->email)
                ->setSubject("Best Shop")
                ->setTextBody($this->_user->surname.' '.$this->_user->name.'('.$this->_user->login.'). Вітаємо вас з успішною реєстрацією!')
                ->send();
            return true;
        }
        else
            return false;
    }

    public function finsihRecover()
    {
        $this->_user = Yii::$app->request->get()['password_reset_token'];
        return true;
    }
}
