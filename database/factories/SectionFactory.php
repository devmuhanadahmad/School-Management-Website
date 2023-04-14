<?php

namespace Database\Factories;

use App\Models\Classroom;
use App\Models\Schoolgrade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Section>
 */
class SectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'grade_id' => Schoolgrade::inRandomOrder()->first()->id,
            'classroom_id' => Classroom::inRandomOrder()->first()->id,
            'name' => fake()->name(),
        ];
    }
}
