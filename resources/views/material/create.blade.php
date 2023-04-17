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
    <title>Materiał | Utwórz</title>
</head>
<body>
<x-app-layout>
    @csrf
    <div class="w-full max-w-xs">
        <form method="POST"
              action="{{ route('materials.store') }}"
              class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
        >
            @csrf
            <section>
                <select name="group_id">
                    <option value="" selected>
                        Brak Grupy
                    </option>
                    @foreach($groups as $group)
                        <option value="{{ $group->id }}">
                            {{ $group->group_name }}
                        </option>
                    @endforeach
                </select>
            </section>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Nazwa Materiału
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="material_name" name="material_name" type="text" value="{{ old('material_name') }}">
                <div>
                    @error('material_name')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="material_type">
                    Typ Materiału
                </label>
                <input
                    class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    id="material_type" name="material_type" type="text" value="{{ old('material_type') }}">
                <div>
                    @error('material_type')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-between">
                <button>Utwórz</button>
            </div>
        </form>
    </div>
</x-app-layout>
</body>
</html>

