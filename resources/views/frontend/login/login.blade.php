<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Page</title>
	@include('layout/frontend/css')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" rel="stylesheet" />
	<style>
		.box{
         	margin-top: 50px;
			background-image: url('frontend/image/works.jpg');
			background-attachment: fixed;
			background-repeat: no-repeat;
			padding-top: 50px;
			padding-bottom: 50px;
		}
		.card{
			margin-top: 50px;
			background-image: url('frontend/image/store.jpg');
			background-attachment: fixed;
			background-repeat: no-repeat;
			padding-top: 50px;
			padding-bottom: 50px;
		}
	hr{
		background-color: #fff;
	}
	@media (max-width: 800px) {
	.form-inline input {
		margin: 10px 0;
	}
	.form-inline h5{
		text-align: center;
	}
	.form-inline {
		flex-direction: column;
		align-items: stretch;
	}
	.form-inline button{
		width: 100%;
	}
	}
</style>
</head>
<body>
	{{-- alert message --}}
	@include('admin/alert-message')
	<!-- login-page -->
	<div class="login-page">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<h1>Get Free enquiries & Grow your business</h1>
					 <h2>  Expand your business quickly</h2>
      					<span><p>500+</p></span>
         				<span><p>Verified buyers</p></span>
         				<!-- form -->
						 <form class="form-inline was-validated" action="{{ route('seller-login') }}" method="post">
							@csrf
							<input type="email" id="email" placeholder="email" name="email" value="{{ old('email') }}" required>
							<input type="password" id="password" placeholder=" password" name="password" required>

							<button type="submit" class="button button-info">Login</button>&nbsp&nbsp
							<h5><a href="{{ route('forget-password') }}" class="text-white">Forgot Password</a></h5>&nbsp&nbsp
							<a href="{{ route('user-register') }}"><button type="button" class="button button-info">Signup here</button></a>
						</form>
						<!-- form -->
				</div>
				<div class="col-md-3">
					<img src="{{ asset('frontend/image/woman.png') }}">
				</div>
			</div>
		</div>
	</div>
	<!-- login-page ends -->
	<!-- expand -->
	<div class="expand-business">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-lg-12">
					<h2>Increase Your Sales Quickly</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="expand-button">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h5>5000+</h5>
					<p>Online Customer</p>
				</div>
					<div class="col-md-4">
					<h5>20+</h5>
					<p>Cities Customers</p>
				</div>
				<div class="col-md-4">
					<h5>100+</h5>
					<p>Products and Services</p>
				</div>
			</div>
		</div>
	</div>
<!-- expand ends -->
<!-- <div id="grad1"></div> -->
<!-- travellers package -->
<div class="traveller-package">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-lg-12">
				<h2>Don't Spend for UNLIMITED LEADS, <br>GO FOR VERIFIED LEADS</h2>
			</div>
			<!-- <div class="col-sm-3">
				  <h5><b>FREE List</b></h5>
        		  <p>Your profile</p>
			</div>

			<div class="col-sm-3">
				  <h5><b>FREE Enquiries</b></h5>
        		  <p>From Packages</p>
			</div>

			<div class="col-sm-3">
				   <h5><b>FREE PHONE Calls</b></h5>
        			<p>Directly from travelers</p>
			</div>

			<div class="col-sm-3">
				  <h5><b>SUBSCRIBE ONCE</b></h5>
        <p>& Get FREE Enquiries</p>
			</div> -->
		</div>
	</div>
</div>
<!-- travellers package ends -->
<!-- how it works -->
<div class="box">
    <div class="container">
     	<div class="row">
			 <div class="col-md-12 col-sm-12 col-lg-12">
			 	<h2 class="text-light">How it works?</h2>
			 </div>
			    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">	
					<div class="box-part text-center">
						<div class="title">
							<!-- <h4>1</h4> -->
						</div>
						<div class="text">
							<p>Register Yourself</p>
						</div>
					 </div>
				</div>	 
				 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="box-part text-center">
						<div class="title">
						<!-- 	<h4>2</h4> -->
						</div>
						<div class="text">
							<p>Search Best Suitable Lead for your Business </p>
						</div>
					 </div>
				</div>	 
				 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="box-part text-center">
						<div class="title">
						<!-- 	<h4>3</h4> -->
						</div>
						<div class="text">
							<p>Follow your Clients</p>
						</div>
					 </div>
				</div>	 
			</div>
		</div>		
    </div>
</div>
<!-- how it works ends -->
<!-- why kanxiko -->
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container-fluid">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><b>Why Us?</b></h4>
                        <div class="owl-carousel">
                            <div class="item"> <div class="flip-card">
                       <div class="flip-card-inner">
                         <div class="flip-card-front">
                           <img src="{{ asset('frontend/image/lead.png') }}" alt="Avatar" width="40%">
                             <h1>Provide Verified Leads</h1>
                         </div>
                         <div class="flip-card-back">
                          <p>Purchase leads that specially meet 100% of your business criteria</p>
                         </div>
                       </div>
                     </div> 
                      </div>
                            <div class="item"> 
                              <div class="flip-card">
                             <div class="flip-card-inner">
                               <div class="flip-card-front">
                                 <img src="{{ asset('frontend/image/quality.png') }}" alt="Avatar" width="40%" >
                                   <h1>Lead Quality Gurantee</h1>
                               </div>
                               <div class="flip-card-back">
                                <p>You can buy leads with confidence because we provide only verified leads. We stand behind leads and stand behind our customers as well.</p>
                               </div>
                             </div>
                           </div> 
                             </div>
                            <div class="item"> 
                              <div class="flip-card">
                             <div class="flip-card-inner">
                               <div class="flip-card-front">
                                 <img src="{{ asset('frontend/image/price.png') }}" alt="Avatar" width="40%">
                                   <h1>Leads on Affordable Price</h1>
                               </div>
                               <div class="flip-card-back">
                                <p>You can get leads varities here, according to your budget on affordable price.</p>
                               </div>
                             </div>
                           </div> 
                             </div>
                            <div class="item">
                            <div class="flip-card">
                             <div class="flip-card-inner">
                               <div class="flip-card-front">
                                 <img src="{{ asset('frontend/image/risk-free.png') }}" alt="Avatar" width="40%">
                                   <h1>Risk Free</h1>
                               </div>
                               <div class="flip-card-back">
                                <p>You have no risk on buying leads because er deal only with verified leads. And that's totally risk free!!!</p>
                               </div>
                             </div>
                           </div>  
                             </div>
                            <div class="item">
                               <div class="flip-card">
                             <div class="flip-card-inner">
                               <div class="flip-card-front">
                                 <img src="{{ asset('frontend/image/reduce-cost.png') }}" alt="Avatar" width="40%">
                                   <h1>Reduce Marketing Cost</h1>
                               </div>
                               <div class="flip-card-back">
                                <p>Reduce marketing cost by buying verified leaqds. No need to spend on Marketing & Advertising for more business.</p>
                               </div>
                             </div>
                           </div> 
                             </div>
                            <div class="item"> 
                                <div class="flip-card">
                             <div class="flip-card-inner">
                               <div class="flip-card-front">
                                 <img src="{{ asset('frontend/image/customer.png') }}" alt="Avatar" width="40%">
                                   <h1>Reduce Customer Tension</h1>
                               </div>
                               <div class="flip-card-back">
                                <p>Here, you got verified leads that means the person who really needs the products so you don't need to filter the enquiries. It's somehow similar to confirmed customer.</p>
                               </div>
                             </div>
                           </div> 
                            </div>
                            <div class="item"> 
                                <div class="flip-card">
                             <div class="flip-card-inner">
                               <div class="flip-card-front">
                                 <img src="{{ asset('frontend/image/time-consuming.png') }}" alt="Avatar" width="40%">
                                   <h1>Consume Time</h1>
                               </div>
                               <div class="flip-card-back">
                                <p>Going to verified leads consume your time from advertising, messaging and calling.</p>
                               </div>
                             </div>
                           </div> 
                            </div>
                            <div class="item"> 
                                <div class="flip-card">
                             <div class="flip-card-inner">
                               <div class="flip-card-front">
                                 <img src="{{ asset('frontend/image/support.png') }}" alt="Avatar" width="40%" >
                                   <h1>24/7 Online Support</h1>
                               </div>
                               <div class="flip-card-back">
                                <p>You can reach our customer support at any time via email....</p>
                               </div>
                             </div>
                           </div> 
                            </div>
                            <div class="item"> 
                                <div class="flip-card">
									<div class="flip-card-inner">
										<div class="flip-card-front">
											<img src="{{ asset('frontend/image/flexible.png') }}" alt="Avatar" width="40%" >
											<h1>Complete Flexibility</h1>
										</div>
										<div class="flip-card-back">
											<p>We offer varities of leads which are completely flexible to pick and choose. This guarantees that our clients weill receive only hte quality leads that match his/her preferences.</p>
										</div>
									</div>
								</div> 
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- why kanxiko ends -->
<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-lg-12">
					<h5>Copyright2022 | All Rights Reserved</h5>
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
{{-- owl-Carousel --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>

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
</body>
</html>