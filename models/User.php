<?php

namespace app\models;

use PHPUnit\Framework\MockObject\Builder\Identity;
use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "{{%users}}".
 *
 * @property int $id
 * @property string $login
 * @property string $name
 * @property string $surname
 * @property string $secondname
 * @property string $email
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $auth_key
 * @property string $access_token
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $user = self::find()->where(['access_token' => $token])->one();
        if ($user === null) return null;
        return new static($user);
    }

    public static function findByUsername($login)
    {
        $user = self::find()->where(['login' => $login])->one();
        if ($user === null) return null;
        return new static($user);
    }
    public static function findByEmail($email)
    {
        $user = self::find()->where(['email' => $email])->one();
        if ($user === null) return null;
        return new static($user);
    }

    public static function findIdentity($id)
    {
        $user = self::find()->where(["id" => $id])->one();
        if ($user == null) {
            return null;
        }
        return new static($user);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }
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
            [['login', 'name', 'surname', 'email', 'password_hash', 'password_reset_token', 'auth_key'], 'required'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['login'], 'string', 'max' => 32],
            [['name', 'surname', 'secondname', 'email', 'password_hash'], 'string', 'max' => 255],
            [['password_reset_token'], 'string', 'max' => 200],
            [['auth_key'], 'string', 'max' => 100],
            [['login'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['auth_key'], 'unique'],
            [['access_token'], 'unique']
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
            'email' => 'Email',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'auth_key' => 'Auth Key',
            'status' => 'Status',
            'access_token' => 'Access token',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function validatePassword($password)
    {
        return password_verify($password . Yii::$app->params['SALT'], $this->password_hash);
    }

    public function beforeSave($insert)
    {
//        $this->password_hash = password_hash($this->password_hash . Yii::$app->params['SALT'], PASSWORD_ARGON2I);
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }

}
