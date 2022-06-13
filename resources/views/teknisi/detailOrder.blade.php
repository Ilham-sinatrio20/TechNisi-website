@extends('layouts.layout')
<head>
        <link rel="stylesheet" href="css/ord.css">
        <link rel="stylesheet" href="css/detailOrder.css">
        <link rel="stylesheet" href="css/detailOrder2.css">
</head>
@section('main-content')
            <div class="content">
                <div class="container d-flex justify-content-center mt-100 my-3">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="container">
                                    @if(Auth::user()->id_role = 2)
                                        <h6 class="text-dark fw-bold">CUSTOMER</h6>
                                    @elseif(Auth::user()->id_role = 3)
                                        <h6 class="text-dark fw-bold">TEKNISI</h6>
                                    @endif
                                    <div class="row">
                                        <div class="col-xs-6" style="padding-top: 1vh;">
                                            <ul type="none">
                                                <pre>
                                                @if(Auth::user()->id_role = 2)
                                                    <li> Nama       : {{ $trans->cust_name }} </li>
                                                     <li> Telepon    : {{ $trans->cust_phone }} </li>
                                                @elseif(Auth::user()->id_role = 3)
                                                    <li> Nama       : {{ $trans->tech_name }} </li>
                                                     <li> Telepon    : {{ $trans->tech_phone }} </li>
                                                @endif
                                                </pre>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="container">
                                        @if(Auth::user()->id_role = 2)
                                            <h6 class="text-dark fw-bold">TEKNISI</h6>
                                        @elseif(Auth::user()->id_role = 3)
                                            <h6 class="text-dark fw-bold">PELANGGAN</h6>
                                        @endif
                                        <div class="row">
                                            <div class="col-xs-6" style="padding-top: 1vh;">
                                                <ul type="none">
                                                    <pre>
                                                        @if(Auth::user()->id_role = 2)
                                                            <li>Nama    : {{ $trans->tech_name }}</li>
                                                            <li>Alamat  : {{ $trans->tech_address }}</li>
                                                            <li>Telepon : {{ $trans->tech_phone }}</li>
                                                        @elseif(Auth::user()->id_role = 3)
                                                            <li>Nama    : {{ $trans->cust_name }}</li>
                                                            <li>Alamat  : {{ $trans->alamat }}</li>
                                                            <li>Telepon : {{ $trans->cust_phone }}</li>
                                                        @endif
                                                    </pre>
                                                </ul>
                                            </div>
                                        </div>
                                        <h6 class="text-dark fw-bold">DETAIL TRANSAKSI</h6>
                                        <div class="row">
                                            <div class="col-xs-6" style="padding-top: 1vh;">
                                                <ul type="none">
                                                    @php
                                                        $time = strtotime($trans->dates);
                                                    @endphp
                                                    <pre>
                                                        <li class="left">ID Transaksi       : {{ $trans->trans_id }}</li>
                                                        <li class="left">Jenis Kerusakan    : {{ $trans->description }}</li>
                                                        <li class="left">Tanggal Perbaikan  : {{ date("d M Y", $time) }}</li>
                                                        <li class="left">Biaya Jasa         : Rp.{{ $trans->price }}</li>
                                                        <li class="left">Status             : {{ $trans->status }}</li>
                                                    </pre>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <a href="#" type="button" class="btn btn-primary">Bayar</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
@endsection

 {{-- @include('layouts.sidebar') --}}
            {{-- <header>
            <input type="checkbox" id="tag-menu"/>
            <label class="fa fa-bars menu-bar" for="tag-menu"></label>
            <div class="jw-drawer">
                <div class="scrollmenu">
                    <nav>
                    <ul>
                        @foreach ($transaction as $trans)
                            @if(Auth::user()->id_role = 2)
                                <li><a href="detailOrder/{{ $trans->trans_id }}">Order Number :<br><br>Pelanggan :<br>{{ $trans->cust_name }}</a></li>
                            @elseif (Auth::user()->id_role = 3)
                                <li><a href="detailOrder/{{ $trans->trans_id }}">Order Number :<br>{{ $trans->$trans_id }}<br>Teknisi :<br>{{ $trans->cust_name }}</a></li>
                            @else
                                <li><a href="detailOrder">Data Not Found</a>
                            @endif
                        @endforeach
                    </ul>
                    </nav>
                </div>
            </div>
            </header> --}}
