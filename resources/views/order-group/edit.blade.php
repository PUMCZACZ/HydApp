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
    <title>Materiał Zamówienie | Edycja</title>
</head>
<body>
<x-app-layout>
    @csrf
    <div class="w-full max-w-xs">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
              action="{{ route('orders.groups.update', [$order->id ,$position->id]) }}"
              method="POST">
            @csrf

            <div class="mb-4">
                <label for="material_name">Nazwa Materiału</label>
                <p id="material_name">{{ $material->material_name }}</p>
            </div>

            <div class="mb-4">
                <label for="material_name">Kod Materiału</label>
                <p id="material_name">{{ $material->material_code }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="quantity">
                    Ilość
                </label>
                <input
                    class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    id="quantity" name="quantity" type="number" value="{{ $position->quantity }}">
                <div>
                    @error('quantity')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="unit_price">
                    Cena sprzedaży za sztukę
                </label>
                <input
                    class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    id="unit_price" name="unit_price" type="number" value="{{ $position->unit_price }}">
                <div>
                    @error('unit_price')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-between">
                <button>Zaktualizuj</button>
            </div>
        </form>
    </div>
</x-app-layout>
</body>
</html>
