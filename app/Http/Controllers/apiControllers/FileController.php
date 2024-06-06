<?php

namespace App\Http\Controllers\apiControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatMediaRequest;
use App\Models\File;
use App\Models\Media;
use App\Models\Message;
use App\Models\Product;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends ApiController
{

    public function upload(Request $request, string $model_type, $model_id)
    {

        $uploaded_file = $request->file('file');
        $file_name = $uploaded_file->getClientOriginalName();
        $path = $uploaded_file->store('public/media/' . $model_type);
        $size = $uploaded_file->getSize();
        $ext = $uploaded_file->getClientOriginalExtension();
        $file = File::create([
            'file_name' => $file_name,
            'path' => $path,
            'size' => $size,
            'ext' => $ext,
        ]);
        if ($model_type === 'product') {
            $model = Product::find($model_id);
        } elseif ($model_type === 'avatar') {
            $model = Profile::find($model_id);
        } elseif ($model_type === 'message') {
            $model = Message::find($model_id);
        }
        if (!$model) {
            return $this->error_response();
        }
        $model->files()->attach($file);
        return response()->json($file);
    }

    public function download(Request $request)
    {
        $path = $request->path;
        $file = File::where('path', $path)->first();
        $name = $file->file_name;
        return Storage::download($path, $name);
    }

    public function destroy(string $id)
    {
        File::destroy($id);
        return $this->delete_response();
    }
}
