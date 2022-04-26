@extends('layouts.layout')
@section('main-content')

<body>
    <div class="header home">
        <div class="container-fluid">
            <div class="hero row align-items-center">
                <p class="text-center" style="font-size: 30px">Transaction Form</p>
                <img src="/img/IllustrasiTransc.png" class="mx-auto d-block mt-4 mb-5" style="width: 350px;">
                <center>
                    <form action="{{ route('login') }}" class="form-login" method="POST" autocomplete="off">
                        @csrf
                        <div class="col-sm-4">
                            <select class="form-select" aria-label="Default select example" id="level" name="level">
                                <option selected>Level</option>
                                <option value="Ringan">Ringan</option>
                                <option value="Sedang">Sedang</option>
                                <option value="Berat">Berat</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input id="desc" type="text"
                                class="form-control shadow-sm @error('desc') is-invalid @enderror" name="desc"
                                value="{{ old('desc') }}" required autocomplete="desc" autofocus
                                placeholder="Description">
                        </div>
                        <div class="col-sm-4 mb-3">
                            <input id="customer_id" type="text"
                                class="form-control shadow-sm @error('customer_id') is-invalid @enderror"
                                name="customer_id" value="{{ old('customer_id') }}" required autocomplete="customer_id"
                                autofocus placeholder="Customer Id" disabled>
                        </div>
                        <div class="col-sm-4">
                            <input id="id_technician" type="text"
                                class="form-control shadow-sm @error('id_technician') is-invalid @enderror"
                                name="id_technician" value="{{ old('id_technician') }}" required
                                autocomplete="id_technician" autofocus placeholder="Id Technician" disabled>
                        </div>
                        <div class="col-sm-4">
                            <button type="submit" name="submit"
                                class="btn btn-success shadow-sm border-0">Submit</button>
                        </div>
                    </form>
                    <div class="d-flex justify-content-between text-bawah col-sm-4">
                        <div class="mt-2"><a href="{{ url()->previous() }}">Cancel</a></div>
                        <div class="mt-2"><a href="/">Home</a></div>
                    </div>
                </center>
            </div>
        </div>
    </div>
</body>
@endsection