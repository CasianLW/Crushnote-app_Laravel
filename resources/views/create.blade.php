
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
                <span class="info-message">{{ $errors->first('email') }}</span>
                <script>
                        setTimeout(function() {
                           document.getElementById('info-message').style.display = 'none';
                       }, 3000);
    </script>
            @endif
        </div>
        
        <div>
            <label for="message">Message:</label>
            <textarea id="message" name="message" required>{{ old('message') }}</textarea>
            @if($errors->has('message'))
                <span  id="info-message">{{ $errors->first('message') }}</span>
                <script>
                        setTimeout(function() {
                           document.getElementById('info-message').style.display = 'none';
                       }, 3000);
    </script>
            @endif
            @if(session('success'))
                <span id="info-message">{{ session('success') }}</span>
                 <script>
                        setTimeout(function() {
                           document.getElementById('info-message').style.display = 'none';
                       }, 3000);
    </script>
            @endif
        </div>
        <div>
            <button type="submit">Send</button>
        </div>
    </form>
    </div>
@endsection
