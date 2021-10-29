<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%genre}}`.
 */
class m211026_060852_create_genre_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%genre}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(40)->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%genre}}');
    }
}
