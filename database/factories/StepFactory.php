<?php

namespace Database\Factories;

use App\Models\Trips;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'type' => fake()->word(),
        'number' => fake()->word(),
        'departure' => fake()->word(),
        'arrival'=> fake()->word(),
        'seat'=> fake()->word(),
        'gate'=> fake()->word(),
        'baggage_drop'=> fake()->word(),
        'trips_id' => Trips::factory()
        ];
    }
}
