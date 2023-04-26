<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderAddGroupRequest;
use App\Models\MaterialGroup;
use App\Models\MaterialToGroup;
use App\Models\Order;
use App\Models\OrderMaterialGroup;

class OrderGroupContoller extends Controller
{

    public function create(Order $order)
    {
        return view('order.addGroup', [
            'order'          => $order,
            'materialGroups' => MaterialGroup::all(),
        ]);
    }
    public function store(Order $order, OrderAddGroupRequest $request )
    {
        $materialGroup = MaterialToGroup::query()
            ->where('material_group_id', $request->input('material_group_id'))
            ->get();

        foreach ($materialGroup as $material) {
            OrderMaterialGroup::create([
                'order_id' => $order->id,
                'material_group_id' => $material->material_group_id,
                'material_id' => $material->material_id,
                'quantity' => $material->quantity,
            ]);
        }

        return redirect(route('orders.edit', $order->id));
    }
}
