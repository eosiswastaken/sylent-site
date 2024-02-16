<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Liste des titres des questions dans l'ordre souhaité
        $titles = [
            'email',
            'clarity',
            'teaching_methods',
            'educational_resources',
            'continuous_assessment',
            'tutor_interaction',
            'overall_satisfaction',
            'comments'
        ];

        // Utilisation d'un compteur pour parcourir les titres
        static $counter = 0;

        // Réinitialiser le compteur si nous avons atteint la fin de la liste des titres
        if ($counter >= count($titles)) {
            $counter = 0;
        }

        return [
            'title_question' => $titles[$counter++], // Utilisation du titre correspondant au compteur actuel
        ];
    }
}
