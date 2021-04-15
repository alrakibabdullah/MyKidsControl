<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\School;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'parent_id' => Customer::all()->random()->id,
            'school_id' => School::all()->random()->id,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->e164PhoneNumber,
            'email_verified_at' => now(),
            'password' => bcrypt('123123123'), // password
            'image'=>'http://via.placeholder.com/300x300?text=Child-300x300',
            'remember_token' => Str::random(10),
            'user_type'=>'child',
            'status'=>1,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
