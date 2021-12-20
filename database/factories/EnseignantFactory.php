<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EnseignantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nomEns' => $this->faker->firstname(),
            'prénomEns' => $this->faker->lastname(),
            'grade'=>'licence',
        ];
    }
}
