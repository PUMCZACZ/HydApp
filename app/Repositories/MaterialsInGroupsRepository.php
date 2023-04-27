<?php
namespace App\Repositories;

use App\Models\Material;
use App\Models\Group;
use App\Models\MaterialToGroup;

class MaterialsInGroupsRepository
{
    public function find(Material $material, Group $group): MaterialToGroup
    {
        return MaterialToGroup::query()
            ->where('material_id', $material->id)
            ->where('material_group_id', $group->id)
            ->first();
    }
}
