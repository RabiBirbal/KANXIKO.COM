<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invite Friends</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <style>
        body {
           background-position: center;
           background-color: #eee;
           background-repeat: no-repeat;
           background-size: cover;
           color: #505050;
           font-family: "Rubik", Helvetica, Arial, sans-serif;
           font-size: 14px;
           font-weight: normal;
           line-height: 1.5;
           text-transform: none
       }

       .forgot {
           background-color: #fff;
           padding: 12px;
           border: 1px solid #dfdfdf
       }

       .padding-bottom-3x {
           padding-bottom: 72px !important
       }

       .card-footer {
           background-color: #fff
       }

       .btn {
           margin-top: 30px;
       }

       .form-control:focus {
           color: #495057;
           background-color: #fff;
           border-color: #76b7e9;
           outline: 0;
           box-shadow: 0 0 0 0px #28a745
       }
       img{
           margin-top: -40px;
           margin-bottom: -30px;
       }
       @media only screen and (max-width: 600px) {
       .btn{
           margin-left: auto;
           margin-right: auto;
           display: block;
       }
       .dashboard{
           text-align: center;
       }
       .logo{
           width: 35%;
       }
       }
       .lead-manager{
           /* margin-top: 50px; */
           background-color: #19465d;
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
				<a href="{{ route('index') }}" class="text-light">
                    <img src="{{ asset('frontend/image/logo1.png') }}" width="15%" class="logo" alt="logo">
                </a>
			</div>
			@include('layout.frontend.buyer-profile')
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
                        <h2>Refer Code: <small>{{ $buyer->refer_code }}</small></h2>
                    </div>
                    <div class="card-footer">
                        <p>
                            <input type="text" id="invite" class="form-control" value="{{ url('buyer-register/ref='.$buyer['refer_code']) }}">
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