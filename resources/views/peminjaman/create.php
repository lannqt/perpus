@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Formulir Peminjaman</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('peminjaman.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="user_id">User ID:</label>
                            <input type="text" class="form-control" id="user_id" name="user_id" value="{{ auth()->user()->id }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="book_code">Book Code:</label>
                            <input type="text" class="form-control" id="book_code" name="book_code" value="{{ $books->book_code }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="judul">Judul:</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="{{ $book->judul }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_peminjaman">Tanggal Peminjaman:</label>
                            <input type="date" class="form-control" id="tanggal_peminjaman" name="tanggal_peminjaman" value="{{ now()->toDateString() }}">
                        </div>

                        <div class="form-group">
                            <label for="tanggal_pengembalian">Tanggal Pengembalian:</label>
                            <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian">
                        </div>

                        <div class="form-group">
                            <label for="status">Status:</label>
                            <input type="text" class="form-control" id="status" name="status" value="pending" readonly>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
