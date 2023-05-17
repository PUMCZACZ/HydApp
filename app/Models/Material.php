<?php
namespace App\Models;

use App\Enums\UnitSiEnum;
use App\Services\MaterialService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int    id
 * @property string material_name
 * @property float purchase_price
 * @property float sale_price
 * @property float margin
 * @property integer unit_si
 */
class Material extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class, 'material_material_group')->withPivot(['quantity', 'unit_si_id']);
    }

    public function materialToGroups(): HasMany
    {
        return $this->hasMany(MaterialToGroup::class);
    }

    public function unitSi(): BelongsTo
    {
        return $this->belongsTo(UnitSi::class, 'id', 'unit_si_id');
    }

    public function positions(): HasOne
    {
        return $this->hasOne(OrderPosition::class,'material_id');
    }

    public function displayMargin(): float
    {
        return $this->margin * 100;
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
