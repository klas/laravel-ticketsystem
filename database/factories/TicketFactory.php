<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->words(5, true),
            'description' => $this->faker->text(200),
            'status' => (int) $this->faker->boolean(),
            'created_at' => now(),
            'user_id' => User::factory()
        ];
    }
}
