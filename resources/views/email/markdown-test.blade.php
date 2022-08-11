@component('mail::message')
# Introduction
Bonjour {{$date->user->name}}
<br>
{{$message['message']}} {{$date->post->title}} {{$message['decision']}}

@component('mail::button', ['url' => 'http://127.0.0.1:8000/login', 'color' => 'red' ])
LOGIN
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
