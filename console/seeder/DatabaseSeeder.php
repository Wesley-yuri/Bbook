<?php
namespace console\seeder;

use antonyz89\seeder\TableSeeder;
use console\seeder\tables\BookTableSeeder;

class DatabaseSeeder extends TableSeeder
{

    const BOOK_COUNT = 10;

    public function run()
    {
        BookTableSeeder::create()->run();

    }

}
