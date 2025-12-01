<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('admin.login');
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function login(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required|min:8'
        // ]);

        // $user = User::where('email', $request->email)->first();

        // if (!$user) {
        //     return redirect()->back()->withErrors([
        //             'email' => 'Username tidak ditemukan.',
        //         ]);
        // }

        // if (!Hash::check($request->password, $user->password)) {
        //     return redirect()->back()->withErrors([
        //             'password' => 'Password yang dimasukkan salah.',
        //         ]);
        // }

        // Auth::login($user);
        // return redirect()->route('dashboard')->with('success', 'Login berhasil!');

        $input = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($input)) {
            $request->session()->regenerate();
            if (Auth::user()->hasRole('admin')) {
                return redirect()->intended('/admin/dashboard')->with('success', 'Login berhasil!');
            } else {
                return redirect()->intended('/dashboard')->with('success', 'Login berhasil!');
            }
        return back()->withErrors([
            'email' => 'Email atau password yang dimasukkan salah.',
        ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function logout(Request $request)
    {
        // User::logout();
        // return redirect()->route('login')->with('info', 'Anda telah logout.');
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/auth')->with('info', 'Anda telah logout.');
    }
}
