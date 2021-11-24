<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'min:6', 'max:20' , 'unique:users'],
            'gender' => ['required', 'string' ],
            'role' => ['required', 'string'],
            'date_of_birth' => ['required', 'date' ],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'is_active' => 'y',
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole($request->role);
        event(new Registered($user));

        Auth::login($user);

        if(auth()->user()->hasRole('recruiter')){
            return redirect(RouteServiceProvider::RECRUITER_DASHBOARD);
        }
        if(auth()->user()->hasRole('job_seeker')){
            return redirect(RouteServiceProvider::USER_PROFILE);
        }

    }
}
