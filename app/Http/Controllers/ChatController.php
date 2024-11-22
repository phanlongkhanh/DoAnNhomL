<?php

namespace App\Http\Controllers;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
   
    public function send(Request $request, $livestreamId)
    {
        $request->validate([
            'message' => 'required|max:1000',
        ]);

        Message::create([
            'id_user' => auth()->id(),
            'id_livestreams' => $livestreamId,
            'message' => $request->message,
        ]);

        return redirect()->back();
    }
}
