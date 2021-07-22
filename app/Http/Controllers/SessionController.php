<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use function Symfony\Component\String\s;

class SessionController extends Controller
{
    public function create()
    {
        return view('session.create');
    }

    public function store()
    {
//        validate the request
        $attributes = request()->validate([
            'email' => 'required', // "exists:[table], [column]" provide privacy issue
            'password' => 'required'
        ]);
//        authenticate and log in the user based on the provided credentials
        if (auth()->attempt($attributes)) {
            session()->regenerate(); // to avoid session fixation attack
            //        redirect with a success flash message
            return redirect('/')->with('success', 'Welcome Back!');
        }
//        display custom message if auth fail
        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified.'
        ]);
[]
        ### Other way to do
//        return back()
//            ->withInput()
//            ->withErrors(['email' => 'Your provided credentials could not be verified.']);
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
