<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Models\Group;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        return response()->json([
            'message' => 'Les groupes sont récupérés avec succès',
            'groups' => $groups,
        ], 200);
    }

    public function store(StoreGroupRequest $request)
    {
        $group = Group::create($request->validated());
        return response()->json([
            'message' => 'Le groupe a été créé avec succès',
            'group' => $group,
        ], 201);
    }

    public function show(Group $group)
    {
        return response()->json([
            'message' => 'Le groupe a été récupéré avec succès',
            'group' => $group,
        ], 200);
    }

    public function update(UpdateGroupRequest $request, Group $group)
    {
        $group->update($request->validated());
        return response()->json([
            'message' => 'Le groupe a été modifié avec succès',
            'group' => $group,
        ], 200);
    }

    public function destroy(Group $group)
    {
        $group->delete();
        return response()->json([
            'message' => 'Le groupe a été supprimé avec succès',
        ], 204);
    }
}