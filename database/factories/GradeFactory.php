<?php

namespace Database\Factories;

use App\Models\Grade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grade>
 */
class GradeFactory extends Factory
{
    protected $model = Grade::class;

    public function definition(): Array
    {
        return [
            'name' => $this->faker->name,
            'notes' => $this->faker->optional()->text,
        ];
    }
}

