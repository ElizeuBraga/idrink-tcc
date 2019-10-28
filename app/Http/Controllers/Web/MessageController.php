<?php

namespace App\Http\Controllers\Web;
use \App\Events\SendMessage;
use App\Message;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    
    public function messageGet(){
        // broadcast(new SendMessage);
        return view('home');
    }

    public function messageSend(Request $request){
        $message = Message::create($request->all());
        event(new SendMessage($message));

        return redirect()->back();
    }
}
