<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m181227_221322_table_products
 */
class m181227_221322_table_products extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if($tableOptions === null)
            $tableOptions = 'CHARSET UTF8 COLLATE utf8_unicode_ci ENGINE = INNODB';
        $this->createTable('{{%products}}', [
            'id'=>Schema::TYPE_PK,
            'name'=>$this->string(255)->notNull(),
            'price'=>$this->float(2)->notNull(),
            'quantity'=>$this->integer()->notNull(),
            'title_img_id'=>$this->integer()->notNull()
        ], $tableOptions);
        $this->createIndex('idx-product-image_id',
            '{{%products}}',
            'title_img_id');
        $this->addForeignKey('fk-product-image_id',
            '{{%products}}',
            'title_img_id',
            '{{%images}}',
            'id',
            'no action');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-product-image_id');
        $this->dropIndex('idx-product-image_id');
        $this->dropTable('{{%products}}');
        echo "m181227_221322_table_products cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181227_221322_table_products cannot be reverted.\n";

        return false;
    }
    */
}
