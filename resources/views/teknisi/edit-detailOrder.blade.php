@extends('layouts.layout')
<head>
        <link rel="stylesheet" href="css/ord.css">
        <link rel="stylesheet" href="css/detailOrder.css">
        <link rel="stylesheet" href="css/detailOrder2.css">
</head>
@section('main-content')
    <form action="/detail-transaksi/{{ Auth::user()->username }}/{{$trans->trans_id }}/update" method="POST">
        @csrf
        @method('PUT')
        <div class="content">
            <div class="container d-flex justify-content-center mt-100 my-3">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="container">
                            @if(Auth::user()->id_role == 2)
                                <h6 class="text-dark fw-bold">CUSTOMER</h6>
                            @elseif(Auth::user()->id_role == 3)
                                <h6 class="text-dark fw-bold">TEKNISI</h6>
                            @endif
                            <div class="row">
                                <div class="col-xs-6" style="padding-top: 1vh;">
                                    <ul type="none">
                                        <pre>
                                            @if(Auth::user()->id_role == 2)
                                                <li> Nama       : {{ $trans->cust_name }} </li>
                                                <li> Telepon    : {{ $trans->cust_phone }} </li>
                                            @elseif(Auth::user()->id_role == 3)
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
                                 @if(Auth::user()->id_role == 2)
                                    <h6 class="text-dark fw-bold">TEKNISI</h6>
                                @elseif(Auth::user()->id_role == 3)
                                    <h6 class="text-dark fw-bold">PELANGGAN</h6>
                                @endif
                                <div class="row">
                                    <div class="col-xs-6" style="padding-top: 1vh;">
                                        <ul type="none">
                                            <pre>
                                                @if(Auth::user()->id_role == 2)
                                                    <li>Nama    : {{ $trans->tech_name }}</li>
                                                    <li>Alamat  : {{ $trans->tech_address }}</li>
                                                    <li>Telepon : {{ $trans->tech_phone }}</li>
                                                @elseif(Auth::user()->id_role == 3)
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
                                        @php
                                            $time = strtotime($trans->dates);
                                        @endphp
                                        <div class="mb-3 w-50 ml-4">
                                            <label for="trans_id" class="form-label">ID Transaksi</label>
                                            <input disabled type="text" name="trans_id" class="form-control" value="{{ $trans->trans_id }}" id="trans_id">
                                        </div>
                                        <div class="mb-3 w-50 ml-4">
                                            <label for="desc">Deskripsi Pesanan</label>
                                            <textarea disabled class="form-control" placeholder="Deskripsi Kerusakan" name="desc" id="desc" style="height: 100px">{{ $trans->description }}</textarea>
                                        </div>
                                        <div class="mb-3 w-50 ml-4">
                                            <label for="created_at" class="form-label">Tanggal Pesanan</label>
                                            <input disabled type="text" class="form-control" id="created_at" name="created_at" value="{{ date("d M Y", $time) }}">
                                        </div>
                                        @if ($trans->status == "On Service" || $trans->status == "Complete")
                                            <div class="mb-3 w-50 ml-4">
                                                <label for="price" class="form-label">Biaya Jasa</label>
                                                <input disabled type="number" class="form-control" id="price" name="price" value="{{ $trans->price }}">
                                            </div>
                                        @else
                                            <div class="mb-3 w-50 ml-4">
                                                <label for="price" class="form-label">Biaya Jasa</label>
                                                <input type="number" class="form-control" id="price" name="price" value="{{ $trans->price }}">
                                            </div>
                                        @endif
                                        <div class="mb-3 w-50 ml-4">
                                            <label for="status" class="form-label">Status Pesanan</label>
                                            @if ($trans->status == "Complete")
                                                <select disabled class="form-select" name="status" id="status">
                                            @else
                                                <select class="form-select" name="status" id="status">
                                            @endif
                                                <option selected>{{ $trans->status }}</option>
                                                <option value="Order">Order</option>
                                                <option value="Pickup">Pickup</option>
                                                <option value="On Service">On Service</option>
                                                <option value="Complete">Complete</option>
                                                <option value="Failed">Failed</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update Detail Transaksi</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
