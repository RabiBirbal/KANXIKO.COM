<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Dashboard | Admin </title>

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
                                <h2>Add Admin</h2>
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
                                <form action="{{ route('add-admin') }}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left was-validated">
                                    @csrf
                                    <div class="item form-group">
                                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="action">Choose Role <span class="required">*</span>
                                      </label>
                                      <div class="col-md-6 col-sm-6 ">
                                          <select class="form-control" name="role">
                                            <option value="0">Buyer Department</option>
                                            <option value="2">Seller Department</option>
                                          </select>
                                      </div>
                                  </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Full Name <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="name" name="name" required="required" class="form-control" autofocus>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email Address <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="email" id="email" name="email" required="required" class="form-control" autofocus autocomplete="email">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="password" id="password" name="password" required="required" class="form-control" autofocus>
                                            <div id="showErrorpswd"></div>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="cpassword">Confirm Password <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="password" id="cpassword" name="cpassword" required="required" class="form-control" autofocus>
                                            <div id="showErrorcpswd"></div>

                                            @error('cpassword')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="Point">Mobile <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="mobile" name="mobile" required="required" class="form-control" autofocus>
                                            <div id="showErrorPhone"></div>

                                            @error('mobile')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="address">Address <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="address" name="address" required="required" class="form-control" autofocus>
                                        </div>
                                    </div>
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
	
    {{-- alert script --}}
    @include('admin/alert-script')

    <script type="text/javascript">
        $(document).ready(function(){
      
          $('#password').keyup(function(){
            var password=$('#password').val();
            if(password.length>15){
              $('#showErrorpswd').html('Password must be less than 16 characters');
               $('#showErrorpswd').css('color','red');
               document.getElementById("submit").disabled = true;
               return false;
            }
            else if(password.length<6){
              $('#showErrorpswd').html('Password must be greater than 6 characters');
               $('#showErrorpswd').css('color','red');
               document.getElementById("submit").disabled = true;
               return false;
            }
            else{
              $('#showErrorpswd').html('');
              document.getElementById("submit").disabled = false;
               return true;
            }
          });
        });
      </script>

      <script type="text/javascript">
        $('#cpassword').keyup(function(){
                var password=$('#password').val();
                var cpassword=$('#cpassword').val();
      
                if(cpassword!=password){
                  $('#showErrorcpswd').html('Password didn not matched');
                   $('#showErrorcpswd').css('color','red');
                   document.getElementById("submit").disabled = true;
                   return false;
                }
                else{
                  $('#showErrorcpswd').html('');
                  document.getElementById("submit").disabled = false;
                   return true;
                }
              });
              $('#mobile').keyup(function(){
      var mobile=$('#mobile').val();
      if(isNaN(mobile)){
        $('#showErrorPhone').html('Mobile number must be a number');
         $('#showErrorPhone').css('color','red');
         document.getElementById("submit").disabled = true;
        return false;
      }
      else if(mobile.length!=10){
        $('#showErrorPhone').html('Phone number must be of 10 characters');
         $('#showErrorPhone').css('color','red');
         document.getElementById("submit").disabled = true;
         return false;
      }
      else{
        $('#showErrorPhone').html('');
        document.getElementById("submit").disabled = false;
        return true;
      }
    });
      </script>
      
  </body>
</html>
