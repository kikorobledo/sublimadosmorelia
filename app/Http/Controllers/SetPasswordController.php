<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StorePasswordRequest;

class SetPasswordController extends Controller
{
    public function create(Request $request){

        return view('auth.setpassword');

    }

    public function store(StorePasswordRequest $request){

        auth()->user()->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('home');

    }
}
