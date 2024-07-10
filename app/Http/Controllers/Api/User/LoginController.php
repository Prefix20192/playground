<?php

namespace App\Http\Controllers\Api\User;

use App\Actions\User\LoginUserAction;
use App\Exceptions\Api\User\LoginException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\LoginRequest;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request, LoginUserAction $action): JsonResponse
    {
        try {
            $token = $action->__invoke($request->toDTO());
            return response()->json(["token" => $token], 200);
        }catch (LoginException $e){
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }
}
