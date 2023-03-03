@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-3">
            <div class="card-header">
                <h3 class="card-title">Your secret message</h3>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $message->message }}</p>
                <hr>
                <p>The note was automatically deleted, make sure you read the message before leaving 😉 </p>
            </div>
        </div>
    </div>
@endsection