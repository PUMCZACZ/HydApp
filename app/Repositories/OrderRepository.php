<?php
namespace App\Repositories;

use App\Models\Material;
use App\Models\Order;
use App\Models\OrderPosition;
use Illuminate\Database\Eloquent\Collection;

class OrderRepository
{
    public function addPosition(Order $order, Material $material, int $quantity = 1): OrderPosition
    {
        $position = $order
            ->positions()
            ->where('material_id', $material->id)
            ->first();

        if ($position !== null) {

            $position->update(['quantity' => $position->quantity + $quantity]);

            return $position;
        }

        return $order->positions()->create([
            'material_id' => $material->id,
            'quantity'    => $quantity,
            'unit_price'  => $material->sale_price,
        ]);
    }

    public function fetchPositions(Order $order): array|Collection
    {
        return Order::query()
            ->where('id', $order->id)
            ->with(['client', 'positions'])
            ->get();
    }

    public function fetchMaterialInfo(OrderPosition $orderPosition): Material
    {
        return Material::query()
            ->where('id', $orderPosition->material_id)
            ->first();
    }
}
