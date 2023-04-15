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
    <title>Grupa Materiałów | Dodaj Materiał</title>
</head>
<body>
<x-app-layout>
    @csrf
    <div class="w-full max-w-xs">
        <form method="POST"
              action="{{ route('material-groups.materials.update', [$materialGroup->id ,$material->id]) }}"
              class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
        >
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-lg font-bold mb-2" for="name">
                    Nazwa Grupy Materiałów: {{ $materialGroup->group_name }}
                </label>
                <input type="hidden" name="material_group_id" id="material_group_id" value="{{ $materials[0]->material_group_id }}">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="material_id">
                    Materiał
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="material_name" name="material_name" type="text" disabled value="{{  $material->material_name }}">
                <input type="hidden" name="material_id" id="material_id" value="{{ $materials[0]->material_id }}">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="quantity">
                    Ilość Materiału
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="quantity" name="quantity" type="number" value="{{ old('quantity', $materials[0]->quantity ) }}">
            </div>
            <div class="flex items-center justify-between">
                <button>Zaktualizuj</button>
            </div>
        </form>
        @dd($materials)
    </div>
</x-app-layout>
</body>
</html>

