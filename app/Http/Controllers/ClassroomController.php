<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassroomRequest;
use App\Http\Requests\UpdateClassroomRequest;
use App\Models\Classroom;


class ClassroomController extends Controller
{
    
    public function index()
    {
        $classrooms=Classroom::all();
        return response()->json([
            'message'=>'les salles sont récupérée avec succes',
            'calssrooms'=>$classrooms,
        ],200); // 200 sginifier  que le http request estok
    }

    public function store(StoreClassroomRequest $request)
    {
        $classroom=Classroom::create($request->validated());
        return response()->json([
            'message'=>'le callssroom  son crèe avec succès',
            'classroom'=>$classroom,
        ],201); // create succes
    }

  
    public function show(Classroom $classroom)
    {
        return response()->json([
            'message'=>'le callssroom il rècupèrèe  ',
            'classroom'=>$classroom,
        ],200);
    }



    public function update(UpdateClassroomRequest $request, Classroom $classroom)
    {
        $classroom->update($request->validated());

        return response()->json([
            'message'=>'le callssroom á ète`modifier ',
            'classroom'=>$classroom,
        ],200); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom)
    {
        $classroom->delete();

        return response()->json([
            'message'=>'salle supprimer avec sucèes',
            
        ],204); // pas de contenu
    }
}
