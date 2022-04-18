<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Form</title>
	@include('layout/frontend/css')
	<style>
    img {width:100%;}

    body{
      background-image: url('../frontend/image/shopping.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-position: center;
      background-size: cover;
    }
  </style>
</head>
<body>
{{-- allert --}}
@include('admin/alert-message')
<section class="testimonial py-5" id="testimonial">
    <div class="container bg-light">
        <div class="row ">
            <div class="col-md-4 py-5 bg-primary text-white text-center ">
                <div class=" ">
                    <div class="card-body">
                        <img src="http://www.ansonika.com/mavia/img/registration_bg.svg" style="width:30%">
                        <h2 class="py-3">Registration</h2>
                        <p>Tn online marketplace is an e-commerce site that connects sellers with buyers. It’s often known as an electronic marketplace and all transactions are managed by the website owner. Companies use online marketplaces to reach customers who want to purchase their products and services.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 py-5 border">
                <h4 class="pb-4">Please fill your details</h4>
                <form action="{{ route('add-buyer') }}" method="post" class="form">
                  @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <input id="fname" name="fname" placeholder="First Name *" class="form-control" type="text" required>
                          <div id="showErrorFname"></div>

                                @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group col-md-6">
                          <input id="lname" name="lname" placeholder="Last Name *" class="form-control" type="text" required>
                          <div id="showErrorLname"></div>

                                @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <input id="password" name="password" placeholder="Password *" class="form-control" type="password" required>
                          <div id="showErrorpswd"></div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group col-md-6">
                          <input id="cpassword" name="cpassword" placeholder="Confirm Password *" class="form-control" type="password" required>
                          <div id="showErrorcpswd"></div>

                                @error('cpassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                      </div>
                       <div class="form-row">
                        <div class="form-group col-md-4">
                          <input id="email" name="email" placeholder="Email *" class="form-control" type="email" required>
                        </div>
                        <div class="form-group col-md-4">
                            <input id="mobile" name="mobile" placeholder="mobile *" class="form-control" type="text" required>
                            <div id="showErrorPhone"></div>
  
                                  @error('mobile')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                          </div>
                          <div class="form-group col-md-4">
                            <input id="refer_code" name="refer_code" class="form-control" type="text" value="{{ $refercode }}" readonly>
                          </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-4">
                            <input id="address" name="address" placeholder="Address *" class="form-control" type="text" required>
                          </div>
                        <div class="form-group col-md-4">
                          <select class="select1 form-control" name="province" required>
                            <option value="one">Province 1</option>
                            <option value="two">Province 2</option>
                            <option value="three">Province 3</option>
                            <option value="four">Province 4</option>
                            <option value="five">Province 5</option>
                            <option value="six">Province 6</option>
                            <option value="seven">Province 7</option>
                          </select>
                        </div>
                        <div class="form-group col-md-4">
                          <select class="form-control" name="district" required>
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
                              <option value="0">Select District</option>
                              <option value="dasdasd">dasdasda</option>
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
                    <div class="form-row">
                      <div class="form-group">
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" name="terms_condition" id="exampleCheck1" required>
                                  <label class="form-check-label" for="exampleCheck1"> I accept all the <a href="" data-toggle="modal" data-target="#exampleModalCenter"><span class="text-primary"><u> terms and conditions</u></span></a></label>
                        </div>
                      </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Terms and Conditions</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">X</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>१. खरिदकर्ता लाई kanxiko.com ले कम समयमा आफूले खोजे अनुसारको सामान, सेवा बिक्रि गर्ने बिक्रेतासँग Platform प्रदान गर्दछ।</p>
                                        <p>२. खरिदकर्तालाई  यो Platform मा जोडिनको लागि कुनै शुल्क लाग्ने छैन। </p>
                                        <p>३. kanxiko.com खरिदकर्तालाई Direct बिक्रेता संग जोडाउने Bridge मात्र हो। </p>
                                        <p>४. खरिदकर्ताले आफूले किन्न चाहेको सामानको फोटो र कति बजेटमा किन्न चाहेको हो भन्ने कुरा खुलाएर Detail Submit गर्नु पर्नेछ र त्यसलाई देखेर बिक्रेताले खरिदकर्तासँग सम्पर्क गर्नेछन्।  </p>
                                        <p>५. खरिदकर्ताले दिएको Demand/Criteria अनुसार  बिक्रेताहरुले सीधै सम्पर्क गर्ने छन्।  </p>
                                        <p>६. सम्पर्कमा आउने बिक्रेताहरु मध्ये आफ्नो Criteria Match गरेमा कुनै पनि बिक्रेता बाट सामान किन्न सक्ने छन्। </p>
                                        <p>७. खरिदकर्ताले आफूले कुन बिक्रेता बाट सामान किन्ने भन्ने पूर्ण स्वतन्त्रता रहनेछ।  </p>
                                        <p>८. खरिद गरेको सामानको गुणस्तरको  र बिक्रि पश्चात सर्विस को  ग्यारेन्टी पूर्ण रुपमा बिक्रेताको हुनेछ। </p>
                                        <p class="mt-5">Note: यो Platform प्रयोग गर्नको लागि  उमेर <span class="text-primary">18+</span> हुनु आवश्यक छ।  कम उमेरको खरिदकर्ता ले बढि उमेर देखाई Order गर्दा हुने क्षति वा कुनै पनि सार्वजनिक अपराध लागू भएमा खरिदकर्ता आफै जिम्मेवार हुनेछन्। </p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    {{-- modal ends --}}
                    <a href="{{ route('index') }}">Already have an account?</a>
                    <div class="form-row">
                        <button type="submit" onclick="return confirm('Are you sure want to continue?')" id="submit" value="submit" class="btn btn-danger">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

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

    $('#fname').keyup(function(){
      var fname=$('#fname').val();
      var pattern = /^[A-Za-z ]+$/;
      if(!pattern.test(fname)){
        $('#showErrorFname').html('First Name should not contain Number');
        $('#showErrorFname').css('color','red');
        document.getElementById("submit").disabled = true;
        return false;
      }
      else{
        $('#showErrorFname').html('');
        document.getElementById("submit").disabled = false;
        return true;
      }
    });

    $('#lname').keyup(function(){
      var lname=$('#lname').val();
      var pattern = /^[A-Za-z ]+$/;
      if(!pattern.test(lname)){
        $('#showErrorLname').html('Last Name should not contain Number');
        $('#showErrorLname').css('color','red');
        document.getElementById("submit").disabled = true;
        return false;
      }
      else{
        $('#showErrorLname').html('');
        document.getElementById("submit").disabled = false;
        return true;
      }
    });
  });
</script>
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