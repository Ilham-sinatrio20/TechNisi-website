@extends('layouts.layout')
@section('main-content')

<body>
    <div class="header home">
        <div class="container-fluid">
            <div class="hero row align-items-center">
                <center>
                    <div class="container col-8">
                        <div class="row d-flex justify-content-center rounded shadow-lg p-0">
                            <div class="col-6 p-0 bg-white d-flex align-items-center">
                                <img src="/img/e-wallet.jpg" class="mx-auto img-fluid d-block mt-auto mb-auto rounded-0" width="100%"
                                    alt="Transaction Illustration" />
                            </div>
                            <div class="col-6 p-0">
                                <form action="{{ route('transaction.create') }}" class="form-login" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card border-0 rounded-0">
                                        <div class="card-body">
                                            <p class="mb-4 text-black">Silahkan Lengkapi Form Transaksi</p>
                                            <select class="form-select mb-3" aria-label="Default select example" id="level"
                                                name="level">
                                                <option selected>Level</option>
                                                <option value="Ringan">Ringan</option>
                                                <option value="Sedang">Sedang</option>
                                                <option value="Berat">Berat</option>
                                            </select>

                                            <div class="form-floating">
                                                <textarea style="height: 100px" class="form-control" name="desc" placeholder="Leave a comment here" id="desc"></textarea>
                                                <label for="desc">Deskripsi</label>
                                            </div>

                                            <input id="name" type="text"
                                                class="form-control shadow-sm @error('name') is-invalid @enderror" title="Nama Customer"
                                                name="name" value="{{ Auth::user()->name }}" required
                                                autocomplete="name" autofocus placeholder="Nama Anda" readonly>
                                            <input type="hidden" value="{{ $data->cust_id }}" name="customer_id">
                                            <input type="hidden" value="{{ $tech->technician_id }}" name="id_technician">
                                            <input id="tech_name" type="text"
                                                class="form-control shadow-sm @error('tech_name') is-invalid @enderror"
                                                name="tech_name" value="{{ $tech->tech_name }}" required title="Nama Teknisi"
                                                autocomplete="tech_name" autofocus placeholder="Technician Name">
                                            <button type="submit" name="submit"
                                                class="btn btn-success shadow-sm border-0">Order</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="d-flex justify-content-between text-bawah col-sm-4">
                        <div class="mt-2"><a href="{{ url()->previous() }}">Cancel</a></div>
                        <div class="mt-2"><a href="/">Home</a></div>
                    </div> --}}
                </center>
            </div>
        </div>
    </div>
</body>
@endsection
