<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ProfileForm extends Model
{
    public $name;
    public $email;
    public $gender;
    public $numberPhone;
    public $images;
    public $addressCountry;
    public $addressRegion;
    public $addressCity;
    public $addressHouseSTR;



    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name', 'email', 'numberPhone'], 'required',
                'message' => 'Поле "{attribute}" не може бути порожнім'],
            // name, email, subject and body are required
            [['name', 'email', 'numberPhone'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name' => "Ім'я",
            'gender' => 'Стать',
            'email' => 'Пошта',
            'numberPhone' => 'Номер телефону',
            'addressCountry' => 'Країна',
            'addressRegion' => 'Область',
            'addressCity' => 'Місто',
            'addressHouse' => 'Вулиця і Будинок',
        ];
    }

}
