<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MaterialToGroup extends Model
{
    protected $guarded = [];

    protected $table = 'material_material_group';

    public function materials(): BelongsToMany
    {
        return $this->belongsToMany(Material::class);
    }

    public function materialGroups(): BelongsToMany
    {
        return $this->belongsToMany(MaterialGroup::class);
    }
}
