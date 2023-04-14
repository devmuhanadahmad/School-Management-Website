<?php

namespace Database\Factories;

use App\Models\Schoolgrade;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classroom>
 */
class ClassroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name=$this->faker->words(2,true);
        return [
            'name'=>$name,
            'notes'=>$this->faker->sentence(5),
            'schoolgrade_id'=>Schoolgrade::inRandomOrder()->first()->id,
        ];
    }
}
