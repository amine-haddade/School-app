<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreFieldRequest;
use App\Http\Requests\UpdateFieldRequest;
use App\Models\Field;

class FieldController extends Controller
{
    public function index()
    {
        $fields = Field::all(); // 10 éléments par page
        return response()->json([
            'message' => 'Les filières sont récupérées avec succès',
            'fields' => $fields,
        ], 200);
    }

    public function store(StoreFieldRequest $request)
    {
        $field = Field::create($request->validated());
        return response()->json([
            'message' => 'La filière a été créée avec succès',
            'field' => $field,
        ], 201);
    }

    public function show(Field $field)
    {
        return response()->json([
            'message' => 'La filière a été récupérée avec succès',
            'field' => $field,
        ], 200);
    }

    public function update(UpdateFieldRequest $request, Field $field)
    {
        $field->update($request->validated());
        return response()->json([
            'message' => 'La filière a été modifiée avec succès',
            'field' => $field,
        ], 200);
    }

    public function destroy(Field $field)
    {
        $field->delete();
        return response()->json([
            'message' => 'La filière a été supprimée avec succès',
        ], 204);
    }
}