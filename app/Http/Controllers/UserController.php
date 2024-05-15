<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function profile()
    {
        // Mengambil data pengguna yang sedang masuk
        $user = Auth::user();

        // Mengembalikan tampilan profil dengan data pengguna
        return view('profile', compact('user'));
    }
    public function totalAccounts()
    
    {
        // Hitung jumlah total akun (penyewa)
        $totalAccounts = User::count();

        // Tampilkan hasil di view
        return view('total_accounts', ['totalAccounts' => $totalAccounts]);
    }
}