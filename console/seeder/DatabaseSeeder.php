<?php
namespace console\seeder;

use antonyz89\seeder\TableSeeder;
use console\seeder\tables\AuthorTableSeeder;
use console\seeder\tables\ClientTableSeeder;
use console\seeder\tables\GenreTableSeeder;

class DatabaseSeeder extends TableSeeder
{

    const CLIENT_COUNT = 10;
    const AUTHOR_COUNT = 10;
    const GENRE_COUNT = 10;

    public function run()
    {
        ClientTableSeeder::create()->run();
        AuthorTableSeeder::create()->run();
        GenreTableSeeder::create()->run();

    }

}
