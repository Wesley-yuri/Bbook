<?php

namespace console\seeder\tables;

use antonyz89\seeder\TableSeeder;
use console\seeder\DatabaseSeeder;
use common\models\Book;

/**
 * Handles the creation of seeder `book`.
 */
class BookTableSeeder extends TableSeeder
{
    /**
     * {@inheritdoc}
     */
    function run()
    {
        loop(function ($i) {
            $this->insert(Book::tableName(), [
                'title' => $this->faker->text,
				'author_book' => $this->faker->text,
				'launch_date' => $this->faker->numberBetween(0, 10),
				'genre_book' => $this->faker->text,
            ]);
        }, DatabaseSeeder::BOOK_COUNT);
    }
}
