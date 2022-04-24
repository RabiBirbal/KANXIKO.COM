<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
    @if ($cat->title)
      {{ $cat->title }}
    @else
     {{ $cat->name }}
    @endif
  </title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400,600' rel='stylesheet' type='text/css'>
	@include('layout/frontend/css')
  <style>
    body {
font-family: Open Sans, sans-serif;
color: coral;
}
h1 {
font-weight: 300;
font-size: 3em;
}
a {
text-decoration: none;
color: cornflowerblue;
}
a:hover {
text-decoration: none;
color: tomato;
}
.pro {
width: 100%;
height: auto;
}
.cerita {
text-align: center;
padding-top: 40px;
}
.karya {
margin:0px auto;
text-align:left;
padding:15px;
}
.test {
padding-top: 20px;
margin-bottom: 50px
}
.menu {
position: fixed;
display: inline-block;
width: 30px;
height: 30px;
margin: 25px;
opacity: 0.5;
}
.menu:hover {
opacity:1;
}
.menu::after {
content: attr(data-dia);
padding-left: 50px;
color: deepskyblue;
}
.menu span {
margin: 0 auto;
position: relative;
top: 12px;
}
.menu span:before, .menu span:after {
position: absolute;
content:'';
}
.menu span, .menu span:before, .menu span:after {
width: 40px;
height: 4px;
background-color: deepskyblue;
display: block;
}
.menu span:before {
margin-top: -12px;
}
.menu span:after {
margin-top: 12px;
}
.pusing span {
-webkit-transition: .2s ease 0;
}
.pusing span:before, .pusing span:after {
-webkit-transition-property: margin, opacity;
-webkit-transition-duration: .2s, 0;
-webkit-transition-delay: .2s;
}
.pusing:hover span {
-webkit-transform: rotate(90deg);
-webkit-transition-delay: .2s;
}
.pusing:hover span:before, .pusing:hover span:after {
margin-top: 0px;
opacity: 0;
-webkit-transition-delay: 0, .2s;
}
</style>
  <style>
    .w-5{
      display: none;
    }
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
@livewireStyles
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
          @if(Session::has('buyer'))
          @include('layout.frontend.buyer-profile')
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
                <a class="dropdown-item" href="{{ url('/products/'.$data['slug']) }}">{{ $data->name }}</a>
            </div>
            @endforeach
            </div>
            </div>  
        </div>
        </div>
    </div>
  </div>
  @livewire('product-view-component', ['name' => $name])
  <br><br>
{{-- <div class="karya">
  <div class="row">
    @foreach ($product as $data)
    <div class="test col-md-3">
      <div class="card-content">
          <h4 class="text-center pt-2">{{ $data->name }}</h4>
          <div class="card-img">
              <img src="{{ asset('upload/images/'.$data['product_image']) }}" alt="" height="400px" width="300px">
          </div>
          <div class="card-desc">
              <div class="text-center" >
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal-{{ $data->id }}">Get Offer</button>
              </div>
             
            </div>
      </div>
  </div>
    @endforeach
    
    {{-- <div class="test col-md-3">
      <img src="http://unsplash.it/790/390?image=339" class="pro" />
    </div>
    <div class="test col-md-3">
      <img src="http://unsplash.it/790/390?image=339" class="pro" />
    </div>
    <div class="test col-md-3">
      <img src="http://unsplash.it/790/390?image=339" class="pro" />
    </div>
    <div class="test col-md-3">
      <img src="http://unsplash.it/790/390?image=339" class="pro" />
    </div>
    <div class="test col-md-3">
      <img src="http://unsplash.it/790/390?image=339" class="pro" />
    </div>
    <div class="test col-md-3">
      <img src="http://unsplash.it/790/390?image=339" class="pro" />
    </div>
    <div class="test col-md-3">
      <img src="http://unsplash.it/790/390?image=339" class="pro" />
    </div>
    <div class="test col-md-3">
      <img src="http://unsplash.it/790/390?image=339" class="pro" />
    </div>
    <div class="test col-md-3">
      <img src="http://unsplash.it/790/390?image=339" class="pro" />
    </div>
    <div class="test col-md-3">
      <img src="http://unsplash.it/790/390?image=339" class="pro" />
    </div>
    <div class="test col-md-3">
      <img src="http://unsplash.it/790/390?image=339" class="pro" />
    </div>
    <div class="test col-md-3">
      <img src="http://unsplash.it/790/390?image=339" class="pro" />
    </div>
    <div class="test col-md-3">
      <img src="http://unsplash.it/790/390?image=339" class="pro" />
    </div>
    <div class="test col-md-3">
      <img src="http://unsplash.it/790/390?image=339" class="pro" />
    </div>
    <div class="test col-md-3">
      <img src="http://unsplash.it/790/390?image=339" class="pro" />
    </div>
    <div class="test col-md-3">
      <img src="http://unsplash.it/790/390?image=339" class="pro" />
    </div>
    <div class="test col-md-3">
      <img src="http://unsplash.it/790/390?image=339" class="pro" />
    </div> --}}
  </div>
</div> 

{{-- END --}}
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

@livewireScripts
{{-- script --}}
@include('layout/frontend/js')
{{-- alert script --}}
@include('admin/alert-script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --}}
<script>
     $(".karya div").slice(8).hide();

var mincount = 5;
var maxcount = 10;


$(window).scroll(function () {
    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 50) {
        $(".karya div").slice(mincount, maxcount).slideDown(50);

        mincount = mincount + 4;
        maxcount = maxcount + 4;

    }
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