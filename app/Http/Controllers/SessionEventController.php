<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreSessionEventRequest;
use App\Http\Requests\UpdateSessionEventRequest;
use App\Models\SessionEvent;

class SessionEventController extends Controller
{
    public function index()
    {
        $sessions = SessionEvent::all();
        return response()->json([
            'message' => 'Les sessions sont récupérées avec succès',
            'sessions' => $sessions,
        ], 200);
    }

    public function store(StoreSessionEventRequest $request)
    {
        $session = SessionEvent::create($request->validated());
        return response()->json([
            'message' => 'La session a été créée avec succès',
            'session' => $session,
        ], 201);
    }

    public function show($id)
    {

        $sessionEvent=SessionEvent::find($id);
        return response()->json([
            'message' => 'La session a été récupérée avec succès',
            'session' => $sessionEvent,
        ], 200);
    }

    public function update(UpdateSessionEventRequest $request,$id)
    {
        $sessionEvent=SessionEvent::find($id);
        $sessionEvent->update($request->validated());
        return response()->json([
            'message' => 'La session a été modifiée avec succès',
            'session' => $sessionEvent,
        ], 200);
    }

    public function destroy($id)
    {

        $sessionEvent=SessionEvent::find($id);
        $sessionEvent->delete();
        return response()->json([
            'message' => 'La session a été supprimée avec succès',
        ], 204);
    }
}