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
                <p>Expires at: {{ $message->updated_at->addHours(1)->format('d/m/Y H:i:s') }}</p>
            </div>
        </div>
    </div>
@endsection