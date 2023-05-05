<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"
          href="https://horizon-tailwind-react-git-tailwind-components-horizon-ui.vercel.app/static/css/main.ad49aa9b.css"/>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0"/>
    <title>Grupa | Edycja</title>
</head>
<body>
<x-app-layout>
    @csrf
    <div class="w-full max-w-xs">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
              action="{{ route('groups.update', $group->id) }}"
              method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Nazwa Grupy
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="group_name" name="group_name" type="text" value="{{ old('group_name', $group->group_name) }}">
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray" for="description">
                    Opis Grupy
                </label>
                <textarea id="description" name="description"
                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                >{{ old('description', $group->description) }}
                </textarea>
            </div>

            <div class="flex items-center justify-between">
                <button>Zaktualizuj</button>
            </div>
        </form>
    </div>
</x-app-layout>
</body>
</html>
