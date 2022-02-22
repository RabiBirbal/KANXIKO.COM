<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Balance</title>
	@include('layout/frontend/css')
    <style>
    	/*.balance{
    		margin: -5px;
    	}*/
		.lead-manager{
			/* margin-top: 50px; */
			background-color: #ec2028;
			padding-bottom: 10px;
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
		}
		}
		.lead-manager{
			/* margin-top: 50px; */
			background-color: #ec2028;
		}
    	.balance i{
    		font-size: 30px;
    		margin-top: 50px;
    		margin-left: 1000px;
    	}
    	.balance p{
    		margin-left: 1020px;
    		font-size: 20px;
    	}
    	@media only screen and (max-width: 600px) {
  		.balance i{
    		font-size: 20px;
    		margin-top: 50px;
    		margin-left: 185px;
    	}
    	.balance p{
    		margin-left: 185px;
    		font-size: 20px;
    	}
    	.credit-transfer h3 {
    		text-align: center;
    	}
    	.credit-transfer img {
    		margin-left: auto;
    		margin-right: auto;
    		display: block;
    	}
    	.credit-transfer p{
    		text-align: center;
    		margin: 1px;
    	}
    	.btn{
    		margin-left: auto;
    		margin-right: auto;
    		display: block;
    	}
    	.debit-transfer h3 {
    		text-align: center;
    	}
    	.debit-transfer img {
    		margin-left: auto;
    		margin-right: auto;
    		display: block;
    	}
    	.debit-transfer p{
    		text-align: center;
    		margin: 1px;
    	}
		}
	</style>
</head>
<body>
	{{-- alert message --}}
	@include('admin/alert-message')
	<!-- my balance -->
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
	<div class="row container-fluid">
		<div class="col-md-12 text-right">
			<button class="btn btn-success"><h5>Points: {{ $seller->wallet_points }}</h5></button>
		</div>
	</div>
	<!-- my balance ends -->
	<!-- date and time -->
	@foreach ($wallet as $data)
	<div class="date-time">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-lg-12">
					<h4>{{ $data->created_at->format("M d, Y") }}</h4>
				</div>
			</div>
		</div>
	</div>
		<!-- date and time -->
		@if($data->action == "Credited")
		<!-- credit money -->
		<div class="credit-transfer">
			<div class="container">
				<div class="row">
					{{-- <div class="col-md-2">
						<img src="image/bank-logo.png">
					</div> --}}
					<div class="col-md-10 col-sm-12 col-xm-12 mt-2">
						<h4>{{ $data->remarks }}</h4>
						<p>{{ $data->created_at->format("H:m:s A") }}</p>
						<p>Points: <b>{{ $data->points }}</b></p>
					</div>
					<div class="col-md-2 col-sm-12 col-xm-12">	
						<form action="{{ route('credit-payment-detail') }}" method="post">
							@csrf
							<input type="hidden" value="{{ $data['id'] }}" name="id">
							<button class="btn btn-success">View Details</button>
						</form>		
					</div>
				</div>
			</div>
		</div>
		<!-- credit money ends -->
		<!-- debit money ends -->
		@else
		<div class="debit-transfer">
			<div class="container">
				<div class="row">
					{{-- <div class="col-md-2">
						<img src="image/bank-logo.png">
					</div> --}}
					<div class="col-md-6 col-sm-12 col-xm-12">
						<h3>{{ $data->remarks }}</h3>
						<p>{{ $data->created_at->format("H:m:s A") }}</p>
						<p>Points: <b>{{ $data->points }}</b></p>
					</div>
					<div class="col-md-3 col-sm-12 col-xm-12">					
						<form action="{{ route('debit-payment-detail') }}" method="post">
							@csrf
							<input type="hidden" value="{{ $data['id'] }}" name="id">
							<button class="btn btn-danger">View Details</button>
						</form>	
					</div>
				</div>
			</div>
		</div>
		@endif
	@endforeach
	<!-- debit money ends -->
{{-- script --}}
@include('layout/frontend/js')
{{-- alert script --}}
@include('admin/alert-script');
</body>
</html>