<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Admin</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="container mx-auto mt-10 text-center">
        <h1 class="text-3xl font-bold mb-4">Page Admin</h1>
        <form action="{{ route('generate-url') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="module" class="block mb-2">Sélectionnez le module :</label>
                <input type="text" id="module" name="module" class="w-full p-2 border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="class" class="block mb-2">Sélectionnez la classe :</label>
                <input type="text" id="class" name="class" class="w-full p-2 border border-gray-300 rounded-md"  required>
            </div>

            <div class="mb-4">
                <label for="module_date" class="block mb-2">Sélectionnez la date du module :</label>
                <input type="date" id="module_date" name="module_date" class="w-full p-2 border border-gray-300 rounded-md" value="{{ now()->toDateString() }}" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md">Générer l'URL</button>
        </form>

        @if(session('url'))
            <div class="mt-4">
                <p class="text-green-500">URL générée : <a href="{{ session('url') }}" target="_blank">{{ session('url') }}</a></p>
            </div>
        @endif
    </div>
</body>

</html>
