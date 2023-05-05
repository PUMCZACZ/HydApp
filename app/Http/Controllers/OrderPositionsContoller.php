<?php
namespace App\Http\Controllers;

use App\Http\Requests\OrderAddGroupRequest;
use App\Models\Group;
use App\Models\MaterialToGroup;
use App\Models\Order;
use App\Repositories\OrderRepository;

class OrderPositionsContoller extends Controller
{
    public function create(Order $order)
    {
        return view('order.addGroup', [
            'order'          => $order,
            'materialGroups' => Group::all(),
        ]);
    }

    public function store(Order $order, OrderAddGroupRequest $request, OrderRepository $repository)
    {
        $materialGroups = MaterialToGroup::query()
            ->where('material_group_id', $request->input('material_group_id'))
            ->get();

        /** @var MaterialToGroup $materialGroup */
        foreach ($materialGroups as $materialGroup) {
            $repository->addPosition($order, $materialGroup->material, $materialGroup->quantity);
        }

        return redirect(route('orders.edit', $order->id));
    }
}
