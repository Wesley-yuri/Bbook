<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book}}`.
 */
class m211020_044942_create_book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%book}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(40),
            'author_id' => $this->integer()->notNull(),
            'launch_date' => $this->integer()->notNull(),
            'genre_id' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%book}}');
    }
}
