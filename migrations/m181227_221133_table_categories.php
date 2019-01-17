<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m181227_221133_table_categories
 */
class m181227_221133_table_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if($tableOptions === null)
            $tableOptions = 'CHARSET UTF8 COLLATE utf8_unicode_ci ENGINE = INNODB';
        $this->createTable('{{%categories}}', [
            'id'=>Schema::TYPE_PK,
            'name'=>$this->string(255)->notNull(),
            'description'=>$this->string()->notNull(),
            'image_id'=>$this->integer()->notNull(),
            'parent_category_id'=>$this->integer()->defaultValue(0),
            //'PRIMARY KEY(image_id)'
        ], $tableOptions);
        $this->createIndex('idx-categories-image_id',
            '{{%categories}}',
            'image_id');
        $this->addForeignKey('fk-categories-image_id',
            '{{%categories}}',
            'image_id',
            '{{%images}}',
            'id',
            'no action');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-categories-image_id');
        $this->dropIndex('idx-categories-image_id');
        $this->dropTable('{{%categories}}');
        echo "m181227_221133_table_categories cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181227_221133_table_categories cannot be reverted.\n";

        return false;
    }
    */
}
