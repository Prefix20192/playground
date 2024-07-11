<?php

namespace App\Jobs\Api\User;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendResetPasswordEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected User $user;

    protected string $password;

    /**
     * Create a new job instance.
     */
    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Отправка письма на email с данными для входа (но SMTP клиента нету по этому в логи пишу)
        info("Пароль успешно сброшен!\nНовые данные для входа\nEmail: {$this->user->email}\nНовый пароль: {$this->user->password}");
    }
}
