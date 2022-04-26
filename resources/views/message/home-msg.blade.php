@extends('layouts.layout')

@section('main-content')
    <head>
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        @livewireStyles
    </head>
    <div class="container-fluid">
        <div class="container">
            @livewire('message-index', [
                'data' => $data,
                'message' => $messages ?? null,
                'title' => 'Chatting'
            ])
        </div>
    </div>
    @livewireScripts
@endsection
