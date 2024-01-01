<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Menampilkan halaman list pengguna yang sudah registrasi.
     */
    public function index()
    {
        // Ambil semua pengguna yang sudah registrasi
        $users = User::all();

        return view('users.index', ['users' => $users]);
    }

    /**
     * Menampilkan detail masing-masing pengguna.
     */
    public function show($id)
    {
        // Ambil data pengguna berdasarkan ID
        $user = User::findOrFail($id);

        return view('users.show', ['user' => $user]);
    }

    /**
     * Menampilkan halaman approve registrasi pengguna.
     */
    public function approveRegistration($id)
    {
        $user = User::findOrFail($id);

        // Melakukan approve dan menyimpan perubahan
        $user->update(['approved' => 1]);

        return redirect()->route('users.index')->with('success', 'Registrasi pengguna berhasil diapprove.');
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

        // Set approved field based on user_type
        if ($request->user_type == 'Admin') {
            $validatedData['approved'] = 1;
        } elseif ($request->user_type == 'Customer') {
            $validatedData['approved'] = 0;
        }

        $user = new User;
        $user->fill($validatedData);
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('login');
    }
}
