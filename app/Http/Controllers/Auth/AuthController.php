<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getSignupForm() {
        return view('auth.signup');
    }

    public function getSigninForm() {
        return view('auth.signin');
    }

    public function registerUser(Request $request) {
        // Validate user's information
        $validatedInfo = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'unique:users,email'],
            'password' => ['required', 'min:4']
        ]);

        // Hashing user's password
        $validatedInfo['password'] = bcrypt($validatedInfo['password']);

        // Slug will be automatic generated through User model
        // Save user's information to database
        User::create($validatedInfo);

        // Redirect to signin page after registration
        return redirect(route('auth.signin'));
    }

    public function signingInUser(Request $request) {
        // Validate user's credentials
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        // Checking user's giving credentials with database
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // If user pass the authentication then redirect back to where he from
            return redirect()->intended();
        }

        // If user's credentials are wrong then redirect back to signin page with error message.
        return back()->withErrors(['msg' => 'invalid credentials.']);
    }

    public function signout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
