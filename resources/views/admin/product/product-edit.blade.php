<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Dashboard | Products </title>

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
            <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Edit Product Order</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <form action="{{ route('update_product') }}" method="post" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left was-validated">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product['product_id'] }}"/>
                                    <input type="hidden" name="buyer_id" value="{{ $product['id'] }}"/>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Product Name <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="name" name="name" required="required" value="{{ $product['name'] }}" class="form-control" autofocus>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="quantity">Quantity <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="quantity" name="quantity" value="{{ $product['quantity'] }}" required="required" class="form-control" autofocus>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="size">Size 
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select class="form-control" id="subcategory" onclick="getValue();" name="size">
                                                <option value="{{ $product->size }}" selected>{{ $product->size }}</option>
                                                <option value="S">S</option>
                                                <option value="M">M</option>
                                                <option value="L">L</option>
                                                <option value="XL">XL</option>
                                                <option value="XXL">XXL</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="size">Color 
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select class="form-control" id="subcategory" onclick="getValue();" name="color">
                                                <option value="{{ $product->color }}" selected>{{ $product->color }}</option>
                                                <option value="Red">Red</option>
                                                <option value="Green">Green</option>
                                                <option value="Blue">Blue</option>
                                                <option value="White">White</option>
                                                <option value="Black">Black</option>
                                                <option value="Grey">Grey</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="category">Category <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select class="form-control" id="subcategory" onclick="getValue();" name="category" required>
                                                <option value="{{ $product->category }}" selected>{{ $product->category }}</option>
                                                @foreach ($category as $data)
                                                <option>{{ $data->name }}</option>
                                                @endforeach
                                              </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="subcategory">Sub-Category <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select class="form-control" id="subcategory" onclick="getValue();" name="subcategory" required>
                                                <option value="{{ $product->subcategory }}" selected>{{ $product->subcategory }}</option>
                                                @foreach ($subcategory as $data)
                                                <option>{{ $data->name }}</option>
                                                @endforeach
                                              </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image Sample
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            @if($data->product_image == null)
                                                <img src="{{ asset('frontend/image/no-image.jpg') }}" width="150px" alt="product_image">
                                            @else
                                                <img src="{{ asset('upload/images/'.$data['product_image']) }}" width="150px" alt="product_image">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="product_image">Change Image
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="file" id="file-ip-1" accept="image/*" class="form-control-file border" onchange="showPreview1(event);" name="product-img">
                                          <div class="invalid-feedback">Please choose the product image.</div>
                                          <div class="preview mt-2">
                                            <img src="" id="file-ip-1-preview" width="40%;">
                                        </div>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="budget">Budget <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="number" id="budget" name="budget" value="{{ $product['budget'] }}"  class="form-control" autofocus>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="description">Description <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <textarea class="form-control" name="description" id="description"  rows="3" placeholder="Description Here......." required>{{ $product['description'] }}</textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <h2>Leads Category and Points</h2>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="leads_category">Leads Category <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select class="form-control" id="leads_category" onclick="getValue();" name="leads_category" required>
                                                <option value="{{ $product->leads_category }}">{{ $product->leads_category }}</option>
                                                <option value="Premium">Premium</option>
                                                <option value="Regular">Regular</option>
                                                <option value="Free">Free</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="points">Points <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="number" id="points" name="points" value="{{ $product['points'] }}"  class="form-control" autofocus required>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="availability">Availability <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="number" id="availability" name="availability" value="{{ $product['availability'] }}" required="required" class="form-control" autofocus>
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <h2>Customer Details</h2>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="customer_name">Customer Name <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="customer_name" name="customer_name" value="{{ $product['buyer_name'] }}" required="required" class="form-control" autofocus>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="customer_email">Customer Email <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="email" id="customer_email" name="customer_email" value="{{ $product['buyer_email'] }}" required="required" class="form-control" autofocus>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="customer_contact">Customer contact No. <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="customer_contact" name="customer_contact" value="{{ $product['buyer_contact'] }}" required="required" class="form-control" autofocus>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="district">District <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="district" name="district" value="{{ $product['buyer_district'] }}" required="required" class="form-control" autofocus>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="customer_address">Customer Address <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="customer_address" name="customer_address" value="{{ $product['buyer_address'] }}" required="required" class="form-control" autofocus>
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-12 col-sm-12 offset-md-3">
                                            <button class="btn btn-primary" type="reset" onclick="return confirm('Are you sure want to reset?')">Reset</button>
                                            <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure want to continue?')">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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

    {{-- script --}}
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
    </script>
	
    {{-- alert script --}}
    @include('admin/alert-script');
  </body>
</html>
