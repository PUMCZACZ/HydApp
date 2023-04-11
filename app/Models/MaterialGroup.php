<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MaterialGroup extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function materials(): BelongsToMany
    {
        return $this->belongsToMany(Material::class)->withPivot(['quantity']);
    }

    public function materialToGroups(): BelongsToMany
    {
        return $this->belongsToMany(MaterialToGroup::class);
    }
}
