<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserFactory::times('10')->create();
        // User::create([
        //     'name'=>"Rafiq",
        //     'parent_id'=>2,
        //     'email'=>'rafiq@gmail.com',
        //     'phone'=>'0191584545',
        //     'password' => bcrypt('123123123'),
        //     'image'=>'http://via.placeholder.com/37x37?text=Admin Image-37x37',
        //     'status'=>1
        // ]);
        // User::create([
        //     'name'=>"Kamal",
        //     'parent_id'=>1,
        //     'email'=>'kamal@gmail.com',
        //     'phone'=>'01916962118',
        //     'password' => bcrypt('123123123'),
        //     'image'=>'http://via.placeholder.com/37x37?text=Admin Image-37x37',
        //     'status'=>1
        // ]);
        // User::create([
        //     'name'=>"Niloy",
        //     'parent_id'=>3,
        //     'email'=>'niloy@gmail.com',
        //     'phone'=>'01916962184',
        //     'password' => bcrypt('123123123'),
        //     'image'=>'http://via.placeholder.com/37x37?text=Admin Image-37x37',
        //     'status'=>1
        // ]);
        // User::create([
        //     'name'=>"Bellal",
        //     'parent_id'=>4,
        //     'email'=>'bellal@gmail.com',
        //     'phone'=>'01916942118',
        //     'password' => bcrypt('123123123'),
        //     'image'=>'http://via.placeholder.com/37x37?text=Admin Image-37x37',
        //     'status'=>1
        // ]);
        // User::create([
        //     'name'=>"Jon",
        //     'parent_id'=>5,
        //     'email'=>'jon@gmail.com',
        //     'phone'=>'01916965118',
        //     'password' => bcrypt('123123123'),
        //     'image'=>'http://via.placeholder.com/37x37?text=Admin Image-37x37',
        //     'status'=>1
        // ]);
    }
}
