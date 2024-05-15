<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function buku()
    {
        $books = book::all();
        return view('buku', ['books'=> $books]);
    }

    public function add()
    {
        return view('book-add');
    }

    public function store(Request $request)
    {
        $book = book::create($request->all());
        return redirect('buku')->with('status', 'Buku berhasil ditambahkan');
    }

    public function detail($id)
    {
        
        $books = book::find($id);
        return view('detail', ['books'=> $books]);
    }

    public function content($id)
    {
        
        $books = book::find($id);
        return view('content', ['books'=> $books]);
    }

    public function edit($id, Request $request){
    $books = book::findOrFail($id);
    $books->update($request->all());

    // Redirect ke halaman lain atau kembali ke halaman buku
    return redirect('buku');
    }

    public function destroy($id)
    {
        $books = book::findOrFail($id);
        $books->delete();

        session()->flash('success', 'Buku berhasil dihapus!');
        return redirect('buku');
    }

}