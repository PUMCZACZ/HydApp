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
              action="{{ route('material-groups.storeMaterialToGroup') }}"
              class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
        >
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-lg font-bold mb-2" for="name">
                    Nazwa Grupy Materiałów: {{ $group->group_name }}
                </label>
            </div>

            <input type="hidden" value="{{ $group->id }}" id="material_group_id" name="material_group_id">

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Materiał
                </label>
                    <select name="material_id"
                            id="material_id"
                    >
                    @foreach($materials as $material)
                        <option value="{{ $material->id }}" {{ old('material_id') === $material->id ? 'selected' : '' }}>
                            {{ $material->material_name }}
                        </option>
                    @endforeach
                    </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Ilość Materiału
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="quantity" name="quantity" type="text" value="{{ old('quantity') }}">
            </div>
            <div class="flex items-center justify-between">
                <button>Dodaj Do Grupy</button>
            </div>
        </form>
    </div>
</x-app-layout>
</body>
</html>

