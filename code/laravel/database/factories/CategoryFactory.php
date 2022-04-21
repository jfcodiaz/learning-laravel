<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'created_at' => new \DateTime(),
            'updated_at' => null
        ];
    }
}
