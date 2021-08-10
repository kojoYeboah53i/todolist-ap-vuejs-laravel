<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatRoom;
use App\Models\ChatMessage;
use Illuminate\Support\Facades\Auth;
use App\Event\NewChatMessage;

class ChatController extends Controller
{
    //
    public function index(){
        return response()->json(["data"=> "api is hitting rooms function in chatController"]); 
        // return "hello world";
    }
    public function rooms (Request $request){
        return ChatRoom::all();
        // return response()->json(["data"=> "api is hitting rooms function in chatController"]); 
    }
    //get chat messages
    public function messages(Request $request, $roomId ){
        return ChatMessage::where('chat_room_id', $roomId)
               ->with('user')
               ->orderBy('created_at', 'DESC')
               ->get();

    }
    //store new chat room
    public function newMessage(Request $request, $roomId){
        
        $newMessage          = new ChatMessage;
        $newMessage->user_id = Auth::id();
        $newMessage->chat_room_id = $roomId;
        $newMessage->message = $request->message;
        $newMessage->save();
        
        broadcast(new NewChatMessage( $newMessage  ))->toOthers();
        return $newMessage;
    }

    public function store(Request $request){
        return response()->json(["data"=> "api is hitting rooms function in chatController",
        $request->all()]);
    
    }

    //create update function
    public function update(Request $request, $id){

    }

    //create delete function
    public function destroy($id){


    }
}
