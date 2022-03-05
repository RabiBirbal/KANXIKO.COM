@component('mail::message')

Hello {{ $data->first_name }} {{ $data->last_name }},

@component('mail::button', ['url' => url('/buyer/email/verify/'.$data->email_verification_code)])
Click here to verify your email address 
@endcomponent

<p>Or copy paste the following link on your web browser to verify your email address.</p>
<p><a href="{{ url('/buyer/email/verify/'.$data->email_verification_code) }}">
    {{ url('/buyer/email/verify/'.$data->email_verification_code) }}</a></p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent