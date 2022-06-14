@extends('layouts.layout')
@section('main-content')
<div class="container">
    <ul class="nav nav-tabs mt-3">
        <li class="nav-item"><a data-toggle="tab" aria-current="page" class="nav-link active" href="#seluruh">Seluruh</a></li>
        <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#ringan">Ringan</a></li>
        <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#sedang">Sedang</a></li>
        <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#berat">Berat</a></li>
    </ul>
    <div class="tab-content mt-5 mb-5">
        @if ($dataseluruh->count() > 0)
        <div id="seluruh" class="tab-pane active">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID Transaksi</th>
                        <th scope="col">Level</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataseluruh as $dt)
                    @php
                        $time = strtotime($dt->created_at);
                    @endphp

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dt->trans_id }}</td>
                        <td>{{ $dt->level }}</td>
                        <td>{{ date("d M Y", $time) }}</td>
                        @if ($dt->status == "Order")
                            <td class="text-warning">{{ $dt->status }}</td>
                        @elseif ($dt->status == "Pickup")
                            <td class="text-info" cl>{{ $dt->status }}</td>
                        @elseif ($dt->status == "On Service")
                            <td class="text-primary">{{ $dt->status }}</td>
                        @elseif ($dt->status == "Complete")
                            <td class="text-success">{{ $dt->status }}</td>
                        @else
                            <td class="text-danger">{{ $dt->status }}</td>
                        @endif
                        <th>
                            <a href="/detail-transaksi/{{ Auth::user()->username }}/{{$dt->trans_id }}" class="btn fs-small btn-info text-decoration-none" title="Show Detail">
                                <span class="fa fa-fw fa-eye mx-1"></span>
                            </a>
                            @if (Auth::user()->id_role = 3)
                                <a href="" class="btn fs-small btn-warning text-decoration-none" title="Edit Transaksi">
                                <span class="fa fa-fw fa-pencil-square-o mx-1"></span>
                                </a>
                            @endif
                        </th>
                    </tr>
                    @endforeach
                    <tr class="table-success">
                        <th colspan="5">
                            <center>Total</center>
                        </th>
                        <td scope="col">{{ $dataseluruh->count() }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="ringan" class="tab-pane">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID Transaksi</th>
                        <th scope="col">Level</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($levelringan as $dt)
                    @php
                        $time = strtotime($dt->created_at);
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dt->trans_id }}</td>
                        <td>{{ $dt->level }}</td>
                        <td>{{ date("d M Y", $time) }}</td>
                        @if ($dt->status == "Order")
                            <td class="text-warning">{{ $dt->status }}</td>
                        @elseif ($dt->status == "Pickup")
                            <td class="text-info" cl>{{ $dt->status }}</td>
                        @elseif ($dt->status == "On Service")
                            <td class="text-primary">{{ $dt->status }}</td>
                        @elseif ($dt->status == "Complete")
                            <td class="text-success">{{ $dt->status }}</td>
                        @else
                            <td class="text-danger">{{ $dt->status }}</td>
                        @endif
                        <th>
                            <a href="/detail-transaksi/{{ Auth::user()->username }}/{{$dt->trans_id }}" class="btn fs-small btn-info text-decoration-none" title="Show Detail">
                                <span class="fa fa-fw fa-eye mx-1"></span>
                            </a>
                            @if (Auth::user()->id_role = 3)
                                <a href="" class="btn fs-small btn-warning text-decoration-none" title="Edit Transaksi">
                                <span class="fa fa-fw fa-pencil-square-o mx-1"></span>
                                </a>
                            @endif
                        </th>
                    </tr>
                    @endforeach
                    <tr class="table-success">
                        <th colspan="5">
                            <center>Total</center>
                        </th>
                        <td scope="col">{{ $levelringan->count() }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="sedang" class="tab-pane">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID Transaksi</th>
                        <th scope="col">Level</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($levelsedang as $dt)
                    @php
                        $time = strtotime($dt->created_at);
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dt->trans_id }}</td>
                        <td>{{ $dt->level }}</td>
                        <td>{{ date("d M Y", $time) }}</td>
                        @if ($dt->status == "Order")
                            <td class="text-warning">{{ $dt->status }}</td>
                        @elseif ($dt->status == "Pickup")
                            <td class="text-info" cl>{{ $dt->status }}</td>
                        @elseif ($dt->status == "On Service")
                            <td class="text-primary">{{ $dt->status }}</td>
                        @elseif ($dt->status == "Complete")
                            <td class="text-success">{{ $dt->status }}</td>
                        @else
                            <td class="text-danger">{{ $dt->status }}</td>
                        @endif
                        <th>
                            <a href="/detail-transaksi/{{ Auth::user()->username }}/{{$dt->trans_id }}" class="btn fs-small btn-info text-decoration-none" title="Show Detail">
                                <span class="fa fa-fw fa-eye mx-1"></span>
                            </a>
                            @if (Auth::user()->id_role = 3)
                                <a href="" class="btn fs-small btn-warning text-decoration-none" title="Edit Transaksi">
                                <span class="fa fa-fw fa-pencil-square-o mx-1"></span>
                                </a>
                            @endif
                        </th>
                    </tr>
                    @endforeach
                    <tr class="table-success">
                        <th colspan="5">
                            <center>Total</center>
                        </th>
                        <td scope="col">{{ $levelsedang->count() }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="berat" class="tab-pane">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID Transaksi</th>
                        <th scope="col">Level</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($levelberat as $dt)
                    @php
                        $time = strtotime($dt->created_at);
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dt->trans_id }}</td>
                        <td>{{ $dt->level }}</td>
                        <td>{{ date("d M Y", $time) }}</td>
                        @if ($dt->status == "Order")
                            <td class="text-warning">{{ $dt->status }}</td>
                        @elseif ($dt->status == "Pickup")
                            <td class="text-info" cl>{{ $dt->status }}</td>
                        @elseif ($dt->status == "On Service")
                            <td class="text-primary">{{ $dt->status }}</td>
                        @elseif ($dt->status == "Complete")
                            <td class="text-success">{{ $dt->status }}</td>
                        @else
                            <td class="text-danger">{{ $dt->status }}</td>
                        @endif
                        <th>
                            <a href="/detail-transaksi/{{ Auth::user()->username }}/{{$dt->trans_id }}" class="btn fs-small btn-info text-decoration-none" title="Show Detail">
                                <span class="fa fa-fw fa-eye mx-1"></span>
                            </a>
                            @if (Auth::user()->id_role = 3)
                                <a href="" class="btn fs-small btn-warning text-decoration-none" title="Edit Transaksi">
                                <span class="fa fa-fw fa-pencil-square-o mx-1"></span>
                                </a>
                            @endif
                        </th>
                    </tr>
                    @endforeach
                    <tr class="table-success">
                        <th colspan="5">
                            <center>Total</center>
                        </th>
                        <td scope="col">{{ $levelberat->count() }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Transaksi</th>
                    <th scope="col">Level</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody>
                    <tr class="table-success">
                        <th colspan="5">
                            <center class="text-danger">Data not Found</center>
                        </th>
                    </tr>
            </tbody>
        </table>
        @endif
    </div>

</div>
@endsection
