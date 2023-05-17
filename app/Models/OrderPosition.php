<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Znck\Eloquent\Relations\BelongsToThrough;

/**
 * @property int id
 * @property int order_id
 * @property int material_id
 * @property int quantity
 * @property float unit_price
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class OrderPosition extends Model
{
    use \Znck\Eloquent\Traits\BelongsToThrough;

    protected $guarded = [];

    protected $table = 'material_material_group_order';

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }

    public function unitSi(): BelongsToThrough
    {
        return $this->belongsToThrough(UnitSi::class, Material::class);
    }
}
