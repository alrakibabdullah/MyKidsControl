<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\School;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'school_id' => School::all()->random()->id,
            'name' => $this->faker->name,
            'code' => rand(20000,300000),
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->e164PhoneNumber,
            'image'=>'http://via.placeholder.com/300x300?text=Parent-300x300',
            'password' => bcrypt('123123123'), // password
            'status'=>1,
        ];
    }
}
