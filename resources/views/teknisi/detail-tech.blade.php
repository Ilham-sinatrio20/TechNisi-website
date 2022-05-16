 <head>
         <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>

@extends('layouts.layout')

@section('main-content')
            <!-- Page Header Start -->
            <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Detail Teknisi</h2>
                        </div>
                        <div class="col-12">
                            <a href="/">Home</a>
                            <a href="">Detail Teknisi</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->


            <!-- Single Page Start -->
            <div class="single">
                <div class="container">
                    <div class="section-header">
                        <p>Teknisi {{ $data->spesialis }}</p>
                        <h2>{{ $data->name }}</h2>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            @if($data->photos)
                                <center><img class="img-fluid rounded"src="{{ asset('storage/image/tech' . $data->photos) }}" alt="{{ $tech->category }}"></center>
                            @else
                                <center><img class="img-fluid rounded"src="https://source.unsplash.com/300x400?person" alt="{{ $data->spesialis }}"></center>
                            @endif
                            <h3>Deskripsi</h3>
                            <p>{{ $data->desc }}</p>
                            {{-- <ul class="list-group">
                                <li class="list-group-item">First list item</li>
                                <li class="list-group-item">Second list item</li>
                                <li class="list-group-item">Third list item</li>
                            </ul> --}}

                            <h3 class="mb-3">Riwayat Transaksi</h3>
                            <table class="table table-bordered mb-5">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Customer</th>
                                        <th>Deskripsi</th>
                                        <th>tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($trans as $tra)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $tra->user_name }}</td>
                                            <td>{{ $tra->description }}</td>
                                            <td>{{ $tra->dates }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <a href="{{ route('create.trans') }}" class="btn btn-success d-block">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>

         <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('lib/isotope/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>

        <!-- Template Javascript -->
        <script src="{{ asset('js/main.js') }}"></script>
@endsection
