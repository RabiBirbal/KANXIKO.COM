<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register Yourself</title>
	@include('layout/frontend/css')
  <style>
    #login1{
      background-image: url('../frontend/image/copywriting-conferences-1.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-position: center;
      background-size: cover;
      padding-bottom: 400px;
      height: 100vh;
    }
    #login1 .container #login-row #login-column #login-box {
      /*margin-top: 120px;*/
      max-width: 600px;
      /*height: 320px;*/
      border: 1px solid #9C9C9C;
      background-color: #EAEAEA;
      margin-top: 25%;
    }
    #login1 .container #login-row #login-column #login-box #login-form {
      padding: 20px;
    }
    #login1 .container #login-row #login-column #login-box #login-form #register-link {
      margin-top: -85px;
    }
  </style>
</head>
<body>
  {{-- alert message --}}
  @include('admin/alert-message')
  <div id="login1">
    <!--    <h3 class="text-center text-white pt-5">Login form</h3> -->
      <div class="container">
          <div id="login-row" class="row justify-content-center align-items-center">
              <div id="login-column" class="col-md-6">
                  <div id="login-box" class="col-md-12">
                      <form id="login-form" class="form" action="{{ route('add-order') }}" method="post">
                        @csrf
                          <h3 class="text-center text-info">Customer Details</h3>
                          <div class="form-group">
                            <div class="form-group">
                              <div class="row">
                                  <div class="col-md-6">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name *" value="" />
                                        <div id="showErrorName"></div>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                      </div>
                                  <div class="col-md-6">
                                    <input type="text" class="form-control" name="email" placeholder="Email*" value="" />
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                      <input type="text" class="form-control" name="contact" id="mobile" placeholder="Mobile Number *" value="" />
                                      <div id="showErrorPhone"></div>

                                      @error('mobile')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                                <div class="col-md-6">
                                  <input type="text" class="form-control" name="address" placeholder="Address*" value="" />
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="form-group col-md-6">
                                <select class="select1 form-control" name="province" >
                                  <option value="one">Province 1</option>
                                  <option value="two">Province 2</option>
                                  <option value="three">Province 3</option>
                                  <option value="four">Province 4</option>
                                  <option value="five">Province 5</option>
                                  <option value="six">Province 6</option>
                                  <option value="seven">Province 7</option>
                                </select>
                              </div>
                                <div class="col-md-6">
                                  <select class="form-control" name="district">
                                    <option value="0">Select District</option>
                                    <optgroup label="Province 1" class="one box1">
                                    <option value="Bhojpur">Bhojpur</option>
                                    <option value="Dhankuta">Dhankuta</option>
                                    <option value="Ilam">Ilam</option>
                                    <option value="Jhapa">Jhapa</option>
                                    <option value="Khotang">Khotang</option>
                                    <option value="Morang">Morang</option>
                                    <option value="Okhaldhunga">Okhaldhunga</option>
                                    <option value="Panchthar">Panchthar</option>
                                    <option value="Sankhuwasabha">Sankhuwasabha</option>
                                    <option value="Solukhumbu">Solukhumbu</option>
                                    <option value="Sunsari">Sunsari</option>
                                    <option value="Taplejung">Taplejung</option>
                                    <option value="Terhathum">Terhathum</option>
                                    <option value="Udayapur">Udayapur</option>
                                    </optgroup>
                                    <optgroup label="Province 2" class="two box1">
                                      <option value="Bara">Bara</option>
                                      <option value="Dhanusha">Dhanusha</option>
                                      <option value="Mahottari">Mahottari</option>
                                      <option value="Parsa">Parsa</option>
                                      <option value="Rautahat">Rautahat</option>
                                      <option value="Saptari">Saptari</option>
                                      <option value="Sarlahi">Sarlahi</option>
                                      <option value="Siraha">Siraha</option>
                                    </optgroup>
                                    <optgroup label="Province 3" class="three box1">
                                      <option value="Bhaktapur">Bhaktapur</option>
                                      <option value="Chitwan">Chitwan</option>
                                      <option value="Dhading">Dhading</option>
                                      <option value="Dolakha">Dolakha</option>
                                      <option value="Kathmandu">Kathmandu</option>
                                      <option value="Kavrepalanchok">Kavrepalanchok</option>
                                      <option value="Lalitpur">Lalitpur</option>
                                      <option value="Makawanpur">Makawanpur</option>
                                      <option value="Nuwakot">Nuwakot</option>
                                      <option value="Ramechhap">Ramechhap</option>
                                      <option value="Rasuwa">Rasuwa</option>
                                      <option value="Sindhuli">Sindhuli</option>
                                      <option value="Sindhupalchok">Sindhupalchok</option>
                                    </optgroup>
                                    <optgroup label="Province 4" class="four box1">
                                      <option value="Baglung">Baglung</option>
                                      <option value="Gorkha">Gorkha</option>
                                      <option value="Kaski">Kaski</option>
                                      <option value="Lamjung">Lamjung</option>
                                      <option value="Manang">Manang</option>
                                      <option value="Mustang">Mustang</option>
                                      <option value="Myagdi">Myagdi</option>
                                      <option value="Nawalpur">Nawalpur</option>
                                      <option value="Parbat">Parbat</option>
                                      <option value="Syangja">Syangja</option>
                                      <option value="Tanahu">Tanahu</option>
                                    </optgroup>
                                    <optgroup label="Province 5" class="five box1">
                                      <option value="Arghakhanchi">Arghakhanchi</option>
                                      <option value="Banke">Banke</option>
                                      <option value="Bardiya">Bardiya</option>
                                      <option value="Dang">Dang</option>
                                      <option value="Gulmi">Gulmi</option>
                                      <option value="Kapilvastu">Kapilvastu</option>
                                      <option value="Parasi">Parasi</option>
                                      <option value="Palpa">Palpa</option>
                                      <option value="Pyuthan">Pyuthan</option>
                                      <option value="Rolpa">Rolpa</option>
                                      <option value="Rukum">Rukum</option>
                                      <option value="Rupandehi">Rupandehi</option>
                                    </optgroup>
                                    <optgroup label="Province 6" class="six box1">
                                      <option value="Dailekh">Dailekh</option>
                                      <option value="Dolpa">Dolpa </option>
                                      <option value="Humla">Humla </option>
                                      <option value="Jajarkot">Jajarkot </option>
                                      <option value="Jumla">Jumla </option>
                                      <option value="Kalikot">Kalikot </option>
                                      <option value="Mugu">Mugu </option>
                                      <option value="Rukum Paschim">Rukum Paschim </option>
                                      <option value="Salyan">Salyan </option>
                                      <option value="Surkhet">Surkhet</option>
                                    </optgroup>
                                    <optgroup label="Province 7" class="seven box1">
                                      <option value="Baitadi">Baitadi</option>
                                      <option value="Bajhang">Bajhang</option>
                                      <option value="Bajura">Bajura</option>
                                      <option value="Dadeldhura">Dadeldhura</option>
                                      <option value="Darchula">Darchula</option>
                                      <option value="Doti">Doti</option>
                                      <option value="Kailali">Kailali</option>
                                      <option value="Kanchanpur">Kanchanpur</option>
                                    </optgroup>
                                    </select>
                                </div>
                            </div>
                          </div>
                          <div class="form-group text-center">
                              <input type="submit" name="submit" onclick="return confirm('Are you sure want to continue?')" class="btn btn-info btn-md" value="submit">
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
    {{-- script --}}
    @include('layout/frontend/js')
    {{-- alert script --}}
@include('admin/alert-script');
<script type="text/javascript">
  $(document).ready(function(){
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

    $('#name').keyup(function(){
      var name=$('#name').val();
      var pattern = /^[A-Za-z ]+$/;
      if(!pattern.test(name)){
        $('#showErrorName').html('Name should not contain Number');
        $('#showErrorName').css('color','red');
        document.getElementById("submit").disabled = true;
        return false;
      }
      else{
        $('#showErrorName').html('');
        document.getElementById("submit").disabled = false;
        return true;
      }
    });
  });
</script>
<script>
  $(document).ready(function(){
      $(".select1").change(function(){
          $(this).find("option:selected").each(function(){
              var optionValue = $(this).attr("value");
              if(optionValue){
                  $(".box1").not("." + optionValue).hide();
                  $("." + optionValue).show();
              } else{
                  $(".box1").hide();
              }
          });
      }).change();
  });
  </script>
</body>
</html>