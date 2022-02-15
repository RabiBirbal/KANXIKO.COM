@component('mail::message')
Hello {{ $buyer->buyer_name }},

<h1>Congratulations!!!</h1>
<p>
    Your order has been verified successfully by the admin.
</p>

@component('mail::button', ['url' => route('index')])
View Website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
