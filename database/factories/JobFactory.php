<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [  
            'title' => $this->faker->jobTitle(),
            'employer_id' => Employer::factory(), // Assuming you have an Employer factory
            'company' => $this->faker->company(),
            'location' => $this->faker->city(),
            'tax_number' => $this->faker->randomNumber(8),
            'salary' => $this->faker->numberBetween(50000, 150000),
        ];
    }
}
