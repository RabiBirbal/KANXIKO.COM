@component('mail::message')
Hello {{ $wallet->email }},

<h1>Congratulations!!!</h1>
<p>
    {{ $wallet->points }} points has been credited to your account as your eSewa payment has been verified sucessfully.
</p>
<p>Click to view your balance</p>
@component('mail::button', ['url' => route('view-balance')])
View Balance
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
