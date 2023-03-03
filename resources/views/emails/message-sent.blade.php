<x-mail::message>
# Introduction

The body of your message.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}

</x-mail::message>


@component('mail::message')
# You have received a secret message

{{ $message->message }}

@component('mail::button', ['url' => route('message.show', $message->token)])
View Message
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
