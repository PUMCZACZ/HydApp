<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MaterialGroup extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function materials(): BelongsToMany
    {
        return $this->belongsToMany(Material::class);
    }

    public function materialToGroups(): HasMany
    {
        return $this->hasMany(MaterialToGroup::class);
    }
}
