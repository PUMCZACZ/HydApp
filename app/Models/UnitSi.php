<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int id
 * @property string unit_si_name
 */

class UnitSi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function materials(): HasMany
    {
        return $this->hasMany(Material::class);
    }
}
