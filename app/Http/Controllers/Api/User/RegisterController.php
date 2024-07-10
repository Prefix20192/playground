<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\RegisterRequest;
use Illuminate\Http\JsonResponse;
use App\Actions\User\RegisterUserAction;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request, RegisterUserAction $action): JsonResponse
    {
        $token = $action->__invoke($request->toDTO());
        return response()->json([
            "token" => $token
        ], 201);
    }
}
