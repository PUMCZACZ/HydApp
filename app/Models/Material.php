<?php
namespace App\Models;

use App\Enums\UnitSiEnum;
use App\Services\MaterialService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int    id
 * @property string material_name
 * @property float purchase_price
 * @property float sale_price
 * @property float margin
 * @property UnitSiEnum unit_si
 */
class Material extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = ['unit_si' => UnitSiEnum::class];

    public function materialGroups(): BelongsToMany
    {
        return $this->belongsToMany(MaterialGroup::class, 'material_material_group')->withPivot('quantity');
    }

    public function materialToGroups(): HasMany
    {
        return $this->hasMany(MaterialToGroup::class);
    }

    public function recalculatePrices(): void
    {
        /** @var MaterialService $materialService */
        $materialService = app(MaterialService::class);

        $this->update([
            'sale_price' => $materialService->getMaterialCost($this),
        ]);
    }
}
