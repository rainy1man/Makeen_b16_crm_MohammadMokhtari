<?php

namespace App\Http\Controllers\apiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function success_response($data)
    {
        return response()->json([
            "success" => 'success',
            "message" => 'عملیات با موفقیت انجام شد',
            "data" => $data
        ]);
    }

    public function error_response()
    {
        return response()->json([
            "success" => 'error',
            "message" => 'عملیات با خطا مواجه شد',
            "data" => ''
        ]);
    }

    public function unauthorized_response()
    {
        return response()->json([
            "success" => 'error',
            "message" => 'شما مجوز دسترسی به این بخش را ندارید',
            "data" => ''
        ]);
    }
}
