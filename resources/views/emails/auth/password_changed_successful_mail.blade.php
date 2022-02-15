@component('mail::message')
Hello {{ $seller->first_name }} {{ $seller->last_name }},

<h1>Congratulations!!!</h1>
<p>
    You have successfully changed your password. Please visit our website and try to login.
</p>

@component('mail::button', ['url' => route('user-login')])
Login Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
