<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
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
            margin-top: 30px;
        }

        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #76b7e9;
            outline: 0;
            box-shadow: 0 0 0 0px #28a745
        }
        img{
            margin-top: -40px;
            margin-bottom: -30px;
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
			background-color: #dcd9cd;
			padding-bottom: 10px;
		}
		.dashboard{
				margin-top: 30px;
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
				<a href="{{ route('index') }}" class="text-light">
                    <img src="{{ asset('frontend/image/Kanxiko-01.png') }}" width="100px" alt="logo">
                </a>
			</div>
			<div class="col-md-6 dropdown text-right">
				<div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     {{ $buyer->first_name }} {{ $buyer->last_name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <small>
                        <a class="dropdown-item" href="{{ route('buyer-profile-detail') }}">My profile</a>
                        <a class="dropdown-item" href="{{ route('my-order') }}">My Orders</a>
                        <a class="dropdown-item" href="{{ route('buyer-changes-password',Crypt::encryptString($buyer->id)) }}">Change Password</a>
                        <a class="dropdown-item" href="{{ route('buyer_logout') }}">Logout</a>
                      </small>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
<div class="row">
    <div class="col-md-12 text-center">
        <h1><b>My Orders</b></h1>
    </div>
</div>

    <div class="container-fluid padding-bottom-3x mb-2 mt-3">
	    <div class="row justify-content-center">
	        <div class="col-lg-12 col-md-12">
	            <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th scope="col">SN</th>
                          <th scope="col">Product Name</th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Size</th>
                          <th scope="col">Color</th>
                          <th scope="col">Category</th>
                          <th scope="col">Subcategory</th>
                          <th scope="col">Description</th>
                          <th scope="col">Ordered Date</th>
                        </tr>
                      </thead>
                      <tbody id="myTable">
                        @foreach($order as $key => $data)
                        <tr>
                          <td>{{$key}}</td>
                          <td>{{$data->name}}</td>
                          <td>{{$data->quantity}}</td>
                          <td>{{$data->size}}</td>
                          <td>{{$data->color}}</td>
                          <td>{{$data->category}}</td>
                          <td>{{$data->subcategory}}</td>
                          <td>{{$data->description}}</td>
                          <td>{{$data->created_at->format('M d, Y')}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
	        </div>
	    </div>
	</div>
    <script href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    {{-- alert script --}}
    @include('admin/alert-script');
    {{-- script --}}
    @include('layout/frontend/js')
</body>
</html>