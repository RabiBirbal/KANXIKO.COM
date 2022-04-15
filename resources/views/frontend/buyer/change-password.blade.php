<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change Password</title>
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
			<div class="col-md-6 dropdown text-right">
				<div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     {{ $buyer->first_name }} {{ $buyer->last_name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <small>
                        <a class="dropdown-item" href="{{ route('buyer-profile-detail') }}">My profile</a>
                        <a class="dropdown-item" href="{{ route('my-order') }}">My Orders</a>
                        <a class="dropdown-item" href="{{ route('buyer-changes-password',Crypt::encryptString($buyer->id)) }}">Change Password</a>
                        <a class="dropdown-item" href="{{ route('buyer_logout') }}">Logout</a>
                      </small>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
    <div class="container padding-bottom-3x mb-2 mt-5">
	    <div class="row justify-content-center">
	        <div class="col-lg-8 col-md-10">
	            <form action="{{ route('change-buyer-password') }}" method="post" class="card mt-4">
                    @csrf
                    <input type="hidden" name="id" value="{{ $buyer['id'] }}">
	                <div class="card-body">
	                    <div class="form-group">
                            <input class="form-control" type="email" name="email" id="email-for-pass" placeholder="Enter Your Email Address" value="{{ $buyer['email'] }}" required="" readonly>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" name="current_password" id="current_password" placeholder="Current Password" autofocus required="">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" name="password" id="password" placeholder="New Password" autofocus required="">
                            <div id="showErrorpswd"></div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" autofocus required="">
                            <div id="showErrorcpswd"></div>

                                @error('cpassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
	                </div>
	                <div class="card-footer">
                        <button type="submit" onclick="return confirm('Are you sure want to continue?')" class="btn btn-success" >Change Password</button> 
                    </div>
	            </form>
	        </div>
	    </div>
	</div>
    <script href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    {{-- alert script --}}
    @include('admin/alert-script');
    
    {{-- script --}}
    @include('layout/frontend/js')
    <script type="text/javascript">
        $(document).ready(function(){
      
          $('#password').keyup(function(){
            var password=$('#password').val();
            if(password.length>15){
              $('#showErrorpswd').html('Password must be less than 16 characters');
               $('#showErrorpswd').css('color','red');
               document.getElementById("submit").disabled = true;
               return false;
            }
            else if(password.length<6){
              $('#showErrorpswd').html('Password must be greater than 6 characters');
               $('#showErrorpswd').css('color','red');
               document.getElementById("submit").disabled = true;
               return false;
            }
            else{
              $('#showErrorpswd').html('');
              document.getElementById("submit").disabled = false;
               return true;
            }
          });
        });
      </script>

      <script type="text/javascript">
        $('#cpassword').keyup(function(){
                var password=$('#password').val();
                var cpassword=$('#cpassword').val();
      
                if(cpassword!=password){
                  $('#showErrorcpswd').html('Password didn not matched');
                   $('#showErrorcpswd').css('color','red');
                   document.getElementById("submit").disabled = true;
                   return false;
                }
                else{
                  $('#showErrorcpswd').html('');
                  document.getElementById("submit").disabled = false;
                   return true;
                }
              });
      </script>

</body>
</html>