<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m181225_165405_table_categories
 */
class m181225_165405_table_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if($tableOptions === null)
            $tableOptions = 'CHARSET UTF8 COLLATE ut8_unicode_ci ENGINE = INNODB';
        $this->createTable('{{%categories}}', [
            'id'=>Schema::TYPE_PK,
            'name'=>$this->string(255)->notNull(),
            'hasSubCategorie'=>$this->integer()->defaultValue(0)
    ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%categories}}');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181225_165405_table_categories cannot be reverted.\n";

        return false;
    }
    */
}
