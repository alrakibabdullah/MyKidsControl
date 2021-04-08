<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Seeder;

class SchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        School::create([
            'school_name'=>"School User",
            'school_code'=>"SC00001",
            'email'=>'school@gmail.com',
            'phone'=>'01916962118',
            'password' => bcrypt('123123123'),
            'logo'=>'http://via.placeholder.com/37x37?text=Admin Image-37x37',
            'status'=>1
        ]);
        School::create([
            'school_name'=>"Jatrabari Ideal School",
            'school_code'=>"SC00002",
            'email'=>'ideal@gmail.com',
            'phone'=>'01916962119',
            'password' => bcrypt('123123123'),
            'logo'=>'http://via.placeholder.com/37x37?text=Admin Image-37x37',
            'status'=>1
        ]);
    }
}
