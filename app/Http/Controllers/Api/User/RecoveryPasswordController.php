<?php

namespace App\Http\Controllers\Api\User;

use App\Actions\User\RecoveryPasswordAction;
use App\Exceptions\Api\User\RecoveryException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\RecoveryPasswordRequest;

class RecoveryPasswordController extends Controller
{
    public function __invoke(RecoveryPasswordRequest $request, RecoveryPasswordAction $action)
    {
        try {
            $action->__invoke($request->toDTO());
            return response()->json([
                "message" => 'Запрос на восстановление пароля отправлен!'
            ], 200);
        }catch (RecoveryException $e)
        {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }
    }
}
