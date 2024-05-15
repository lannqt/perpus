@extends('layouts.sidebar')
@section('content')
                <!-- Begin Page Content -->
             
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tambah Buku</h1>
                    </div>
                        

                    <!-- Content Row -->
                    
                    <div class="mt-5 w-50">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="book-add" method="post" >
                            @csrf
                            <div class="mb-3">
                                <label for="code" class="form-label">kode buku  </label>
                                <input type="text" name="book_code" id="code" class="form-control" placeholder="kode buku">
                            </div>

                            <div class="mb-3">
                                <label for="title" class="form-label">Judul Buku</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Judul Buku">
                            </div>

                            <div class="mb-3">
                                <label for="slug" class="form-label">Sinopsis</label>
                                <input type="text" name="slug" id="slug" class="form-control" placeholder="Sinopsis buku">
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">konten</label>
                                <input type="text" name="content" id="content" class="form-control" placeholder="konten">
                            </div>

                            <div class="">
                                <label for="content" class="form-label">cover buku</label>
                                <input type="text" name="cover" id="cover" class="form-control" placeholder="img ADDRESS *Image">
                            </div>
                            
                            <div class="mt-3 ">
                                <button class="btn btn-primary" type="submit">add data</button>
                                
                            </div>
                        </form>

                    </div>

                        


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>


@endsection