<?php

namespace Database\Seeders;

use App\Models\Customer;
use Database\Factories\CustomerFactory;
use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CustomerFactory::times('10')->create();
        // Customer::create([
        //     'name'=>"Rahim",
        //     'email'=>'rahim@gmail.com',
        //     'phone'=>'0191584545',
        //     'password' => bcrypt('123123123'),
        //     'image'=>'http://via.placeholder.com/37x37?text=Admin Image-37x37',
        //     'status'=>1
        // ]);
        // Customer::create([
        //     'name'=>"karim",
        //     'email'=>'karim@gmail.com',
        //     'phone'=>'01916962118',
        //     'password' => bcrypt('123123123'),
        //     'image'=>'http://via.placeholder.com/37x37?text=Admin Image-37x37',
        //     'status'=>1
        // ]);
        // Customer::create([
        //     'name'=>"Niloy",
        //     'email'=>'niloy@gmail.com',
        //     'phone'=>'01916962184',
        //     'password' => bcrypt('123123123'),
        //     'image'=>'http://via.placeholder.com/37x37?text=Admin Image-37x37',
        //     'status'=>1
        // ]);
        // Customer::create([
        //     'name'=>"Kanon",
        //     'email'=>'kanon@gmail.com',
        //     'phone'=>'01916942118',
        //     'password' => bcrypt('123123123'),
        //     'image'=>'http://via.placeholder.com/37x37?text=Admin Image-37x37',
        //     'status'=>1
        // ]);
        // Customer::create([
        //     'name'=>"Shuvo",
        //     'email'=>'shuvo@gmail.com',
        //     'phone'=>'01916965118',
        //     'password' => bcrypt('123123123'),
        //     'image'=>'http://via.placeholder.com/37x37?text=Admin Image-37x37',
        //     'status'=>1
        // ]);
    }
}
