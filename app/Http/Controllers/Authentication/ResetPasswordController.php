<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authentication\ResetPasswordRequest;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Inertia\Response;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    /**
     * Render the reset password form
     */
    public function edit(Request $request) : Response
    {
        return inertia('Authentication/ResetPassword', [
            'email' => $request->email,
            'token' => $request->token,
        ]);
    }

    /**
     * Reset the user password
     */
    public function update(ResetPasswordRequest $request) : RedirectResponse
    {
        $status = Password::reset($request->validated(),
            function(User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status','password-reset-success')
            : back()->withErrors('email', __($status));
    }
}
