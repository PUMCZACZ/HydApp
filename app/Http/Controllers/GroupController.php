<?php
namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Http\Requests\MaterialToGroupRequest;
use App\Models\Material;
use App\Models\Group;
use App\Models\MaterialToGroup;
use App\Repositories\MaterialsInGroupsRepository;

class GroupController extends Controller
{
    public function index()
    {
        return view('group.index', [
            'groups' => Group::all(),
        ]);
    }

    public function create()
    {
        return view('group.create');
    }

    public function store(GroupRequest $request)
    {
        Group::create($request->validated());

        return redirect(route('groups.index'));
    }

    public function edit(Group $group)
    {
        return view('group.edit',[
            'group' => $group,
        ]);
    }

    public function update(Group $group, GroupRequest $request)
    {
        $group->update($request->validated());

        return redirect(route('groups.index'));
    }

    public function destroy(Group $group)
    {
        $group->delete();

        return redirect(route('groups.index'));
    }

    public function show(Group $group)
    {
        return view('group.show', [
            'groups' => $group,
        ]);
    }

    public function createMaterialToGroup(Group $materialGroup)
    {
        return view('group.create-group', [
            'materials'     => Material::all(),
            'materialGroup' => $materialGroup,
        ]);
    }

    public function storeMaterialToGroup(MaterialToGroupRequest $request)
    {
        MaterialToGroup::create($request->toData());

        return redirect(route('material-groups.show', $request->input('material_group_id')));
    }

    public function editMaterialToGroup(Group $materialGroup, Material $material, MaterialsInGroupsRepository $repository)
    {
        // TODO - wykorzystać repozytorium
        $materialToGroup = MaterialToGroup::query()
            ->where('material_id', $material->id)
            ->with(['material'])
            ->first();

        return view('group.edit-group', compact('materialGroup', 'material', 'materialToGroup'));
    }

    public function updateMaterialToGroup(Group $group, Material $material, MaterialToGroupRequest $request)
    {
        MaterialToGroup::query()
            ->where('id', $request->input('id'))
            ->update($request->validated());
    }
}
