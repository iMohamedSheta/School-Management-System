<?php

namespace Database\Factories;

use App\Models\Grade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grade>
 */
class GradeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Grade::class;

    public function definition(): array
    {
        return [
                'name' => $this ->faker->name(),
                'notes' => $this -> faker -> title()

            //
        ];
    }
}
