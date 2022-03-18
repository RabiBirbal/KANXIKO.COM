<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Dashboard</title>

    @include('layout/admin/css')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        {{-- sidenav and top nav --}}
        @include('layout/admin/sidenav')
        {{-- sidenav and top nav ends --}}
        <!-- page content -->
        <div class="right_col" role="main">
          {{-- alert message --}}
          @include('admin/alert-message')
          <!-- top tiles -->
          <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Seller Full Details</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                  <div class="row">
                      <div class="col-sm-12">
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
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        @include('layout/admin/footer')
        <!-- /footer content -->
      </div>
    {{-- footer --}}
      </div>
    </div>
	
	{{-- script --}}
	@include('layout/admin/js')
    {{-- alert script --}}
    @include('admin/alert-script')

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
