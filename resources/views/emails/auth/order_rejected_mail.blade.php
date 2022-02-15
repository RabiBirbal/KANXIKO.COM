@component('mail::message')
Hello {{ $data->buyer_name }},

<h1>Sorry!!!</h1>
<p>
    Your order has been rejected by the admin due to unverified details. Please provide complete verified details.
</p>
<p>If you want to order again,</p>
@component('mail::button', ['url' => route('order-form')])
Place Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
