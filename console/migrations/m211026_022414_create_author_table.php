<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%author}}`.
 */
class m211026_022414_create_author_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%author}}', [
            'id' => $this->primaryKey(),
            'name' => $this -> string(40)->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
         $this->createIndex('idx-author-book-id', 'book', 'id');
         $this->addForeignKey('fk-author-book-id', 'book', 'author_id', 'author', 'id', 'CASCADE','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%author}}');
    }
}
