<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        return view('message.home-msg', [
            'title' => 'Message'
        ]);
    }
}

/*

     // public function __construct() {
    //     ini_set('max_execution_time', 150);
    // }
    // $data = User::select('users.id AS id', 'users.name', 'users.phone', 'm.receiver', 'ussr.name AS senderName', 'ussr.id',
        // 'm.msg_id AS msg_id', 'm.msg_content AS msg_content', 'm.created_at', 'm.is_seen', 'msg.sender')
        // ->join('message AS m', 'm.receiver', '=', 'users.id')
        // ->join('users AS ussr', 'ussr.id', '=', 'm.sender')
        // ->join('message AS msg', 'msg.sender', '=', 'users.id')
        // ->where('m.receiver', auth()->user()->id)
        // ->orderBy('m.created_at', 'DESC')->get();

        // $messages = Message::select('u.id AS id', 'u.name AS receive', 'usr.name AS senderName', 'u.phone', 'receiver',
        // 'msg_id', 'msg_content', 'message.created_at', 'is_seen', 'sender')
        // ->join('users AS u', 'receiver', '=', 'u.id')
        // ->join('users AS usr', 'sender', '=', 'usr.id')
        // ->where('receiver', auth()->id())->orderBy('msg_id', 'DESC')->get();

        // if(auth()->user()->id_role == 2 || auth()->user()->id_role == 3){
        //     return view('message.home-msg', [
        //         'data' => $data,
        //         'message' => $messages,
        //         'title' => 'Chatting'
        //     ]);
        // }

        public function show($id){
        if(auth()->user()->id_role > 3){
            abort(404);
        }

        $sender = Message::all()->where('msg_id', $id)->first();

        $users = User::select('users.id', 'users.name', 'users.phone', 'm.receiver',
        'm.msg_id', 'm.msg_content', 'm.created_at', 'm.is_seen', 'msg.sender', 'users.id_role')
        ->join('message AS m', 'm.receiver', '=', 'id')
        ->join('message AS msg', 'msg.sender', '=', 'id')
        ->where('users.id_role', auth()->user()->id_role)
        ->orderBy('id', 'DESC')->get();

        if (auth()->user()->id_role == 2 || auth()->user()->id_role == 3) {
            $message = Message::where('receiver', $sender->id)->orWhere('sender', $sender->id)->orderBy('msg_id', 'DESC')->get();

            // $message = Message::select('msg_id', 'msg_content', 'is_seen', 'dir', 'file',
            // 'sender', 'receiver', 'file_name', 'created_at', 'updated_at')->where('receiver', auth()->id())->orderBy('msg_id', 'DESC')->get();
        }

        return view('message.show-msg', [
            'data' => $message,
            'sender' => $sender,
            'users' => $users,
            'title' => 'Chatting'
        ]);
    }
*/
