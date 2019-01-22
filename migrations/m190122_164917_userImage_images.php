<?php

use yii\db\Migration;

/**
 * Class m190122_164917_userImage_images
 */
class m190122_164917_userImage_images extends Migration
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
        $this->createTable('{{%user_images}}', [
            'user_id' => $this->integer(11),
            'image_id' => $this->integer(11),
            'PRIMARY KEY(user_id, image_id)'
        ], $tableOptions);
        $this->createIndex('idx-user_images-user_id',
            '{{%user_images}}',
            'user_id');
        $this->addForeignKey('fk-user_images-user_id',
            '{{%user_images}}',
            'user_id',
            '{{%users}}',
            'id',
            'CASCADE'
        );
        $this->createIndex('idx-user_images-image_id',
            '{{%user_images}}',
            'image_id');
        $this->addForeignKey('fk-user_images-image_id',
            '{{%user_images}}',
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
        $this->dropForeignKey('fk-user_images-user_id', '{{%user_images}}');
        $this->dropIndex('idx-user_images-user_id', '{{%user_images}}');
        $this->dropForeignKey('fk-user_images-image_id', '{{%user_images}}');
        $this->dropIndex('idx-user_images-image_id', '{{%user_images}}');
        $this->dropTable('{{%user_images}}');
        echo "m190122_164917_userImage_images cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190122_164917_userImage_images cannot be reverted.\n";

        return false;
    }
    */
}
