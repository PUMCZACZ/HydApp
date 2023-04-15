<?php
namespace App\Http\Controllers;

use App\Http\Requests\MaterialGroupRequest;
use App\Http\Requests\MaterialToGroupRequest;
use App\Models\Material;
use App\Models\MaterialGroup;
use App\Models\MaterialToGroup;

class MaterialGroupController extends Controller
{
    public function index()
    {
        return view('material-group.index', [
            'materialGroups' => MaterialGroup::all(),
        ]);
    }

    public function create()
    {
        return view('material-group.create');
    }

    public function store(MaterialGroupRequest $request)
    {
        MaterialGroup::create($request->toData());

        return redirect(route('material-groups.index'));
    }

    public function edit(MaterialGroup $materialGroup)
    {
        return view('client.edit', [
            'materialGroup' => $materialGroup,
        ]);
    }

    public function update(MaterialGroup $materialGroup, MaterialGroupRequest $request)
    {
        $materialGroup->update($request->toData());

        return redirect(route('material-groups.index'));
    }

    public function destroy(MaterialGroup $materialGroup)
    {
        $materialGroup->delete();

        return redirect(route('material-groups.index'));
    }

    public function show(MaterialGroup $materialGroup)
    {
        return view('material-group.show', [
            'materialGroups' => $materialGroup,
        ]);
    }

    public function createMaterialToGroup(MaterialGroup $materialGroup)
    {
        return view('material-group.create-group', [
            'materials' => Material::all(),
            'materialGroup'     => $materialGroup,
        ]);
    }

    public function storeMaterialToGroup(MaterialToGroupRequest $request)
    {
        MaterialToGroup::create($request->toData());

        return redirect(route('material-groups.show', $request->input('material_group_id')));
    }

    public function editMaterialToGroup(MaterialGroup $materialGroup, Material $material)
    {
        $materials = MaterialToGroup::query()
            ->where('material_id', $material->id)
            ->with(['material', 'group'])
            ->get();

        return view('material-group.edit-group', compact('materialGroup', 'material', 'materials'));
    }

    public function updateMaterialToGroup(MaterialToGroup $materialToGroup, MaterialToGroupRequest $request)
    {
        $materialToGroup->update($request->toData());

        var_dump($request->all());
        var_dump($materialToGroup->update($request->toData()));
//        return redirect(route('material-groups.show', $request->input('material_group_id')));
    }
}
