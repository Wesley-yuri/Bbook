<?php

namespace console\seeder\tables;

use antonyz89\seeder\TableSeeder;
use console\seeder\DatabaseSeeder;
use common\models\Author;

/**
 * Handles the creation of seeder `author`.
 */
class AuthorTableSeeder extends TableSeeder
{
    /**
     * {@inheritdoc}
     */
    function run()
    {
        loop(function ($i) {
            $this->insert(Author::tableName(), [
                'name' => $this->faker->name,
            ]);
        }, DatabaseSeeder::AUTHOR_COUNT);
    }
}
