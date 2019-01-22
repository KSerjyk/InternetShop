<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m181220_225033_table_users
 */
class m181220_225033_table_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if($tableOptions === null)
            $tableOptions = 'CHARSET UTF8 COLLATE utf8_unicode_ci ENGINE = INNODB';
        $this->createTable('{{%users}}', [
            'id'=>Schema::TYPE_PK,
            'login'=>$this->string(32)->notNull()->unique(),
            'name'=>$this->string(255)->notNull(),
            'surname'=>$this->string(255)->notNull(),
            'secondname' =>$this->string(255),
            'phonenumber' =>$this->string(14)->notNull()->unique(),
            'country' => $this->string(255)->notNull(),
            'city' => $this->string(255)->notNull(),
            'image_id' => $this->integer(),
            'address' =>$this->string()->notNull(),
            'email' =>$this->string(255)->notNull()->unique(),
            'password_hash'=>$this->string()->notNull(),
            'password_reset_token'=>$this->string(200)->notNull()->unique(),
            'auth_key'=>$this->string(100)->notNull()->unique(),
            'status'=>$this->integer()->notNull()->defaultValue(1),
            'access_token'=>$this->string()->notNull()->unique(),
            'created_at'=>$this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181220_225033_table_users cannot be reverted.\n";

        return false;
    }
    */
}
