<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(AdminTableSeeder::class);
        $this->call(SchoolTableSeeder::class);
        $this->call(CustomerTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(EmailSettingSeeder::class);
        $this->call(ScheduleTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(WebsiteTableSeeder::class);
        $this->call(AppTableSeeder::class);
        
    }
}
