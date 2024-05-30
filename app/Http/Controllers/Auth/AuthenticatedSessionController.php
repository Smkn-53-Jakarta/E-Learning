<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->ensureIsNotRateLimited();

        $identifier = $request->input('identifier');
        $password = $request->input('password');

        if (filter_var($identifier, FILTER_VALIDATE_EMAIL)) {
            $user = User::where('email', $identifier)->first();
        } else {
            $student = Student::where('identification_number', $identifier)->first();
            $teacher = Teacher::where('identification_number', $identifier)->first();
            $user = $student ? $student->user : ($teacher ? $teacher->user : null);
        }

        if ($user && Hash::check($password, $user->password)) {
            Auth::login($user);

            RateLimiter::clear($request->throttleKey());

            $request->session()->regenerate();

            if ($user->hasRole('Admin')) {
                return redirect()->intended(route('dashboard.index'));
            } elseif ($user->hasRole('Teacher')) {
                return redirect()->intended(route('dashboard-teachers.index'));
            }
        }

        return back()->with([
            'message' => 'NIP, NIS atau Password Salah!',
            'status' => 'danger',
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
