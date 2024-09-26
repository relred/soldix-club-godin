<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static $hashedPassword;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
            return [
                'name' => "Usuario" . $this->faker->unique()->numerify('#####'),
                'email' => $this->faker->unique()->lexify('????') . "@" . $this->faker->lexify('????'),
                'phone' => $this->faker->numerify('##########'),
                'password' => self::$hashedPassword ?? (self::$hashedPassword = Hash::make('password')),
                'is_local_admin' => 0,
                'role_id' => 1,
                'club' => 'premium',
            ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
