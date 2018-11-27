<?php

namespace App\Containers\User\Mails;

use App\Containers\User\Models\User;
use App\Ship\Parents\Mails\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserRegisteredMail extends Mail implements ShouldQueue
{
    use Queueable;

    /**
     * @var  \App\Containers\User\Models\User
     */
    protected $user;

    /**
     * UserRegisteredMail constructor.
     * @param $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('user::user-registered')
            ->to($this->user->email, $this->user->name)
            ->with([
                'name'  => $this->user->name,
                'token' => $this->user->confirmation_token,
            ]);
    }
}
