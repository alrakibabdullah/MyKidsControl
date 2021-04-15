<?php

namespace Database\Seeders;

use Database\Factories\AppFactory;
use Illuminate\Database\Seeder;

class AppTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppFactory::times('10')->create();
    }
}
