<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PHPUnit\Metadata\Group;

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
    protected $guarded = [];

    protected $table = 'material_material_group';

    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'material_group_id', 'id');
    }
}
