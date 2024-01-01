<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->user_type === 'Customer' && $user->approved === 0) {
                Auth::logout();
                return redirect('/login')->with('status', 'failed')->with('message', 'Your account is not approved yet');
            }

            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        return redirect('/login')->with('status', 'failed')->with('message', 'Invalid login credentials');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'user_type' => 'required',
        ]);

        $validatedData['approved'] = ($request->user_type == 'Admin') ? 1 : 0;

        $user = new User;
        $user->fill($validatedData);
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('login');
    }
}
