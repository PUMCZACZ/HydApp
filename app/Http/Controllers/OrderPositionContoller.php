<?php
namespace App\Http\Controllers;

use App\Http\Requests\OrderAddGroupRequest;
use App\Http\Requests\OrderPositionRequest;
use App\Models\Group;
use App\Models\MaterialToGroup;
use App\Models\Order;
use App\Models\OrderPosition;
use App\Repositories\OrderRepository;

class OrderPositionContoller extends Controller
{
    public function create(Order $order)
    {
        return view('order-group.create', [
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
        foreach ($materialGroups as $materialGroup)
        {
            $repository->addPosition($order, $materialGroup->material, $materialGroup->quantity);
        }

        return redirect(route('orders.edit', $order->id));
    }

    public function edit(Order $order, OrderPosition $orderPosition, OrderRepository $repository)
    {
        return view('order-group.edit',[
            'order' => $order,
            'position' => $orderPosition,
            'material' => $repository->fetchMaterialInfo($orderPosition),
        ]);
    }

    public function update(Order $order, OrderPosition $orderPosition, OrderPositionRequest $request)
    {
        $orderPosition->update($request->validated());

        return redirect(route('orders.edit', $order->id));
    }

    public function destroy(Order $order, OrderPosition $orderPosition)
    {
        $orderPosition->delete();

        return redirect(route('orders.edit', $order->id));
    }
}
