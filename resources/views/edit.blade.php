@extends('layouts.layout')
@section('main-content')
<style>
    .profile .table-properties th {
        font-weight: normal;
         width: 15rem;
    }

    .profile .table-properties td {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .profile .table-properties tr:first-child td,
    .profile .table-properties tr:first-child th {
        border-top: none !important;
    }

    .profile .img-lg {
        width: 9rem;
        height: 9rem;
    }

    .profile-pic {
        color: transparent;
        transition: all 0.3s ease;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        transition: all 0.3s ease;
    }
    .profile-pic input {
        display: none;
    }
    .profile-pic img {
        position: absolute;
        object-fit: cover;
        width: 165px;
        height: 165px;
        box-shadow: 0 0 10px 0 rgba(255, 255, 255, 0.35);
        border-radius: 100px;
        z-index: 0;
    }
    .profile-pic .-label {
        cursor: pointer;
        height: 165px;
        width: 165px;
    }
    .profile-pic:hover .-label {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(0, 0, 0, 0.8);
        z-index: 10000;
        color: #fafafa;
        transition: background-color 0.2s ease-in-out;
        border-radius: 100px;
        margin-bottom: 0;
    }
    .profile-pic span {
        display: inline-flex;
        padding: 0.2em;
        height: 2em;
    }

</style>
@if(request()->routeIs('profile.tech'))
<form action="{{ route('tech.update', Auth::user()->username) }}" method="POST" enctype="multipart/form-data">
@endif
<form action="{{ route('cust.update', Auth::user()->username) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="profile-pic my-3">
        <label class="-label" for="photos">
            <span class="glyphicon glyphicon-camera"></span>
            <span>Change Image</span>
        </label>
        <input id="photos" type="file" name="photos" onchange="loadFile(event)"/>
        {{-- <input id="photos" type="file" name="photos" onchange="loadFile(event)"/>
        <img src="https://source.unsplash.com/200x200?person" id="output" width="200"> --}}
        @if($users->photos)
            <input id="photos" type="hidden" name="oldImage" value="{{ $users->photos }}">
            <img src="{{ asset('storage/' . $users->photos) }}" alt="{{ $users->name }}" id="output" width="200" />
        @else
            <img src="https://source.unsplash.com/200x200?person" id="output" width="200">
        @endif
    </div>
    <div id="user" class="container profile">
        <div class="row mt-2">
            <div class="col">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Detail</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <table class="table table-hover table-sm table-properties">
                                <tr>
                                    <th>Name</th>
                                    <td><input type="text" class="text-decoration-none border-0 w-75 @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $users->name) }}"></td>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><input type="email" class="text-decoration-none border-0 w-50 @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $users->email) }}"></td>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </tr>
                                <tr>
                                    <th>Username</th>
                                    <td><input type="text" class="text-decoration-none border-0 @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username', $users->username) }}"></td>
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td><input type="text" class="text-decoration-none border-0 w-100 @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', $users->address) }}"></td>
                                    @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td><input type="tel" class="text-decoration-none border-0 w-50 @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $users->phone) }}"></td>
                                    @error('phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </tr>
                        </table>
                    </div>
                   @if(request()->routeIs('profile.tech'))
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <table class="table table-hover table-sm table-properties">
                            <tr>
                                <th>Spesialisasi</th>
                                <td>{{ $users->category }}</td>
                            </tr>
                            <tr>
                                <th>Sertifikasi</th>
                                <td><input type="text" class="text-decoration-none border-0 w-50 @error('certification') is-invalid @enderror" id="certification" name="certification" value="{{ old('certification', $users->certification) }}"></td>
                                @error('certification')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td><input type="text" class="text-decoration-none border-0 w-50 @error('desc') is-invalid @enderror" id="desc" name="desc" value="{{ old('desc', $users->desc) }}"></td>
                                @error('desc')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </tr>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-success d-block w-100">Save</button>
            </div>
        </div>
    </div>
</form>

<script>
    var loadFile = function (event) {
        var image = document.getElementById("output");
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
@endsection
