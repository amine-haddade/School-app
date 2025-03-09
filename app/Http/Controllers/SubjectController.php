<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return response()->json([
            'message' => 'Les matières sont récupérées avec succès',
            'subjects' => $subjects,
        ], 200);
    }

    public function store(StoreSubjectRequest $request)
    {
        $subject = Subject::create($request->validated());
        return response()->json([
            'message' => 'La matière a été créée avec succès',
            'subject' => $subject,
        ], 201);
    }

    public function show(Subject $subject)
    {
        return response()->json([
            'message' => 'La matière a été récupérée avec succès',
            'subject' => $subject,
        ], 200);
    }

    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $subject->update($request->validated());
        return response()->json([
            'message' => 'La matière a été modifiée avec succès',
            'subject' => $subject,
        ], 200);
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return response()->json([
            'message' => 'La matière a été supprimée avec succès',
        ], 204);
    }
}