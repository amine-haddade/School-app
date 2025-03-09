<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use App\Http\Requests\StoreTrainerRequest;
use App\Http\Requests\UpdateTrainerRequest;


class TrainerController extends Controller
{
    public function index()
    {
        $trainers = Trainer::all();

        return response()->json([
            'message' => 'Liste des formateurs récupérée avec succès.',
            'data' => $trainers
        ], 200);
    }

    public function store(StoreTrainerRequest $request)
    {
        $trainer = Trainer::create($request->validated());

        return response()->json([
            'message' => 'Formateur créé avec succès.',
            'data' => $trainer
        ], 201);
    }

    public function show(Trainer $trainer)
    {
        return response()->json([
            'message' => 'Formateur trouvé avec succès.',
            'data' => $trainer
        ], 200);
    }

    public function update(UpdateTrainerRequest $request, Trainer $trainer)
    {
        $trainer->update($request->validated());

        return response()->json([
            'message' => 'Formateur mis à jour avec succès.',
            'data' => $trainer
        ], 200);
    }

    public function destroy(Trainer $trainer)
    {
        $trainer->delete();

        return response()->json([
            'message' => 'Formateur supprimé avec succès.',
            'data' => null
        ], 204);
    }
}
