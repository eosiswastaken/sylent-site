<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistique</title>
    @vite('resources/css/app.css')
</head>
<body>
<h1>Statistics</h1>
    @foreach ($forms as $form)
        <h2>{{ $form->module }}</h2>
        @foreach ($form->questions as $question)
            <h3>{{ $question->title_question }}</h3>
            @if ($question->responses->isNotEmpty())
                <ul>
                    @foreach ($question->responses as $response)
                        <li>{{ $response->response }}</li>
                    @endforeach
                </ul>
            @else
                <p>No responses yet</p>
            @endif
        @endforeach
    @endforeach

    
    </body>
    </html>