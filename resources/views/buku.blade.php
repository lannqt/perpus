@extends('layouts.sidebar')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">BOOK</h1>
            @if(Auth::user()->role_id == 1)
                <a href="book-add" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fa fa-book fa-sm text-white-50"></i> Tambah Buku
                </a>
            @endif
        </div>

        <!-- Content Row -->
        <div class="row">
            @foreach ($books as $item)
                <div class="col-xl-3">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">{{ $item->title }}</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div style="width: 100%; height: 300px" class="cover">
                                <img style="width: 100%; height: 100%" src="{{ $item->cover }}">
                            </div>
                            <br>

                            <div class="">
                                <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#detailModal{{$item->id}}">
                                    <i class="fas fa-info-circle"></i> Detail
                                </button>
                            </div>
                            @if(Auth::user()->role_id == 1)
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <div>
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#editModal{{$item->id}}">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <button type="button" class="btn btn-outline-danger ml-2" data-toggle="modal" data-target="#deleteModal{{$item->id}}">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Book</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/buku/{{$item->id}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" id="title" name="title" value="{{ $item->title }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="cover">Cover</label>
                                            <input type="text" class="form-control" id="cover" name="cover" value="{{ $item->cover }}">
                                        </div>
                                        <!-- Add other fields as needed -->
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Delete Book</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this book?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <form action="/buku/{{$item->id}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Modal Detail --}}
<div class="modal fade" id="detailModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Detail Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item"><strong>Book Code :</strong> {{ $item->book_code }}</li>
                    <li class="list-group-item"><strong>Judul :</strong> {{ $item->title }}</li>
                    <li class="list-group-item"><strong>Sinopsis:</strong> {{ $item->slug }}</li>
                </ul>
            </div>
            <div class="modal-footer">
                <form action="/buku/{{$item->id}}/read" method="GET" style="display: inline;">
                    <button type="submit" class="btn btn-primary">Baca</button>
                </form>
                <form action="/peminjaman/create/{{ $item->id }}" method="GET" style="display: inline;">
                    <button type="submit" class="btn btn-success">Pinjam</button>
                </form>                
            </div>
        </div>
    </div>
</div>

                    
                </div>
            @endforeach
        </div>
    </div>
    <!-- End of Page Content -->
@endsection




