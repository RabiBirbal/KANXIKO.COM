<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recharge Points</title>
    <!-- Bootstrap -->
    <link href="{{asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
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
        /* .dataTables_paginate a{padding:6px 9px !important;background:#ddd !important;border-color:#ddd !important}.paging_full_numbers a.paginate_active{background-color:rgba(38,185,154,0.59) !important;border-color:rgba(38,185,154,0.59) !important}button.DTTT_button,div.DTTT_button,a.DTTT_button{border:1px solid #E7E7E7 !important;background:#E7E7E7 !important;-webkit-box-shadow:none !important;box-shadow:none !important}table.jambo_table{border:1px solid rgba(221,221,221,0.78)}table.jambo_table thead{background:rgba(52,73,94,0.94);color:#ECF0F1}table.jambo_table tbody tr:hover td{background:rgba(38,185,154,0.07);border-top:1px solid rgba(38,185,154,0.11);border-bottom:1px solid rgba(38,185,154,0.11)}table.jambo_table tbody tr.selected{background:rgba(38,185,154,0.16)}table.jambo_table tbody tr.selected td{border-top:1px solid rgba(38,185,154,0.4);border-bottom:1px solid rgba(38,185,154,0.4)}.dataTables_paginate a{background:#ff0000}.dataTables_wrapper{position:relative;clear:both;zoom:1}.dataTables_processing{position:absolute;top:50%;left:50%;width:250px;height:30px;margin-left:-125px;margin-top:-15px;padding:14px 0 2px 0;border:1px solid #ddd;text-align:center;color:#999;font-size:14px;background-color:white}.dataTables_info{width:60%;float:left}.dataTables_paginate{float:right;text-align:right}table.dataTable th.focus,table.dataTable td.focus{outline:2px solid #1ABB9C !important;outline-offset:-1px}table.display{margin:0 auto;clear:both;width:100%}table.display thead th{padding:8px 18px 8px 10px;border-bottom:1px solid black;font-weight:bold;cursor:pointer}table.display tfoot th{padding:3px 18px 3px 10px;border-top:1px solid black;font-weight:bold}table.display tr.heading2 td{border-bottom:1px solid #aaa}table.display td{padding:3px 10px}table.display td.center{text-align:center}table.display thead th:active,table.display thead td:active{outline:none}.dataTables_scroll{clear:both}.dataTables_scrollBody{*margin-top:-1px;-webkit-overflow-scrolling:touch}.top .dataTables_info{float:none}.clear{clear:both}.dataTables_empty{text-align:center}tfoot input{margin:0.5em 0;width:100%;color:#444}tfoot input.search_init{color:#999}td.group{background-color:#d1cfd0;border-bottom:2px solid #A19B9E;border-top:2px solid #A19B9E}td.details{background-color:#d1cfd0;border:2px solid #A19B9E}.example_alt_pagination div.dataTables_info{width:40%}.paging_full_numbers{width:400px;height:22px;line-height:22px}.paging_full_numbers a:active{outline:none}.paging_full_numbers a:hover{text-decoration:none}.paging_full_numbers a.paginate_button,.paging_full_numbers a.paginate_active{border:1px solid #aaa;-webkit-border-radius:5px;-moz-border-radius:5px;padding:2px 5px;margin:0 3px;cursor:pointer}.paging_full_numbers a.paginate_button{background-color:#ddd}.paging_full_numbers a.paginate_button:hover{background-color:#ccc;text-decoration:none !important}.paging_full_numbers a.paginate_active{background-color:#99B3FF}table.display tr.even.row_selected td{background-color:#B0BED9}table.display tr.odd.row_selected td{background-color:#9FAFD1}div.box{height:100px;padding:10px;overflow:auto;border:1px solid #8080FF;background-color:#E5E5FF} */
    </style>
    <style>
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
            font-size: 13px
        }
        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #76b7e9;
            outline: 0;
            box-shadow: 0 0 0 0px #28a745
        }
    </style>
</head>
<body>
{{-- alert message --}}
@include('admin/alert-message')
<!-- lead manager button -->
<div class="lead-manager">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 text-light dashboard">
				<a href="{{ route('buy-leads') }}" class="text-light"><h4>Dashboard</h4></a>
			</div>
			<div class="col-md-6 dropdown text-right mt-4">
				@include('layout/frontend/profile')
			</div>
		</div>
	</div>
</div>
<!-- lead manager button ends -->
    <div class="container padding-bottom-3x mb-2 mt-5">
	    <div class="row justify-content-center">
	        <div class="col-lg-6 col-md-6">
	            <div class="forgot">
	                <h2>Recharge Points</h2>
	                <p>Recharge Your Points and pay from eSewa wallet.</p>
	                <ol class="list-unstyled">
	                    Note: 1 points = Nrs. 1
	                </ol>
	            </div>
	            <form action="https://esewa.com.np/epay/main" method="POST">
                    @csrf
	                <div class="card-body" style="background-color: white">
                        <strong><label for="points">Buy Points: </label></strong>
                        <input value="" name="amt" id="amt" type="text" class="form-control">
                        {{-- <strong><label for="txAmt" class="mt-3">Tax Amount: </label></strong> --}}
                        <input value="0" name="txAmt" id="txAmt" type="hidden" class="form-control" readonly>
                        {{-- <strong><label for="Service Charge" class="mt-3">Service Charge: </label></strong> --}}
                        <input value="0" name="psc" id="psc" type="hidden" class="form-control" readonly>
                        {{-- <strong><label for="Delivery Charge" class="mt-3">Delivery Charge: </label></strong> --}}
                        <input value="0" name="pdc" id="pdc" type="hidden" class="form-control" readonly>
                        <input value="NP-ES-EMN" name="scd" type="hidden">
                        <input value="{{ Str::random(10) }}" name="pid" type="hidden">
                        <strong><label for="totalamount" class="mt-3">Total Amount: </label></strong>
                        <input value="0" name="tAmt" id="tAmt" type="text" class="form-control" readonly>
                        {{-- <input value="http://127.0.0.1:8000/payment-verify?q=su" type="hidden" name="su">
                        <input value="http://127.0.0.1:8000/payment-verify?q=fu" type="hidden" name="fu">    --}}
                        <input value="http://kanxiko.com/payment-verify?q=su" type="hidden" name="su">
                        <input value="http://kanxiko.com/payment-verify?q=fu" type="hidden" name="fu">             
                    </div>
	                <div class="card-footer">
                        <input value="Buy Now" type="submit" return class="btn btn-primary">
                    </div>
	            </form>
	        </div>
	    </div>
	</div>
    <!-- jQuery -->
    <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    {{-- alert script --}}
    @include('admin/alert-script');
    <script type="text/javascript">
        $(document).ready(function(){
          $('#amt').keyup(function(){
            var amt=parseInt($('#amt').val());
            var txAmt=parseInt($('#txAmt').val());
            var psc=parseInt($('#psc').val());
            var pdc=parseInt($('#pdc').val());
            var total=amt + txAmt + psc + pdc;
            $('#tAmt').val(total);
          });
        });
      </script>
</body>
</html>