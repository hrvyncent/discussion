<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /**
     * Request a reset password link
     */
    public function __invoke(Request $request) : RedirectResponse
    {
        $email = $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($email);

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', 'password-reset-link-sent')
            : back()->withErrors('email', __($status));
    }
}
