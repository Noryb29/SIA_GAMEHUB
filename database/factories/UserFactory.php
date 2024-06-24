<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    // Specifies that this factory creates instances of the User model
    protected $model = User::class;

    // Defines the structure of the generated user data
    public function definition()
    {
        return [
            'name' => $this->faker->name, // Generates a fake name using Faker
            'email' => $this->faker->unique()->safeEmail, // Generates a unique fake email address using Faker
        ];
    }
}
