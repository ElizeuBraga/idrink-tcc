<?php

namespace App\Http\Controllers\Web;
use \App\Events\SendMessage;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    
    public function messageGet(){
        broadcast(new SendMessage);
        return 'done';
        // return view('teste');
    }

    public function messageSend(Request $request){
        // dd($request->all()); 
        $message = Message::create($request->all());

        event(new eventSendMessage($message));
    }

    public function messages(){
        return response()->json();
    }
}
