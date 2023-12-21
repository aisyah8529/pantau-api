<?php

namespace App\Http\Controllers\Auth;

use App\Enums\Message\MessageSuccess;
use App\Http\Controllers\Controller;
use App\Libraries\Response;

class LogoutController extends Controller
{
    public function index()
    {
        // Logout user and invalidate the current token
        auth('api')->logout();

        // Response as success
        $success = (object) MessageSuccess::LOGGED_OUT;
        return Response::success($success->code, [], trans($success->message));
    }
}
