<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%comment}}".
 *
 * @property int $id
 * @property string $comment
 * @property string $date_created
 * @property int $prod_id
 * @property int $user_id
 *
 * @property Products $prod
 * @property Users $prod0
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%comment}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comment', 'prod_id', 'user_id'], 'required'],
            [['date_created'], 'safe'],
            [['prod_id', 'user_id'], 'integer'],
            [['comment'], 'string', 'max' => 255],
            [['prod_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['prod_id' => 'id']],
            [['prod_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['prod_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'comment' => 'Comment',
            'date_created' => 'Date Created',
            'prod_id' => 'Prod ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProd()
    {
        return $this->hasOne(Products::className(), ['id' => 'prod_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProd0()
    {
        return $this->hasOne(Users::className(), ['id' => 'prod_id']);
    }
}
