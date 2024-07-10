<?php

namespace App\Jobs\Api\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendRegistrationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    /**
     * Create a new job instance.
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //SMTP клиента у меня нет, по этому просто запись в лог файл
        //Mail::to($this->user->email)->send(new \App\Mail\RegistrationEmail($this->user));
        info("Пользователь: {$this->user->name}. Успешно зарегистрировался");
    }

    /**
     * Get the user associated with the job.
     */
    public function getUser()
    {
        return $this->user;
    }
}
