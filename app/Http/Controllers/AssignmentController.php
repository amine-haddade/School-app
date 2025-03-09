<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreAssignmentRequest;
use App\Http\Requests\UpdateAssignmentRequest;
use App\Models\Assignment;

class AssignmentController extends Controller
{
    public function index()
    {
        $assignments = Assignment::all();
        return response()->json([
            'message' => 'Les affectations sont récupérées avec succès',
            'assignments' => $assignments,
        ], 200);
    }

    public function store(StoreAssignmentRequest $request)
    {
        $assignment = Assignment::create($request->validated());
        return response()->json([
            'message' => 'L\'affectation a été créée avec succès',
            'assignment' => $assignment,
        ], 201);
    }

    public function show(Assignment $assignment)
    {
        return response()->json([
            'message' => 'L\'affectation a été récupérée avec succès',
            'assignment' => $assignment,
        ], 200);
    }

    public function update(UpdateAssignmentRequest $request, Assignment $assignment)
    {
        $assignment->update($request->validated());
        return response()->json([
            'message' => 'L\'affectation a été modifiée avec succès',
            'assignment' => $assignment,
        ], 200);
    }

    public function destroy(Assignment $assignment)
    {
        $assignment->delete();
        return response()->json([
            'message' => 'L\'affectation a été supprimée avec succès',
        ], 204);
    }
}