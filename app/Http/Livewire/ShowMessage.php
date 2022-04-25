<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ShowMessage extends Component {
    use WithFileUploads;

    public $cust;
    public $tech;
    public $message = '';
    public $admin;
    public $sender;
    public $is_seen;
    public $file;
    public $file_name;

    public function __construct() {
        ini_set('max_execution_time', 150);
    }

    public function render() {
        return view('livewire.show-message', [
            'cust' => $this->cust,
            'tech' => $this->tech,
            'message' => $this->message,
            'sender' => $this->sender,
        ]);
    }

    public function mounting(){
        $this->mountContent();
    }

    public function mountContent(){
        if(auth()->user()->id_role == 2){
            $this->message = Message::where('sender', $this->sender->id)
                                            ->orWhere('receiver', $this->sender->id)
                                            ->orderBy('created_at', 'desc')
                                            ->get();
            // $this->message = Message::where('receiver', auth()->user()->id)
            //                                 ->orderBy('created_at', 'desc')
            //                                 ->get();
        } else if(auth()->user()->id_role == 3){
            $this->message = Message::where('sender', $this->sender->id)
                                            ->orWhere('receiver', $this->sender->id)
                                            ->orderBy('created_at', 'desc')
                                            ->get();
            // $this->message = Message::where('receiver', auth()->user()->id)
            //                                 ->orderBy('created_at', 'desc')
            //                                 ->get();
        }
        // } else if(auth()->user()->id_role == 1){
        //     $this->message = Message::where('receiver', auth()->user()->id)
        //                                     ->orderBy('created_at', 'desc')
        //                                     ->get();
        // }
        $is_seen = Message::Where('receiver', auth()->user()->id)
                            ->where('receiver', auth()->user()->id)
                            ->get();
        $is_seen->update(['is_seen' => true]);
    }

    public function sendMessage(){
        $new_msg = new Message();
        $new_msg->message = $this->message;
        $new_msg->sender = auth()->user()->id;
        $new_msg->receiver = auth()->user();

        if($this->file){
            $upload = $this->uploadFile();
            $new_msg->file = $upload[0];
            $new_msg->file_name = $upload[1];
        }
        $new_msg->save();

        $this->reset('message');
        $this->file = '';

    }

    public function uploadFile() {
        $file = $this->file->store('public/assets/docs');
        $path = url(Storage::url($file));
        $file_name = $this->file->getClientOriginalName();
        return [$path, $file_name];
    }
}
