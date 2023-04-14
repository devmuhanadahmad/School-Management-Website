<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Myparent>
 */
class MyparentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'Email' => fake()->unique()->safeEmail(),
            'Password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password

            'Name_Father' => fake()->name(),
            'National_ID_Father' => $this->faker->randomFloat(3, 1),
            'Passport_ID_Father' => $this->faker->randomFloat(3, 1),
            'Phone_Father' => $this->faker->randomFloat(3, 1),
            'Language_Father' => $this->faker->word(2),
            'Nationality_Father_id' => $this->faker->word(2),
            'Religion_Father_id' => $this->faker->word(2),
            'Address_Father' => $this->faker->word(2),

            'Name_Mother' => fake()->name(),
            'National_ID_Mother' => $this->faker->randomFloat(3, 1),
            'Passport_ID_Mother' => $this->faker->randomFloat(3, 1),
            'Phone_Mother' => $this->faker->randomFloat(3, 1),
            'Language_Mother' => $this->faker->word(2),
            'Nationality_Mother_id' => $this->faker->word(2),
            'Religion_Mother_id' => $this->faker->word(2),
            'Address_Mother' => $this->faker->word(2),

        ];
    }
}
