<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AuthController extends Controller
{
    public function index ()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        dd ($request->all());
    }

    public function registration ()
    {

        return view('auth.registration');

    }

    public function postRegistration(Request $request)
    {
        dd ($request->all());
    }
}
