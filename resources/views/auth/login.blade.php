@extends('layouts.layoutTeknisi')
@section('main-content')

<body>
    <div class="header home">
        <div class="container-fluid">
            <div class="hero row align-items-center">
                <img src="/img/logo_technician.png" class="mx-auto d-block" style="width: 250px;">
                <center>
                    <form action="{{ route('login') }}" class="form-login" method="POST" autocomplete="off">
                        @csrf
                        <div class="col-sm-4">
                            <input id="email" type="email"
                                class="form-control shadow-sm @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control shadow-sm" name="password" id="password" type="password"
                                placeholder="Password">
                        </div>
                        <div class="col-sm-4">
                            <button type="submit" name="submit" class="btn btn-success shadow-sm border-0">{{
                                __('Login') }}</button>
                        </div>
                    </form>
                    <div class="d-flex justify-content-between text-bawah col-sm-4">
                        <div class="mt-2"><a href="{{ route('register.auth') }}">Register</a></div>
                        <div class="mt-2"><a href="#">Forgot Password?</a></div>
                    </div>
                </center>
            </div>
        </div>
    </div>
</body>
@endsection