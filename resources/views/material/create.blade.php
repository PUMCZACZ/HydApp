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
            <section class="mb-4">
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

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="purchase_price">
                    Cena Zakupu
                </label>
                <input
                    class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    id="purchase_price" name="purchase_price" type="number" step="0.01" min="0" value="{{ old('purchase_price') }}">
                <div>
                    @error('purchase_price')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="margin">
                    Marża
                </label>
                <input
                    class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    id="margin" name="margin" type="number" value="{{ old('margin') }}">
                <div>
                    @error('margin')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="purchase_price">
                    Kod Materiału
                </label>
                <input
                    class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    id="material_code" name="material_code" type="text" value="{{ old('material_code') }}">
                <div>
                    @error('material_code')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="purchase_price">
                    Jednostka
                </label>

                <select name="unit_si_id"
                        class="mb-4"
                >
                @foreach($units as $unit)
                    <option value="{{ $unit->id }}">
                        {{ $unit->unit_si_name }}
                    </option>
                @endforeach
                </select>
                <div>
                    @error('unit_si_id')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex items-center justify-between mt-2">
                <button>Utwórz</button>
            </div>
        </form>
    </div>
</x-app-layout>
</body>
</html>

