<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * @property int id
 * @property string order_name
 * @property int client_id
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Order extends Model
{
    protected $guarded = [];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function orderMaterialGroup(): HasMany
    {
        return $this->hasMany(OrderMaterialGroup::class, 'order_id');
    }

    public function materialGroup(): BelongsTo
    {
        return $this->belongsTo(MaterialToGroup::class, 'material_group_id');
    }

    public function materials(): HasManyThrough
    {
        return $this->hasManyThrough(Material::class, OrderMaterialGroup::class);
    }
}
