<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class MessageIndex extends Component {
    use WithFileUploads;

    public function __construct() {
        ini_set('max_execution_time', 150);
    }

    public $cust;
    public $tech;
    public $message = '';
    public $admin;
    public $clicked;
    public $file;
    public $users;
    public $data;

    public function render() {
        return view('livewire.message-index', [
            'data' => $this->data,
            'users' => $this->users,
            'tech' => $this->tech,
            'title' => 'Chatting'
        ]);
    }

    public function mounting(){
        $this->mountContent();
    }

    public function mountContent(){
        if(auth()->user()->id_role == 2){
            $this->message = Message::where('sender', auth()->user()->id)
                                            ->orWhere('receiver', $this->cust)
                                            ->orderBy('created_at', 'desc')
                                            ->get();
        } else if(auth()->user()->id_role == 3){
            $this->message = Message::where('sender', auth()->user()->id)
                                            ->orWhere('receiver', $this->tech)
                                            ->orderBy('created_at', 'desc')
                                            ->get();
        } else if(auth()->user()->id_role == 1){
            $this->message = Message::where('sender', auth()->user()->id)
                                            ->orWhere('receiver', $this->admin)
                                            ->orderBy('created_at', 'desc')
                                            ->get();
        }
    }

    public function sendMessage(){
        $new_msg = new Message();
        $new_msg->message = $this->message;
        $new_msg->sender = auth()->user()->id;

        if(auth()->user()->id_role == 2){
            $new_msg->receiver = $this->cust;
        } else if(auth()->user()->id_role == 3){
            $new_msg->receiver = $this->tech;
        } else if(auth()->user()->id_role == 1){
            $new_msg->receiver = $this->admin;
        }

        if($this->file) {
            $file = $this->file->store('public/assets/docs');
            $path = url(Storage::url($file));
            $new_msg->file = $path;
            $new_msg->file_name = $this->file->getClientOriginalName();
        }
        $new_msg->save();

        $this->reset(['message']);
        $this->file = '';
    }

    public function getUser($id){
        $this->clicked = User::where('id', $id);
        if(auth()->user()->id_role == 2){
            $this->message = Message::where('sender', auth()->user()->id)
                                            ->orWhere('receiver', $id)
                                            ->orderBy('created_at', 'desc')
                                            ->get();
        } else if(auth()->user()->id_role == 3){
            $this->message = Message::where('sender', auth()->user()->id)
                                            ->orWhere('receiver', $this->tech)
                                            ->orderBy('created_at', 'desc')
                                            ->get();
        }

    }

    public function resetFiles(){
        $this->reset('file');
    }
}
