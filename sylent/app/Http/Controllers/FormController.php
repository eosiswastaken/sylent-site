<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Question;
use App\Models\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;


class FormController extends Controller
{

    public function formulaire(Request $request)
    {
        abort_if(!$request->hasValidSignature(), 404);
    
        $form = Form::where('url_form', $request->fullUrl())->first();
    
        abort_if($form && now()->gt($form->expiration_date_url), 404);

        $moduleName = Session::get('moduleName');
        Session::forget('moduleName');
    
        return view('form/form', ['moduleName' => $moduleName]);
    }

    public function showAdminPage()
    {
        return view('form/admin');
    }

    public function generateUrl(Request $request)
    {
        $validatedData = $request->validate([
            'module' => 'required|string',
            'module_date' => 'required|date',
            'class' => 'required|string',
        ]);


        $url = URL::temporarySignedRoute(
            'formulaire',
            now()->addMinutes(30),
        );


        $form = new Form;
        $form->module = $validatedData['module'];
        $form->url_form = $url;
        $form->expiration_date_url = now()->addMinutes(30);
        $form->module_date = $validatedData['module_date'];
        $form->class = $validatedData['class'];
        $form->save();

        $formId = $form->id;

        Session::put('formId', $formId);
        Session::put('moduleName', $validatedData['module']);

        return redirect()->route('admin')->with('url', $url);
    }

    public function submitForm(Request $request)
    {

        $formId = Session::get('formId');

        $questions = [
            'email',
            'clarity',
            'teaching_methods',
            'educational_resources',
            'continuous_assessment',
            'tutor_interaction',
            'overall_satisfaction',
            'comments'
        ];

        foreach ($questions as $question) {
            $newQuestion = \App\Models\Question::create([
                'form_id' => $formId,
                'title_question' => $question,
            ]);

            $response = $request->input(str_replace(' ', '_', $question));



            // dd($request->all());
            // dd($response);
            \App\Models\Response::create([
                'response' => $response,
                'question_id' => $newQuestion->id,
            ]);
        }
        return redirect()->route('confirmation');
    }
}
