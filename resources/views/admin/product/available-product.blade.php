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
                              <h2>Add Available Products</h2>
                              <ul class="nav navbar-right panel_toolbox">
                                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                  </li>
                                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                                  </li>
                              </ul>
                              <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <form action="{{ route('post-available-product') }}" method="post" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left was-validated">
                              @csrf
                              <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Category <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                  <select class="select1 form-control" name="category">
                                    <option value="0">Choose Category</option>
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
                                      <input type="text" id="name" name="name" required="required" class="form-control" placeholder="Enter Category Name">
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
                              <div class="form-group">
                                  <div class="col-md-12 col-sm-12 mt-3 text-center">
                                      <button type="submit" onclick="return confirm('Are you sure want to continue?')" class="btn btn-success">Add Now</button>
                                  </div>
                              </div>
                          </form>
                          <div class="ln_solid"></div>
                          </div>
                          <div class="card-box table-responsive">
                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                              <tr>
                                <th scope="col">SN</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Image</th>
                                  <th scope="col">Category</th>
                                  <th scope="col">Sub-Category</th>
                                  <th scope="col">#Action</th>
                              </tr>
                            </thead>
                            <tbody id="myTable">
                              <p hidden>{{ $n=1; }}</p>
                              @foreach ($product as $data)
                              <tr>
                                <td>{{ $n }}</td>
                                <td>{{ $data->name }}</td>
                                <td class="text-center"><img src="{{ asset('upload/images/'.$data['product_image']) }}" alt="product image" height="200px" width="200px"></td>
                                <td>{{ $data->category }}</td>
                                <td>{{ $data->subcategory }}</td>
                                <td>
                                  <form action="{{ route('edit_available_product') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $data->id }}">
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                  </form>
                                  <form action="{{ route('delete_available_product') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $data->id }}">
                                    <button type="submit" onclick="return confirm('Are you sure want to continue?')" class="btn btn-danger">Remove</button>
                                  </form>
                                </td>
                              </tr>
                              <p hidden>{{ $n++; }}</p>
                              @endforeach
                            </tbody>
                          </table>
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
