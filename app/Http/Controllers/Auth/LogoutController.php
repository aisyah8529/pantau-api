<?php

namespace App\Http\Controllers\Auth;

use App\Enums\Message\MessageSuccess;
use App\Http\Controllers\Controller;
use App\Libraries\Response;

class LogoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        auth('api')->logout();

        // Response as success
        $success = (object) MessageSuccess::LOGGED_OUT;
        return Response::success($success->code, [], trans($success->message));
    }
}
