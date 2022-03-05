<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Dashboard </title>

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
              <div class="x_title">
                <h2>Edit Customer Detail</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <form action="{{ route('admin-update') }}" method="post" enctype="multipart/form-data" class="was-validated">
                @csrf
                <input type="hidden" class="form-control" value="{{$user['id']}}" name="user_id" id="user_id" aria-describedby="emailHelp" required>
                <div class="mb-3">
                  <label for="name" class="form-label">Full Name :</label>
                  <input type="text" class="form-control" value="{{$user['name']}}" name="name" id="name" aria-describedby="emailHelp" required>
                  <div class="invalid-feedback">Please fill out this field.</div>
                  <div id="showErrorName"></div>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email :</label>
                  <input type="email" class="form-control" name="email" id="email" value="{{$user['email']}}" aria-describedby="emailHelp" required>
                  <div class="invalid-feedback">Please fill out this field.</div>
                  <div id="showErrorEmail"></div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                    <div class="mb-3">
                      <label for="Mobile" class="form-label">Mobile :</label>
                      <input type="text" class="form-control" value="{{$user['mobile']}}" name="mobile" id="mobile" aria-describedby="emailHelp" required>
                      <div class="invalid-feedback">Please fill out this field.</div>
                      <div id="showErrorPhone"></div>
                        @error('mobile')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="address" class="form-label">Address :</label>
                      <input type="text" class="form-control" value="{{$user['address']}}" name="address" id="address" aria-describedby="emailHelp" required>
                    </div>
                    
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="submit" onclick="return confirm('Are you sure want to update?')" class="btn btn-success">Update</button>
            </div>
          </form>
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
    
    {{-- alert script --}}
    @include('admin/alert-script');
  </body>
</html>
