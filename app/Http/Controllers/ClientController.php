<?php
namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        return view('client.index', [
            'clients' => Client::all(),
        ]);
    }

    public function create()
    {
        return view('client.create');
    }

    public function store(ClientRequest $request)
    {
        Client::create($request->validated());

        return redirect(route('clients.index'));
    }

    public function edit(Client $client)
    {
        return view('client.edit', [
            'client' => $client,
        ]);
    }

    public function update(Client $client, ClientRequest $request)
    {
        $client->update($request->validated());

        return redirect(route('clients.index'));
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect(route('clients.index'));
    }
}
