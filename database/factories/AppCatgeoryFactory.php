<?php

namespace Database\Factories;

use App\Models\AppCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppCatgeoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AppCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => rand(0,1),
            'title' => $this->faker->name,
            'status'=>1,
        ];
    }
}
