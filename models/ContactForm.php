<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name', 'email','subject', 'body'], 'required',
                'message' => 'Поле "{attribute}" не може бути порожнім'],
            ['verifyCode', 'required', 'message' => 'Невірна каптча'],
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name' => "Ім'я",
            'body' => 'Повідомлення',
            'email' => 'Пошта',
            'subject' => 'Тема',
            'verifyCode' => 'Каптча',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @return bool whether the model passes validation
     */
    public function contact()
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo(Yii::$app->params['mailerMail'])
                ->setFrom(Yii::$app->params['mailerMail'])
                ->setSubject($this->subject.' Contact Form BestShop')
                ->setHtmlBody($this->email.Html::tag('br').$this->body)
                ->send();
            Yii::$app->mailer->compose()
                ->setTo($this->email)
                ->setFrom(Yii::$app->params['mailerMail'])
                ->setSubject('BestShop')
                ->setTextBody("Дякуємо що написали нам. Ми відповімо якомога швидше")
                ->send();
            return true;
        }
        return false;
    }
}
