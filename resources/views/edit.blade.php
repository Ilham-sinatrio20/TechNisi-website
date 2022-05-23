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
        <div class="profile-pic my-3">
            <label class="-label" for="file">
                <span class="glyphicon glyphicon-camera"></span>
                <span>Change Image</span>
            </label>
            <input id="file" type="file" onchange="loadFile(event)"/>
            <img src="https://cdn.pixabay.com/photo/2017/08/06/21/01/louvre-2596278_960_720.jpg" id="output" width="200" />
        </div>
<div id="user" class="container profile">
    <div class="row mt-2">
        <div class="col">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="false">Address</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="links-tab" data-toggle="tab" href="#links" role="tab" aria-controls="links" aria-selected="false">Links</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <table class="table table-hover table-sm table-properties">
                        <tr>
                            <th>sub</th>
                            <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 20rem;"></td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td><input type="text" class="text-decoration-none border-0" name="name" value="{{ $cust->name }}"></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><input type="email" class="text-decoration-none border-0" name="email" value="{{ $cust->email }}"></td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td><input type="text" class="text-decoration-none border-0" name="username" value="{{ $cust->username }}"></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><input type="text" class="text-decoration-none border-0" name="address" value="{{ $cust->address }}"></td>
                        </tr>
                        <tr>
                            <th>gender</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>birthdate</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>locale</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>zoneinfo</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>given name</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>middle name</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>family name</th>
                            <td></td>
                        </tr>
                    </table>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <table class="table table-hover table-sm table-properties">
                        <tr>
                            <th>email</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>email verified</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>phone number</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>phone number verified</th>
                            <td></td>
                        </tr>
                    </table>
                </div>

                <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                    <table class="table table-hover table-sm table-properties">
                        <tr>
                            <th>country</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>postal code</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>locality</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>region</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>street address</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>formatted</th>
                            <td></td>
                        </tr>
                    </table>
                </div>

                <div class="tab-pane fade" id="links" role="tabpanel" aria-labelledby="links-tab">
                    <table class="table table-hover table-sm table-properties">
                        <tr>
                            <th></th>
                            <td><a></a></td>
                        </tr>
                        <tr>
                            <th>me</th>
                            <td><a></a></td>
                        </tr>
                        <tr>
                            <th>website</th>
                            <td><a></a></td>
                        </tr>
                        <tr>
                            <th>profile</th>
                            <td><a></a></td>
                        </tr>
                        <tr>
                            <th>webmail</th>
                            <td><a></a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-12">
            <button type="submit" class="btn btn-success d-block w-100">Save</button>
        </div>
    </div>
</div>


<script>
    var loadFile = function (event) {
        var image = document.getElementById("output");
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
@endsection
