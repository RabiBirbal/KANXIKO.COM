<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lead Manager</title>
	@include('layout/frontend/css')
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
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
	textarea{
		width: 100%;
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
	.form-control1{
		border-radius: 10px;
	}
	a {
		color: #000;
	/* text-decoration: underline;*/
	}
	a {
		text-decoration: none;
		color: #000;
		/*border-bottom: 2px solid #0062cc;*/
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
				<th>Lead Purchase Date</th>
				<th>Lead Owner</th>
				<th>Enquiry Detail</th>
				<th>Product ID</th>
				<th>Product Name</th>
				<th>Enquiry Status</th>
				<th>Last comment</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody class="text-center">
				<p hidden>{{ $n=1; }}</p>
				@foreach ($lead as $data)
				<tr class="table-warning">
					<td>{{ $n }}</td>
					<td><strong> Purchase Date:</strong><br>{{ $data->created_at->format('M d, Y') }}<br>{{ $data->created_at->format('H:i:s A') }}</td>
					<td><strong> Buyer Name:</strong><br>{{ $data->buyer_name }}</td>
					<td>
						<a href="{{ url('user-product-details',Crypt::encryptString($data->product_id)) }}" target="__blank"><button class="btn btn-primary">View Details</button></a>
					</td>
					<td><strong> Product ID:</strong><br>{{ $data->product_id }}</td>
					<td><strong> Product Name:</strong><br>{{ $data->name }}</td>
					<form action="{{ url('lead/detail/update/'.$data->id) }}" method="post">
						@csrf
						<td><textarea name="enquiry_status" id="enquiry_status" cols="30" rows="4">{{ $data['enquiry_status'] }}</textarea></td>
						<td><textarea name="last_comment" id="last_comment" cols="10" rows="4">{{ $data['last_comment'] }}</textarea></td>
						<td><button type="submit" class="btn btn-primary">Save</button></td>
					</form>
				</tr>
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
{{-- alert script --}}
@include('admin/alert-script')
<script>
	$(document).ready(function() {
    	$('#datatable-buttons').DataTable();
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