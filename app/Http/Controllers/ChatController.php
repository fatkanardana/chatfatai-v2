<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class ChatController extends Controller
{
    public function index()
    {
        $messages = Message::orderBy('created_at', 'asc')->get();
        return view('chat', compact('messages'));
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255',
            'sender' => 'required|string|max:100',
        ]);

        Message::create([
            'content' => $request->content,
            'sender' => $request->sender,
            'receiver' => $request->receiver ?? null,
        ]);

        return response()->json(['status' => 'success']);
    }

    public function fetchMessages()
    {
        return Message::orderBy('created_at', 'asc')->get();
    }
}
