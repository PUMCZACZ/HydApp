<?php
namespace App\Http\Controllers;

use App\Http\Requests\MaterialRequest;
use App\Models\Material;
use App\Models\MaterialGroup;

class MaterialController extends Controller
{
    public function index()
    {
        return view('material.index', [
            'materials' => Material::all(),
        ]);
    }

    public function create()
    {
        $groups = MaterialGroup::query()->orderBy('group_name', 'asc')->get();

        return view('material.create', [
            'groups' => $groups,
        ]);
    }

    public function store(MaterialRequest $request)
    {
        /**
         * @var Material $material
         */
        $material = Material::create($request->toData());
        if ($request->group() !== null) {
            $material->materialGroups()->attach($request->input('group_id'));
        }
        $material->recalculatePrices();

        return redirect(route('materials.index'));
    }

    public function edit(Material $material)
    {
        return view('material.edit', [
            'material' => $material,
        ]);
    }

    public function update(Material $material, MaterialRequest $request)
    {
        $material->update($request->toData());
        $material->recalculatePrices();

        return redirect(route('materials.index'));
    }

    public function destroy(Material $material)
    {
        $material->delete();

        return redirect(route('materials.index'));
    }
}
