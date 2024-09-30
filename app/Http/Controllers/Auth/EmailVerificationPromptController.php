<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        if ($request->user()->hasVerifiedEmail()) {
            $user = $request->user();

            if ($user->role === 'ouder') {
                return redirect()->route('ouders.index');
            }
            if ($user->role === 'zwem_docent') {
                return redirect()->route('zwemlessen.index');
            }

            return redirect()->intended(route('dashboard', absolute: false));
        }

        return view('auth.verify-email');
    }
}
