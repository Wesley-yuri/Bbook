<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%client}}`.
 */
class m211020_044926_create_client_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%client}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(25)->notNull(),
            'cpf' => $this->string(11)->notNull(),
            'telephone' => $this->integer(11),
            'andress' => $this->string(40)->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
      
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%client}}');
    }
}
