<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>best online shopping store in nepal, find best seller for readymade garments, home appliances, furnitures, cosmetic products, bag and footware items etc..</title>
  @include('layout/frontend/css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" rel="stylesheet" />
  @include('layout/admin/css1')
  <style>
    .button {
       margin-top: 20px;
       background-color: #1c87c9;
       -webkit-border-radius: 50px;
       border-radius: 40px;
       border: none;
       color: #fff;
       cursor: pointer;
       display: inline-block;
       font-family: sans-serif;
       font-size: 17px;
       padding: 5px 15px;
       text-align: center;
       text-decoration: none;
       margin-left: 400px;
     }
      @keyframes glowing {
       0% {
         background-color: #ff0000;
         box-shadow: 0 0 5px #ff0000;
       }
       50% {
         background-color: #bf0000;
         box-shadow: 0 0 20px #bf0000;
       }
       100% {
         background-color: #ff0000;
         box-shadow: 0 0 5px #ff0000;
       }
     }
     .button {
       animation: glowing 1300ms infinite;
     }
     .view{
       margin-top: 10px;
     }
     @media only screen and (max-width: 600px) {
      .button{
        margin-left: auto;
        margin-right: auto;
        display: block;
        margin-top: 30px;
        width: 100%;
      }
      .name{
        width: 75%;
      }
      .view{
        width: 25%;
        margin-top: 10px;
      }
      .drop{
        width: 60%;
        font-size: 14px;
      }
      .phone{
        width: 64%;
      }
    }
     .advertisement-post{
       background-image: url('frontend/image/banner-image.jpg');
       background-attachment: fixed;
       background-repeat: no-repeat;
       padding-top: 100px;
       padding-bottom: 100px;
     }
      /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 100%;
  }
  .dropdown-item:hover{
        background-color: grey;
      }
  .drop1{
          background-color: #F5F5F5;
        }
  .navbar{
    background-color: #19465d;
  }
  .call_us{
    margin-bottom: -30px;
    margin-top: -20px;
  }
  @media only screen and (max-width: 600px) {
    .call_us img{
      height: 50px;;
      margin-top: -25px;

}
</style>
</head>
<body>
  {{-- alert message --}}
  @include('admin/alert-message')
  <div class="navbar">
      <div class="row">
        <div class="col-md-11">
          <a href="{{ route('index') }}"><img src="{{ asset('frontend/image/logo1.png') }}" width="15%"></a>
        </div>
        <div class="col-md-1 text-right call_us">
          <img src="{{ asset('frontend/image/call-us.png') }}" height="100px">
        </div>
      </div>
  </div>
    <!-- slider -->
    <div id="demo" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      {{-- <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
      </ul> --}}
      <!-- The slideshow -->
      <div class="carousel-inner">
        @foreach ($banner as $data)
        <div class="carousel-item {{$loop->first ? 'active':'' }}">
          <img src="{{ asset('upload/images/'.$data->banner_image) }}" alt="Los Angeles" >
         </div>
        @endforeach
      </div>
      <!-- Left and right controls -->
      <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>
</div>
</div>
  <div class="float-right mr-3 btngrp">
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
    @else
    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Login</a>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Login Now</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">X</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('buyer-login') }}" method="post">
              @csrf
              <div class="form-group input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                  </div>
              <input name="email" class="form-control" placeholder="Enter Email" type="email" required>
              </div> <!-- form-group// -->
              <div class="form-group input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"> <i class="fa fa-key"></i> </span>
                  </div>
                  <input name="password" class="form-control" placeholder="Enter Password" type="password" required>
              </div> <!-- form-group// --> 
              <a href="{{ route('buyer-forget-password') }}">Forgot Password?</a> <br>  
              Dont't have an account? <a href="{{ route('buyer-register') }}">Register Now</a>                           
              <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block"> Login </button>
              </div> <!-- form-group// -->                                                                       
          </form>
          </div>
        </div>
      </div>
    </div>
    {{-- modal ends --}}
    @endif
  </div>
<div class="container-fluid mb-3">
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
    <div class="row">
      @foreach ($category as $data)
      <div class="col-md-3 drop1">
        <a class="dropdown-item" href="{{ url('/products/'.$data['name']) }}">{{ $data->name }}</a>
      </div>
      @endforeach
    </div>
    </div>  
  </div>
  </div>
  <a href="{{ route('order-form') }}"><button class="button">Send Your Enquiry</button> </a>
</div>

  <!-- home appliances -->
<section class="details-card">
  <div class="container-fluid">
    <h1 class="card-title text-dark"><strong>Choose your Product & Send enquiry Now</strong> </h1>
      <div class="row">
          <div class="col-md-9 name">
              <h3>Home Appliances</h3>
          </div>
            <div class="col-md-3 view">
             <a href="{{ url('/products/House-Appliances') }}"><h4>View all</h4></a>
          </div>
          @foreach ($houseAppliance as $data)
          <div class="col-md-3">
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
<!-- home appliances ends -->
<!-- furniture -->
<section class="details-card">
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-9 name">
              <h3>Furniture</h3>
          </div>
            <div class="col-md-3 view">
              <a href="{{ url('/products/Furniture') }}"><h4>View all</h4></a>
          </div>
          @foreach ($furniture as $data)
          <div class="col-md-3">
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
                                    value="{{ Session::get('buyer')['first_name'] }} {{ Session::get('buyer')['last_name'] }}" readonly
                                  @endif required>
                              </div> <!-- form-group// -->
                      
                              <div class="form-group input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                  </div>
                                  <input name="buyer_email" class="form-control" placeholder="Email address" type="email" 
                                  @if (Session::has('buyer'))
                                    value="{{ Session::get('buyer')['email'] }}" readonly
                                  @endif required>
                              </div> <!-- form-group// -->
                      
                              <div class="form-group input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"> <i class="fa fa-map-marker"></i> </span>
                                  </div>
                                  <input name="buyer_address" class="form-control" placeholder="Address" type="text"
                                  @if (Session::has('buyer'))
                                    value="{{ Session::get('buyer')['address'] }}" readonly
                                  @endif required>
                              </div>
                              <div class="form-group input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                  </div>
                                  @if (Session::has('buyer'))
                                    <input type="text" class="form-control" name="phone" value="{{ Session::get('buyer')['contact'] }}" readonly>  
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
<!-- furniture ends -->
<!-- clothing -->
<section class="details-card">
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-9 name">
              <h3>Clothing</h3>
          </div>
            <div class="col-md-3 view">
              <a href="{{ url('/products/Clothing') }}"><h4>View all</h4></a>
          </div>
          @foreach ($clothing as $data)
          <div class="col-md-3">
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
                                    value="{{ Session::get('buyer')['first_name'] }} {{ Session::get('buyer')['last_name'] }}" readonly
                                  @endif required>
                              </div> <!-- form-group// -->
                      
                              <div class="form-group input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                  </div>
                                  <input name="buyer_email" class="form-control" placeholder="Email address" type="email" 
                                  @if (Session::has('buyer'))
                                    value="{{ Session::get('buyer')['email'] }}" readonly
                                  @endif required>
                              </div> <!-- form-group// -->
                      
                              <div class="form-group input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"> <i class="fa fa-map-marker"></i> </span>
                                  </div>
                                  <input name="buyer_address" class="form-control" placeholder="Address" type="text"
                                  @if (Session::has('buyer'))
                                    value="{{ Session::get('buyer')['address'] }}" readonly
                                  @endif required>
                              </div>
                              <div class="form-group input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                  </div>
                                  @if (Session::has('buyer'))
                                    <input type="text" class="form-control" name="phone" value="{{ Session::get('buyer')['contact'] }}" readonly>  
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
<!-- clothing ends -->
<!-- Bags -->
<section class="details-card">
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-9 name">
              <h3>Bags and Suitcase</h3>
          </div>
            <div class="col-md-3 view">
              <a href="{{ url('/products/Bags-and-Suitcase') }}"><h4>View all</h4></a>
          </div>
          @foreach ($bag as $data)
          <div class="col-md-3">
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
                                    value="{{ Session::get('buyer')['first_name'] }} {{ Session::get('buyer')['last_name'] }}" readonly
                                  @endif required>
                              </div> <!-- form-group// -->
                      
                              <div class="form-group input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                  </div>
                                  <input name="buyer_email" class="form-control" placeholder="Email address" type="email" 
                                  @if (Session::has('buyer'))
                                    value="{{ Session::get('buyer')['email'] }}" readonly
                                  @endif required>
                              </div> <!-- form-group// -->
                      
                              <div class="form-group input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"> <i class="fa fa-map-marker"></i> </span>
                                  </div>
                                  <input name="buyer_address" class="form-control" placeholder="Address" type="text"
                                  @if (Session::has('buyer'))
                                    value="{{ Session::get('buyer')['address'] }}" readonly
                                  @endif required>
                              </div>
                              <div class="form-group input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                  </div>
                                  @if (Session::has('buyer'))
                                    <input type="text" class="form-control" name="phone" value="{{ Session::get('buyer')['contact'] }}" readonly>  
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
<!-- bag ends -->
<!-- Footwear -->
<section class="details-card">
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-9 name">
              <h3>Footwear</h3>
          </div>
            <div class="col-md-3 view">
              <a href="{{ url('/products/Footwear') }}"><h4>View all</h4></a>
          </div>
          @foreach ($footwear as $data)
          <div class="col-md-3">
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
                                    value="{{ Session::get('buyer')['first_name'] }} {{ Session::get('buyer')['last_name'] }}" readonly
                                  @endif required>
                              </div> <!-- form-group// -->
                      
                              <div class="form-group input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                  </div>
                                  <input name="buyer_email" class="form-control" placeholder="Email address" type="email" 
                                  @if (Session::has('buyer'))
                                    value="{{ Session::get('buyer')['email'] }}" readonly
                                  @endif required>
                              </div> <!-- form-group// -->
                      
                              <div class="form-group input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"> <i class="fa fa-map-marker"></i> </span>
                                  </div>
                                  <input name="buyer_address" class="form-control" placeholder="Address" type="text"
                                  @if (Session::has('buyer'))
                                    value="{{ Session::get('buyer')['address'] }}" readonly
                                  @endif required>
                              </div>
                              <div class="form-group input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                  </div>
                                  @if (Session::has('buyer'))
                                    <input type="text" class="form-control" name="phone" value="{{ Session::get('buyer')['contact'] }}" readonly>  
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
<!-- Footwear ends -->
<!-- owl caraousel -->
<div class="page-content page-container" id="page-content">
  <div class="padding">
      <div class="row container-fluid">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
                      <div class="owl-carousel">
                        @foreach ($ads as $data)
                        <div class="item"> 
                          <img src="{{ asset('upload/images/'.$data['banner_image']) }}" alt="image" /> </a>
                        </div>
                        @endforeach
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- owl caraousel ends -->
  <!-- product-purchase -->
  <div class="product-purchase">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <h1>Want to Purchase a Online Product</h1>
          <h4>Just Remember Kanxiko.com</h4>
          <p>kanxiko.com a Perfect Online Shopping Platform for those living a busy life and have limited time for shopping where buyers can drop their Product /Service needs/Budget on Kanxiko.com and get direct call/message from the seller side.
              Buyers can buy the products and services according to their choice and budget. The time buyers running to Market for products is gone, Now the Sellers will contact you directly through kanxiko.com. Buyers just need to place their needs with product sample and budget on, kanxiko.com and the seller having the products of your need and budget will contact you. This platform reduces the time of buyer and can get the products according to their needs and budget.</p>
          <a href="{{ route('buyer-form') }}"><button type="button" class="btn btn-success">SHOP NOW</button></a>
        </div>
        <div class="col-md-4">
          <img src="{{ asset('frontend/image/advertising girl.png') }}" width="110%">
        </div>
      </div>
    </div>
  </div>
  <!-- product-purchase ends -->
    <!-- advertisement post -->
    <div class="advertisement-post">
      <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <h2>Why Kanxiko.com?</h2>
            </div>
             <div class="col-md-3">
               <div class="flip-card">
                <div class="flip-card-inner">
                 <div class="flip-card-front">
                 <img src="{{ asset('frontend/image/time-consuming.png') }}" alt="Avatar" >
                 <h3>Time Consume</h3>
                </div>
                <div class="flip-card-back">
                  <p>Our focus is those who are living a very busy life and having no time or limited time for market visit. By placing your need product and budget can help you to connect with seller directly.</p> 
                </div>
              </div>
            </div>
          </div>
        
          <div class="col-md-3">
            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <img src="{{ asset('frontend/image/risk-free.png') }}" alt="Avatar" >
                    <h3>Risk Free</h3>
                </div>
                <div class="flip-card-back">
                <p>Here you have many options for choosing seller from which you can buy. You can have comparison on product quality and price which may be totally risk free.</p>
                </div>
              </div>
            </div> 
          </div>
    
          <div class="col-md-3">
            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <img src="{{ asset('frontend/image/seller-icon-3.png') }}" alt="Avatar">
                  <h3>Direct Connection with seller</h3>
                </div>
                <div class="flip-card-back">
                  <p>Just a placement of the product, its picture and budget may connect you directly with the seller who have met the requirements of yours.</p> 
                </div>
              </div>
            </div> 
          </div>
          <div class="col-md-3">
            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <img src="{{ asset('frontend/image/price-quality.png') }}" alt="Avatar">
                  <h3>Price & Quality Comparison</h3>
                </div>
                <div class="flip-card-back">
                  <p>Buyers on this site have many sellers options for buying products. They may have 4/5 Sellers on options from whom they can compare price and qualitity of the product.Furthermore, they can choose the product from any seller providing qualityt product on best price.</p>
                </div>
              </div>
            </div> 
          </div>
        </div>
      </div>
    </div>
    <!-- advertisement post ends -->
    
    <!-- footer -->
    <div class="copyright">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>
<script>
	(function($) {
	'use strict';
	jQuery(document).on('ready', function(){
			$('a.page-scroll').on('click', function(e){
				var anchor = $(this);
				$('html, body').stop().animate({
					scrollTop: $(anchor.attr('href')).offset().top - 50
				}, 1500);
				e.preventDefault();
			});		
	}); 			
})(jQuery);
</script>
<!-- owl caraousel -->
<script>
  $(document).ready(function() {
    $(".owl-carousel").owlCarousel({
      autoPlay: 3000,
      items : 4,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,3],
      center: true,
      nav:true,
      loop:true,
        responsive: {
          600: {
            items: 4
        }
      }
    });
  });
  </script>
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
</body>
</html>