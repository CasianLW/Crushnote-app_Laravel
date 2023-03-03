<p>You have received a secret message:</p>
    <!-- <p>{{ $message->message }}</p> -->
    <p>To view the message, click on the link below:</p>
    <p><a href="{{ route('messages.show', $message->token) }}">{{ route('messages.show', $message->token) }}</a></p>
    <p>The message will self-destruct once it has been viewed.</p>