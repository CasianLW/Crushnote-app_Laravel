<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Mail\MessageSent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;

class MessageController extends Controller
{
    public function create()
{
    return view('create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'email' => 'required|email',
        'message' => 'required|min:15',
    ]);

    $message = Message::create([
        'message' => $validated['message'],
        'token' => Crypt::encryptString(Str::random(32)),
    ]);

    Mail::to($validated['email'])->send(new MessageSent($message));

    return redirect()->route('message.show', $message->token);
}

public function show(Request $request, $token)
{
    $message = Message::where('token', $token)->firstOrFail();

    if ($message->read_at) {
        abort(404);
    }

    $message->read_at = now();
    $message->save();

    return view('show', ['message' => $message]);
}
}
