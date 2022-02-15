<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard </title>

    @include('layout/admin/css')
  </head>
  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="{{ url('admin/login') }}" method="post" class="was-validated">
              @csrf
              <h1>Login Form</h1>
              {{-- alert message --}}
                @include('admin/alert-message')
              <div>
                <input type="email" class="form-control" name="email" placeholder="Email Address" value="{{ old('email') }}" autocomplete="email" required autofocus/>
                @error('email')
                    <span class="text-danger" style="font-size: 18px">
                        {{$errors->first('email')}}
                    </span>
                @enderror
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Password" required autofocus/>
                @error('password')
                    <span class="text-danger" style="font-size: 18px">
                        {{$errors->first('password')}}
                    </span>
                @enderror
              </div>
              <div>
                <button type="submit" class="btn btn-primary">Login</button>
                <a href="">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Kanxiko.com</h1>
                  <p>©2022 All Rights Reserved. Kanxiko.com!</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>

    {{-- script --}}
    <!-- jQuery -->
    <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    
    {{-- alert script --}}
    @include('admin/alert-script');
  </body>
</html>
