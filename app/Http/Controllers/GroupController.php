<?php
namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Models\Group;

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
        return view('group.edit', [
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
}
