<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
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
        $CompanyIds = array_values(Company::pluck('id')->toArray());

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            // 'email_verified_at' => now(),
            // 'password' => static::$password ??= Hash::make('password'),
            'password' => Hash::make('12345678'),
            // 'remember_token' => Str::random(10),
            // 'tel' => '090' . fake()->randomNumber(8),
            // 'postcode' => fake()->postcode(),
            // 'address' => fake()->address(),
            // 'flag' => 1,
            'company_id' => fake()->randomElement($CompanyIds),
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
