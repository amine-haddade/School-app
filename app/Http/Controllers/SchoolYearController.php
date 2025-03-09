<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreSchoolYearRequest;
use App\Http\Requests\UpdateSchoolYearRequest;
use App\Models\SchoolYear;

class SchoolYearController extends Controller
{
    public function index()
    {
        $schoolYears = SchoolYear::with('week')->get();
        return response()->json([
            'message' => 'Les années scolaires sont récupérées avec succès',
            'schoolYears' => $schoolYears,
        ], 200);
    }

    public function store(StoreSchoolYearRequest $request)
    {
        $schoolYear = SchoolYear::create($request->validated());
        return response()->json([
            'message' => 'L\'année scolaire a été créée avec succès',
            'schoolYear' => $schoolYear,
        ], 201);
    }

    public function show($id)
    {
        $schoolYear = SchoolYear::find($id);
        if (!$schoolYear) {
            return response()->json(['message' => 'Année scolaire introuvable'], 404);
        }

        return response()->json([
            'message' => 'L\'année scolaire a été récupérée avec succès',
            'schoolYear' => $schoolYear,
        ], 200);
    }

   

    public function update(UpdateSchoolYearRequest $request, $id)
    {
        $schoolYear = SchoolYear::find($id);
        
        if (!$schoolYear) {
            return response()->json(['message' => 'Année scolaire introuvable'], 404);
        }

        $schoolYear->update($request->validated());
        
        return response()->json([
            'message' => 'L\'année scolaire a été modifiée avec succès',
            'schoolYear' => $schoolYear,
        ], 200);
    }


    public function destroy($id)
    {
        $schoolYear = SchoolYear::find($id);

        if (!$schoolYear) {
            return response()->json(['message' => 'Année scolaire introuvable'], 404);
        }

        $schoolYear->delete();

        return response()->json([
            'message' => 'L\'année scolaire a été supprimée avec succès',
        ], 200);
    }

}