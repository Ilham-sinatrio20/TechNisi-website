@extends('layouts.layout')

@section('main-content')
    <main class="content">
        @livewire('chat-page')
    </main>

    <style type="text/css">
        /* body{
            margin-top:20px;
            margin-bottom: 20px;
        } */

        .chat-online {
            color: #34ce57;
            font-size: 10px;
        }

        .chat-offline {
            color: #e4606d;
            font-size: 10px;
        }

        .chat-messages {
            display: flex;
            flex-direction: column;
            max-height: 450px;
            overflow-y: scroll
        }

        .chat-members{
            display: flex;
            flex-direction: column;
            max-height: 300px;
            overflow-y: scroll
        }

        .chat-members::-webkit-scrollbar {
            background-color: #e6e6e6;
            width: 2px;
        }

        .chat-box {
            min-height: 300px;
        }

        .chat-messages::-webkit-scrollbar {
            background-color: #e6e6e6;
            width: 2px;
        }

        .chat-message-left,
        .chat-message-right {
            display: flex;
            max-width: 60%;
            min-width: 40%;
            font-size: 12px;
        }

        .chat-message-left {
            margin-right: auto
        }

        .chat-message-right {
            flex-direction: row-reverse;
            margin-left: auto
        }
        .py-3 {
            padding-top: 1rem!important;
            padding-bottom: 1rem!important;
        }
        .px-4 {
            padding-right: 1.5rem!important;
            padding-left: 1.5rem!important;
        }
        .flex-grow-0 {
            flex-grow: 0!important;
        }
        .border-top {
            border-top: 1px solid #dee2e6!important;
        }

        .icon {
            font-size: 11px;
        }
    </style>

    <script>
        function myFunction() {
          $('#content_to_scroll').animate({scrollTop: $('#content_to_scroll').prop("scrollHeight")}, 500);
        }
    </script>

    {{-- @livewireScripts --}}

    {{-- @toastr_js
        @toastr_render
        <script>
            window.addEventListener('alert', event => {
                toastr[event.detail.type](event.detail.message,
                    event.detail.title ?? ''), toastr.options = {
                        "closeButton": true,
                        "progressBar": true,
                }
            });
        </script> --}}
@endsection
