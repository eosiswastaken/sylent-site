<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Form;
use App\Models\Question;
use App\Models\Response;
use Faker\Generator as Faker;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(Faker $faker)
    {
        // Créer 20 formulaires
        Form::factory(20)->create()->each(function ($form) use ($faker) {
            // Créer 8 questions pour chaque formulaire
            Question::factory(8)->create(['form_id' => $form->id])->each(function ($question) use ($faker) {
                if ($question->title_question === 'email') {
                    // Créer une réponse avec une adresse e-mail pour la première question
                    Response::factory()->create([
                        'question_id' => $question->id,
                        'response' => $faker->unique()->safeEmail(),
                    ]);
                } elseif ($question->title_question === 'comments') {
                    // Créer une réponse avec une phrase pour la dernière question
                    Response::factory()->create([
                        'question_id' => $question->id,
                        'response' => $faker->sentence(),
                    ]);
                } else {
                    // Créer une réponse avec un nombre aléatoire entre 1 et 5 pour les autres questions
                    Response::factory()->create([
                        'question_id' => $question->id,
                        'response' => $faker->numberBetween(1, 4),
                    ]);
                }
            });
        });
    }
}
