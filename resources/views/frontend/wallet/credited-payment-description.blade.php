<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Payment Details</title>
	@include('layout/frontend/css')
    <style>
    body{
    	background: #eee;
    }
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
<div class="credit-transfer">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-right">
					<a href="{{ route('view-balance') }}"><button class="btn btn-primary">Go Back</button></a>
				</div>
			</div>
			<div class="row">
				{{-- <div class="col-md-2">
					<img src="image/bank-logo.png">
				</div> --}}
				<div class="col-md-4">
					<h3>{{ $wallet->remarks }}</h3>
					<p>{{ $wallet->created_at->format('M d, Y H:m:s A') }}</p>
					<p>COMPLETED</p>
				</div>
				<div class="col-md-3">
					<div class="dropdown">
						@if($wallet->action == "Credited")
						<button class="btn btn-success " type="button" id="users profile" >
							Credited: {{ $wallet->points }}
						</button>
						@else
						<button class="btn btn-danger " type="button" id="users profile">
							Debited: {{ $wallet->points }}
						</button>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
	{{-- <div class="transaction">
		<div class="container">
			<div class="row">
				<div class="col-md-6 text-left">
					<h5>Transaction ID: {{ $wallet->id }}</h5>
				</div>
				<div class="col-md-6 text-right">
					<h5>Purchased Date: {{ $wallet->created_at->format('M d, Y') }}</h5>
				</div>
			</div>
		</div>
	</div> --}}
<!-- Sender details -->
<div class="container">        
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Credited Date</th>
        <th>Points</th>
        <th>Remarks</th>
		@if($wallet->esewa_id)
		<th>Payment Type</th>
		<th>Esewa Reference ID</th>
		@endif
      </tr>
    </thead>
    <tbody>
     <tr class="table-primary">
        <td>{{ $wallet->created_at->format('M d,Y') }}</td>
        <td>{{ $wallet->points }}</td>
        <td>{{ $wallet->remarks }}</td>
		@if($wallet->esewa_id)
		<td>eSewa</td>
		<td>{{ $wallet->refId }}</td>
		@endif
      </tr>
    </tbody>
  </table>
</div>
<!-- Sender details -->
{{-- script --}}
@include('layout/frontend/js')
{{-- alert script --}}
@include('admin/alert-script');
</body>
</html>