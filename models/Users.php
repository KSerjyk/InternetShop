<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%users}}".
 *
 * @property int $id
 * @property string $login
 * @property string $name
 * @property string $surname
 * @property string $secondname
 * @property string $phonenumber
 * @property string $country
 * @property string $city
 * @property int $image_id
 * @property string $address
 * @property int $gender
 * @property string $email
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $auth_key
 * @property int $status
 * @property string $access_token
 * @property string $created_at
 *
 * @property Basket[] $baskets
 * @property Products[] $products
 * @property Comment[] $comments
 * @property UserImages[] $userImages
 * @property Images[] $images
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%users}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'name', 'surname', 'phonenumber', 'country', 'city', 'address', 'email', 'password_hash', 'password_reset_token', 'auth_key', 'access_token'], 'required'],
            [['image_id', 'gender', 'status'], 'integer'],
            [['created_at'], 'safe'],
            [['login'], 'string', 'max' => 32],
            [['name', 'surname', 'secondname', 'country', 'city', 'address', 'email', 'password_hash', 'access_token'], 'string', 'max' => 255],
            [['phonenumber'], 'string', 'max' => 14],
            [['password_reset_token'], 'string', 'max' => 200],
            [['auth_key'], 'string', 'max' => 100],
            [['login'], 'unique'],
            [['phonenumber'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['auth_key'], 'unique'],
            [['access_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'name' => 'Name',
            'surname' => 'Surname',
            'secondname' => 'Secondname',
            'phonenumber' => 'Phonenumber',
            'country' => 'Country',
            'city' => 'City',
            'image_id' => 'Image ID',
            'address' => 'Address',
            'gender' => 'Gender',
            'email' => 'Email',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'auth_key' => 'Auth Key',
            'status' => 'Status',
            'access_token' => 'Access Token',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaskets()
    {
        return $this->hasMany(Basket::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['id' => 'product_id'])->viaTable('{{%basket}}', ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['prod_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserImages()
    {
        return $this->hasMany(UserImages::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Images::className(), ['id' => 'image_id'])->viaTable('{{%user_images}}', ['user_id' => 'id']);
    }
}
