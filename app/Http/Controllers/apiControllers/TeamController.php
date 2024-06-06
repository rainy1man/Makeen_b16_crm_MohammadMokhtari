<?php

namespace App\Http\Controllers\apiControllers;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id = null)
    {
        if (!$id) {
            $teams = Team::with(['labels', 'users'])->orderBy('id', 'desc')->paginate(10);
            return response()->json($teams);
        } else {
            $team = Team::with(['labels'])->find($id);
            return response()->json($team);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $team = Team::create($request->toArray());
        $team->labels()->attach($request->label_ids);

        return response()->json($team);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $team = Team::find($id);
        $team->update($request->toArray());
        $team->labels()->sync($request->label_ids);
        return response()->json($team);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $team = Team::destroy($id);
        return response()->json($team);
    }
}
