<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int    id
 * @property string name
 * @property string material_type
 */
class Material extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function materialGroups(): BelongsToMany
    {
        return $this->belongsToMany(MaterialGroup::class, 'material_material_group');
    }

    public function materialToGroups(): HasMany
    {
        return $this->hasMany(MaterialToGroup::class);
    }
}
