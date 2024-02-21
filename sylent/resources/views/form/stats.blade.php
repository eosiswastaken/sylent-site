<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistique</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <style>
        .chart-container {
            margin-bottom: -150px;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <div class="info_lastform bg-white p-6 rounded-lg shadow-lg mb-8">
            <h2 class="text-xl font-bold mb-4">Informations et statistiques du dernier formulaire :</h2>
            <p class="mb-2"><span class="font-bold">Module :</span> {{ $lastForm->module }}</p>
            <p class="mb-2"><span class="font-bold">Date du module :</span> {{ \Carbon\Carbon::parse($lastForm->module_date)->format('d/m/Y') }}</p>
            <p class="mb-2"><span class="font-bold">Classe :</span> {{ $lastForm->class }}</p>
            <hr class="my-4">
            <h2 class="text-xl font-bold mb-4">Commentaires du dernier formulaire :</h2>
            <ul>
                @foreach($lastFormComments as $comment)
                <li>{{ $comment }}</li>
                @endforeach
            </ul>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="chart-container">
                <canvas id="myChart_lastform-clarity" class="chart-canvas"></canvas>
            </div>
            <div class="chart-container">
                <canvas id="myChart_lastform-teaching_methods" class="chart-canvas"></canvas>
            </div>
            <div class="chart-container">
                <canvas id="myChart_lastform-educational_resources" class="chart-canvas"></canvas>
            </div>
            <div class="chart-container">
                <canvas id="myChart_lastform-continuous_assessment" class="chart-canvas"></canvas>
            </div>
            <div class="chart-container">
                <canvas id="myChart_lastform-tutor_interaction" class="chart-canvas"></canvas>
            </div>
            <div class="chart-container">
                <canvas id="myChart_lastform-overall_satisfaction" class="chart-canvas"></canvas>
            </div>
        </div>

        <hr class="my-8">

        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-bold mb-4">Statistiques de l'ensemble des formulaires :</h2>
            <p class="mb-2"><span class="font-bold">Nombre de formulaires :</span> {{ $forms->count() }}</p>
            <hr class="my-4">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="chart-container">
                <canvas id="myChart-clarity" class="chart-canvas"></canvas>
            </div>
            <div class="chart-container">
                <canvas id="myChart-teaching_methods" class="chart-canvas"></canvas>
            </div>
            <div class="chart-container">
                <canvas id="myChart-educational_resources" class="chart-canvas"></canvas>
            </div>
            <div class="chart-container">
                <canvas id="myChart-continuous_assessment" class="chart-canvas"></canvas>
            </div>
            <div class="chart-container">
                <canvas id="myChart-tutor_interaction" class="chart-canvas"></canvas>
            </div>
            <div class="chart-container">
                <canvas id="myChart-overall_satisfaction" class="chart-canvas"></canvas>
            </div>
        </div>
    </div>
    <script id="form-data" type="application/json">
        {!!json_encode($forms) !!}
    </script>

</body>

</html>

</html>