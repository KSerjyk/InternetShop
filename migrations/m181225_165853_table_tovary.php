<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m181225_165853_table_tovary
 */
class m181225_165853_table_tovary extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if($tableOptions === null)
            $tableOptions = 'CHARSET UTF8 COLLATE ut8_unicode_ci ENGINE = INNODB';
        $this->createTable('{{%tovary}}', [
            'id'=>Schema::TYPE_PK,
            'name'=>$this->string(255)->notNull(),
            'description'=>$this->string(255)->notNull(),
            'price'=>$this->float(2)->notNull(),
            'quantity'=>$this->integer()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tovary}}');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181225_165853_table_tovary cannot be reverted.\n";

        return false;
    }
    */
}
