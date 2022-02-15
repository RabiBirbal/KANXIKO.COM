@component('mail::message')
Hello {{ $buyer->buyer_name }},

<h1>Congratulations!!!</h1>
<p>
    You order has been placed successfully. Please wait for your order verification by the admin.
</p>

@component('mail::button', ['url' => route('index')])
View Website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
