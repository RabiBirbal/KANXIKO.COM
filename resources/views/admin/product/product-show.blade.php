<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Dashboard | Products</title>

    @include('layout/admin/css')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        {{-- sidenav and top nav --}}
        @include('layout/admin/sidenav')
        {{-- sidenav and top nav ends --}}
        <!-- page content -->
        <div class="right_col" role="main">
          {{-- alert message --}}
          @include('admin/alert-message')
          <!-- top tiles -->
          <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Full Product Details</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                  <div class="row">
                    <form action="{{ route('store_product') }}" method="post" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left was-validated">
                      @csrf
                      <div class="col-sm-12">
                          <div class="col-md-12 text-center">
                            @if($productlist->product_image == null)
                              <img src="{{ asset('frontend/image/no-image.jpg') }}" width="150px" alt="product_image">
                            @else
                              <img src="{{ asset('upload/images/'.$productlist['product_image']) }}" width="150px" alt="product_image">
                            @endif
                          </div>
                          {{-- <div class="col-md-2 mb-3 text-right">
                            <span>Product Image Name</span>
                        </div> --}}
                          <div class="mb-3">
                            <input type="hidden" class="form-control" value="{{ $productlist['product_image'] }}" readonly/>
                          </div>
                          <div class="col-md-2 mb-3 text-right">
                              <span>Product Id</span>
                          </div>
                          <div class="col-md-3 mb-3">
                            <input type="text" class="form-control" value="{{ $productlist['id'] }}" readonly/>
                        </div>
                        <div class="col-md-2 mb-3 text-right">
                            <span>Name</span>
                        </div>
                        <div class="col-md-4 mb-3">
                          <input type="text" class="form-control" value="{{ $productlist['name'] }}" readonly/>
                      </div>
                        <div class="col-md-2 mb-3 text-right">
                            <span>Category</span>
                        </div>
                        <div class="col-md-3 mb-3">
                            <input type="text" class="form-control" value="{{ $productlist['category'] }}" readonly/>
                        </div>
                        <div class="col-md-2 mb-3 text-right">
                            <span>Sub-Category</span>
                        </div>
                        <div class="col-md-4 mb-3">
                          <input type="text" class="form-control" value="{{ $productlist['subcategory'] }}" readonly/>
                        </div>
                        <div class="col-md-2 mb-3 text-right">
                            <span>Quantity</span>
                        </div>
                        <div class="col-md-3 mb-3">
                          <input type="text" class="form-control" value="{{ $productlist['quantity'] }}" readonly/>
                        </div>
                        <div class="col-md-2 mb-3 text-right">
                            <span>Size</span>
                        </div>
                        <div class="col-md-4 mb-3">
                          <input type="text" class="form-control" value="{{ $productlist['size'] }}" readonly/>
                        </div>
                        <div class="col-md-2 mb-3 text-right">
                            <span>Color</span>
                        </div>
                        <div class="col-md-3 mb-3">
                          <input type="text" class="form-control" value="{{ $productlist['color'] }}" readonly/>
                        </div>
                        <div class="col-md-2 mb-3 text-right">
                            <span>Budget</span>
                        </div>
                        <div class="col-md-4 mb-3">
                          <input type="text" class="form-control" value="{{ $productlist['budget'] }}" readonly/>
                        </div>
                        <div class="col-md-2 mb-3 text-right">
                            <span>Description</span>
                        </div>
                        <div class="col-md-9 mb-3">
                          <textarea class="form-control" readonly>{{ $productlist['description'] }}</textarea>
                        </div>
                        {{-- <div class="col-md-12">
                        <h2>Choose Category and Points</h2>
                        <hr class="mb-3">
                        <div class="col-md-2 mb-3 text-right">
                          <span>Leads Category</span>
                        </div>
                        <div class="col-md-3 mb-3">
                          <select class="form-control" id="subcategory" onclick="getValue();" name="subcategory" required>
                            <option value="0" selected>Choose Leads Category</option>
                            <option value="Premium">Premium</option>
                            <option value="Regular">Regular</option>
                            <option value="Free">Free</option>
                          </select>
                        </div>
                        <div class="col-md-2 mb-3 text-right">
                          <span>Points</span>
                        </div>
                        <div class="col-md-4 mb-3">
                          <input type="text" name="point" class="form-control"/>
                        </div> --}}
                        <div class="col-md-12">
                          <h2>Leads Category and Points</h2>
                          <hr class="mb-3">
                          <div class="col-md-2 mb-3 text-right">
                          <span>Leads Category</span>
                          </div>
                          <div class="col-md-3 mb-3">
                            <input type="text" name="leads_category" value="{{ $productlist['leads_category'] }}" class="form-control" required readonly/>
                          </div>
                          <div class="col-md-2 mb-3 text-right">
                          <span>Points</span>
                          </div>
                          <div class="col-md-4 mb-3">
                          <input type="text" name="point" value="{{ $productlist['points'] }}" class="form-control" required readonly/>
                          </div>
                          <div class="col-md-2 mb-3 text-right">
                            <span>Availability</span>
                            </div>
                            <div class="col-md-3 mb-3">
                            <input type="text" name="availability" value="{{ $productlist['availability'] }}" class="form-control" value="1" required readonly/>
                            </div>
                        <div class="col-md-12">
                        <h2>Buyer Details</h2>
                        <hr>
                        </div>
                        <div class="col-md-2 mb-3 text-right">
                            <span>Name</span>
                        </div>
                        <div class="col-md-3 mb-3">
                          <input type="text" class="form-control" value="{{ $productlist['buyer_name'] }}" readonly/>
                        </div>
                        <div class="col-md-2 mb-3 text-right">
                            <span>Email</span>
                        </div>
                        <div class="col-md-4 mb-3">
                          <input type="text" class="form-control" value="{{ $productlist['buyer_email'] }}" readonly/>
                        </div>
                        <div class="col-md-2 mb-3 text-right">
                            <span>Contact No.</span>
                        </div>
                        <div class="col-md-3 mb-3">
                          <input type="text" class="form-control" value="{{ $productlist['buyer_contact'] }}" readonly/>
                        </div>
                        <div class="col-md-2 mb-3 text-right">
                          <span>District</span>
                      </div>
                      <div class="col-md-4 mb-3">
                        <input type="text" class="form-control" value="{{ $productlist['buyer_district'] }}" readonly/>
                      </div>
                        <div class="col-md-2 mb-3 text-right">
                            <span>Address</span>
                        </div>
                        <div class="col-md-3 mb-3">
                          <input type="text" class="form-control" value="{{ $productlist['buyer_address'] }}" readonly/>
                        </div>
                    </div>
                    </div>
                    </form>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        @include('layout/admin/footer')
        <!-- /footer content -->
      </div>

    {{-- footer --}}
    @include('layout/admin/js')
      </div>
    </div>
	
    {{-- alert script --}}
    @include('admin/alert-script');
  </body>
</html>
