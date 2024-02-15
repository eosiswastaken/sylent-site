<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    @vite('resources/css/app.css')
</head>

<body x-data="{ formData: {} }" x-init="init()">

    <div id="home" class="container">
        <div class="container mx-auto mt-10 text-center">
            <h1 class="text-3xl font-bold mb-4">Formulaire de fin de module : {{ $moduleName }}</h1>
            <p class="mb-2">Module mené par Aunim HASSAN</p>
            <p class="mb-8">Date: {{ now()->format('d-m-Y') }}</p>

            <button class="bg-blue-500 text-white py-2 px-4 rounded-md" onclick="masked()" >Démarrer maintenant</button>
        </div>
    </div>

    <nav class="bg-blue-500 p-4 text-white">
        <div class="container mx-auto">
            <h1 class="text-2xl font-bold">Formulaire de fin module : Laravel</h1>
        </div>
    </nav>
    <div class="container mx-auto mt-10 bg-white p-6 rounded-md shadow-md">
        <form action="{{ route('submit-form') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="email" class="block mb-2">Votre adresse e-mail :</label>
                <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded-md" required>
            </div>
            <div class="mb-4">
                <label id="clarity" for="clarity" class="block mb-2">A quel point les concepts étaient-ils présentés clairement ?</label>
                <div class="flex items-center gap-x-3">
                    <input type="radio" id="clarity1" name="clarity" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" value="1" required>
                    <label for="clarity" class="block text-sm font-medium leading-6 text-gray-900">Pas Satisfait</label>
                    <input type="radio" id="clarity2" name="clarity" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" value="2" required>
                    <label for="clarity" class="block text-sm font-medium leading-6 text-gray-900">Peu Satisfait</label>
                    <input type="radio" id="clarity3" name="clarity" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" value="3" required>
                    <label for="clarity" class="block text-sm font-medium leading-6 text-gray-900">Assez Satisfait</label>
                    <input type="radio" id="clarity4" name="clarity" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" value="4" required>
                    <label for="clarity" class="block text-sm font-medium leading-6 text-gray-900">Trés Satisfait</label>
                </div>
            </div>

            <div class="mb-4">
                <label id="teaching_methods" for="teaching_methods" class="block mb-2">Notez l'efficacité des méthodes d'enseignement utilisées.</label>
                <div class="flex items-center gap-x-3">
                    <input type="radio" id="teaching_methods1" name="teaching_methods" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" value="1" required>
                    <label for="teaching_methods" class="block text-sm font-medium leading-6 text-gray-900">Pas Satisfait</label>
                    <input type="radio" id="teaching_methods2" name="teaching_methods" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" value="2" required>
                    <label for="teaching_methods" class="block text-sm font-medium leading-6 text-gray-900">Peu Satisfait</label>
                    <input type="radio" id="teaching_methods3" name="teaching_methods" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" value="3" required>
                    <label for="teaching_methods" class="block text-sm font-medium leading-6 text-gray-900">Assez Satisfait</label>
                    <input type="radio" id="teaching_methods4" name="teaching_methods" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" value="4" required>
                    <label for="teaching_methods" class="block text-sm font-medium leading-6 text-gray-900">Trés Satisfait</label>
                </div>
            </div>

            <div class="mb-4">
                <label id="educational_resources" for="educational_resources" class="block mb-2">Comment évaluez-vous l'utilité des ressources fournies ?</label>
                <div class="flex items-center gap-x-3">
                    <input type="radio" id="educational_resources1" name="educational_resources" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" value="1" required>
                    <label for="educational_resources" class="block text-sm font-medium leading-6 text-gray-900">Pas Satisfait</label>
                    <input type="radio" id="educational_resources2" name="educational_resources" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" value="2" required>
                    <label for="educational_resources" class="block text-sm font-medium leading-6 text-gray-900">Peu Satisfait</label>
                    <input type="radio" id="educational_resources3" name="educational_resources" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" value="3" required>
                    <label for="educational_resources" class="block text-sm font-medium leading-6 text-gray-900">Assez Satisfait</label>
                    <input type="radio" id="educational_resources4" name="educational_resources" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" value="4" required>
                    <label for="educational_resources" class="block text-sm font-medium leading-6 text-gray-900">Trés Satisfait</label>
                </div>
            </div>

            <div class="mb-4">
                <label id="continuous_assessment" for="continuous_assessment" class="block mb-2">A quel point les évaluations reflétaient-elles votre compréhension ?</label>
                <div class="flex items-center gap-x-3">
                    <input type="radio" id="continuous_assessment1" name="continuous_assessment" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" value="1" required>
                    <label for="continuous_assessment" class="block text-sm font-medium leading-6 text-gray-900">Pas Satisfait</label>
                    <input type="radio" id="continuous_assessment2" name="continuous_assessment" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" value="2" required>
                    <label for="continuous_assessment" class="block text-sm font-medium leading-6 text-gray-900">Peu Satisfait</label>
                    <input type="radio" id="continuous_assessment3" name="continuous_assessment" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" value="3" required>
                    <label for="continuous_assessment" class="block text-sm font-medium leading-6 text-gray-900">Assez Satisfait</label>
                    <input type="radio" id="continuous_assessment4" name="continuous_assessment" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" value="4" required>
                    <label for="continuous_assessment" class="block text-sm font-medium leading-6 text-gray-900">Trés Satisfait</label>
                </div>
            </div>

            <div class="mb-4">
                <label id="tutor_interaction" for="tutor_interaction" class="block mb-2">Notez l'accessibilité et la disponibilité du tuteur.</label>
                <div class="flex items-center gap-x-3">
                    <input type="radio" id="tutor_interaction1" name="tutor_interaction" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" value="1" required>
                    <label for="tutor_interaction" class="block text-sm font-medium leading-6 text-gray-900">Pas Satisfait</label>
                    <input type="radio" id="tutor_interaction2" name="tutor_interaction" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" value="2" required>
                    <label for="tutor_interaction" class="block text-sm font-medium leading-6 text-gray-900">Peu Satisfait</label>
                    <input type="radio" id="tutor_interaction3" name="tutor_interaction" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" value="3" required>
                    <label for="tutor_interaction" class="block text-sm font-medium leading-6 text-gray-900">Assez Satisfait</label>
                    <input type="radio" id="tutor_interaction4" name="tutor_interaction" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" value="4" required>
                    <label for="tutor_interaction" class="block text-sm font-medium leading-6 text-gray-900">Trés Satisfait</label>
                </div>
            </div>

            <div class="mb-4">
                <label id="overall_satisfaction" for="overall_satisfaction" class="block mb-2">A quel point êtes-vous satisfait du module ?</label>
                <div class="flex items-center gap-x-3">
                    <input type="radio" id="overall_satisfaction1" name="overall_satisfaction" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" value="1" required>
                    <label for="overall_satisfaction" class="block text-sm font-medium leading-6 text-gray-900">Pas Satisfait</label>
                    <input type="radio" id="overall_satisfaction2" name="overall_satisfaction" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" value="2" required>
                    <label for="overall_satisfaction" class="block text-sm font-medium leading-6 text-gray-900">Peu Satisfait</label>
                    <input type="radio" id="overall_satisfaction3" name="overall_satisfaction" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" value="3" required>
                    <label for="overall_satisfaction" class="block text-sm font-medium leading-6 text-gray-900">Assez Satisfait</label>
                    <input type="radio" id="overall_satisfaction4" name="overall_satisfaction" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" value="4" required>
                    <label for="overall_satisfaction" class="block text-sm font-medium leading-6 text-gray-900">Trés Satisfait</label>
                </div>
            </div>
            <div class="mb-4">
                <label id="comments" for="comments" class="block mb-2">Avez-vous des commentaires ou suggestions d'amélioration ?</label>
                <textarea id="comments1" name="comments" class="w-full p-2 border border-gray-300 rounded-md" rows="3"></textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md">Soumettre</button>
        </form>
    </div>

    <script>
        function init() {
            return {
                formData: {}
            };
        }
        document.querySelector('form').setAttribute('style', 'display:none')
        document.querySelector('nav').setAttribute('style', 'display:none')

        function masked() {
            document.querySelector('form').setAttribute('style', 'display:block')
            document.querySelector('nav').setAttribute('style', 'display:block')
            
            document.getElementById('home').setAttribute('style', 'display:none')
        }
    </script>

</body>

</html>