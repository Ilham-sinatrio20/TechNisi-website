@extends('layouts.layout')
@section('main-content')
<head>
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @livewireStyles
</head>
    <div class="container-fluid">
        <div class="container">
            @livewire('show-message', [
            'message' => $message,
            'sender' => $receive,
            'users' => $users
        ])
        </div>
    </div>
@endsection
