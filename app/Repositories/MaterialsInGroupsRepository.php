<?php
namespace App\Repositories;

use App\Models\Group;
use App\Models\MaterialToGroup;
use Illuminate\Database\Eloquent\Collection;

class MaterialsInGroupsRepository
{
    public function findMaterialsInGroup(Group $group): array|Collection
    {
        return MaterialToGroup::query()
            ->where('material_group_id', $group->id)
            ->with(['material', 'unitSi'])
            ->get();
    }

    public function findMaterialToEdit(MaterialToGroup $materialToGroup)
    {
        return MaterialToGroup::query()
            ->where('id', $materialToGroup->id)
            ->with('material')
            ->first();
    }
}
