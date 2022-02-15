<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Dashboard</title>

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
                <h2>Change Password</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div class="container padding-bottom-3x mb-2 mt-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-10">
                            <form action="{{ route('post-admin-change-password') }}" method="post" class="card mt-4">
                                @csrf
                                <input type="hidden" name="id" value="{{ $user['id'] }}">
                                <div class="card-body">
                                    <div class="form-group">
                                        <input class="form-control" type="email" name="email" id="email-for-pass" placeholder="Enter Your Email Address" value="{{ $user['email'] }}" required="" readonly>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="password" name="current_password" id="current_password" placeholder="Current Password" required="" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="password" name="password" id="password" placeholder="New Password" required="" autofocus>
                                        <div id="showErrorpswd"></div>
            
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" required="" autofocus>
                                        <div id="showErrorcpswd"></div>
            
                                            @error('cpassword')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" onclick="return confirm('Are you sure want to continue?')" class="btn btn-success" >Change Password</button> 
                                </div>
                            </form>
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
      </div>
    </div>
	@include('layout/admin/js')
    {{-- alert script --}}
    @include('admin/alert-script');
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
      </script>
  </body>
</html>
