<?php
namespace App\Repositories;

use App\Models\Material;
use App\Models\Order;
use App\Models\OrderPosition;

class OrderRepository
{
    public function addPosition(Order $order, Material $material, int $quantity = 1): OrderPosition
    {
        $position = $order
            ->positions()
            ->where('material_id', $material->id)
            ->first();

        if ($position !== null)
        {
//            $position->quantity += $quantity;
//            $position->save();

            $position->update(['quantity' => $position->quantity + $quantity]);

            return $position;
        }

        return $order->positions()->create([
            'material_id' => $material->id,
            'quantity' => $quantity,
            'unit_price' => $material->sale_price,
        ]);

//        return OrderPosition::create([
//            'material_id' => $material->id,
//            'quantity' => $quantity,
//            'order_id' => $order->id,
//        ]);
    }
}
