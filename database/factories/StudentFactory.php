<?php

namespace Database\Factories;

use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\MyParent;
use App\Models\Nationalitie;
use App\Models\Religion;
use App\Models\Student;
use App\Models\Type_Blood;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Student::class;

    public function definition(): array
    {
        $user = User::whereHas('roles', function($query) {
            $query->where('name', 'Student');
        })->inRandomOrder()->first();

        return [
            "user_id" => $user->id,
            "name" => $this->faker->name,
            "academic_year" => $this->faker->randomElement(['2022/2023', '2023/2024', '2024/2025']),
            "date_birth" => $this->faker->date,
            "parent_id" => MyParent::inRandomOrder()->first()->id,
            "classroom_id" => Classroom::inRandomOrder()->first()->id,
            "nationality_id" => Nationalitie::inRandomOrder()->first()->id,
            "religion_id" => Religion::inRandomOrder()->first()->id,
            "blood_type_id" => Type_Blood::inRandomOrder()->first()->id,
            "gender_id" => Gender::inRandomOrder()->first()->id,
            "grade_id" => Grade::inRandomOrder()->first()->id,
        ];

    }

}
