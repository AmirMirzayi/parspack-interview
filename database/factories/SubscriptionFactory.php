<?php

namespace Database\Factories;

use App\Models\App;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscription>
 */
class SubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'UID'    => fake()->unique()->randomElement(User::pluck('id')),
            'APPID'  => fake()->unique()->randomElement(App::pluck('id')),
            'status' => fake()->randomElement(Subscription::STATUSES),
        ];
    }
}
