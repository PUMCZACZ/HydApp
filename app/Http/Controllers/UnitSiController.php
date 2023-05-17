<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnitSiRequest;
use App\Models\UnitSi;

class UnitSiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('unit-si.index',[
            'units' => UnitSi::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('unit-si.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UnitSiRequest $request)
    {
        UnitSi::create($request->validated());

        return redirect(route('unit-sis.index'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UnitSi $unitSi)
    {
        return view('unit-si.edit',[
            'unit' => $unitSi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UnitSi $unitSi, UnitSiRequest $request)
    {
        $unitSi->update($request->validated());

        return redirect(route('unit-sis.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnitSi $unitSi)
    {
        $unitSi->delete();

        return redirect(route('unit-sis.index'));
    }
}
