<?php

use yii\db\Migration;

/**
 * Class m181226_155602_table_tovary_to_categories
 */
class m181226_155602_table_tovary_to_categories extends Migration
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
        $this->createTable('{{%tovar_category}}', [
            'tovar_id' => $this->integer(11),
            'category_id' => $this->integer(11),
            'PRIMARY KEY(tovar_id, category_id)'

        ], $tableOptions);

        $this->createIndex('idx-tovar_category-tovar_id',
            '{{%tovar_category}}',
            'tovar_id');
        $this->addForeignKey('fk-tovar_category-tovar_id',
            '{{%tovar_category}}',
            'tovar_id',
            '{{%tovary}}',
            'id',
            'CASCADE'
        );


        $this->createIndex('idx-tovar_category-category_id',
            '{{%tovar_category}}',
            'category_id');
        $this->addForeignKey('fk-tovar_category-category_id',
            '{{%tovar_category}}',
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
        echo "m181226_155602_table_tovary_to_categories cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181226_155602_table_tovary_to_categories cannot be reverted.\n";

        return false;
    }
    */
}
