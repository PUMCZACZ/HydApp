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
    <title>Zamówienie | Edycja</title>
</head>
<body>
<x-app-layout>
    @csrf
    <div class="w-full max-w-xs">
        <form method="POST"
              {{--              action="{{ route('orders.update', $order->id)}}"--}}
              class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
        >
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="client_name ">
                    Klient
                </label>
                <select>
                    <option value="{{ $order->client->id }}">{{ $order->client->name . " " . $order->client->lastname }}</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="material_group_id">Nazwa
                    Zamówienia
                </label>
                <input name="order_name" id="order_name" type="text"
                       value="{{ old('order_name', $order->order_name) }}">
            </div>
            <div class="flex items-center mt-4">
                <button>Zaktualizuj Dane Zamówienia</button>
            </div>
        </form>

        <div class="grid grid-cols-3 mb-6 ">
            <button><a href="{{ route('orders.groups.create', $order->id) }}"> Dodaj Grupę Do Zamówienia </a></button>
        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 mt-4">
                <tr>
                    <th class="px-6 py-3">Nazwa Materiału</th>
                    <th class="px-6 py-3">Ilość Materiału</th>
                    <th class="px-6 py-3">Grupa Materiałowa</th>
                </tr>
                </thead>
                <tbody>
                @foreach($positions as $position)
                    @foreach($position->positions as $group)
                        <tr class="bg-white border-b dark:bg-gray-800">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                @foreach($materials as $material)
                                    @if($group->material_id === $material->id)
                                        {{ $material->material_name }}
                                    @endif
                                @endforeach
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                @foreach($materials as $material)
                                    @if($group->material_id === $material->id)
                                        {{ $group->quantity . " " . $material->unit_si->translate()}}
                                    @endif
                                @endforeach
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Pompa Ciepła</td>
                            <td><a href="{{ route('orders.groups.edit', [$order->id, $group->id]) }}">Edytuj</a></td>
                            <td>
                                <form method="POST"
                                      action="{{ route('orders.groups.destroy', [$order->id, $group->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Usuń</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @dd($material)
</x-app-layout>
</body>
</html>

