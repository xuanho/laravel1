<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employer>
 */
class EmployerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $usedUserIds = [];
        $avliableUserIds = User::whereNotIn('id', $usedUserIds)->inRandomOrder()->first();
        if(!$avliableUserIds){
            throw new \Exception('No available user ids');
        }
        $usedUserIds[] = $avliableUserIds->id;
        return [
            'name' => $this->faker->company(),
            'user_id' => $avliableUserIds->id, 
           
        ];
    }
}
