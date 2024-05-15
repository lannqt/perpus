@extends('layouts.sidebar')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Peminjaman
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>User id</th>
                                    <th>Judul</th>
                                    <th>Tgl Peminjaman</th>
                                    <th>Tgl Pengembalian</th>
                                    <th>Status</th>
                                    <th>Denda</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($peminjamans as $p)
                                <tr>
                                    <td>{{ $p->id }}</td>
                                    <td>{{ $p->user_id }}</td>
                                    <td>{{ $p->judul }}</td>
                                    <td>{{ $p->tanggal_peminjaman }}</td>
                                    <td>{{ $p->tanggal_pengembalian }}</td>
                                    <td>{{ $p->status }}</td>
                                    <td>{{ $p->denda }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary detail-btn" data-id="{{ $p->id }}">Detail</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
