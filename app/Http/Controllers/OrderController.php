<?php
namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Client;
use App\Models\Group;
use App\Models\Material;
use App\Models\MaterialToGroup;
use App\Models\Order;
use App\Models\OrderPosition;
use App\Repositories\OrderRepository;

class OrderController extends Controller
{
    public function index(Order $order)
    {
        return view('order.index', [
            'orders' => Order::with('client')->get(),
        ]);
    }

    public function create()
    {
        return view('order.create', [
            'clients'        => Client::select(['id', 'name', 'lastname'])->get(),
            'materialGroups' => MaterialToGroup::with(['material', 'group'])->get(),
            'groups'         => Group::all(),
        ]);
    }

    public function store(OrderRequest $request)
    {
        Order::create($request->validated());

        return redirect(route('order.index'));
    }

    public function edit(Order $order, OrderRepository $repository)
    {
        return view('order.edit', [
            'order'  => $order,
            'positions' => $repository->fetchPositions($order),
            'materials' => Material::all(),
            'clients' => Client::all(),
        ]);
    }

    public function update(OrderRequest $request)
    {
        var_dump($request->collect());
    }

    public function destroy()
    {

    }
}
