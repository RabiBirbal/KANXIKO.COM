<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Buy Leads</title>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
	@include('layout/frontend/css')
	
	<style>
	hr{
		background-color: #fff;
	}
	.category {
		margin-top: 30px;
	}
	.lead-manager h4{
		margin-top: 30px;
	}
	/*  */
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
	.form-control{
		border-radius: 150px;
		margin-top: 30px;
	}
	/* .dataTables_paginate a{padding:6px 9px !important;background:#ddd !important;border-color:#ddd !important}.paging_full_numbers a.paginate_active{background-color:rgba(38,185,154,0.59) !important;border-color:rgba(38,185,154,0.59) !important}button.DTTT_button,div.DTTT_button,a.DTTT_button{border:1px solid #E7E7E7 !important;background:#E7E7E7 !important;-webkit-box-shadow:none !important;box-shadow:none !important}table.jambo_table{border:1px solid rgba(221,221,221,0.78)}table.jambo_table thead{background:rgba(52,73,94,0.94);color:#ECF0F1}table.jambo_table tbody tr:hover td{background:rgba(38,185,154,0.07);border-top:1px solid rgba(38,185,154,0.11);border-bottom:1px solid rgba(38,185,154,0.11)}table.jambo_table tbody tr.selected{background:rgba(38,185,154,0.16)}table.jambo_table tbody tr.selected td{border-top:1px solid rgba(38,185,154,0.4);border-bottom:1px solid rgba(38,185,154,0.4)}.dataTables_paginate a{background:#ff0000}.dataTables_wrapper{position:relative;clear:both;zoom:1}.dataTables_processing{position:absolute;top:50%;left:50%;width:250px;height:30px;margin-left:-125px;margin-top:-15px;padding:14px 0 2px 0;border:1px solid #ddd;text-align:center;color:#999;font-size:14px;background-color:white}.dataTables_info{width:60%;float:left}.dataTables_paginate{float:right;text-align:right}table.dataTable th.focus,table.dataTable td.focus{outline:2px solid #1ABB9C !important;outline-offset:-1px}table.display{margin:0 auto;clear:both;width:100%}table.display thead th{padding:8px 18px 8px 10px;border-bottom:1px solid black;font-weight:bold;cursor:pointer}table.display tfoot th{padding:3px 18px 3px 10px;border-top:1px solid black;font-weight:bold}table.display tr.heading2 td{border-bottom:1px solid #aaa}table.display td{padding:3px 10px}table.display td.center{text-align:center}table.display thead th:active,table.display thead td:active{outline:none}.dataTables_scroll{clear:both}.dataTables_scrollBody{*margin-top:-1px;-webkit-overflow-scrolling:touch}.top .dataTables_info{float:none}.clear{clear:both}.dataTables_empty{text-align:center}tfoot input{margin:0.5em 0;width:100%;color:#444}tfoot input.search_init{color:#999}td.group{background-color:#d1cfd0;border-bottom:2px solid #A19B9E;border-top:2px solid #A19B9E}td.details{background-color:#d1cfd0;border:2px solid #A19B9E}.example_alt_pagination div.dataTables_info{width:40%}.paging_full_numbers{width:400px;height:22px;line-height:22px}.paging_full_numbers a:active{outline:none}.paging_full_numbers a:hover{text-decoration:none}.paging_full_numbers a.paginate_button,.paging_full_numbers a.paginate_active{border:1px solid #aaa;-webkit-border-radius:5px;-moz-border-radius:5px;padding:2px 5px;margin:0 3px;cursor:pointer}.paging_full_numbers a.paginate_button{background-color:#ddd}.paging_full_numbers a.paginate_button:hover{background-color:#ccc;text-decoration:none !important}.paging_full_numbers a.paginate_active{background-color:#99B3FF}table.display tr.even.row_selected td{background-color:#B0BED9}table.display tr.odd.row_selected td{background-color:#9FAFD1}div.box{height:100px;padding:10px;overflow:auto;border:1px solid #8080FF;background-color:#E5E5FF} */
</style>
</head>
<body>
{{-- alert message --}}
@include('admin/alert-message')
<!-- lead manager button -->
<div class="lead-manager">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 text-light dashboard">
				<a href="{{ route('buy-leads') }}" class="text-light"><h4>Dashboard</h4></a>
			</div>
			<div class="col-md-4 dropdown text-center">
				@include('layout/frontend/profile')
			</div>
			<div class="dropdown text-right col-md-4">
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
        <th scope="col">Date</th>
        <th scope="col">Product/Service</th>
        <th scope="col">Image</th>
        <th scope="col">Qty</th>
        <th scope="col">Location</th>
        <th scope="col">Points</th>
        <th scope="col">Leads Category</th>
        <th scope="col">Availability</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
		<p hidden>{{ $n=1; }}</p>
		@foreach ($product as $data)
		@if($data->leads_category == 'Premium')
		@if($data->availability > 0)
		<tr style="background-color: #DBF3FA">
			<td>{{ $n }}</td>
			<td>{{ $data->created_at->format('M d,Y') }} <br>Enquiry Date</td>
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
		  @endif
		  @elseif ($data->leads_category == 'Regular')
		  @if($data->availability > 0)
		  <tr class="table-warning">
			<td>{{ $n }}</td>
			<td>{{ $data->created_at->format('M d,Y') }} <br>Enquiry Date</td>
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
		  @endif
		  @else
		  @if($data->availability > 0)
		  <tr class="table-light">
			<td>{{ $n }}</td>
			<td>{{ $data->created_at->format('M d,Y') }} <br>Enquiry Date</td>
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
		  @endif
		  @endif
		  <p hidden>{{ $n++; }}</p>
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
{{-- alert script --}}
@include('admin/alert-script')
<script>
	$(document).ready(function() {
		$('#datatable').DataTable();
	} );
</script>
</body>
</html>