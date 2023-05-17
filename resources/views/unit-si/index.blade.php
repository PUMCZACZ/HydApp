<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jednostki</title>
</head>
<body>
<x-app-layout>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 mt-4">
            <tr>
                <th scope="col" class="px-6 py-3">Lp</th>
                <th scope="col" class="px-6 py-3">Jednostka</th>
                <th scope="col" class="px-6 py-3">Skrót</th>
                <th scope="col" class="px-6 py-3"> <a href="{{ route('unit-sis.create') }}">Dodaj Jednostkę</a></th>
            </tr>
            </thead>
            <tbody>
            @foreach($units as $unit)
                <tr class="bg-white border-b">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $unit->unit_si_name }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $unit->unit_si_short_name }}</td>
                    <td><a href="{{ route('unit-sis.edit', $unit->id) }}">Edytuj</a></td>
                    <td>
                        <form method="POST"
                              action="{{ route('unit-sis.destroy', $unit->id) }}">
                            @csrf
                            @method('DELETE')
                            <button>Usuń</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
</body>
</html>
