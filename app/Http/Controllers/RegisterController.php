<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('regis');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|min:6|max:255|unique:users',
            'password' => 'required|min:6|max:255'
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['status'] = 'member';

        User::create($validated);

        return redirect('/login')->with('success', 'Registration Successfull');
    }
}
