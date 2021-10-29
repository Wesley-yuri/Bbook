<?php

namespace console\seeder\tables;

use antonyz89\seeder\TableSeeder;
use console\seeder\DatabaseSeeder;
use common\models\Genre;

/**
 * Handles the creation of seeder `genre`.
 */
class GenreTableSeeder extends TableSeeder
{
    /**
     * {@inheritdoc}
     */
    function run()
    {
        loop(function ($i) {
            $this->insert(Genre::tableName(), [
                'title' => $this->faker->text,
            ]);
        }, DatabaseSeeder::GENRE_COUNT);
    }
}
