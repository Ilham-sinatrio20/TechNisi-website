<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ChatPage extends Component {

    public $noChat = false;

    public $receiver;
    public $current_user;
    public $message;
    public $thread;
    public $receiver_id;
    public $notification;

    protected $rules = ['message' => 'required'];


    public function startChat($id)
    {
        $this->noChat = true;

        $this->receiver = $id;

        $this->current_user = Auth::user()->id;

        // change to chat read
        $notifications = Message::where('thread', $this->current_user.'-'.$this->receiver)->orWhere('thread', $this->receiver.'-'.$this->current_user)->update(['is_seen' => '1']);

    }

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function sendChat () {
        $this->validate();

        $thread_value = $this->current_user . '-' .$this->receiver;

        if($this->thread = 0){
            Message::create([
                'thread' => $thread_value,
                'message' => $this->message,
                'receiver' => $this->receiver,
                'sender' => $this->current_user
            ]);
        }else{
            Message::create([
                'thread' => $thread_value,
                'message' => $this->message,
                'receiver' => $this->receiver,
                'sender' => $this->current_user
            ]);
        }

        $this->clearForm();

    }

    public function clearForm () {
        $this->message = "";
    }

    public function deleteMessage ($id) {
        Message::find($id)->update(['message' => '0']);
    }

    public function clearChats () {
        // All variables
        $user = Auth::user()->id;

        $receiver = $this->receiver;

        $get_messages = Message::where('thread', $user.'-'.$receiver)->orWhere('thread', $receiver.'-'.$user)->get();

        // Favorite::where('message', $get_messages)->destroy();
        foreach($get_messages as $message){
            $message->delete();
        }
    }

    public function render()
    {
        // All variables
        $user = Auth::user()->id;
        $ussr = Auth::user()->id_role;
        $receiver = $this->receiver;

        $current = User::find($receiver);

        if($ussr == 1){
            $get_messages = User::where('id', '!=', $user)->get();
        } else if($ussr == 2 || $ussr == 3){
            $users = User::where('id', '!=', $user)->where('id_role', '!=', $ussr)->where('id_role', '!=', 1)->get();
        }
        // get all users


        // get all chats
        $messages = Message::where('thread', $user.'-'.$receiver)->orWhere('thread', $receiver.'-'.$user)->get();

        return view('livewire.chat-page', compact('messages', 'users', 'current'));
        // return view('livewire.chat-page', [
        //     'messages' => $messages,
        //     'users' => $users,
        //     'current' => $current
        // ]);
    }

}
