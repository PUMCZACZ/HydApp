<?php
namespace App\Http\Controllers;

use App\Http\Requests\MaterialToGroupRequest;
use App\Models\Group;
use App\Models\Material;
use App\Models\MaterialToGroup;
use App\Repositories\MaterialsInGroupsRepository;

class MaterialToGroupController extends Controller
{
    public function index(Group $group, MaterialsInGroupsRepository $repository)
    {
        return view('material-to-group.index', [
            'group'     => $group,
            'materials' => $repository->findMaterialsInGroup($group),
        ]);
    }

    public function create(Group $group)
    {
        return view('material-to-group.create', [
            'group'     => $group,
            'materials' => Material::all(),
        ]);
    }

    public function store(MaterialToGroupRequest $request)
    {
        MaterialToGroup::create($request->validated());

        return redirect(route('groups.materials.index', $request->input('material_group_id')));
    }

    public function edit(Group $group, MaterialToGroup $materialToGroup, MaterialsInGroupsRepository $repository)
    {
        return view('material-to-group.edit', [
            'group'    => $group,
            'material' => $repository->findMaterialToEdit($materialToGroup),
        ]);

    }

    public function update(Group $group, MaterialToGroup $materialToGroup, MaterialToGroupRequest $request)
    {
        $materialToGroup->update($request->validated());

        return redirect(route('groups.materials.index', $group->id));
    }

    public function destroy(Group $group, MaterialToGroup $materialToGroup)
    {
        $materialToGroup->delete();

        return redirect(route('groups.materials.index', $group->id));
    }
}
