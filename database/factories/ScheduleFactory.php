<?php

namespace Database\Factories;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Schedule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'title' => $this->faker->name,
            'from_time' => $this->faker->time(),
            'to_time' => $this->faker->time(),
            'saturday' => $this->faker->boolean(),
            'sunday' => $this->faker->boolean(),
            'monday' => $this->faker->boolean(),
            'tuesday' => $this->faker->boolean(),
            'wednesday' => $this->faker->boolean(),
            'thursday' => $this->faker->boolean(),
            'friday' => $this->faker->boolean(),
            'status'=>$this->faker->boolean(),
        ];
    }
}
