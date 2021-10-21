<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_book}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%order}}`
 * - `{{%book}}`
 */
class m211020_045947_create_junction_order_and_book_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_book}}', [
            'order_id' => $this->integer(),
            'book_id' => $this->integer(),
            'PRIMARY KEY(order_id, book_id)',
        ]);

        // creates index for column `order_id`
        $this->createIndex(
            '{{%idx-order_book-order_id}}',
            '{{%order_book}}',
            'order_id'
        );

        // add foreign key for table `{{%order}}`
        $this->addForeignKey(
            '{{%fk-order_book-order_id}}',
            '{{%order_book}}',
            'order_id',
            '{{%order}}',
            'id',
            'CASCADE'
        );

        // creates index for column `book_id`
        $this->createIndex(
            '{{%idx-order_book-book_id}}',
            '{{%order_book}}',
            'book_id'
        );

        // add foreign key for table `{{%book}}`
        $this->addForeignKey(
            '{{%fk-order_book-book_id}}',
            '{{%order_book}}',
            'book_id',
            '{{%book}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%order}}`
        $this->dropForeignKey(
            '{{%fk-order_book-order_id}}',
            '{{%order_book}}'
        );

        // drops index for column `order_id`
        $this->dropIndex(
            '{{%idx-order_book-order_id}}',
            '{{%order_book}}'
        );

        // drops foreign key for table `{{%book}}`
        $this->dropForeignKey(
            '{{%fk-order_book-book_id}}',
            '{{%order_book}}'
        );

        // drops index for column `book_id`
        $this->dropIndex(
            '{{%idx-order_book-book_id}}',
            '{{%order_book}}'
        );

        $this->dropTable('{{%order_book}}');
    }
}
