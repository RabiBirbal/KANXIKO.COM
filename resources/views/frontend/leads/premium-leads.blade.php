<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Premium Lead</title>
	@include('layout/frontend/css')
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
    <style>
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
				<th>Leads Category</th>
				<th>Availability</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
				<p hidden>{{ $n=1; }}</p>
				@foreach ($product as $data)
				@if($data->availability > 0)
				<tr style="background-color: #DBF3FA">
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
					<td><b><strong>Leads Category:</strong><br>{{ $data->leads_category }}</b></td>
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
				<p hidden>{{ $n++; }}</p>
				@endif
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<!-- table ends -->


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
</body>
</html>