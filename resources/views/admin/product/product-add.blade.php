<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Dashboard | Product </title>

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
            <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Add Product Order</h2>
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
                                <form action="{{ route('store_product') }}" method="post" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left was-validated">
                                    @csrf
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Product/Service Name <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="name" name="name" required="required" class="form-control" value="{{ old('name') }}" autofocus>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="quantity">Quantity/Duration/Other <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="quantity" name="quantity" required="required" class="form-control" value="{{ old('quantity') }}" autofocus>
                                        </div>
                                    </div>
                                    {{-- example of getting data from category and subcategory table --}}
                                    {{-- @foreach ($category['a'] as $i => $a)
                                      <strong>{{ $a->name }}</strong>
                                      @foreach ($category['b'][$i] as $b)
                                        <span>{{ $b->name }}</span>
                                      @endforeach
                                    @endforeach --}}
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="category">Category <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select class="select1 form-control" name="category">
                                              <option value="0">Choose Category</option>s
                                              @foreach ($category['a'] as $i => $a)
                                                <option value="{{ $a->slug }}">{{ $a->name }}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="subcategory">Sub-Category <span class="required">*</span>
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
                                    <div class="item form-group Clothing size">
                                        <label class="col-form-label col-md-3 col-sm-6 label-align" for="size">Size <span class="required">*</span>
                                        </label>
                                        <div class="col-md-2 col-sm-6 ">
                                            <select class="select form-control" name="size">
                                                <option value="NULL" >Size</option>
                                                <option value="S">S</option>
                                                <option value="M">M</option>
                                                <option value="L">L</option>
                                                <option value="XL">XL</option>
                                                <option value="XXL">XXL</option>
                                                <option value="XXXL">XXXL</option>
                                              </select>
                                        </div>
                                        <label class="col-form-label col-md-1 col-sm-6 label-align text-right" for="size">Color <span class="required">*</span>
                                        </label>
                                        <div class="col-md-3 col-sm-6 ">
                                            <select class="select form-control" name="color">
                                                <option value="NULL">Color</option>
                                                <option value="Black">Black</option>
                                                <option value="Blue">Blue</option>
                                                <option value="Red">Red</option>
                                                <option value="Green">Green</option>
                                                <option value="White">White</option>
                                                <option value="Grey">Grey</option>
                                              </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="product_image">Image Sample
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
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="budget">Budget <span class="required">(if any)</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="number" id="budget" name="budget" class="form-control" value="{{ old('budget') }}" autofocus>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="description">Description <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Description Here......." required></textarea>
                                        </div>
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
                                          <input type="number" name="point" class="form-control"  value="{{ old('point') }}"required/>
                                          </div>
                                          <label class="col-form-label col-md-2 col-sm-2 label-align" for="description">Availability <span class="required">*</span>
                                          </label>
                                          <div class="col-md-2 mb-3">
                                            <input type="number" name="availability" class="form-control" value="1"/ required>
                                          </div>
                                        </div>
                                    </div>
                                    {{-- <div class="ln_solid"></div> --}}
                                    <h2>Customer Details</h2>
                                    @include('layout/admin/buyer-form')
                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                            <button class="btn btn-primary" type="reset" onclick="return confirm('Are you sure want to reset?')">Reset</button>
                                            <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure want to continue?')">Submit</button>
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
    @include('admin/alert-script')

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
