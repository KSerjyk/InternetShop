<?php

use yii\db\Migration;

/**
 * Class m190115_163901_table_basket
 */
class m190115_163901_table_basket extends Migration
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
        $this->createTable('{{%basket}}', [
            'product_id'=>$this->integer()->notNull(),
            'user_id'=>$this->integer()->notNull(),
            'quantity'=>$this->integer()->defaultValue(1),
            'PRIMARY KEY(product_id, user_id)'
        ], $tableOptions);
        $this->createIndex('idx-basket-product_id', '{{%basket}}', 'product_id');
        $this->addForeignKey('fk-basket-product_id', '{{%basket}}', 'product_id',
            '{{%products}}',
            'id');
        $this->createIndex('idx-basket-user_id', '{{%basket}}', 'user_id');
        $this->addForeignKey('fk-basket-user_id', '{{%basket}}', 'user_id',
            '{{%users}}',
            'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-basket-product_id','{{%basket}}');
        $this->dropIndex('idx-basket-product_id','{{%basket}}');
        $this->dropForeignKey('fk-basket-user_id','{{%basket}}');
        $this->dropIndex('idx-basket-user_id','{{%basket}}');
        $this->dropTable('{{%basket}}');
        echo "m190115_163901_table_basket cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190115_163901_table_basket cannot be reverted.\n";

        return false;
    }
    */
}
