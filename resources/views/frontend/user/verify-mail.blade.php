<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify Email</title>
    @include('layout/frontend/css')
</head>
<body>
    {{-- alert message --}}
    @include('admin/alert-message')
    <div class="row card bg-secondary text-center" style="margin-top: 15%">
        <div class="col-md-12 card-body">
            <p class="text-white">
                Your email has not verified yet. So to complete registration process please verify email.
            </p>
            <a href="{{ url('verify-email/'.$seller['id']) }}"><button class="btn btn-primary">Resend Verification Code</button></a>
            <a href="{{ route('user-login') }}"><button class="btn btn-success">Login Now</button></a>
        </div>
    </div>

    {{-- script --}}
@include('layout/frontend/js')
{{-- alert script --}}
@include('admin/alert-script');
</body>
</html>