<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Dashboard | Embed Facebook </title>

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
                                <h2>Add Embed Facebook</h2>
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
                                <form action="{{ route('add-facebook') }}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left was-validated">
                                    @csrf
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="facebook">Embed Facebook Link <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="facebook" name="facebook" required="required" class="form-control" autofocus>
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                            <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure want to continue?')">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="x_content">
                                <h2>Embed Facebook Link List</h2>
                                <br />
                                <div class="card-box table-responsive">
                                  <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                  <thead>
                                    <tr class="text-center">
                                      <th scope="col">ID</th>
                                      <th scope="col">Embed Facebook Link</th>
                                      <th scope="col">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($facebook as $data)
                                    <tr>
                                      <td>{{ $data->id }}</td>
                                      <td><textarea name="facebook" id="facebook" rows="5" class="form-control" readonly>{{ $data->embed_facebook_link }}</textarea></td> 
                                      <td>
                                        <form action="{{ route('delete-facebook') }}" method="post">
                                          @csrf
                                          <input type="hidden" name="facebook_id" value="{{ $data['id'] }}">
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
