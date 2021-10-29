<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%genre_book}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%genre}}`
 * - `{{%book}}`
 */
class m211026_061134_create_junction_table_for_genre_and_book_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%genre_book}}', [
            'genre_id' => $this->integer(),
            'book_id' => $this->integer(),
            'PRIMARY KEY(genre_id, book_id)',
        ]);

        // creates index for column `genre_id`
        $this->createIndex(
            '{{%idx-genre_book-genre_id}}',
            '{{%genre_book}}',
            'genre_id'
        );

        // add foreign key for table `{{%genre}}`
        $this->addForeignKey(
            '{{%fk-genre_book-genre_id}}',
            '{{%genre_book}}',
            'genre_id',
            '{{%genre}}',
            'id',
            'CASCADE'
        );

        // creates index for column `book_id`
        $this->createIndex(
            '{{%idx-genre_book-book_id}}',
            '{{%genre_book}}',
            'book_id'
        );

        // add foreign key for table `{{%book}}`
        $this->addForeignKey(
            '{{%fk-genre_book-book_id}}',
            '{{%genre_book}}',
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
        // drops foreign key for table `{{%genre}}`
        $this->dropForeignKey(
            '{{%fk-genre_book-genre_id}}',
            '{{%genre_book}}'
        );

        // drops index for column `genre_id`
        $this->dropIndex(
            '{{%idx-genre_book-genre_id}}',
            '{{%genre_book}}'
        );

        // drops foreign key for table `{{%book}}`
        $this->dropForeignKey(
            '{{%fk-genre_book-book_id}}',
            '{{%genre_book}}'
        );

        // drops index for column `book_id`
        $this->dropIndex(
            '{{%idx-genre_book-book_id}}',
            '{{%genre_book}}'
        );

        $this->dropTable('{{%genre_book}}');
    }
}
