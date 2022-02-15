@component('mail::message')
Hello {{ $seller1->first_name }} {{ $seller1->last_name }},

<h1>Congratulations!!!</h1>
<p>
    50 points has been credited to your account as your friend has completed registration process
</p>

@component('mail::button', ['url' => route('index')])
View Website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
