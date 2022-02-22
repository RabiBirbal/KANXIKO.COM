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
    <style>
      textarea{ 
        height:150px; 
        min-height:150px;  
        max-height:150px;
    }
    </style>
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
                    <form action="{{ url('/unverified-product/verify/'.$productlist['id']) }}" method="post" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left was-validated">
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
                            <input type="hidden" class="form-control" name="product_image" value="{{ $productlist['product_image'] }}" readonly/>
                          </div>
                          <div class="col-md-2 mb-3 text-right">
                              <span>Product Id</span>
                          </div>
                          <div class="col-md-3 mb-3">
                            <input type="text" class="form-control" name="id" value="{{ $productlist['id'] }}" readonly/>
                        </div>
                        <div class="col-md-2 mb-3 text-right">
                            <span>Name</span>
                        </div>
                        <div class="col-md-4 mb-3">
                          <input type="text" class="form-control" name="name" value="{{ $productlist['name'] }}" readonly/>
                      </div>
                        <div class="col-md-2 mb-3 text-right">
                            <span>Category</span>
                        </div>
                        <div class="col-md-3 mb-3">
                            <input type="text" class="form-control" name="category" value="{{ $productlist['category'] }}" readonly/>
                        </div>
                        <div class="col-md-2 mb-3 text-right">
                            <span>Sub-Category</span>
                        </div>
                        <div class="col-md-4 mb-3">
                          <input type="text" class="form-control" name="subcategory" value="{{ $productlist['subcategory'] }}" readonly/>
                        </div>
                        <div class="col-md-2 mb-3 text-right">
                            <span>Quantity</span>
                        </div>
                        <div class="col-md-3 mb-3">
                          <input type="text" class="form-control" name="quantity" value="{{ $productlist['quantity'] }}"/>
                        </div>
                        <div class="col-md-2 mb-3 text-right">
                            <span>Size</span>
                        </div>
                        <div class="col-md-4 mb-3">
                          <input type="text" class="form-control" name="size" value="{{ $productlist['size'] }}"/>
                        </div>
                        <div class="col-md-2 mb-3 text-right">
                            <span>Color</span>
                        </div>
                        <div class="col-md-3 mb-3">
                          <input type="text" class="form-control" name="color" value="{{ $productlist['color'] }}"/>
                        </div>
                        <div class="col-md-2 mb-3 text-right">
                            <span>Budget</span>
                        </div>
                        <div class="col-md-4 mb-3">
                          <input type="text" class="form-control" name="budget" value="{{ $productlist['budget'] }}"/>
                        </div>
                        <div class="col-md-2 mb-3 text-right">
                            <span>Description</span>
                        </div>
                        <div class="col-md-9 mb-3">
                          <textarea class="form-control" name="description">{{ $productlist['description'] }}</textarea>
                        </div>
                        <div class="col-md-12">
                          <h2>Choose Leads Category and Points</h2>
                          <hr class="mb-3">
                          <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="description">Leads Category <span class="required">*</span>
                            </label>
                            <div class="col-md-6 mb-3">
                            <select class="form-control" id="subcategory" onclick="getValue();" name="leads_category" required>
                                <option value="0" selected>Choose Leads Category</option>
                                <option value="Premium">Premium</option>
                                <option value="Regular">Regular</option>
                                <option value="Free">Free</option>
                            </select>
                            </div>
                          </div>
                          <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="description">Points <span class="required">*</span>
                            </label>
                            <div class="col-md-2 mb-3">
                            <input type="number" name="point" class="form-control" required/>
                            </div>
                            <label class="col-form-label col-md-2 col-sm-2 label-align" for="description">Availability <span class="required">*</span>
                            </label>
                            <div class="col-md-2 mb-3">
                              <input type="number" name="availability" class="form-control" value="1" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-12">
                            <h2>Buyer Details</h2>
                            <hr>
                            </div>
                            <div class="col-md-2 mb-3 text-right">
                                <span>Name</span>
                            </div>
                            <div class="col-md-3 mb-3">
                            <input type="text" class="form-control" name="customer_name" value="{{ $productlist['buyer_name'] }}"/>
                            </div>
                            <div class="col-md-2 mb-3 text-right">
                                <span>Email</span>
                            </div>
                            <div class="col-md-4 mb-3">
                            <input type="text" class="form-control" name="customer_email" value="{{ $productlist['buyer_email'] }}"/>
                            </div>
                            <div class="col-md-2 mb-3 text-right">
                              <span>Email Status</span>
                          </div>
                          <div class="col-md-3 mb-3">
                            <select name="status" id="status" class="form-control">
                              @if($productlist->is_verified == '0')
                              <option value="0" selected>Unverified</option>
                              @else
                              <option value="1" selected>Verified</option>
                              @endif
                              <option value="0">Unverified</option>
                              <option value="1">Verified</option>
                            </select>
                          </div>
                            <div class="col-md-2 mb-3 text-right">
                                <span>Contact No.</span>
                            </div>
                            <div class="col-md-4 mb-3">
                            <input type="text" class="form-control" name="customer_contact" value="{{ $productlist['buyer_contact'] }}"/>
                            </div>
                            <div class="col-md-2 mb-3 text-right">
                              <span>Address</span>
                          </div>
                          <div class="col-md-3 mb-3">
                          <input type="text" class="form-control" name="customer_address" value="{{ $productlist['buyer_address'] }}" />
                          </div>
                            <div class="col-md-2 mb-3 text-right">
                              <span>Province</span>
                          </div>
                          <div class="col-md-4 mb-3">
                              <select class="select1 form-control" name="province" >
                                @if($productlist->buyer_province != 'null')
                                @if($productlist->buyer_province == 'one')
                                <option value="one" selected>Province 1</option>
                                @elseif ($productlist->buyer_province == 'two')
                                <option value="two" selected>Province 2</option>
                                @elseif ($productlist->buyer_province == 'three')
                                <option value="three" selected>Province 3</option>
                                @elseif ($productlist->buyer_province == 'four')
                                <option value="four" selected>Province 4</option>
                                @elseif ($productlist->buyer_province == 'five')
                                <option value="five" selected>Province 5</option>
                                @elseif ($productlist->buyer_province == 'six')
                                <option value="six" selected>Province 6</option>
                                @elseif ($productlist->buyer_province == 'seven')
                                <option value="seven" selected>Province 7</option>
                                @endif
                                @else
                                <option value="0" selected>Select Province</option>
                                @endif
                                <option value="one">Province 1</option>
                                <option value="two">Province 2</option>
                                <option value="three">Province 3</option>
                                <option value="four">Province 4</option>
                                <option value="five">Province 5</option>
                                <option value="six">Province 6</option>
                                <option value="seven">Province 7</option>
                              </select>
                            </div>
                            <div class="col-md-2 mb-3 text-right">
                              <span>District</span>
                          </div>
                          <div class="col-md-3 mb-3">
                            <select class="form-control" name="district">
                              @if($productlist->buyer_district != 'null')
                              <option value="{{ $productlist->buyer_district }}" selected>{{ $productlist->buyer_district }}</option>
                              @else
                              <option value="0">Select District</option>
                              @endif
                              <optgroup label="Province 1" class="one box1">
                              <option value="Bhojpur">Bhojpur</option>
                              <option value="Dhankuta">Dhankuta</option>
                              <option value="Ilam">Ilam</option>
                              <option value="Jhapa">Jhapa</option>
                              <option value="Khotang">Khotang</option>
                              <option value="Morang">Morang</option>
                              <option value="Okhaldhunga">Okhaldhunga</option>
                              <option value="Panchthar">Panchthar</option>
                              <option value="Sankhuwasabha">Sankhuwasabha</option>
                              <option value="Solukhumbu">Solukhumbu</option>
                              <option value="Sunsari">Sunsari</option>
                              <option value="Taplejung">Taplejung</option>
                              <option value="Terhathum">Terhathum</option>
                              <option value="Udayapur">Udayapur</option>
                              </optgroup>
                              <optgroup label="Province 2" class="two box1">
                                <option value="Bara">Bara</option>
                                <option value="Dhanusha">Dhanusha</option>
                                <option value="Mahottari">Mahottari</option>
                                <option value="Parsa">Parsa</option>
                                <option value="Rautahat">Rautahat</option>
                                <option value="Saptari">Saptari</option>
                                <option value="Sarlahi">Sarlahi</option>
                                <option value="Siraha">Siraha</option>
                              </optgroup>
                              <optgroup label="Province 3" class="three box1">
                                <option value="Bhaktapur">Bhaktapur</option>
                                <option value="Chitwan">Chitwan</option>
                                <option value="Dhading">Dhading</option>
                                <option value="Dolakha">Dolakha</option>
                                <option value="Kathmandu">Kathmandu</option>
                                <option value="Kavrepalanchok">Kavrepalanchok</option>
                                <option value="Lalitpur">Lalitpur</option>
                                <option value="Makawanpur">Makawanpur</option>
                                <option value="Nuwakot">Nuwakot</option>
                                <option value="Ramechhap">Ramechhap</option>
                                <option value="Rasuwa">Rasuwa</option>
                                <option value="Sindhuli">Sindhuli</option>
                                <option value="Sindhupalchok">Sindhupalchok</option>
                              </optgroup>
                              <optgroup label="Province 4" class="four box1">
                                <option value="Baglung">Baglung</option>
                                <option value="Gorkha">Gorkha</option>
                                <option value="Kaski">Kaski</option>
                                <option value="Lamjung">Lamjung</option>
                                <option value="Manang">Manang</option>
                                <option value="Mustang">Mustang</option>
                                <option value="Myagdi">Myagdi</option>
                                <option value="Nawalpur">Nawalpur</option>
                                <option value="Parbat">Parbat</option>
                                <option value="Syangja">Syangja</option>
                                <option value="Tanahu">Tanahu</option>
                              </optgroup>
                              <optgroup label="Province 5" class="five box1">
                                <option value="Arghakhanchi">Arghakhanchi</option>
                                <option value="Banke">Banke</option>
                                <option value="Bardiya">Bardiya</option>
                                <option value="Dang">Dang</option>
                                <option value="Gulmi">Gulmi</option>
                                <option value="Kapilvastu">Kapilvastu</option>
                                <option value="Parasi">Parasi</option>
                                <option value="Palpa">Palpa</option>
                                <option value="Pyuthan">Pyuthan</option>
                                <option value="Rolpa">Rolpa</option>
                                <option value="Rukum">Rukum</option>
                                <option value="Rupandehi">Rupandehi</option>
                              </optgroup>
                              <optgroup label="Province 6" class="six box1">
                                <option value="Dailekh">Dailekh</option>
                                <option value="Dolpa">Dolpa </option>
                                <option value="Humla">Humla </option>
                                <option value="Jajarkot">Jajarkot </option>
                                <option value="Jumla">Jumla </option>
                                <option value="Kalikot">Kalikot </option>
                                <option value="Mugu">Mugu </option>
                                <option value="Rukum Paschim">Rukum Paschim </option>
                                <option value="Salyan">Salyan </option>
                                <option value="Surkhet">Surkhet</option>
                              </optgroup>
                              <optgroup label="Province 7" class="seven box1">
                                <option value="Baitadi">Baitadi</option>
                                <option value="Bajhang">Bajhang</option>
                                <option value="Bajura">Bajura</option>
                                <option value="Dadeldhura">Dadeldhura</option>
                                <option value="Darchula">Darchula</option>
                                <option value="Doti">Doti</option>
                                <option value="Kailali">Kailali</option>
                                <option value="Kanchanpur">Kanchanpur</option>
                              </optgroup>
                              </select>
                          </div>
                            <div class="col-md-12 mb-3 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
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

    <script>
      $(document).ready(function(){
          $(".select1").change(function(){
              $(this).find("option:selected").each(function(){
                  var optionValue = $(this).attr("value");
                  if(optionValue){
                      $(".box1").not("." + optionValue).hide();
                      $("." + optionValue).show();
                  } else{
                      $(".box1").hide();
                  }
              });
          }).change();
      });
      </script>
  </body>
</html>
