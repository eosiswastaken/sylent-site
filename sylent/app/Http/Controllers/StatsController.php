<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function showStats()
    {
        // Récupérer tous les formulaires
        $forms = Form::with('questions.responses')->get();

        // Passer les données à la vue
        return view('form/stats', ['forms' => $forms]);
    }
}