<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form</title>
	@include('layout/frontend/css')
 <style>
    textarea{ 
        width: 350px; 
        min-width:350px; 
        max-width:350px; 

        height:150px; 
        min-height:150px;  
        max-height:150px;
    }
 	.page-form{
        background-image: url({{ url('frontend/image/form-pic.jpg') }});
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size: cover;
        padding-bottom: 400px;
        height: 100vh;
      }
    .btn1 {
        margin: 10px;
        margin-left: 200px;
        display: inline-block;
        font-weight: 400;
        color: #fff;
        text-align: center;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-color: #007bff;
        border: 1px solid transparent;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
 </style>
</head>
<body>
<div class="card page-form">
<article class="card-body mx-auto" style="max-width: 400px;">
<a href="{{ route('index') }}"><button type="button" class="btn1 btn1-primary"><i class="fa fa-backward"></i> Back</button></a>
	<form action="{{ route('post-enquiry') }}" method="post">
        @csrf
        <input type="hidden" name="product_image" value="{{ $product['product_image'] }}">
		<div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
            </div>
        <input name="product_name" class="form-control" value="{{ $product['name'] }}" placeholder="Product name" type="text" readonly>
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
            <input name="name" class="form-control" placeholder="Customer name" type="text" required>
        </div> <!-- form-group// -->

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
            </div>
            <input name="email" class="form-control" placeholder="Email address" type="email" required>
        </div> <!-- form-group// -->

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-map-marker"></i> </span>
            </div>
            <input name="address" class="form-control" placeholder="Address" type="text" required>
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
        <div class="form-group">
            <button type="submit" onclick="return confirm('Are you sure want to continue?')" id="submit" value="submit" class="btn btn-primary btn-block"> Send </button>
        </div> <!-- form-group// -->                                                                       
    </form>
</article>
</div> <!-- card.// -->
</div> 

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