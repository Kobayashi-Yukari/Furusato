<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producer>
 */
class ProducerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            // 'password' => static::$password ??= Hash::make('password'),
            'password' => Hash::make('12345678'),
            // 'remember_token' => Str::random(10),
            'tel' => '090' . fake()->randomNumber(8),
            'postcode' => fake()->postcode(),
            'address' => fake()->address(),
            'company_name' => fake()->company(),
            'is_display' => 1,
            'created_at' =>now(),
            'updated_at' =>now(),
        ];
    }
}
