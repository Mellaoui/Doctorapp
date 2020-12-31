<?php

namespace Database\Factories;

use App\Models\Twitte;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TwitteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Twitte::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->name,
            'body' => $this->faker->paragraph,
        ];
    }
}
