<?php

namespace Database\Seeders;

use App\Models\EmailSetting;
use Illuminate\Database\Seeder;

class EmailSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmailSetting::create([
            'subject'=>"Welcome to Kids Control",
            'description'=>'You are inactive user.Please visit our site regularly and money',
        ]);
    }
}
