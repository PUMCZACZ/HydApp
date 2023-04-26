<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int id
 * @property string name
 * @property string lastname
 * @property string phone_number
 * @property string email
 * @property string city
 * @property string street
 * @property string post_code
 */
class Client extends Model
{
    protected $guarded = [];

    use HasFactory;

    public function order(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
