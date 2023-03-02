<?php

namespace Database\Factories;

use App\Models\Platform;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ExpirationHistory>
 */
class ExpirationHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'at_date' => fake()->date('Y-m-d','2220-12-12'),
            'expired_count' => fake()->randomNumber(),
            'platform_id' => fake()->randomElement(Platform::pluck('id'))
        ];
    }
}
