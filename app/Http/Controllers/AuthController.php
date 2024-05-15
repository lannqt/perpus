<?php

namespace App\Http\Controllers;

use App\Models\User; // Mengimpor model User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }

    public function registerProccess(Request $request)
    {
       // Validasi request
    $validated = $request->validate([
        'username' => 'required|unique:users|max:255',
        'password' => 'required|max:255', // Hilangkan aturan peng-hash-an
        'phone' => 'required|max:255',
    ]);

    // Simpan data ke dalam array
    $userData = [
        'username' => $request->username,
        'password' => $request->password, // Tetapkan password tanpa peng-hash-an
        'phone' => $request->phone,
    ];

    // Buat user baru tanpa melakukan peng-hash-an pada password
    $user = User::create($userData);

    // Flash message dan redirect
    Session::flash('status', 'success');
    Session::flash('message', 'Konfirmasi admin');
    return redirect('register');
    }

    public function authenticating(Request $request)
    {
        // Mengambil username dan password dari permintaan
        $credentials = $request->only('username', 'password');

        // Mencari pengguna berdasarkan username
        $user = User::where('username', $credentials['username'])->first();

        // Jika pengguna ditemukan dan kata sandi cocok
        if ($user && $credentials['password'] == $user->password) {
            // Jika status pengguna aktif
            if ($user->status == 'active') {
                // Masukkan pengguna ke dalam sesi
                Auth::login($user);

                // Bersihkan pesan sesi
                Session::forget(['status', 'message']);


                $request->session()->regenerate();
                if(Auth::user()->role_id == 1) {
                    return redirect('/dashboard');
                }

                if(Auth::user()->role_id == 2) {
                    return redirect('/index');
                }

                
            } else {
                // Jika akun tidak aktif
                Session::flash('status', 'failed');
                Session::flash('message', 'Your account is not active');
            }
        } else {
            // Jika autentikasi gagal
            Session::flash('status', 'failed');
            Session::flash('message', 'Invalid username or password');
        }

        // Redirect ke halaman login
        return redirect('login');
    }


    public function profile()
    {
        
        return view('layouts.sidebar');
    }
}