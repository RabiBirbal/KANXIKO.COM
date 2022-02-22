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
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        {{-- sidenav and top nav --}}
        @include('layout/admin/sidenav')
        {{-- sidenav and top nav ends --}}
        <!-- page content -->
        <div class="right_col" role="main">
          @include('admin/alert-message')
          <!-- top tiles -->
          <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
            <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                      <div class="x_panel">
                          <div class="x_title">
                              <h2>Edit {{ $data->name }}</h2>
                              <ul class="nav navbar-right panel_toolbox">
                                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                  </li>
                                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                                  </li>
                              </ul>
                              <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <form action="{{ route('update-available-product') }}" method="post" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left was-validated">
                              @csrf
                              <input type="hidden" name="id" value="{{ $data['id'] }}">
                              <div class="item form-group">
                                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name: <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 ">
                                      <input type="text" id="name" name="name" required="required" class="form-control" placeholder="Enter Category Name" value="{{ $data['name'] }}" autofocus >
                                  </div>
                              </div>
                              <div class="form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Image:  <span class="required"></span>
                                </label>
                                <div class="col-md-9 col-sm-9 mb-3">
                                <img src="{{ asset('upload/images/'.$data['product_image']) }}" width="30%" alt="product image">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Category:  <span class="required"></span>
                                </label>
                                <div class="col-md-9 col-sm-9 mb-3">
                                  <select class="select1 form-control" name="category">
                                    <option value="{{ $data->category }}">{{ $data->category }}</option>
                                    @foreach ($category['a'] as $i => $a)
                                      <option value="{{ $a->name }}">{{ $a->name }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Sub-Category:  <span class="required"></span>
                                </label>
                                <div class="col-md-9 col-sm-9 mb-3">
                                  <select class="form-control" name="subcategory">
                                    <option value="{{ $data->subcategory }}">{{ $data->subcategory }}</option>
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
                              <div class="form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Change Image:
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                <input type="file" id="file-ip-2" accept="image/*" class="form-control-file border" onchange="showPreview2(event);" name="image">
                                </div><br>
                                <div class="preview mt-3 col-md-6 col-sm-6">
                                  <img src="" id="file-ip-2-preview" width="50%;">
                                </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-md-12 col-sm-12 mt-3 text-center">
                                      <button type="submit" onclick="return confirm('Are you sure want to continue?')" class="btn btn-success">Update</button>
                                  </div>
                              </div>
                          </form>
                          <div class="ln_solid"></div>
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
    
    {{-- alert script --}}
    @include('admin/alert-script');

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
