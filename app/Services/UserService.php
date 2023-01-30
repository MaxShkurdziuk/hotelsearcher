<?php

namespace App\Services;

use App\Events\UserLoggedIn;
use App\Http\Requests\User\SignInRequest;
use App\Mail\EmailConfirm;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserService
{
    public function register(array $data): User
    {
        $user = new User($data);
        $user->save();

        Mail::to($user->email)->send(new EmailConfirm($user));

        return $user;
    }

    public function signIn(array $credentials, string $guard, SignInRequest $request): ?User
    {
        if (Auth::guard($guard)->attemptWhen($credentials)) {
            $user = auth($guard)->user();
            $event = new UserLoggedIn($user, $request);
            event($event);

            return $user;
        }

        return null;
    }
}
