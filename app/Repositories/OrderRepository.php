<?php
namespace App\Repositories;

use App\Models\Material;
use App\Models\Order;
use App\Models\OrderPosition;

class OrderRepository
{
    public function addPosition(Order $order, Material $material, int $quantity = 1): OrderPosition
    {
        // jeśli pozycja istnieje - zaktualizuj
        // inaczej - dodaj nową
    }
}
