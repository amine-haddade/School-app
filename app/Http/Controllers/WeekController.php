<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreWeekRequest;
use App\Http\Requests\UpdateWeekRequest;
use App\Models\Week;

class WeekController extends Controller
{
    public function index()
    {
        $weeks = Week::with('schoolYear')->get();
        return response()->json([
            'message' => 'Les semaines sont récupérées avec succès',
            'weeks' => $weeks,
        ], 200);
    }

    public function store(StoreWeekRequest $request)
    {
        $week = Week::create($request->validated());
        return response()->json([
            'message' => 'La semaine a été créée avec succès',
            'week' => $week,
        ], 201);
    }

    public function show(Week $week)
    {
        return response()->json([
            'message' => 'La semaine a été récupérée avec succès',
            'week' => $week,
        ], 200);
    }

    public function update(UpdateWeekRequest $request, Week $week)
    {
        $week->update($request->validated());
        return response()->json([
            'message' => 'La semaine a été modifiée avec succès',
            'week' => $week,
        ], 200);
    }

    public function destroy(Week $week)
    {
        $week->delete();
        return response()->json([
            'message' => 'La semaine a été supprimée avec succès',
        ], 204);
    }
}