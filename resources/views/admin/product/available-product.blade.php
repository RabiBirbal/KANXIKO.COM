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
      /* The switch - the box around the slider */
      .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
      }
    
      /* Hide default HTML checkbox */
      .switch input {
      opacity: 0;
      width: 0;
      height: 0;
      }
    
      /* The slider */
      .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
      }
    
      .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
      }
    
      input:checked + .slider {
      background-color: #2196F3;
      }
    
      input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
      }
    
      input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
      }
    
      /* Rounded sliders */
      .slider.round {
      border-radius: 34px;
      }
    
      .slider.round:before {
      border-radius: 50%;
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
                              <div class="form-group col-md-6">
                                <label for="Name">Name</label>
                                <input type="text" id="name" name="name" required="required" class="form-control" placeholder="Enter Category Name">
                              </div>
                              <div class="form-group col-md-6">
                                <label for="category">Category</label>
                                <select class="select1 form-control" name="category">
                                  <option value="0">Choose Category</option>
                                  @foreach ($category['a'] as $i => $a)
                                    <option value="{{ $a->slug }}">{{ $a->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                            <div class="form-group col-md-6">
                              <label for="price">Sub-Category</label>
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
                            <div class="form-group col-md-6">
                              <label for="price">Price</label>
                              <input type="text" id="price" name="price" required="required" class="form-control" placeholder="Enter Price">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="quantity">Quantity</label>
                              <input type="number" id="quantity" name="quantity" required="required" class="form-control" placeholder="Enter Quantity">
                            </div>
                            <div class="form-group col-md-12">
                              <label for="description">Description</label>
                              <textarea id="summernote" name="description"  placeholder="Enter Description">
                              </textarea>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="image">Image</label>
                              <input type="file" id="file-ip-2" accept="image/*" class="form-control-file border" onchange="showPreview2(event);" name="image" required>
                                
                                <div class="preview mt-3">
                                  <img src="" id="file-ip-2-preview" width="50%;">
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="images">Upload Image</label><br>
                                  <input id="fileupload" type="file" name="images[]" multiple="multiple" />
                                  @error('images')
                                      <p style="color: red">{{ $message }}</p>
                                  @enderror 
                                  <hr />
                                  <b>Live Preview</b>
                                  <br />
                                  <br />
                                  <div id="dvPreview">
                                  </div>
                              </div>
                          </div>
                          <!-- Rounded switch -->
                            <div class="col-md-6">
                              <div class="form-group">
                              <label for="publish">Publish?</label><br>
                              <label class="switch">
                                  <input type="checkbox" class="form-control" name="status">
                                  <span class="slider round"></span>
                              </label>
                              </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                            <label for="trending">Trending?</label><br>
                            <label class="switch">
                                <input type="checkbox" class="form-control" name="trending">
                                <span class="slider round"></span>
                            </label>
                            </div>
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
                                  <th scope="col">Price</th>
                                  <th scope="col">Image</th>
                                  <th scope="col">Category</th>
                                  <th scope="col">Sub-Category</th>
                                  <th scope="col">Seller ID</th>
                                  <th scope="col">Add By (Seller)</th>
                                  <th scope="col">#Action</th>
                              </tr>
                            </thead>
                            <tbody id="myTable">
                              <p hidden>{{ $n=1; }}</p>
                              @foreach ($product as $data)
                              <tr>
                                <td>{{ $n }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->price }}</td>
                                <td class="text-center"><img src="{{ asset('upload/images/'.$data['product_image']) }}" alt="product image" width="100px"></td>
                                <td>{{ $data->category }}</td>
                                <td>{{ $data->subcategory }}</td>
                                <td>{{ $data->seller_id }}</td>
                                <td>
                                  @if ($data->seller_id)
                                  {{ $data->seller->first_name }} {{ $data->seller->last_name }}
                                  @else
                                  Add By Admin
                                  @endif
                                  
                                </td>
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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
  <script>
      $('textarea#summernote').summernote({
      placeholder: 'Write Introduction Here ......',
      tabsize: 2,
      height: 250,
toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'italic', 'underline', 'clear']],
      // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
      //['fontname', ['fontname']],
     // ['fontsize', ['fontsize']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['height', ['height']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'hr']],
      //['view', ['fullscreen', 'codeview']],
      ['help', ['help']]
    ],
    });
  </script>

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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<script language="javascript" type="text/javascript">
  window.onload = function () {
      var fileUpload = document.getElementById("fileupload");
      fileUpload.onchange = function () {
          if (typeof (FileReader) != "undefined") {
              var dvPreview = document.getElementById("dvPreview");
              dvPreview.innerHTML = "";
              var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
              for (var i = 0; i < fileUpload.files.length; i++) {
                  var file = fileUpload.files[i];
                  if (regex.test(file.name.toLowerCase())) {
                      var reader = new FileReader();
                      reader.onload = function (e) {
                          var img = document.createElement("IMG");
                          img.height = "100";
                          img.width = "100";
                          img.src = e.target.result;
                          dvPreview.appendChild(img);
                      }
                      reader.readAsDataURL(file);
                  } else {
                      alert(file.name + " is not a valid image file.");
                      dvPreview.innerHTML = "";
                      return false;
                  }
              }
          } else {
              alert("This browser does not support HTML5 FileReader.");
          }
      }
  };
</script>
      
  </body>
</html>
