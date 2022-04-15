<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Dashboard | Sub-Category </title>

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
                                <h2>Sub-Category of {{ $category->name }}</h2>
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
                                  <div class="col-sm-12">
                                    <div class="card-box table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                      <thead>
                                        <tr>
                                          <th scope="col">Sub-Category Name</th>
                                          <th scope="col">Page Title</th>
                                          <th scope="col">Action</th>
                                        </tr>
                                      </thead>
                                      <tbody id="myTable">
                                        @foreach ($subcategory as $data)
                                        <tr>
                                          <td>{{ $data->name }}</td>
                                          <td>{{ $data->title }}</td>
                                          <td>
                                            <form action="{{ route('edit_subcategory') }}" method="post">
                                              @csrf
                                              <input type="hidden" name="id" value="{{ $data['id'] }}">
                                              <button type="submit" class="btn btn-primary">Edit</button>
                                            </form>
                                            <form action="{{ route('delete_subcategory') }}" method="post">
                                              @csrf
                                              <input type="hidden" name="id" value="{{ $data['id'] }}">
                                              <button type="submit" onclick="return confirm('Are you sure want to continue?')" class="btn btn-danger">Remove</button>
                                            </form>
                                          </td>
                                        </tr>
                                        @endforeach
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 ">
                      <div class="x_panel">
                          <div class="x_title">
                              <h2>Add New Sub Category</h2>
                              <ul class="nav navbar-right panel_toolbox">
                                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                  </li>
                                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                                  </li>
                              </ul>
                              <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <form action="{{ url($category['name'].'/subcategory/add') }}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left was-validated">
                              @csrf
                              <div class="item form-group">
                                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 ">
                                      <input type="text" id="name" name="name" required="required" class="form-control" placeholder="Enter Sub-Category Name" autofocus>
                                  </div>
                              </div>
                              <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Page Title <span class="required"></span>
                                </label>
                                <div class="col-md-6 col-sm-7 ">
                                  <input type="text" id="title" name="title" class="form-control" placeholder="Enter Page Title" autofocus >
                              </div>
                            </div>
                              <div class="ln_solid"></div>
                              <div class="item form-group">
                                  <div class="col-md-6 col-sm-6 offset-md-3">
                                      <button type="submit" class="btn btn-success">Submit</button>
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
	
    {{-- alert script --}}
    @include('admin/alert-script')

  </body>
</html>
