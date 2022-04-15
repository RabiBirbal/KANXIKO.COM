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

@if (!$product)
<h2>Add Product</h2>
<form action="{{ route('seller-product-update') }}" method="post" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left was-validated">
  @csrf
  <div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Category <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 ">
      <select class="select1 form-control" name="category">
        <option value="">Choose Category</option>
        @foreach ($category['a'] as $i => $a)
          <option value="{{ $a->slug }}">{{ $a->name }}</option>
        @endforeach
      </select>
    </div>
</div>
<div class="item form-group">
  <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Sub-Category <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 ">
    <select class="form-control" name="subcategory">
      <option value="0">Choose Subcategory</option>
      @foreach ($category['a'] as $i => $a)
      <optgroup label="{{ $a->name }} " class="{{ $a->slug }} box1">
        @foreach ($category['b'][$i] as $b)
          <option value="{{ $b->name }}">{{ $b->name }}</option>
        @endforeach
      </optgroup>
      @endforeach
    </select>
  </div>
</div>
  <div class="item form-group">
      <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 ">
          <input type="text" id="name" name="name" required="required" class="form-control" placeholder="Enter Name">
      </div>
  </div>
  <div class="form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Choose Image (size 649 x 800):  <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 ">
    <input type="file" id="file-ip-2" accept="image/*" class="form-control-file border" onchange="showPreview2(event);" name="image" required>
    </div><br>
    <div class="preview mt-3 col-md-6 col-sm-6">
      <img src="" id="file-ip-2-preview" width="50%;">
    </div>
  </div>
  <div class="form-group" style="margin-bottom:80px">
      <div class="col-md-12 col-sm-12 mt-3 text-center">
          <button type="submit" onclick="return confirm('Are you sure want to continue?')" class="btn btn-success">Add Now</button>
      </div>
  </div>
</form>
@else
<h2>Edit Product</h2>
<form action="{{ route('seller-product-update') }}" method="post" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left was-validated">
  @csrf
  <input type="hidden" name="id" value="{{ $product['id'] }}">
  <div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Category <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 ">
      <select class="select1 form-control" name="category">
        <option value="{{ $product->category }}">{{ $product->category }}</option>
        @foreach ($category['a'] as $i => $a)
          <option value="{{ $a->slug }}">{{ $a->name }}</option>
        @endforeach
      </select>
    </div>
</div>
<div class="item form-group">
  <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Sub-Category <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 ">
    <select class="form-control" name="subcategory">
      <option value="{{ $product->subcategory }}">{{ $product->subcategory }}</option>
      @foreach ($category['a'] as $i => $a)
      <optgroup label="{{ $a->name }} " class="{{ $a->slug }} box1">
        @foreach ($category['b'][$i] as $b)
          <option value="{{ $b->name }}">{{ $b->name }}</option>
        @endforeach
      </optgroup>
      @endforeach
    </select>
  </div>
</div>
  <div class="item form-group">
      <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 ">
          <input type="text" id="name" name="name" required="required" value="{{ $product->name }}" class="form-control" placeholder="Enter Category Name">
      </div>
  </div>
  <div class="form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Choose Image (size 649 x 800):  <span class="required">*</span>
    </label>
    <img src="{{ asset('upload/images/'.$product['product_image']) }}" alt="Image" width="200px"><br>
    <div class="col-md-6 col-sm-6 ">
    <input type="file" id="file-ip-2" accept="image/*" class="form-control-file border" onchange="showPreview2(event);" name="image">
    </div><br>
    <div class="preview mt-3 col-md-6 col-sm-6">
      <img src="" id="file-ip-2-preview" width="50%;">
    </div>
  </div>
  <div class="form-group" style="margin-bottom:80px">
      <div class="col-md-12 col-sm-12 mt-3 text-center">
          <button type="submit" onclick="return confirm('Are you sure want to continue?')" class="btn btn-success">Add Now</button>
      </div>
  </div>
</form>
@endif

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

<!-- image preview -->
<script type="text/javascript">
    function showPreview1(event){
        if(event.target.files.length > 0){
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("file-ip-1-preview");
            preview.src=src;
            preview.style.display="block";
        }
    }

    function showPreview2(event){
        if(event.target.files.length > 0){
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("file-ip-2-preview");
            preview.src=src;
            preview.style.display="block";
        }
    }
  </script>

  <script>
    $(document).ready(function(){
        $(".select1").change(function(){
            $(this).find("option:selected").each(function(){
                var optionValue = $(this).attr("value");
                if(optionValue){
                    $(".box1").not("." + optionValue).hide();
                    $(".size").not("." + optionValue).hide();
                    $(".color").not("." + optionValue).hide();
                    $("." + optionValue).show();
                } 
                else{
                  $(".box1").not("." + optionValue).hide();
                  $(".size").not("." + optionValue).hide();
                  $(".color").not("." + optionValue).hide();
                }
            });
        }).change();
    });
  </script>
</body>
</html>