<?php
namespace App\Services;

use App\Models\Material;

class MaterialService
{
    public function getMaterialCost(Material $material): float
    {
        $price = $material->purchase_price;
        $margin = $material->purchase_price * $material->margin;

        return $price + $margin;
    }
}
