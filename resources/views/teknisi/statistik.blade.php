@extends('layouts.layoutTeknisi')
@section('main-content')
<div class="container">

    <ul class="nav nav-tabs nav-justified mt-3">
        <li class="active"><a data-toggle="tab" href="#seluruh">Seluruh</a></li>
        <li><a data-toggle="tab" href="#ringan">Ringan</a></li>
        <li><a data-toggle="tab" href="#sedang">Sedang</a></li>
        <li><a data-toggle="tab" href="#berat">Berat</a></li>
    </ul>

    <div class="tab-content mt-5 mb-5">
        <div id="seluruh" class="tab-pane fade in active">
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
                    @foreach ($dataseluruh as $dt)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dt->trans_id }}</td>
                        <td>{{ $dt->level }}</td>
                        <td>{{ $dt->status }}</td>
                        @php
                        $total++;
                        @endphp
                        @endforeach
                    </tr>
                    <tr class="table-success">
                        <th colspan="3">
                            <center>Total</center>
                        </th>
                        <td scope="col">{{ $total }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="ringan" class="tab-pane fade">
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
                    @foreach ($levelringan as $dt)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dt->trans_id }}</td>
                        <td>{{ $dt->level }}</td>
                        <td>{{ $dt->status }}</td>
                        @php
                        $total++;
                        @endphp
                        @endforeach
                    </tr>
                    <tr class="table-success">
                        <th colspan="3">
                            <center>Total</center>
                        </th>
                        <td scope="col">{{ $total }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="sedang" class="tab-pane fade">
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
                    @foreach ($levelsedang as $dt)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dt->trans_id }}</td>
                        <td>{{ $dt->level }}</td>
                        <td>{{ $dt->status }}</td>
                        @php
                        if ($levelsedang){}
                        $total++;
                        @endphp
                        @endforeach
                    </tr>
                    <tr class="table-success">
                        <th colspan="3">
                            <center>Total</center>
                        </th>
                        <td scope="col">{{ $total }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="berat" class="tab-pane fade">
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
                    @foreach ($levelberat as $dt)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dt->trans_id }}</td>
                        <td>{{ $dt->level }}</td>
                        <td>{{ $dt->status }}</td>
                        @php
                        $total++;
                        @endphp
                        @endforeach
                    </tr>
                    <tr class="table-success">
                        <th colspan="3">
                            <center>Total</center>
                        </th>
                        <td scope="col">{{ $total }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection