<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Class m190109_141855_table_comment
 */
class m190109_141855_table_comment extends Migration
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
        $this->createTable('{{%comment}}', [
            'id' => Schema::TYPE_PK,
            'comment' => $this->string(255)->notNull(),
            'date_created' => $this->dateTime()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'prod_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull()
        ], $tableOptions);
        $this->createIndex('idx-comment-product_id',
            '{{%comment}}',
            'prod_id');
        $this->addForeignKey('fk-comment-product_id',
            '{{%comment}}',
            'prod_id',
            '{{%products}}',
            'id',
            'CASCADE');
        $this->createIndex('idx-comment-user_id',
            '{{%comment}}',
            'user_id');
        $this->addForeignKey('fk-comment-user_id',
            '{{%comment}}',
            'prod_id',
            '{{%users}}',
            'id',
            'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-comment-product_id', '{{%comment}}');
        $this->dropForeignKey('fk-comment-user_id', '{{%comment}}');
        $this->dropIndex('idx-comment-product_id', '{{%comment}}');
        $this->dropIndex('idx-comment-user_id', '{{%comment}}');
        $this->dropTable('{{%comment}}');
        echo "m190109_141855_table_comment cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190109_141855_table_comment cannot be reverted.\n";

        return false;
    }
    */
}
