@extends('layouts.layout')
@section('main-content')
<head>
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @livewireStyles
</head>
    <div class="container-fluid">
        <div class="container">
            @livewire('show', [
                'data' => $message,
                'sender' => $sender,
                'users' => $users,
                'title' => 'Chatting'
            ])
        </div>
    </div>
    @livewireScripts
@endsection

            {{-- @livewire('show-message', [
            'cust' => $cust,
            'tech' => $tech,
            'message' => $message,
            'sender' => $sender,
        ]) --}}
