<?php

namespace Database\Seeders;

use Database\Factories\WebsiteFactory;
use Illuminate\Database\Seeder;

class WebsiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebsiteFactory::times('10')->create();
    }
}
