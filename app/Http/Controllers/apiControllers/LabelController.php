<?php

namespace App\Http\Controllers\apiControllers;

use App\Http\Controllers\Controller;
use App\Models\Label;
use App\Models\User;
use Illuminate\Http\Request;

class LabelController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id = null)
    {
        if (!$id) {
            $labels = Label::orderBy('id', 'desc')->paginate(10);
            return response()->json($labels);
        } else {
            $label = Label::find($id);
            return response()->json($label);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $label = Label::create($request->toArray());
        return response()->json($label);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $label = Label::find($id)->update($request->toArray());
        return response()->json($label);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $label = Label::destroy($id);
        return response()->json($label);
    }

    public function add(Request $request, User $user, $id)
    {
        $user = User::find($id);
        $user->labels()->sync($request->label_ids);

        return response()->json(['message' => 'Labels updated successfully']);
    }

    public function drop(string $id)
    {
        $label = Label::destroy($id);
        return response()->json('برچسب حذف شد');
    }

}
