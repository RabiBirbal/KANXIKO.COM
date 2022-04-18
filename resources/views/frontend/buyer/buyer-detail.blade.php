<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
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
    <div class="container padding-bottom-3x mb-2 mt-5">
	    <div class="row justify-content-center">
	        <div class="col-lg-8 col-md-10">
	            <form action="" method="post" class="card mt-4">
                    @csrf
                    <div class="row card-title p-3">
                        <div class="col-md-6 mt-3">
                            <h3>My Profile</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('edit-buyer-profile') }}" class="btn btn-primary">Edit Profile</a>
                        </div>
                    </div>
	                <div class="card-body">
                        <div class="form-group">
                            <span>First Name: </span>
                            <input class="form-control" type="text" name="fname" id="fname"  value="{{ $buyer['first_name'] }}" required="" readonly>
                        </div>
                        <div class="form-group">
                            <span>Last Name: </span>
                            <input class="form-control" type="text" name="lname" value="{{ $buyer['last_name'] }}" readonly>
                        </div>
	                    <div class="form-group">
                            <span> Email: </span>
                            <input class="form-control" type="email" name="email" value="{{ $buyer['email'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <span> Contact: </span>
                            <input class="form-control" type="email" name="mobile" value="{{ $buyer['contact'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <span> Address: </span>
                            <input class="form-control" type="text" name="address" value="{{ $buyer['address'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <span> Province: </span>
                            <input class="form-control" type="email" name="Province" value="{{ $buyer['province'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <span> District: </span>
                            <input class="form-control" type="email" name="district" value="{{ $buyer['district'] }}" readonly>
                        </div>
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