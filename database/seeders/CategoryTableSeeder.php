<?php

namespace Database\Seeders;

use Database\Factories\AppCatgeoryFactory;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppCatgeoryFactory::times('10')->create();
    }
}
