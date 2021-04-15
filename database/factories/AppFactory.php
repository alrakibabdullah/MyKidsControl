<?php

namespace Database\Factories;

use App\Models\App;
use App\Models\AppCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = App::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => AppCategory::all()->random()->id,
            'name' => $this->faker->name,
            'link' => $this->faker->domainName,
            'logo'=>'http://via.placeholder.com/300x300?text=Logo-300x300',
        ];
    }
}
