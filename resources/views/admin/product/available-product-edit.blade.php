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
                              <div class="form-group col-md-6">
                                <label for="Name">Name</label>
                                <input type="text" id="name" name="name" required="required" class="form-control" value="{{ $data['name'] }}" placeholder="Enter Category Name">
                              </div>
                              <div class="form-group col-md-6">
                                <label for="category">Category</label>
                                <select class="select1 form-control" name="category">
                                  <option value="{{ $data->category }}">{{ $data->category }}</option>
                                  @foreach ($category['a'] as $i => $a)
                                    <option value="{{ $a->slug }}">{{ $a->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="form-group col-md-6">
                                <label for="price">Sub-Category</label>
                                <select class="form-control" name="subcategory">
                                  <option value="{{ $data->subcategory }}">{{ $data->subcategory }}</option>
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
                                <input type="text" id="price" name="price" required="required" class="form-control" value="{{ $data->price }}" placeholder="Enter Price">
                              </div>
                              <div class="form-group col-md-6">
                                <label for="quantity">Quantity</label>
                                <input type="number" id="quantity" name="quantity" required="required" class="form-control" value="{{ $data->quantity }}" placeholder="Enter Quantity">
                              </div>
                              <div class="form-group col-md-12">
                                <label for="description">Description</label>
                                <textarea id="summernote" name="description"  placeholder="Enter Description">{{ $data->description }}
                                </textarea>
                              </div>
                              <div class="form-group col-md-6">
                                <img src="{{ asset('upload/images/'.$data['product_image']) }}" width="150px" alt="product image">
                                <br>
                                <label for="image">Image</label>
                                <input type="file" id="file-ip-2" accept="image/*" class="form-control-file border" onchange="showPreview2(event);" name="image">
                                  
                                  <div class="preview mt-3">
                                    <img src="" id="file-ip-2-preview" width="50%;">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  @if ($data->images != null)
                                <?php
                                  $vv=json_decode($data->images, true);
                                  
                                  ?>
                                  @foreach($vv as $image)
                                    <img src="{{ asset('upload/images/'.$image) }}" alt="Image" width="150px">
                                  @endforeach
                                  @else
                                <img src="{{ asset('no-image.jpg') }}" alt="Image" width="100px">
                                @endif
                                <br>
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
                                  @if ($data->status=="on")
                                  <input type="checkbox" class="form-control" name="status" checked>
                                  @else
                                  <input type="checkbox" class="form-control" name="status">
                                  @endif
                                  <span class="slider round"></span>
                              </label>
                              </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                            <label for="trending">Trending?</label><br>
                            <label class="switch">
                                @if ($data->trending=="on")
                                <input type="checkbox" class="form-control" name="trending" checked>
                                @else
                                <input type="checkbox" class="form-control" name="trending">
                                @endif
                                <span class="slider round"></span>
                            </label>
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
      
  </body>
</html>
