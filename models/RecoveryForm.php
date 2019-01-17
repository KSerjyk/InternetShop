<?php

namespace app\models;

use Yii;
use yii\base\Model;

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
            Yii::$app->session->setFlash('Recover', 'Така електронна адреса не зареєстрована!');
            return false;
        }
        return true;
    }
}
