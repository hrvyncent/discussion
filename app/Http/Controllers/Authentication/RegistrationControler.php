<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authentication\RegistrationRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class RegistrationControler extends Controller
{
    /**
     * Store the new account in the database
     */
    public function __invoke(RegistrationRequest $request) : RedirectResponse
    {
        $user = User::query()->create(array_merge($request->validated(), [
            'password' => Hash::make($request->input('password')),
        ]));

        event(new Registered($user));

        return redirect('/');
    }
}
