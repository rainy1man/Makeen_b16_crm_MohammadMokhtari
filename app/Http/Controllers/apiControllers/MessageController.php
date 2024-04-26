<?php

namespace App\Http\Controllers\apiControllers;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id = null)
    {
        if(!$id)
        {
          $messages = Message::orderBy('id', 'desc')->paginate(2);
          return response()->json($messages);
        }
        else
        {
          $message = Message::find($id);
          return response()->json($message);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = Message::create($request->toArray());
        return response()->json($message);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $message = Message::find($id)->update();
        return response()->json($message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = Message::destroy($id);
        return response()->json($message);
    }
}
