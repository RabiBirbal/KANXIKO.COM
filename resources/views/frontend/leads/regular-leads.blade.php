<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Regular Lead</title>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
	@include('layout/frontend/css')
    <style>
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
		hr{
			background-color: #fff;
		}
		.category {
			margin-top: 30px;
		}
		.dashboard{
				margin-top: 30px;
			}
		@media only screen and (max-width: 600px) {
		.btn{
			margin-left: auto;
			margin-right: auto;
			display: block;
		}
		.dashboard{
		text-align: center;
		margin-bottom: -30px;
		margin-top: -20px;
		}
		.navDrop1{
			width: 50%;
		}
		.navDrop2{
			width: 50%;
		}
		}
		.lead-manager{
			/* margin-top: 50px; */
			background-color: #ec2028;
		}
		.form-control{
			border-radius: 150px;
			margin-top: 30px;
		}
	</style>
</head>
<body>
<!-- lead manager button -->
<div class="lead-manager">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 text-light dashboard">
				<a href="{{ route('buy-leads') }}" class="text-light"><h4>Dashboard</h4></a>
			</div>
			<div class="dropdown text-center col-md-4 navDrop2">
				<a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Lead Category
				</a>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
				  <a class="dropdown-item" href="{{ route('buy-leads') }}">DASHBOARD</a>
				  <a class="dropdown-item" href="{{ route('view-premium-lead') }}">PREMIUM</a>
				  <a class="dropdown-item" href="{{ route('view-regular-lead') }}">REGULAR</a>
				  <a class="dropdown-item" href="{{ route('view-free-lead') }}">FREE</a>
				</div>
			</div>
			<div class="col-md-4 dropdown text-right navDrop1">
				@include('layout/frontend/profile')
			</div>
		</div>
	</div>
</div>
<!-- lead manager button ends -->

<div class="container">
	<!-- Trigger the modal with a button -->
	{{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> --}}
  
	<!-- Modal -->
	<div class="modal fade show" id="myModal" role="dialog" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog">
	  
		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			{{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
			<h4 class="modal-title">Important Notice !!!!!</h4>
		  </div>
		  <div class="modal-body">
			<p>Your account has been expired. So, to excess this account and extends your validity date, please recharge your point.</p>
		  </div>
		  <div class="modal-footer">
			{{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
			<a href="{{ route('recharge-points') }}" class="btn btn-success">Recharge Now</a>
		  </div>
		</div>
		
	  </div>
	</div>
	
  </div>

<!-- table -->
<div class="container-fluid content">        
	<div class="card-box table-responsive">
		<table id="datatable" class="table table-striped table-bordered" style="width:100%">
		<thead>
			<tr>
				<th>SN</th>
				<th>Date</th>
				<th>Product</th>
				<th>Product Image</th>
				<th>Qty</th>
				<th>Location</th>
				<th>Points</th>
				<th scope="col">Leads Category</th>
				<th>Leads Category</th>
				<th>Availability</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody class="text-center">
				<p hidden>{{ $n=1; }}</p>
				@foreach ($product as $data)
				@if($data->availability > 0)
				<tr style="background-color: #CCABDB">
					<td>{{ $n }}</td>
					<td><strong>Enquiry Date</strong> <br>{{ $data->created_at->format('M d,Y') }}</td>
					<td><strong>Product Name:</strong><br>{{ $data->name }}</td>
					<td>
						@if($data->product_image == null)
							<img src="{{ asset('frontend/image/no-image.jpg') }}" width="150px" alt="product_image">
						@else
							<img src="{{ asset('upload/images/'.$data['product_image']) }}" width="150px" alt="product_image">
						@endif
					</td>
					<td><strong>Quantity/Duration/Other:</strong> <br>{{ $data->quantity }}</td>
					<td><strong>District:</strong><br>{{ $data->buyer_district }}</td>
					<td><strong>Points:</strong><br>{{ $data->points }}</td>
					<td><strong>Category:</strong><br>{{ $data->category }}</td>
					<td><strong>Leads Category:</strong><br>{{ $data->leads_category }}</td>
					<td><strong>Availability:</strong><br>{{ $data->availability }}</td>
					<td>
						<form action="{{ url('buy-lead') }}" method="post">
							@csrf
							<input type="hidden" name="buyer_id" value="{{ $data['id'] }}"/>
							<input type="hidden" name="availability" value="{{ $data['availability'] }}"/>
							<input type="hidden" name="lead_point" value="{{ $data['points'] }}"/>
							<input type="hidden" name="product_id" value="{{ $data['product_id'] }}"/>
							<input type="hidden" name="seller_id" value="{{ Session::get('seller')['id'] }}"/>
							<button type="submit" onclick="return confirm('Are you sure want to continue?')" class="btn btn-primary">Buy Now</button>
						</form>
					</td>
				  </tr>
				  @endif
				  <p hidden>{{ $n++; }}</p>
				  @endforeach
			</tbody>
		</table>
	</div>
</div>
<!-- table ends -->

<!-- goto top arrow -->
<a href="#top" class="goto-top mb-5"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></a>
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
<script>
	$(document).ready(function() {
    $('#datatable').DataTable();
} );
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

@php
$seller=App\Models\Seller::find(Session::get('seller')['id']);
$expiry = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $seller->expiry_date);
$current = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now());
@endphp
{{-- {{ dd($expiry < $current) }} --}}
@if ($expiry < $current))
<script type="text/javascript">
$(window).on('load', function() {
  $('#myModal').modal('show');
});
</script>
@endif
</body>
</html>