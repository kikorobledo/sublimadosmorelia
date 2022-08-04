<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function invitation(User $user)
    {
        if (!request()->hasValidSignature() || $user->password != 'password') {
            abort(401);
        }

        auth()->login($user);

        return redirect()->route('home');
    }
}
