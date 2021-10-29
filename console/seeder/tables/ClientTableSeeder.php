<?php

namespace console\seeder\tables;

use antonyz89\seeder\TableSeeder;
use console\seeder\DatabaseSeeder;
use common\models\Client;

/**
 * Handles the creation of seeder `client`.
 */
class ClientTableSeeder extends TableSeeder
{
    /**
     * {@inheritdoc}
     */
    function run()
    {
        loop(function ($i) {
            $this->insert(Client::tableName(), [
                'name' => $this->faker->name,
				'cpf' => $this->faker->cpf(),
				'telephone' => $this->faker->numberBetween(0, 10),
				'andress' => $this->faker->text,
            ]);
        }, DatabaseSeeder::CLIENT_COUNT);
    }
}
