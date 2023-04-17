<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderMaterialGroup extends Model
{
    protected $guarded = [];

    protected $table = 'material_material_group_order';

    use HasFactory;

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function group(): HasOne
    {
        return $this->hasOne(MaterialToGroup::class, 'material_group_id');
    }

    public function material(): HasOne
    {
        return $this->hasOne(MaterialToGroup::class, 'material_id');
    }
}
