<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
    $peminjamans = Peminjaman::all();
    return view('peminjaman.pinjem')->with('peminjamans', $peminjamans);
    }

    public function create($book_id)
{
    $books = book::find($book_id);
    // Jika buku tidak ditemukan, Anda mungkin ingin menangani kasus ini di sini

    return view('peminjaman.create', ['books'=> $books]);
}

public function store(Request $request)
{
    // Validasi data yang diterima dari formulir
    $validatedData = $request->validate([
        'user_id' => 'required',
        'book_code' => 'required',
        'judul' => 'required',
        'tanggal_peminjaman' => 'required|date',
        'tanggal_pengembalian' => 'required|date',
        'status' => 'required',
    ]);

    // Simpan data peminjaman ke dalam basis data
    Peminjaman::create($validatedData);

    // Redirect ke halaman yang sesuai setelah peminjaman berhasil disimpan
    return redirect('/peminjaman')->with('success', 'Peminjaman berhasil disimpan.');
}

}
