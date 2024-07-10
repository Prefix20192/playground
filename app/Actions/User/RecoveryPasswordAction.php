<?php

namespace App\Actions\User;

use App\DTO\User\RecoveryDTO;
use App\Models\User;

class RecoveryPasswordAction
{
    public function __invoke(RecoveryDTO $recoveryDTO)
    {
        $user = User::where('email', $recoveryDTO->email)->first();
        if(!$user)
        {
            //NOT-EXIST
        }
        // Создать очередь на отправку уведомление о восстановление пароля

    }
}
