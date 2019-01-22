<?php

use yii\db\Migration;

/**
 * Class m181227_222206_table_products_to_categories
 */
class m181227_222206_table_products_to_categories extends Migration
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
        $this->createTable('{{%product_category}}', [
            'product_id' => $this->integer(11),
            'category_id' => $this->integer(11),
            'PRIMARY KEY(product_id, category_id)'
        ], $tableOptions);
        $this->createIndex('idx-product_category-product_id',
            '{{%product_category}}',
            'product_id');
        $this->addForeignKey('fk-product_category-product_id',
            '{{%product_category}}',
            'product_id',
            '{{%products}}',
            'id',
            'CASCADE'
        );
        $this->createIndex('idx-product_category-category_id',
            '{{%product_category}}',
            'category_id');
        $this->addForeignKey('fk-product_category-category_id',
            '{{%product_category}}',
            'category_id',
            '{{%categories}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-tovar_category-tovar_id', '{{%tovar_category}}');
        $this->dropIndex('idx-tovar_category-tovar_id', '{{%tovar_category}}');
        $this->dropForeignKey('fk-tovar_category-category_id', '{{%tovar_category}}');
        $this->dropIndex('idx-tovar_category-category_id', '{{%tovar_category}}');
        $this->dropTable('{{%tovar_category}}');
        echo "m181227_222206_table_products_to_categories cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181227_222206_table_products_to_categories cannot be reverted.\n";

        return false;
    }
    */
}
