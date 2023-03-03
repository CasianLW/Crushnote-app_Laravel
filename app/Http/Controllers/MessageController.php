<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Mail\MessageSent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MessageController extends Controller
{
    public function create()
{

    return view('create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'email' => ['required','email','regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'],
        'message' => 'required|min:15',
    ]);

    $message = new Message([
        'message' => $validated['message'],
        'token' => Str::random(32),
    ]);

    $message->save();

    Mail::to($validated['email'])->send(new MessageSent($message));

    return redirect()->route('messages.create')->with('success', 'Message sent successfully!');
}

public function show(Request $request, $token)
{
    try{
    $message = Message::where('token', $token)->firstOrFail();

 
    $message->delete();

    return view('show', ['message' => $message]);
} catch (ModelNotFoundException $exception){
    return redirect('/sorry');

}
}
}
