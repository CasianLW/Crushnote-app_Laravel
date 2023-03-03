resources/views/create.blade.php

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Send a Secret Message</h1>
        <form method="post" action="{{ route('messages.store') }}">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            @if($errors->has('email'))
                <span>{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div>
            <label for="message">Message:</label>
            <textarea id="message" name="message" required>{{ old('message') }}</textarea>
            @if($errors->has('message'))
                <span>{{ $errors->first('message') }}</span>
            @endif
        </div>
        <div>
            <button type="submit">Send</button>
        </div>
    </form>
    </div>
@endsection
