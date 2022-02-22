<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>{{ $name }}</title>
	@include('layout/frontend/css')
    <style>
        body{
            background-color: #ecf0f1;
            margin-bottom: 50px;
        }
    </style>
</head>
<body>
    {{-- alert message --}}
  @include('admin/alert-message')
  <div class="container-fluid">
    <div class="row">
        <!-- first is the link in your navbar -->
        <a class="btn btn-success dropdown-toggle" href="#" id="servicesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Choose Product Category</a>

        <!-- your mega menu starts here! -->
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="servicesDropdown">

        <!-- the standard dropdown items --> 
        <h2>Choose Product Category</h2>

        <!-- next, a divider to tidy things up -->
        <div class="dropdown-divider"></div>

        <!-- finally, using flex to create your layout -->
        <div class="d-md-flex align-items-start justify-content-start">
            
            <div>   
            <div class="dropdown-header"><h4>Products</h4></div>
            <div class="row">
            @foreach ($category as $data)
            <div class="col-md-2">
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
            <div class="col-md-6 col-sm-6 col-lg-6 mb-3">
            	<h2>{{ $name }}</h2>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 mb-3 text-right" style="margin-top: -30px;">
            	<a href="{{ route('index') }}" class="btn btn-primary">Go Back</a>
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
                                  <input name="buyer_name" class="form-control" placeholder="Customer name" type="text" required>
                              </div> <!-- form-group// -->
                      
                              <div class="form-group input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                  </div>
                                  <input name="buyer_email" class="form-control" placeholder="Email address" type="email" required>
                              </div> <!-- form-group// -->
                      
                              <div class="form-group input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"> <i class="fa fa-map-marker"></i> </span>
                                  </div>
                                  <input name="buyer_address" class="form-control" placeholder="Address" type="text" required>
                              </div>
                              <div class="form-group input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                  </div>
                                  <select class="custom-select" name="phone_code" style="max-width: 120px;">
                                      <option>+977</option>
                                  <!--   <option value="1">+972</option>
                                      <option value="2">+198</option>
                                      <option value="3">+701</option> -->
                                  </select>
                                  <div>
                                  <input name="phone" id="phone" class="form-control" placeholder="Phone number" type="text" required>
                                  </div>
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
</body>
</html>