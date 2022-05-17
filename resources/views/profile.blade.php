@extends('layouts.layout')
<head>
        <link rel="stylesheet" href="css/prof.css">
</head>
@section('main-content')

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container d-flex justify-content-center mt-200 my-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card p-3 py-4">
                <div class="text-center"> <img src="https://i.imgur.com/bDLhJiP.jpg" width="100" class="rounded-circle"> </div>
                <div class="text-center mt-3"> 
                    <h5 class="mt-2 mb-0">Bambang</h5> <span>Teknisi Laptop</span>
                    <div class="px-4 mt-1">
                        <p class="fonts">Layanan servis berbagai jenis laptop dan kerusakannya dapat dikerjakan. Memiliki sertifikat khusus dalam bidang Teknisi Laptop. </p>
                    </div>
                    <ul class="social-list">
                        <li><i class="fa fa-facebook"></i></li>
                        <li><i class="fa fa-instagram"></i></li>
                        <li><i class="fa fa-linkedin"></i></li>
                        <li><i class="fa fa-google"></i></li>
                    </ul>
                    <div class="buttons"> <button class="btn btn-outline-primary px-4">Message</button> <button class="btn btn-outline-primary px-4 ">Contact</button> </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection