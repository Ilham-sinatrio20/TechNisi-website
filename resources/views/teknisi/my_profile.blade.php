@extends('layouts.layout')
@section('main-content')
<div class="header home">
    <div class="container-fluid">
        <div class="hero row align-items-center">
            <div class="d-flex justify-content-center" id="form-ubah-data">
                <div class="col text-center">
                    <img src="/assets/image/kucingkecil.jpg" alt="" class="rounded mx-auto d-block img-fluid mb-4 mt-3"
                        style="width: 50%; height: 50%">
                    <button type="submit" name="submit" class="btn btn-success shadow-sm border-0">Edit Profil</button>
                </div>
                <div class="col text-white">
                    <label for="email" class="mt-2">Email address</label>
                    <input class="form-control shadow-sm" name="email" id="email" type="text" placeholder="Email"
                        required value={{ $data ->
                    email}} disabled>
                    <label for="username" class="mt-2">Username</label>
                    <input class="form-control shadow-sm" name="username" id="username" type="text"
                        placeholder="username" required value={{ $data -> username}} disabled>
                    <label for="phone" class="mt-2">Phone</label>
                    <input class="form-control shadow-sm" name="phone" id="phone" type="text" placeholder="phone"
                        required value={{ $data ->
                    phone}} disabled>
                    <label for="role" class="mt-2">Status</label>
                    <input class="form-control shadow-sm" name="role" id="role" type="text" placeholder="role" required
                        value={{ $status }} disabled>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .input-form {
        margin-top: 10px;
    }

    .input-form input,
    .input-form .form-select,
    .input-form btn,
    .input-form .custom-file {
        margin-bottom: 10px;
    }
</style>
@endsection