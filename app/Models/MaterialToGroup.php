<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        return $this->belongsTo(MaterialGroup::class);
    }
}
