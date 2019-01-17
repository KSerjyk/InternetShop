<?php

use yii\db\Migration;

/**
 * Class m181228_152125_table_description_product
 */
class m181228_152125_table_description_product extends Migration
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
        $this->createTable('{{%description_product}}', [
            'product_id' => $this->integer(11),
            'name'=>$this->string(255)->notNull(),
            'value'=>$this->string(255)->notNull(),
            'PRIMARY KEY(product_id)'
        ], $tableOptions);
        $this->createIndex('idx-description_product-product_id',
            '{{%description_product}}',
            'product_id');
        $this->addForeignKey('fk-description_product-product_id',
            '{{%description_product}}',
            'product_id',
            '{{%products}}',
            'id',
            'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-description_product-product_id','{{%description_product}}');
        $this->dropIndex('idx-description_product-product_id','{{%description_product}}');
        $this->dropTable('{{%description_product}}');
        echo "m181228_152125_table_description_product cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181228_152125_table_description_product cannot be reverted.\n";

        return false;
    }
    */
}
