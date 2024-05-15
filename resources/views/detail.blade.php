@extends('layouts.sidebar')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{ $books->title }}</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="d-sm-flex align-items-start justify-content-between mb-4">
                            <div class="col">
                                <h1 style="max-width: 700px" class="h5 mb-0 text-gray-800">{{ $books->slug }}</h1>
                                <h1 style="max-width: 700px" class="h5 mb-0 text-gray-800 mt-3">author : </h1>  
                            </div>
                            <div class="col-xl-3">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <div class="card-body">
                                            <div style="width: 100%; height: 300px" class="cover">
                                                <img style="width: 100%; height: 100%" src="{{ $books->cover }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                        <div class="justify-content-start align-items-end d-flex flex-row">
                            <button onclick="window.location.href='/book/{{ $books->id }}/read'" class="btn btn-primary" type="button">Baca</button>
                            <button class="btn btn-primary ml-3" type="submit">Minjam</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Page Content -->
    
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
