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
		}
		.lead-manager{
			/* margin-top: 50px; */
			background-color: #dcd9cd;
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
                    <img src="{{ asset('frontend/image/Kanxiko-01.png') }}" width="100px" alt="logo">
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
	            <form action="{{ route('update-buyer') }}" method="post" class="card mt-4">
                    @csrf
                    <input type="hidden" name="id" id="" value="{{ $buyer['id'] }}">
                    <div class="row card-title p-3">
                        <div class="col-md-6 mt-3">
                            <h3>Edit Profile</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('edit-buyer-profile') }}" class="btn btn-primary">Edit Profile</a>
                        </div>
                    </div>
	                <div class="card-body">
                        <div class="form-group">
                            <span>First Name: </span>
                            <input class="form-control" type="text" name="fname" id="fname"  value="{{ $buyer['first_name'] }}" required="">
                            <div id="showErrorFname"></div>

                                @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <span>Last Name: </span>
                            <input class="form-control" type="text" name="lname" id="lname" value="{{ $buyer['last_name'] }}" required>
                            <div id="showErrorLname"></div>

                                @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
	                    <div class="form-group">
                            <span> Email: </span>
                            <input class="form-control" type="email" name="email" value="{{ $buyer['email'] }}" required readonly>
                        </div>
                        <div class="form-group">
                            <span> Contact: </span>
                            <input class="form-control" type="text" name="mobile" id="mobile" value="{{ $buyer['contact'] }}" required>
                            <div id="showErrorPhone"></div>

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <span> Address: </span>
                            <input class="form-control" type="text" name="address" value="{{ $buyer['address'] }}" required>
                        </div>
                        <div class="form-group">
                            <span> Province: </span>
                            <select class="select1 form-control" name="province" required>
                                <option value="one">Province 1</option>
                                <option value="two">Province 2</option>
                                <option value="three">Province 3</option>
                                <option value="four">Province 4</option>
                                <option value="five">Province 5</option>
                                <option value="six">Province 6</option>
                                <option value="seven">Province 7</option>
                              </select>
                        </div>
                        <div class="form-group">
                            <span> District: </span>
                            <select class="form-control" name="district" required>
                                <optgroup label="Province 1" class="one box1">
                                <option value="Bhojpur">Bhojpur</option>
                                <option value="Dhankuta">Dhankuta</option>
                                <option value="Ilam">Ilam</option>
                                <option value="Jhapa">Jhapa</option>
                                <option value="Khotang">Khotang</option>
                                <option value="Morang">Morang</option>
                                <option value="Okhaldhunga">Okhaldhunga</option>
                                <option value="Panchthar">Panchthar</option>
                                <option value="Sankhuwasabha">Sankhuwasabha</option>
                                <option value="Solukhumbu">Solukhumbu</option>
                                <option value="Sunsari">Sunsari</option>
                                <option value="Taplejung">Taplejung</option>
                                <option value="Terhathum">Terhathum</option>
                                <option value="Udayapur">Udayapur</option>
                                </optgroup>
                                <optgroup label="Province 2" class="two box1">
                                  <option value="Bara">Bara</option>
                                  <option value="Dhanusha">Dhanusha</option>
                                  <option value="Mahottari">Mahottari</option>
                                  <option value="Parsa">Parsa</option>
                                  <option value="Rautahat">Rautahat</option>
                                  <option value="Saptari">Saptari</option>
                                  <option value="Sarlahi">Sarlahi</option>
                                  <option value="Siraha">Siraha</option>
                                </optgroup>
                                <optgroup label="Province 3" class="three box1">
                                  <option value="Bhaktapur">Bhaktapur</option>
                                  <option value="Chitwan">Chitwan</option>
                                  <option value="Dhading">Dhading</option>
                                  <option value="Dolakha">Dolakha</option>
                                  <option value="Kathmandu">Kathmandu</option>
                                  <option value="Kavrepalanchok">Kavrepalanchok</option>
                                  <option value="Lalitpur">Lalitpur</option>
                                  <option value="Makawanpur">Makawanpur</option>
                                  <option value="Nuwakot">Nuwakot</option>
                                  <option value="Ramechhap">Ramechhap</option>
                                  <option value="Rasuwa">Rasuwa</option>
                                  <option value="Sindhuli">Sindhuli</option>
                                  <option value="Sindhupalchok">Sindhupalchok</option>
                                </optgroup>
                                <optgroup label="Province 4" class="four box1">
                                  <option value="Baglung">Baglung</option>
                                  <option value="Gorkha">Gorkha</option>
                                  <option value="Kaski">Kaski</option>
                                  <option value="Lamjung">Lamjung</option>
                                  <option value="Manang">Manang</option>
                                  <option value="Mustang">Mustang</option>
                                  <option value="Myagdi">Myagdi</option>
                                  <option value="Nawalpur">Nawalpur</option>
                                  <option value="Parbat">Parbat</option>
                                  <option value="Syangja">Syangja</option>
                                  <option value="Tanahu">Tanahu</option>
                                </optgroup>
                                <optgroup label="Province 5" class="five box1">
                                  <option value="Arghakhanchi">Arghakhanchi</option>
                                  <option value="Banke">Banke</option>
                                  <option value="Bardiya">Bardiya</option>
                                  <option value="Dang">Dang</option>
                                  <option value="Gulmi">Gulmi</option>
                                  <option value="Kapilvastu">Kapilvastu</option>
                                  <option value="Parasi">Parasi</option>
                                  <option value="Palpa">Palpa</option>
                                  <option value="Pyuthan">Pyuthan</option>
                                  <option value="Rolpa">Rolpa</option>
                                  <option value="Rukum">Rukum</option>
                                  <option value="Rupandehi">Rupandehi</option>
                                </optgroup>
                                <optgroup label="Province 6" class="six box1">
                                  <option value="Dailekh">Dailekh</option>
                                  <option value="Dolpa">Dolpa </option>
                                  <option value="Humla">Humla </option>
                                  <option value="Jajarkot">Jajarkot </option>
                                  <option value="Jumla">Jumla </option>
                                  <option value="Kalikot">Kalikot </option>
                                  <option value="Mugu">Mugu </option>
                                  <option value="Rukum Paschim">Rukum Paschim </option>
                                  <option value="Salyan">Salyan </option>
                                  <option value="Surkhet">Surkhet</option>
                                </optgroup>
                                <optgroup label="Province 7" class="seven box1">
                                  <option value="0">Select District</option>
                                  <option value="dasdasd">dasdasda</option>
                                  <option value="Baitadi">Baitadi</option>
                                  <option value="Bajhang">Bajhang</option>
                                  <option value="Bajura">Bajura</option>
                                  <option value="Dadeldhura">Dadeldhura</option>
                                  <option value="Darchula">Darchula</option>
                                  <option value="Doti">Doti</option>
                                  <option value="Kailali">Kailali</option>
                                  <option value="Kanchanpur">Kanchanpur</option>
                                </optgroup>
                                </select>
                        </div>
	                </div>
                    <div class="card-footer">
                        <button type="submit" value="submit" id="submit" class="btn btn-success">Update</button>
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
          $('#mobile').keyup(function(){
            var mobile=$('#mobile').val();
            if(isNaN(mobile)){
              $('#showErrorPhone').html('Mobile number must be a number');
               $('#showErrorPhone').css('color','red');
               document.getElementById("submit").disabled = true;
              return false;
            }
            else if(mobile.length!=10){
              $('#showErrorPhone').html('Phone number must be of 10 characters');
               $('#showErrorPhone').css('color','red');
               document.getElementById("submit").disabled = true;
               return false;
            }
            else{
              $('#showErrorPhone').html('');
              document.getElementById("submit").disabled = false;
              return true;
            }
          });
      
          $('#fname').keyup(function(){
            var fname=$('#fname').val();
            var pattern = /^[A-Za-z ]+$/;
            if(!pattern.test(fname)){
              $('#showErrorFname').html('First Name should not contain Number');
              $('#showErrorFname').css('color','red');
              document.getElementById("submit").disabled = true;
              return false;
            }
            else{
              $('#showErrorFname').html('');
              document.getElementById("submit").disabled = false;
              return true;
            }
          });
      
          $('#lname').keyup(function(){
            var lname=$('#lname').val();
            var pattern = /^[A-Za-z ]+$/;
            if(!pattern.test(lname)){
              $('#showErrorLname').html('Last Name should not contain Number');
              $('#showErrorLname').css('color','red');
              document.getElementById("submit").disabled = true;
              return false;
            }
            else{
              $('#showErrorLname').html('');
              document.getElementById("submit").disabled = false;
              return true;
            }
          });
        });
      </script>
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
      <script>
        $(document).ready(function(){
            $(".select1").change(function(){
                $(this).find("option:selected").each(function(){
                    var optionValue = $(this).attr("value");
                    if(optionValue){
                        $(".box1").not("." + optionValue).hide();
                        $("." + optionValue).show();
                    } else{
                        $(".box1").hide();
                    }
                });
            }).change();
        });
        </script>
</body>
</html>