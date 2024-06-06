<?php

namespace App\Http\Controllers\apiControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatMediaRequest;
use App\Models\Media;
use App\Models\Message;
use App\Models\Product;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends ApiController
{

    // Show media
    public function show(Request $request, $model_type, $model_id, $media_id)
    {
        if ($request->user()->can('media.read')) {
            if ($model_type === 'avatar') {
                $model = Profile::find($model_id);
                $media = $model->media()->find($media_id);
            } elseif ($model_type === 'product') {
                $model = Product::find($model_id);
                $media = $model->media()->find($media_id);
            } elseif ($model_type === 'message') {
                $model = Message::find($model_id);
                $media = $model->media()->find($media_id);
            }
            if (!$model) {
                return $this->response404();
            }
            return $this->response200($media);
        } else {
            return $this->response403();
        }
    }

    // Upload new media
    public function upload(CreatMediaRequest $request, string $model_type, $model_id)
    {
        if ($request->user()->can('media.store')) {
            if ($model_type === 'product') {
                $model = Product::find($model_id);
                $model->addMedia($request->file('file'))->toMediaCollection('product_images');
            } elseif ($model_type === 'avatar') {
                $model = Profile::find($model_id);
                $model->addMedia($request->file('file'))->toMediaCollection('avatar', 'private');
            } elseif ($model_type === 'message') {
                $model = Message::find($model_id);
                $model->addMedia($request->file('file'))->toMediaCollection('message_files', 'private');
            }
            if (!$model) {
                return $this->response404();
            }
            return $this->response200();
        }

        return $this->response403();
    }

    // Download media
    public function download(string $model_type, $model_id, $media_id)
    {
        if ($model_type === 'avatar') {
            $model = Profile::find($model_id);
        } elseif ($model_type === 'product') {
            $model = Product::find($model_id);
        } elseif ($model_type === 'message') {
            $model = Message::find($model_id);
        }
        $media = $model->media()->where('id', $media_id)->first();
        $file = $media->getPath();
        $file_name = $media->file_name;
        return response()->download($file, $file_name);
    }

    public function update(Request $request, string $modelType, $modelId)
    {
        if ($modelType === 'avatar') {
            $model = Profile::find($modelId);
            $model->clearMediaCollection();
            $model->addMedia($request->file('file'))->toMediaCollection('avatar', 'local');
        } elseif ($modelType === 'product') {
            $model = Product::find($modelId);
            $model->clearMediaCollection();
            $model->addMedia($request->file('file'))->toMediaCollection('products_images');
        } elseif ($modelType === 'message') {
            $model = Message::find($modelId);
            $model->clearMediaCollection();
            $model->addMedia($request->file('file'))->toMediaCollection('message_files', 'local');
        }
        return response()->json(['message' => 'Media added successfully'], 200);
    }
    public function destroy(Request $request, string $model_type, $model_id, string $media_id)
    {
        if ($request->user()->can('media.delete'))
        {
        if ($model_type === 'avatar') {
            $model = Profile::find($model_id);
        } elseif ($model_type === 'product') {
            $model = Product::find($model_id);
        } elseif ($model_type === 'message') {
            $model = Message::find($model_id);
        }
        if (!$model) {
            return $this->response404();
        }
        $media = $model->media()->find($media_id)->delete();
        return $this->delete_response();
    } else {
        return $this->response403();
    }
}
}
