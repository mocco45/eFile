<?php

namespace Database\Factories;

use App\Models\Files;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Files>
 */
class FilesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
        ];

    }

    public function fileNumber(){
        return 'T01'.$this->faker->randomNumber(6);
    }

    public function phoneNumber(){
        return '07'.$this->faker->randomNumber(8);
    }
}
