<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zamówienia</title>
</head>
<body>
<x-app-layout>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 mt-4">
            <tr>
                <th scope="col" class="px-6 py-3">Lp</th>
                <th scope="col" class="px-6 py-3">Zamówienie</th>
                <th scope="col" class="px-6 py-3">Klient</th>
                <th scope="col" class="px-6 py-3"> <a href="{{ route('orders.create') }}">Dodaj Zamówienie></a></th>
            </tr>
            </thead>

            <tbody>
            @foreach($orders as $order)
                <tr class="bg-white border-b dark:bg-gray-800">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $order->order_name }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $order->client->name }}</td>
                    <td><a href="{{ route('orders.edit', $order->id) }}">Edytuj</a></td>
                    <td>
                        <form method="POST"
                              action="{{ route('orders.destroy', $order->id) }}">
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
