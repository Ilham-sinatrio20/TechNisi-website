@extends('layouts.layoutTeknisi')
@section('main-content')
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Trans Id</th>
                <th scope="col">Level</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $dt)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $dt->trans_id }}</td>
                <td>{{ $dt->level }}</td>
                <td>{{ $dt->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection