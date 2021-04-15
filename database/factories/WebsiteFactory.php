<?php

namespace Database\Factories;

use App\Models\AppCategory;
use App\Models\Website;
use Illuminate\Database\Eloquent\Factories\Factory;

class WebsiteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Website::class;

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
