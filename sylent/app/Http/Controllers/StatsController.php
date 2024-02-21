<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Question;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function showStats()
    {
        $forms = Form::with('questions.responses')->get();
        $lastForm = $forms->last();
        $lastFormComments = [];
        $lastFormComments = [];
        foreach ($lastForm->questions as $question) {
            if ($question->title_question === 'comments') {
                foreach($question->responses as $response) {
                    $lastFormComments[] = $response->response;
                } 
            }
        }

        return view('form.stats', compact('forms', 'lastForm', 'lastFormComments'));
    }
}