<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ $name }}</title>
	@include('layout/frontend/css')
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
    <style>
      .dropdown-item:hover{
        background-color: grey;
      }
      main {
          height:100%;
          position: relative;
          overflow-y: auto;
          height:2000px
      }
      .goto-top {
          display: inline-block;
        height: 40px;
          width: 40px;
          bottom: 20px;
          right: 20px;
          position: fixed;
        padding-top:11px;
        text-align:center;
          border-radius:50%;
          overflow: hidden;
          white-space: nowrap;
          opacity:0;
          -webkit-transition: opacity .3s 0s, visibility 0s .3s;
            -moz-transition: opacity .3s 0s, visibility 0s .3s;
                  transition: opacity .3s 0s, visibility 0s .3s;
          z-index:999;
        background:#CCCCCC;
        visibility: hidden;
        color:#111111;}
      .goto-top.goto-is-visible, .goto-top.goto-fade-out, .no-touch .goto-top:hover {
          -webkit-transition: opacity .3s 0s, visibility 0s 0s;
            -moz-transition: opacity .3s 0s, visibility 0s 0s;
                  transition: opacity .3s 0s, visibility 0s 0s;}
      .goto-top.goto-is-visible {
          visibility: visible;
          opacity: 1;}
      .goto-top.goto-fade-out {
          opacity: .8;}
      .no-touch .goto-top:hover,.goto-top:hover {
        background:#f0e9e9}
      .goto-top.goto-hide{
        -webkit-transition:all 0.5s ease-in-out;
                transition:all 0.5s ease-in-out;
        visibility:hidden;}	
      @media only screen and (min-width: 768px) {
      .goto-top {
          right: 40px;
          bottom: 40px;}
      }
        body{
            background-color: #ecf0f1;
            margin-bottom: 50px;
        }
        @media only screen and (max-width: 600px) {
        .name{
          margin-top: 10px;
          width: 75%;
        }
        .name1{
          font-size: 22px;
        }
        .back{
          width: 25%;
        }
        .drop{
          width: 100%;
        }
        }
        .drop{
          margin-left: 20px;
        }
        .drop1{
          background-color: #F5F5F5;
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
          @if(Session::has('buyer'))
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
                  @endif
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid" style="margin-top: -25px">
    <div class="row">
        <!-- first is the link in your navbar -->
        <a class="btn btn-success dropdown-toggle drop" href="#" id="servicesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Choose Product Category</a>

        <!-- your mega menu starts here! -->
        <div class="dropdown-menu dropdown-menu-right bg-secondary" aria-labelledby="servicesDropdown">

        <!-- the standard dropdown items --> 
        <h2 class="text-light">Choose Product Category</h2>

        <!-- next, a divider to tidy things up -->
        <div class="dropdown-divider"></div>

        <!-- finally, using flex to create your layout -->
        <div class="d-md-flex align-items-start justify-content-start">
            
            <div>   
            <div class="row drop1">
            @foreach ($category as $data)
            <div class="col-md-3">
                <a class="dropdown-item" href="{{ url('/products/'.$data['name']) }}">{{ $data->name }}</a>
            </div>
            @endforeach
            </div>
            </div>  
        </div>
        </div>
    </div>
  </div>
<section class="details-card">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 mb-3 name">
            	<h2 class="name1">{{ $name }}</h2>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 mb-3 text-right back" style="margin-top: -30px;">
            	<a href="{{ route('index') }}" class="btn btn-primary">Back</a>
            </div>
            @foreach ($product as $data)
          <div class="col-md-3 mb-3">
            <div class="card-content">
                <h4 class="text-center pt-2">{{ $data->name }}</h4>
                <div class="card-img">
                    <img src="{{ asset('upload/images/'.$data['product_image']) }}" alt="" height="400px" width="300px">
                </div>
                <div class="card-desc">
                    <div class="text-center" >
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal-{{ $data->id }}">Get Offer</button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal-{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Send Enquiry</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">X</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{{ route('post-enquiry') }}" method="post">
                              @csrf
                              <input type="hidden" name="product_image" value="{{ $data->product_image }}">
                              <input type="hidden" name="category" value="{{ $data->category }}">
                              <input type="hidden" name="subcategory" value="{{ $data->subcategory }}">
                              <div class="form-group input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                  </div>
                              <input name="product_name" class="form-control" value="{{ $data['name'] }}" placeholder="Product name" type="text" readonly>
                              </div> <!-- form-group// -->
                              <div class="form-group input-group">
                                  <div class="input-group-prepend">
                                  <!--  <span class="input-group-text"> <i class="fa fa-envelope"></i> </span> -->
                                  </div>
                              <textarea name="description" class="form-control" placeholder="Description field" required></textarea>
                              </div> <!-- form-group// -->
                              <div class="form-group input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                  </div>
                                  <input name="buyer_name" class="form-control" placeholder="Customer name" type="text" 
                                  @if (Session::has('buyer'))
                                    value="{{ $buyer->first_name }} {{ $buyer->last_name }}" readonly
                                  @endif required>
                              </div> <!-- form-group// -->
                      
                              <div class="form-group input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                  </div>
                                  <input name="buyer_email" class="form-control" placeholder="Email address" type="email" 
                                  @if (Session::has('buyer'))
                                    value="{{ $buyer->email }}" readonly
                                  @endif required>
                              </div> <!-- form-group// -->
                      
                              <div class="form-group input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"> <i class="fa fa-map-marker"></i> </span>
                                  </div>
                                  <input name="buyer_address" class="form-control" placeholder="Address" type="text"
                                  @if (Session::has('buyer'))
                                    value="{{ $buyer->address }}" readonly
                                  @endif required>
                              </div>
                              <div class="form-group input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                  </div>
                                  @if (Session::has('buyer'))
                                    <input type="text" class="form-control" name="phone" value="{{ $buyer->contact }}" readonly>  
                                  @else
                                    <select class="custom-select" name="phone_code" style="max-width: 120px;">
                                      <option>+977</option>
                                  <!--   <option value="1">+972</option>
                                      <option value="2">+198</option>
                                      <option value="3">+701</option> -->
                                  </select>
                                  <div class="col-md-9 phone">
                                  <input name="phone" id="phone" class="form-control" placeholder="Phone number" type="text" required>
                                  </div>
                                  @endif
                                  <br>
                                  <div id="showErrorPhone"></div>
                                  @error('phone')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                                            
                              </div> <!-- form-group// -->  
                              <div class="form-group ml-4">
                                <input class="form-check-input" type="checkbox" name="terms" value="" id="flexCheckDefault" required>
                                <label class="form-check-label" for="flexCheckDefault">
                                  I agree all the terms and conditions.
                                </label>
                            </div> <!-- form-group// -->                               
                              <div class="form-group">
                                  <button type="submit" onclick="return confirm('Are you sure want to continue?')" id="submit" value="submit" class="btn btn-primary btn-block"> Send </button>
                              </div> <!-- form-group// -->                                                                       
                          </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    {{-- modal ends --}}
                  </div>
            </div>
          </div>
          @endforeach
        </div>
    </div>
</section>
<!-- goto top arrow -->
<a href="#top" class="goto-top mb-5"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></a>
<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <h5>Copyright 2022 Kanxiko.com | All Right Reserved</h5>
                <a href="http://yohoniads.com/"><h6>Powered by: Yohoni Ad Marketing</h6></a>
            </div>
        </div>
    </div>
</div>
<!-- footer ends -->

{{-- script --}}
@include('layout/frontend/js')
{{-- alert script --}}
@include('admin/alert-script')
<script type="text/javascript">
    $(document).ready(function(){
      $('#phone').keyup(function(){
        var mobile=$('#phone').val();
        if(isNaN(mobile)){
          $('#showErrorPhone').html('Phone number must be a number');
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
    });
</script>
<script>
  var offset = 300, /* visible when reach */
		offset_opacity = 1200, /* opacity reduced when reach */
		scroll_top_duration = 700,
		$back_to_top = $('.goto-top');
    	//hide or show the "back to top" link
		$(window).scroll(function(){
			( $(this).scrollTop() > offset ) ? $back_to_top.addClass('goto-is-visible') : $back_to_top.removeClass('goto-is-visible goto-fade-out');
			if( $(this).scrollTop() > offset_opacity ) { 
				$back_to_top.addClass('goto-fade-out');
			}
		});
		//smooth scroll to top
		$back_to_top.on('click', function(event){
			event.preventDefault();
			$('body,html').animate({
				scrollTop: 0 ,
		 		}, scroll_top_duration
			);
		});
</script>
</body>
</html>