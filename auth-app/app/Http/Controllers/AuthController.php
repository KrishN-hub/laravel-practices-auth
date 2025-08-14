<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{
    public function index ()
    {
        // // Check if the user is already authenticated
        // if (Auth::check()) {
        //     // Redirect to the dashboard if authenticated
        //     return redirect()->route('dashboard');
        // }

        // Show the login view if not authenticated
        return view('auth.login');

    }

    public function login(Request $request)
    {
       // Check if the user is already authenticated
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
          // If the user is already authenticated, redirect to the dashboard
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Regenerate the session to prevent session fixation attacks

            return redirect()->intended('dashboard');// Redirect to the intended page or dashboard
        }
         // If the authentication fails & redirect back with an error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.', // Error message for invalid credentials
        ])->onlyInput('email'); // Only keep the email input in the old input data

    }

    public function registration ()
    {

        // // Check if the user is already authenticated
        // if (Auth::check()) {
        //     // Redirect to the dashboard if authenticated
        //     return redirect()->route('dashboard');
        // }

        // Show the registration view if not authenticated
        return view('auth.registration');

    }

    public function postRegistration(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // Check if the user is already authenticated
        $User = new User;
        $User->name = $request->input('name'); // Get the name from the request
        $User->email = $request->input('email'); // Get the email from the request
        $User->password = Hash::make($request->input('password')); // Hash the password before saving
        $User->save(); // Save the user to the database
        return redirect('/login'); // Redirect to the login page after successful registration

    }
    public function dashboard()
    {

        // Check if the user is authenticated
        if (Auth::check()) {
            // Get the authenticated user
            $user = Auth::user();
            // Return the dashboard view with user data
            return view('dashboard', compact('user'));
        }

        // Redirect to login if not authenticated with error message box
        return redirect()->route('login');





    }
    public function logout(Request $request)
    {
        Auth::logout(); // Log out the user
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token for security

        return redirect('/'); // Redirect to the home page
    }
}
