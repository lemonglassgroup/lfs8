<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:255|min:2',
//            'name' => ['required', 'max:255'] functionally identical
            'username' => 'required|max:255|min:3|unique:App\Models\User',
            'email' => 'required|email|max:255|unique:App\Models\User',
            'password' => 'required|max:255|min:8'
        ]);

        User::create($attributes);

        return redirect('/')->with('success', 'Your account has been created');
    }
}
