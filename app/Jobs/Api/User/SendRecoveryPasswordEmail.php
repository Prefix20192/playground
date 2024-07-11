<?php

namespace App\Jobs\Api\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendRecoveryPasswordEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    private $token;
    /**
     * Create a new job instance.
     */
    public function __construct($user, $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //SMTP клиента у меня нет, по этому просто запись в лог файл
        //Mail::to($this->user)->send(new \App\Mail\SendRecoveryPasswordEmail($this->user, $this->token)));
        info("Пользователь {$this->user->name} отправил запрос на восстановление пароля!\nС ссылкой -> ". route('password.reset', $this->token));
    }

    /**
     * Get the user associated with the job.
     */
    public function getUser()
    {
        return $this->user;
    }
}
