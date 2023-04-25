<?php
namespace App\Http\Controllers;

use App\Http\Requests\OrderAddGroupRequest;
use App\Http\Requests\OrderRequest;
use App\Models\Client;
use App\Models\Material;
use App\Models\MaterialGroup;
use App\Models\MaterialToGroup;
use App\Models\Order;
use App\Models\OrderMaterialGroup;

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
            'groups'         => MaterialGroup::all(),
        ]);
    }

    public function store(OrderRequest $request)
    {
        Order::create([
            'client_id'  => $request->input('client_id'),
            'order_name' => $request->input('order_name'),
        ]);

        $materialGroup = MaterialToGroup::query()
            ->select('material_id', 'quantity')
            ->where('material_group_id', $request->input('material_group_id'))
            ->get();

        $order = Order::query()
            ->select('id')
            ->orderBy('id', 'desc')
            ->limit(1)
            ->get();

        foreach ($materialGroup as $material) {
            OrderMaterialGroup::create([
                'order_id'          => $order[0]->id,
                'material_id'       => $material->material_id,
                'quantity'          => $material->quantity,
                'material_group_id' => $request->input('material_group_id'),
            ]);
        }

        return redirect(route('order.index'));
    }

    public function edit(Order $order)
    {
        return view('order.edit', [
            'order'  => $order,
            'orders' => Order::query()
                ->where('id', $order->id)
                ->with(['client', 'orderMaterialGroup', 'materialGroup'])
                ->get(),
            'materials' => Material::all(),
        ]);
    }

    public function update(OrderRequest $request)
    {
       var_dump($request->collect());
    }

    public function destroy()
    {

    }

    public function createGroup(Order $order)
    {
        return view('order.addGroup', [
            'order'          => $order,
            'materialGroups' => MaterialGroup::all(),
        ]);
    }

    public function storeGroup(OrderAddGroupRequest $request, Order $order)
    {
        $materialGroup = MaterialToGroup::query()
            ->where('material_group_id', $request->input('material_group_id'))
            ->get();

        foreach ($materialGroup as $material) {
            OrderMaterialGroup::create([
                'order_id'          => $order->id,
                'material_group_id' => $material->material_group_id,
                'material_id'       => $material->material_id,
                'quantity'          => $material->quantity,
            ]);
        }

        return redirect(route('orders.edit', $order->id));
    }
}
