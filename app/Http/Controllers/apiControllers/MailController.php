<?php

namespace App\Http\Controllers\apiControllers;

use App\Http\Controllers\Controller;
use App\Mail\ExampleMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail()
    {
        $user = User::find(3);
        Mail::send(new ExampleMail($user));

        return response()->json(['message' => 'Email sent successfully.']);
    }
}
