<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prace</title>
</head>
<body>
<x-app-layout>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 mt-4">
            <tr>
                <th scope="col" class="px-6 py-3">Lp</th>
                <th scope="col" class="px-6 py-3">Usługa</th>
                <th scope="col" class="px-6 py-3">Zakres Prac</th>
                <th scope="col" class="px-6 py-3">Stawka</th>
                <th scope="col" class="px-6 py-3">J.M</th>
                <th scope="col" class="px-6 py-3">Ilość</th>
                <th scope="col" class="px-6 py-3">Cena</th>
                <th scope="col" class="px-6 py-3"> <a href="{{ route('works.create') }}">Dodaj Czynności</a></th>
            </tr>
            </thead>
            <tbody>
            @foreach($works as $work)
                <tr class="bg-white border-b">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $work->service_name }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $work->stake }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $work->unit_si }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $work->quantity }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $work->price }}</td>
                    <td><a href="{{ route('works.edit', $works->id) }}">Edytuj</a></td>
                    <td>
                        <form method="POST"
                              action="{{ route('works.destroy', $works->id) }}">
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
