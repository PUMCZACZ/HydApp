<?php

namespace App\Services;

use App\Http\Requests\OrderRequest;
use App\Models\MaterialToGroup;
use App\Models\Order;
use App\Models\OrderMaterialGroup;

class OrderService
{
    public function assignMaterialsToOrder(OrderRequest $request)
    {
        Order::create([
            'order_name' => $request->input('order_name'),
            'client_id' => $request->input('client_id'),
        ]);

        $materialGroup = MaterialToGroup::query()
            ->select('material_id')
            ->where('material_group_id', $request->input('material_group_id'))
            ->get();

        foreach (explode(',', $materialGroup) as $material)
        {
            OrderMaterialGroup::create([
                'order_id' => fds,
                'client_id' => $request->input('client_id'),
                'material_id' => $material
            ]);
        }

    }
}
