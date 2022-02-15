@component('mail::message')

Hello {{ $data->email }},

@component('mail::button', ['url' => route('reset-password',$data->token)])
Click here to reset your password
@endcomponent

<p>Or copy paste the following link on your web browser to reset your password.</p>
<p><a href="{{ route('reset-password',$data->token) }}">
    {{ route('reset-password',$data->token) }}</a></p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent