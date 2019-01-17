<?php

use yii\db\Migration;

/**
 * Class m181228_141707_table_image_product
 */
class m181228_141707_table_image_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($tableOptions === null) {
            $tableOptions = 'CHARSET utf8 COLLATE utf8_unicode_ci ENGINE=INNODB';
        }
        $this->createTable('{{%image_product}}', [
            'image_id' => $this->integer(11),
            'product_id' => $this->integer(11),
            'PRIMARY KEY(image_id, product_id)'
        ], $tableOptions);
        $this->createIndex('idx-image_id-product_id',
            '{{%image_product}}',
            'product_id');
        $this->addForeignKey('fk-image_product-product_id',
            '{{%image_product}}',
            'product_id',
            '{{%products}}',
            'id',
            'CASCADE'
        );
        $this->createIndex('idx-image_product-image_id',
            '{{%image_product}}',
            'image_id');
        $this->addForeignKey('fk-image_product-image_id',
            '{{%image_product}}',
            'image_id',
            '{{%images}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-image_product-product_id', '{{%product_category}}');
        $this->dropIndex('idx-image_id-product_id', '{{%product_category}}');
        $this->dropForeignKey('fk-image_product-image_id', '{{%product_category}}');
        $this->dropIndex('idx-image_product-image_id', '{{%product_category}}');
        $this->dropTable('{{%image_product}}');
        echo "m181228_141707_table_image_product cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181228_141707_table_image_product cannot be reverted.\n";

        return false;
    }
    */
}
