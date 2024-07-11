<?php

namespace App\Http\Controllers\Api\User;

use App\Actions\User\ResetPasswordAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\ResetPasswordRequest;
use App\Exceptions\Api\User\ResetPasswordException;

class ResetPasswordController extends Controller
{
    public function __invoke(ResetPasswordRequest $request, ResetPasswordAction $action)
    {
        try {
            $action->__invoke($request->toDTO());
            return response()->json([
                "message" => 'Password reset successfully'
            ], 200);
        }catch (ResetPasswordException $e)
        {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }
    }
}
