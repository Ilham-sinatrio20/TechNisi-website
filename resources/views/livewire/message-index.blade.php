{{-- @extends('layouts.layout')
@section('main-content')
<head>
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @livewireStyles
</head> --}}
    <div class="container-fluid mx-auto my-3">
        <div class="row justify-content-center" wire:poll="mountContent()">
            @if(auth()->user()->id_role == 2 || auth()->user()->id_role == 3)
                <div class="col-md-4" wire:init>
                    <div class="card">
                        <div class="card-header">
                            Message List
                        </div>
                        <div class="card-body chatbox p-0">
                            <ul class="list-group" wire:poll="render">
                                @foreach($data as $user)
                                    @php
                                        $is_seen = App\Models\Message::where('sender', $user->user_id)->where('receiver', auth()->id())->where('is_seen', false)->get() ?? null
                                    @endphp
                                    <a href="{{ route('inbox.show', $user->msg_id) }}" class="text-dark link">
                                        <li class="list-group-item" wire:click="getUser({{ $user->id }})" id="user_{{ $user->id }}">
                                            <div class="row d-flex justify-content-around">
                                                <div class="col-md-3"><img class="img-fluid avatar" src="https://cdn.pixabay.com/photo/2017/06/13/12/53/profile-2398782_1280.png"></div>
                                                <div class="col-md-9">
                                                    <p style="font-size: 14px;">{{ $user->senderName }}</p>
                                                    <p class="text-truncate" style="font-size: 12px;">{{ $user->msg_content }}</p>
                                                </div>
                                            </div>
                                                {{-- @if($user->is_online) <i class="fa fa-circle text-success online-icon"></i> @endif {{ $user->name }} --}}
                                            @if(filled($is_seen))
                                                <div class="badge badge-success rounded">{{ $is_seen->count() }}</div>
                                            @endif
                                        </li>
                                    </a>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        @if(isset($clicked)) {{ $clicked->name }}

                        @elseif(auth()->user()->id_role == 2)
                            Select a user to see the chat
                        @elseif(auth()->user()->id_role == 3)
                            Select a user to see the chat
                        @else
                            Messages
                        @endif
                    </div>
                        <div class="card-body message-box">
                            @if(!$message)
                                No messages to show
                            @else
                                @if(isset($message))
                                    @foreach($message as $messages)
                                        <div class="single-message @if($messages->user_id !== auth()->id()) received @else sent @endif">
                                            <p class="font-weight-bolder my-0">{{ $messages->msg_content }}</p>
                                            <p class="my-0">{{ $messages->message }}</p>
                                            {{-- @if (isPhoto($messages->file))
                                                <div class="w-100 my-2">
                                                    <img class="img-fluid rounded" loading="lazy" style="height: 250px" src="{{ $message->file }}">
                                                </div>
                                            @elseif (isVideo($messages->file))
                                                <div class="w-100 my-2">
                                                    <video style="height: 250px" class="img-fluid rounded" controls>
                                                        <source src="{{ $messages->file }}">
                                                    </video>
                                                </div>
                                            @elseif ($messages->file)
                                                <div class="w-100 my-2">
                                                    <a href="{{ $messages->file}}" class="bg-light p-2 rounded-pill" target="_blank"><i class="fa fa-download"></i>
                                                        {{ $messages->file_name }}
                                                    </a>
                                                </div>
                                            @endif --}}
                                            <small class="text-muted w-100">Sent <em>{{ $messages->created_at }}</em></small>
                                        </div>
                                    @endforeach
                                @else
                                    No messages to show
                                @endif
                                @if(!isset($clicked) and auth()->user()->id_role == 2 || !isset($clicked) and auth()->user()->id_role == 3)
                                    Click on a user to see the messages
                                @endif
                            @endif
                        </div>
                    @if(auth()->user()->id_role == 2 || auth()->user()->id_role == 3)
                        <div class="card-footer">
                            <form wire:submit.prevent="SendMessage" enctype="multipart/form-data">
                                <div wire:loading wire:target='SendMessage'>
                                    Sending message . . .
                                </div>
                                <div wire:loading wire:target="file">
                                    Uploading file . . .
                                </div>
                                {{-- @if($file)
                                    <div class="mb-2">
                                    You have an uploaded file <button type="button" wire:click="resetFile" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Remove {{ $file->getClientOriginalName() }}</button>
                                    </div>
                                @else
                                    No file is uploaded.
                                @endif --}}
                                <div class="row">
                                    <div class="col-md-7">
                                        <input wire:model="message" class="form-control input shadow-none w-100 d-inline-block" placeholder="Type a message">
                                    </div>
                                    {{-- @if(empty($file)) --}}
                                    <div class="col-md-1">
                                        <button type="button" class="border" id="file-area">
                                            <label>
                                                <i class="fa fa-file-upload"></i>
                                                <input type="file" wire:model="file">
                                            </label>
                                        </button>
                                    </div>
                                   {{-- @endif --}}
                                    <div class="col-md-4">
                                        <button class="btn btn-primary d-inline-block w-100"><i class="far fa-paper-plane"></i> Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    {{-- @livewireScripts
@endsection --}}
