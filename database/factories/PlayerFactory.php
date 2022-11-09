<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name('male'),
            'no_pg' => $this->faker->unique()->numberBetween(1,100),
            'tgl_lahir' => $this->faker->dateTimeBetween('-25 years', '-20 years')->format('d-m-Y'),
            'no_tlp' => $this->faker->phoneNumber(), 
        ];
    }
}