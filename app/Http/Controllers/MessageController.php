<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Mail\MessageSent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function create()
{
    return view('create');
    // return view('create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'email' => 'required|email',
        'message' => 'required|min:15',
    ]);

    $message = new Message([
        'message' => $validated['message'],
        'token' => Str::random(32),
    ]);

    $message->save();

    Mail::to($validated['email'])->send(new MessageSent($message));

    return redirect()->route('messages.create')->with('status', 'Your message has been sent!');
}

public function show(Request $request, $token)
{
    $message = Message::where('token', $token)->firstOrFail();

 
    $message->delete();

    return view('show', ['message' => $message]);
}
}
