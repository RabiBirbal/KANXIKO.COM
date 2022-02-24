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
	@media only screen and (max-width: 600px) {
	.image{
		width: 100%;
	}
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
				<p><b>Enquiry number:</b> {{ $product->product_id }}</p>
				<p><b>Enquiry date:</b> {{ $product->created_at->format('M d, Y') }}</p>
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
			<div class="col-md-4 image text-center">
				@if($product->product_image == null)
					<img src="{{ asset('frontend/image/no-image.jpg') }}" width="100%" alt="product_image">
				@else
					<img src="{{ asset('upload/images/'.$product['product_image']) }}" width="100%" alt="product_image">
				@endif
			</div>
			<div class="col-md-4">
				<h2>Enquiry Details</h2>
				<span><p><b>Product name: </b> {{ $product->name }}</p></span>
				<span><p><b>Quantity:</b> {{ $product->quantity }}</p></span>
				<span><p> <b>Size: </b> {{ $product->size }}</p></span>
				<span><p><b>Color: </b> {{ $product->color }}</p></span>
				<span><p><b>Budget: </b> {{ $product->budget }}</p></span>
				<span><p><b>Description: <br> </b> {{ $product->description }}</p> </span>
			</div>
			<div class="col-md-4">
				<h2>Customer Details</h2>
				<span><p><b>Name: </b> {{ $product->buyer_name }}</span></p>
				<span><p><b>Email: </b> {{ $product->buyer_email }}</span></p>
				<span><p><b>Contact number: </b> {{ $product->buyer_contact }}</span></p>
				<span><p><b>Address:</b> {{ $product->buyer_address }}</p></span>
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