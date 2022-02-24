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
                                            <select class="select1 form-control" name="category">
                                                <option value="{{ $product->category }}">{{ $product->category }}</option>
                                                @foreach ($category['a'] as $i => $a)
                                                  <option value="{{ $a->name }}">{{ $a->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="subcategory">Sub-Category <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select class="form-control" name="subcategory">
                                                <option value="{{ $product->subcategory }}">{{ $product->subcategory }}</option>
                                                @foreach ($category['a'] as $i => $a)
                                                <optgroup label="{{ $a->name }} " class="{{ $a->name }} box1">
                                                  @foreach ($category['b'][$i] as $b)
                                                    <option value="{{ $b->name }}">{{ $b->name }}</option>
                                                  @endforeach
                                                </optgroup>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image Sample
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            @if($product->product_image == null)
                                                <img src="{{ asset('frontend/image/no-image.jpg') }}" width="150px" alt="product_image">
                                            @else
                                                <img src="{{ asset('upload/images/'.$product['product_image']) }}" width="150px" alt="product_image">
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
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="customer_address">Province No. <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select class="select1 form-control" name="province" required>
                                                @if($product->buyer_province == 'one')
                                                <option value="one" selected>Province 1</option>
                                                @elseif ($product->buyer_province == 'two')
                                                <option value="two" selected>Province 2</option>
                                                @elseif ($product->buyer_province == 'three')
                                                <option value="three" selected>Province 3</option>
                                                @elseif ($product->buyer_province == 'four')
                                                <option value="four" selected>Province 4</option>
                                                @elseif ($product->buyer_province == 'five')
                                                <option value="five" selected>Province 5</option>
                                                @elseif ($product->buyer_province == 'six')
                                                <option value="six" selected>Province 6</option>
                                                @elseif ($product->buyer_province == 'seven')
                                                <option value="seven" selected>Province 7</option>
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
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="customer_address">District <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select class="form-control" name="district" required>
                                                <option value="{{ $product['buyer_district'] }}">{{ $product['buyer_district'] }}</option>
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
    {{-- alert script --}}
    @include('admin/alert-script');
  </body>
</html>
