<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Znck\Eloquent\Relations\BelongsToThrough;

/**
 * @property int           id
 * @property int           material_id
 * @property int           material_group_id
 * @property int           quantity
 * @property Carbon        created_at
 * @property Carbon        updated_at
 * @property-read Material $material
 * @property-read Group    $group
 */
class MaterialToGroup extends Model
{
    use \Znck\Eloquent\Traits\BelongsToThrough;

    protected $guarded = [];

    protected $table = 'material_material_group';

    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function unitSi(): BelongsToThrough
    {
        return $this->belongsToThrough(UnitSi::class, Material::class);
    }
}
