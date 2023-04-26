<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int id
 * @property int order_id
 * @property int material_group_id
 * @property int material_id
 * @property int quantity
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class OrderPosition extends Model
{
    protected $guarded = [];

    protected $table = 'material_material_group_order';

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
