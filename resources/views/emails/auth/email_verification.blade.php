@component('mail::message')

Hello {{ $buyer->buyer_name }},

@component('mail::button', ['url' => route('verify_buyer_email',$buyer->email_verification_code)])
Click here to verify your email address 
@endcomponent

<p>Or copy paste the following link on your web browser to verify your email address.</p>
<p><a href="{{ route('verify_buyer_email',$buyer->email_verification_code) }}">
    {{ route('verify_buyer_email',$buyer->email_verification_code) }}</a></p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent