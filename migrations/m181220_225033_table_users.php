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
            $tableOptions = 'ENGIONE = InnoDB';
        $this->createTable('{{%users}}', [
            'id'=>TYPE_PK,
            'login'=>$this->string(32)->notNull()->unique(),
            'name'=>$this->string(255)->notNull(),
            'surname'=>$this->string(255)->notNull(),
            'secondname' =>$this->string(255),
            'email' =>$this->string(255)->notNull()->unique(),
            'password_hash'=>$this->string(255)->notNull(),
            'password_reset_token'=>$this->string(200)->notNull()->unique(),
            'auth_key'=>$this->string(100)->notNull()->unique(),
            'status'=>$this->integer(2)->notNull()->defaultValue(1),
            'created_at'=>$this->date()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at'=>$this->date()->defaultExpression('CURRENT_TIMESTAMP')
        ]);
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
