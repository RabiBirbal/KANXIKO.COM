<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile Details</title>
	@include('layout/frontend/css')
	<style>
		
		@import "font-awesome.min.css";
		@import "font-awesome-ie7.min.css";
		/* Space out content a bit */
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
			background-color: #ec2028;
			padding-bottom: 10px;
		}
		.dashboard{
				margin-top: 30px;
		}

		/* Everything but the jumbotron gets side spacing for mobile first views */
		.header,
		.marketing,
		.footer {
		padding-right: 15px;
		padding-left: 15px;
		}

		/* Custom page header */
		.header {
		border-bottom: 1px solid #e5e5e5;
		}
		/* Make the masthead heading the same height as the navigation */
		.header h3 {
		padding-bottom: 19px;
		margin-top: 0;
		margin-bottom: 0;
		line-height: 40px;
		}

		/* Custom page footer */
		.footer {
		padding-top: 19px;
		color: #777;
		border-top: 1px solid #e5e5e5;
		}

		/* Customize container */
		@media (min-width: 768px) {
		.container {
			max-width: 730px;
		}
		}
		.container-narrow > hr {
		margin: 30px 0;
		}

		/* Main marketing message and sign up button */
		.jumbotron {
		text-align: center;
		border-bottom: 1px solid #e5e5e5;
		}
		.jumbotron .btn {
		padding: 14px 24px;
		font-size: 21px;
		}

		/* Supporting marketing content */
		.marketing {
		margin: 40px 0;
		}
		.marketing p + h4 {
		margin-top: 28px;
		}

		/* Responsive: Portrait tablets and up */
		@media screen and (min-width: 768px) {
		/* Remove the padding we set earlier */
		.header,
		.marketing,
		.footer {
			padding-right: 0;
			padding-left: 0;
		}
		/* Space out the masthead */
		.header {
			margin-bottom: 30px;
		}
		/* Remove the bottom border on the jumbotron for visual effect */
		.jumbotron {
			border-bottom: 0;
		}
		}

		/*.box{
				color: #fff;
				padding: 20px;
				display: none;
				margin-top: 20px;
			}*/
    
	</style>
</head>
<body>
{{-- alert message --}}
@include('admin/alert-message')
<div class="lead-manager">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 text-light dashboard">
				<a href="{{ route('buy-leads') }}" class="text-light"><h4>Dashboard</h4></a>
			</div>
			<div class="col-md-6 dropdown text-right">
				@include('layout/frontend/profile')
			</div>
		</div>
	</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-right">
				<a href="{{ route('profile-details') }}"><button class="btn btn-primary">Go Back</button></a>
        </div>
    </div>
    <h1 class="well">Kanxiko.com</h1>
	<div class="col-lg-12 well">
		<div class="row">
			<form action="{{ url('profile-update') }}" method="post">
				@csrf
				<input type="hidden" name="sellerinfo_id" value="{{ $sellerInfo['id'] }}" class="form-control">
				<input type="hidden" name="seller_id" value="{{ $sellerInfo['seller_id'] }}" class="form-control">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-6 form-group">
							<label>First Name</label>
							<input type="text" name="fname" value="{{ $sellerInfo['first_name'] }}" placeholder="Enter First Name Here.." class="form-control" required>
						</div>
						<div class="col-sm-6 form-group">
							<label>Last Name</label>
							<input type="text" name="lname" value="{{ $sellerInfo['last_name'] }}" placeholder="Enter Last Name Here.." class="form-control" required>
						</div>
					</div>					
					<div class="form-group">
						<label>Address</label>
						<input type="text" name="address" value="{{ $sellerInfo['address'] }}" placeholder="Enter address" class="form-control" required>
					</div>	
					<div class="row">
						<div class="col-sm-4 form-group">
							<label>City</label>
							<input type="text" name="city" value="{{ $sellerInfo['city'] }}" placeholder="Enter City Name Here.." class="form-control" required>
						</div>	
						<div class="col-sm-4 form-group">
							<label>Province</label>
							<br>
							<select class="select1 form-control" name="province">
								@if($sellerInfo->province == 'one')
								<option value="one" selected>Province 1</option>
								@elseif ($sellerInfo->province == 'two')
								<option value="two" selected>Province 2</option>
								@elseif ($sellerInfo->province == 'three')
								<option value="three" selected>Province 3</option>
								@elseif ($sellerInfo->province == 'four')
								<option value="four" selected>Province 4</option>
								@elseif ($sellerInfo->province == 'five')
								<option value="five" selected>Province 5</option>
								@elseif ($sellerInfo->province == 'six')
								<option value="six" selected>Province 6</option>
								@elseif ($sellerInfo->province =='seven')
								<option value="seven" selected>Province 7</option>
								@endif
								<option value="one">Province 1</option>
								<option value="two">Province 2</option>
								<option value="three">Province 3</option>
								<option value="four">Province 4</option>
								<option value="five">Province 5</option>
								<option value="six">Province 6</option>
								<option value="seven">Province 7</option>
							</select>
							</div>	
							<div class="col-sm-4">
								<label>District</label>
    						<div class="">
    							<select class="form-control" name="district">
									<optgroup label="Province 1" class="one box1">
									<option value="{{ $sellerInfo['district'] }}" selected>{{ $sellerInfo['district'] }}</option>
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
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Company name</label>
								<input type="text" name="company_name" value="{{ $sellerInfo['company_name'] }}" placeholder="Enter Designation Here.." class="form-control" required>
							</div>		
							<div class="col-sm-6 form-group">
								<label>Company address</label>
								<input type="text" name="company_address" value="{{ $sellerInfo['company_address'] }}" placeholder="Enter Company Name Here.." class="form-control" required>
							</div>	
						</div>						
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Landline number (if required)</label>
								<input type="text" name="landline" value="{{ $sellerInfo['landline'] }}" placeholder="Landline number" class="form-control">
							</div>		
							<div class="col-sm-6 form-group">
								<label>Mobile Number</label>
								<input type="text" name="mobile" value="{{ $sellerInfo['mobile'] }}" placeholder="Mobile Number" class="form-control" required>
							</div>	
						</div>			
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Primary Email</label>
								<input type="text" name="email" value="{{ $sellerInfo['email'] }}" placeholder="Primary Email" class="form-control" readonly>
							</div>		
							<div class="col-sm-6 form-group">
								<label>Secondary Email (if required)</label>
								<input type="text" name="secondary_email" value="{{ $sellerInfo['secondary_email'] }}" placeholder="Secondary Email" class="form-control">
							</div>	
						</div>
						{{-- <div class="row">
							<div class="col-sm-6 form-group">
								<label>New Password (min. 6 char)</label>
								<input type="text" placeholder="New Password" class="form-control">
							</div>		
							<div class="col-sm-6 form-group">
								<label>Re-type Password (min. 6 char)</label>
								<input type="text" placeholder="Re-type Password" class="form-control">
							</div>	
						</div> --}}
						<button type="submit" onclick="return confirm('Are you sure want to continue?')" class="btn btn-lg btn-info">Submit</button>					
					</div>
				</form> 
			</div>
		</div>
	</div>

	{{-- script --}}
	@include('layout/frontend/js')
	{{-- alert script --}}
	@include('admin/alert-script');

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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