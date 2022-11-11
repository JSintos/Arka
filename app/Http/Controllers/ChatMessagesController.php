<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat_Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ChatMessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function communityChat($id)
    {
        $community = DB::table('communities')->where('communityId', $id)->first();

        return view('chats')->with(array('community' => $community));
    }

    public function fetchChatMessages()
    {
        return Chat_Message::with('community')->get();
    }

    public function sendChatMessage(Request $request)
    {
        $user = Auth::user();

        $chatMessageRow = DB::table('chat__messages')->where('communityId', $request->input('communityId'))->first();

        $existingChatMessages = \json_decode($chatMessageRow->messages);

        array_push($existingChatMessages, []);

        // $chatMessage = $user->chatMessages()->create([
        //     'messages' =>
        // ]);

        // $message = $user->messages()->create([
        //     'message' => $request->input('message')
        // ]);

        // broadcast(new MessageSent($user, $message))->toOthers();

        return ['status' => 'Message Sent!'];
    }
}
