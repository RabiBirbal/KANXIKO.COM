<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Products Details</title>
	@include('layout/frontend/css')
    <style>
    .payment-details{
    	background: #eee;
    }
	.payment-details h2{
		margin-top: 50px;
		text-align: center;
		font-family: Helvetica Neue;
		font-size: 25px;
	}
	.payment-details img{
		margin-left: auto;
		margin-right: auto;
		display: block;
	}

</style>
</head>
<body>

<!-- thank you for being customer -->
<div class="customer">
	{{-- alert message --}}
@include('admin/alert-message')
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-right">
				<a href="{{ route('view-lead-manager') }}">
					<button class="btn btn-primary">Go Back</button>
				</a>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-md-7">
				<!-- <h2>Thank You for being a customer!!!</h2>
				<h5><b>We hope you enjoyed & visit our page at kanxiko.com</b></h5> -->
				<h2>Purchased Lead Detail!!!</h2>
			</div>
			<div class="col-md-5">
				<p>Enquiry number: {{ $product->product_id }}</p>
				<p>Enquiry date: {{ $product->created_at->format('M d, Y') }}</p>
			</div>
		</div>
	</div>
</div>
<!-- thank you for being customer ends -->


<!-- order confirm -->
<div class="order-confirm">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-lg-12 ">
			</div>
		</div>
	</div>
</div>
<!-- order confirm ends -->

<!-- product details -->
<div class="product-details">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				@if($product->product_image == null)
					<img src="{{ asset('frontend/image/no-image.jpg') }}" width="100%" alt="product_image">
				@else
					<img src="{{ asset('upload/images/'.$product['product_image']) }}" width="100%" alt="product_image">
				@endif
			</div>
			<div class="col-md-4">
				<h2>Enquiry Details</h2>
				<span><b><p>Product name: {{ $product->name }}</p></b></span>
				<span><b><p>Quantity: {{ $product->quantity }}</p></b></span>
				<span><b><p>Size: {{ $product->size }}</p></b></span>
				<span><b><p>Color: {{ $product->color }}</p></b></span>
				<span><b><p>Budget: {{ $product->budget }}</p></b></span>
				<span><b><p>Description: <br>{{ $product->description }} </p></b></span>
			</div>
			<div class="col-md-4">
				<h2>Customer Details</h2>
				<span><b><p>Name: {{ $product->buyer_name }}</p></b></span>
				<span><b><p>Email: {{ $product->buyer_email }}</p></b></span>
				<span><b><p>Contact number: {{ $product->buyer_contact }}</p></b></span>
				<span><b><p>Address: {{ $product->buyer_address }}</p></b></span>
			</div>
		</div>
	</div>
<!-- product details ends -->

{{-- script --}}
@include('layout/frontend/js')
{{-- alert script --}}
@include('admin/alert-script');
</body>
</html>