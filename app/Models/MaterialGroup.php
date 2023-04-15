<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int id
 * @property string group_name
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class MaterialGroup extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function materials(): BelongsToMany
    {
        return $this->belongsToMany(Material::class, 'material_material_group')->withPivot('quantity');
    }

    public function materialToGroups(): HasMany
    {
        return $this->hasMany(MaterialToGroup::class);
    }
}
