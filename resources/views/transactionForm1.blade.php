@extends('layouts.layout')
@section('main-content')

<body>
    <div class="header home">
        <div class="container-fluid">
            <div class="hero row align-items-center">
                <center>
                    <div class="container col-8">
                        <div class="row d-flex justify-content-center rounded shadow-lg p-0">
                            <div class="col-6 p-0 bg-white">
                                <img src="/img/e-wallet.jpg" class="mx-auto img-fluid d-block rounded-0" width="100%"
                                    alt="Transaction Illustration" />
                            </div>
                            <div class="col-6 p-0">
                                <form action="{{ route('login') }}" class="form-login" method="POST" autocomplete="off">
                                    <div class="card border-0 rounded-0">
                                        <div class="card-body">
                                            <p class="mb-4 text-black">Your payment details</p>
                                            <select class="form-select" aria-label="Default select example" id="level"
                                                name="level">
                                                <option selected>Level</option>
                                                <option value="Ringan">Ringan</option>
                                                <option value="Sedang">Sedang</option>
                                                <option value="Berat">Berat</option>
                                            </select>
                                            <input id="desc" type="text"
                                                class="form-control shadow-sm @error('desc') is-invalid @enderror"
                                                name="desc" value="{{ old('desc') }}" required autocomplete="desc"
                                                autofocus placeholder="Description">

                                            <input id="customer_id" type="text"
                                                class="form-control shadow-sm @error('customer_id') is-invalid @enderror"
                                                name="customer_id" value="{{ old('customer_id') }}" required
                                                autocomplete="customer_id" autofocus placeholder="Customer Id">
                                            <input id="id_technician" type="text"
                                                class="form-control shadow-sm @error('id_technician') is-invalid @enderror"
                                                name="id_technician" value="{{ old('id_technician') }}" required
                                                autocomplete="id_technician" autofocus placeholder="Id Technician">
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