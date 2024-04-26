<?php

namespace App\Http\Controllers\apiControllers;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id = null)
    {
        if (!$id) {
            $notes = Note::orderBy('id', 'desc')->paginate(10);
            return response()->json($notes);
        } else {
            $note = Note::find($id);
            return response()->json($note);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $note = Note::create($request->toArray());
        return response()->json($note);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $note = Note::find($id)->update($request->toArray());
        return response()->json($note);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $note = Note::destroy($id);
        return response()->json($note);
    }
}
