<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int id
 * @property int material_id
 * @property int material_group_id
 * @property int quantity
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class MaterialToGroup extends Model
{
    protected $guarded = [];

    protected $table = 'material_material_group';


    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(MaterialGroup::class, 'material_group_id', 'id');
    }

    public function orderGroup(): HasMany
    {
        return $this->hasMany(Order::class);
    }

//    public function orderGroup(): BelongsTo
//    {
//        return $this->belongsTo(OrderMaterialGroup::class, 'material_group_id');
//    }

    public function orderMaterial(): BelongsTo
    {
        return $this->belongsTo(OrderMaterialGroup::class, 'material_id');
    }
}
