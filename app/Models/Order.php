<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function positions(): HasMany
    {
        return $this->hasMany(OrderPosition::class, 'order_id');
    }
}
