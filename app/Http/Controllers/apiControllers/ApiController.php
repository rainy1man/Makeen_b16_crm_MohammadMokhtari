<?php

namespace App\Http\Controllers\apiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\InteractsWithMedia;

class ApiController extends Controller
{

    use InteractsWithMedia;

    public function response200($data = "", string $message = "عملیات با موفقیت انجام شد")
    {
        return response()->json([
            "success" => 'success',
            "message" => $message,
            "data" => $data
        ]);
    }

    public function error_response(string $message = "عملیات با خطا مواجه شد")
    {
        return response()->json([
            "success" => 'error',
            "message" => $message,
            "data" => ''
        ]);
    }

    public function response403()
    {
        return response()->json([
            "success" => 'error',
            "message" => 'شما مجوز دسترسی به این بخش را ندارید'
        ]);
    }

    public function response404($model = 'درخواست')
    {
        return response()->json([
            "success" => 'error',
            "message" => $model . 'مورد نظر یافت شد'
        ]);
    }

    public function delete_response($model = 'دیتا')
    {
        return response()->json([
            "success" => 'success',
            "message" => $model . 'با موفقیت حذف شد'
        ]);
    }
}
