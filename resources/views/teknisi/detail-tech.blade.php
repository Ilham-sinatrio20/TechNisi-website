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
                        <p>Teknisi {{ $data->category }}</p>
                        <h2>{{ $data->name }}</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            @if($data->photos)
                                <center><img class="img-fluid rounded"src="{{ asset('storage/image/tech' . $data->photos) }}" alt="{{ $tech->category }}"></center>
                            @else
                                <center><img class="img-fluid rounded"src="https://source.unsplash.com/300x400?person" alt="{{ $data->spesialis }}"></center>
                            @endif
                            <h3>Deskripsi</h3>
                            <p>{{ $data->desc }}</p>

                            <h3 class="mb-3">Riwayat Transaksi</h3>
                            <table class="table table-bordered mb-4">
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
                                        @php
                                            $times = strtotime($tra->dates)
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $tra->user_name }}</td>
                                            <td>{{ $tra->description }}</td>
                                            <td>{{ date("d M Y", $times) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-11">
                            @if(Auth::user()->id_role = 2)
                                <a href="{{ route('create.trans') }}" class="btn btn-success d-block">Pesan Sekarang</a>
                            @elseif (Auth::user()->id_role = 3)
                                <a href="#" class="btn btn-success d-block disabled">Anda Tidak Bisa Memesan Karena Sesama Teknisi</a>
                            @else
                                <a href="/login" class="btn btn-success d-block">Anda Tidak Bisa Memesan Karena Belum Login</a>
                            @endif
                        </div>
                        <div class="col-lg-1">
                            <a href="{{ route('inbox.index') }}" wire:click="startChat({{ $data->id }})"><i class="fa fa-phone-square fa-3x" aria-hidden="true"></i></a>
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
