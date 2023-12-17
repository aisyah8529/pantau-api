<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\CredentialResource;
use App\Rules\Password;
use App\Enums\Message\MessageSuccess;
use App\Enums\Message\MessageError;
use App\Libraries\Response;
use App\Libraries\Validation;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        // Set validation rules
        $rules = [
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'min:8', new Password],
        ];

        // Validate rules
        $validator = Validator::make($request->all(), $rules);

        // Check if validator is failed
        if ($validator->stopOnFirstFailure()->fails()) {
            // Get validation summary
            $validation = Validation::summarize($validator);

            // Response as error
            $error = (object) MessageError::INVALID_FORM;
            return Response::error($error->code, $validation, trans($error->message));
        }

        // Get user info
        $email = $request->input('email');
        $user = User::where('email', $email)->first();

        // Set resource data
        $resource = new CredentialResource($user);

        // Response as success
        $success = (object) MessageSuccess::LOGGED_IN;
        return Response::success($success->code, $resource, trans($success->message));
    }
}
