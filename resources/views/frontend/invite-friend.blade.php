<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invite Friends</title>
    @include('layout/frontend/css')
    <style>
        @media only screen and (max-width: 600px) {
		.btn{
			margin-left: auto;
			margin-right: auto;
			display: block;
		}
		.dashboard{
			text-align: center;
		}
		}
		.lead-manager{
			/* margin-top: 50px; */
			background-color: #ec2028;
			padding-bottom: 10px;
		}
		.dashboard{
				margin-top: 30px;
		}
    </style>
</head>
<body>
{{-- alert message --}}
@include('admin/alert-message')
<div class="lead-manager">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 text-light dashboard">
				<a href="{{ route('buy-leads') }}" class="text-light"><h4>Dashboard</h4></a>
			</div>
			<div class="col-md-6 dropdown text-right">
				@include('layout/frontend/profile')
			</div>
		</div>
	</div>
</div>
    <div class="container-fluid">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-title bg-dark text-light text-center">
                        <h1>Invite Friends</h1>
                    </div>
                    <div class="card-body">
                        <p>
                            Invite your friend by sharing your refer code and earn 50 points each in your wallet.
                        </p>
                        <h2>Refer Code: <small>{{ $seller->refer_code }}</small></h2>
                    </div>
                    <div class="card-footer">
                        <p>
                            <input type="text" id="invite" class="form-control" value="{{ url('seller-register/ref='.$seller['refer_code']) }}">
                            <button value="copy" onclick="copyToClipboard()" class="btn btn-primary">Copy Link</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{-- script --}}
@include('layout/frontend/js')
{{-- alert script --}}
@include('admin/alert-script')
<script>
    function copyToClipboard() {
        document.getElementById("invite").select();
        document.execCommand('copy');
        return alert("Link Copied Successfully");
    }
</script>
</body>
</html>