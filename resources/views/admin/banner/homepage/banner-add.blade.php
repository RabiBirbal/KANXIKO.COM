<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Dashboard | Banner </title>

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
                                <h2>Homepage Banner Details</h2>
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
                                <table class="table table-hover text-dark mb-3">
                                  <thead>
                                    <tr class="text-center">
                                      <th scope="col" width="60%">Banner Image</th>
                                      <th scope="col" width="40%">#Edit</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($banner as $data)
                                    <tr>
                                      <td><img src="{{asset('upload/images/'.$data->banner_image)}}" alt="banner" width="90%" class="mb-3"></td>
                                      <td class="text-center pt-5">
                                        <form action="{{ route('delete-banner') }}" method="post">
                                          @csrf
                                          <input type="hidden" name="banner_id" value="{{ $data['id'] }}">
                                          <button type="submit" onclick="return confirm('Are you sure want to continue?')" class="btn btn-danger">Remove</button>
                                        </form>
                                      </td> 
                                    </tr>
                                    @endforeach
                                    
                                  </tbody>
                                </table>
                                <h4>Add New Banner</h4>
                                <form action="{{ route('store_banner') }}" method="post" enctype="multipart/form-data" class="text-dark">
                                  @csrf
                                  <div class="form-group col-md-6">
                                    <span>Category: </span>
                                    <input type="text" name="category" value="Homepage" class="form-control" readonly/>
                                  </div>
                                  <div class="form-group col-md-12">
                                    <span>Choose Image: </span>
                                    <input type="file" id="file-ip-1" accept="image/*" class="form-control-file border" onchange="showPreview1(event);" name="banner" required>
                                    <div class="preview mt-3">
                                      <img src="" id="file-ip-1-preview" width="50%;">
                                    </div>
                                  </div>
                                  <div class="pl-5 col-md-12">
                                    <button type="submit" onclick="return confirm('Are you sure want to continue?')" class="btn btn-primary">Add Now</button>
                                  </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 ">
                      <div class="x_panel">
                          <div class="x_title">
                              <h2>Homepage Ads Details</h2>
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
                              <table class="table table-hover text-dark mb-3">
                                <thead>
                                  <tr class="text-center">
                                    <th scope="col" width="60%">Banner Image</th>
                                    <th scope="col" width="40%">#Edit</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($ads_banner as $data)
                                  <tr>
                                    <td><img src="{{asset('upload/images/'.$data->banner_image)}}" alt="banner" width="50%" class="mb-3"></td>
                                    <td class="text-center pt-5">
                                      <form action="{{ route('delete-banner') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="banner_id" value="{{ $data['id'] }}">
                                        <button type="submit" onclick="return confirm('Are you sure want to continue?')" class="btn btn-danger">Remove</button>
                                      </form>
                                    </td> 
                                  </tr>
                                  @endforeach
                                  
                                </tbody>
                              </table>
                              <h4>Change Ads</h4>
                              <form action="{{ route('store_banner') }}" method="post" enctype="multipart/form-data" class="text-dark">
                                @csrf
                                <div class="form-group col-md-6">
                                  <span>Category: </span>
                                  <input type="text" name="category" value="Homepage Ads" class="form-control" readonly/>
                                </div>
                                <div class="form-group col-md-12">
                                  <span>Choose Image: </span>
                                  <input type="file" id="file-ip-2" accept="image/*" class="form-control-file border" onchange="showPreview2(event);" name="banner" required>
                                  <div class="preview mt-3">
                                    <img src="" id="file-ip-2-preview" width="50%;">
                                  </div>
                                </div>
                                <div class="pl-5 col-md-12">
                                  <button type="submit" onclick="return confirm('Are you sure want to continue?')" class="btn btn-primary">Add Now</button>
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
  </body>
</html>
