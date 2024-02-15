<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Form>
 */
class FormFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'module' => $this ->faker->sentence,
            'url_form' => $this -> faker->url,
            'expiration_date_url' => $this -> faker->dateTimeBetween('now', '+1 month'),
            'module_date' => $this -> faker->dateTimeBetween('-1 year', 'now'),
            'class' => $this -> faker->word,
        ];
    }
}
