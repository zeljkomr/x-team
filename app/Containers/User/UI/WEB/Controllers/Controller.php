<?php

namespace App\Containers\User\UI\WEB\Controllers;

use App\Containers\User\Models\User;
use App\Ship\Parents\Controllers\WebController;

/**
 * Class Controller
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class Controller extends WebController
{

    /**
     * @return  \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sayWelcome()
    {   // user say welcome
        return view('user::user-welcome');
    }

    public function confirm($token)
    {
        $user = User::where('confirmation_token', $token)->first();

        if ($user) {
            $user->update([
                'confirmation_token' => null,
                'confirmed' => 1
            ]);

            return redirect(env('APP_URL'));
        }

        return redirect(env('APP_URL'));
    }
}
