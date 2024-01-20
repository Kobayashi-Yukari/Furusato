<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $CompanyIds = array_values(Company::limit(1)->pluck('id')->toArray());
        return [
            'name' => fake()->company(),
            'email' => fake()->unique()->safeEmail(),
            // 'password' => static::$password ??= Hash::make('password'),
            'password' => Hash::make('12345678'),
            'tel' => '03' . fake()->randomNumber(8),
            'postcode' => fake()->postcode(),
            'address' => fake()->address(),
            'created_at' =>now(),
            'updated_at' =>now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'deleted_at' => null,
        ]);
    }
}
