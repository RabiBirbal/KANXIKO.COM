<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Place your order</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style1.css') }}">
	@include('layout/frontend/css')
    <style>
        .category{
            color: #fff;
        }
        a{
            color: #000;
        }
        .textarea{
          margin-top: -20px;
        }
        @media only screen and (max-width: 600px) {
        .sub {
          margin-top: 20px;
        }
        .budget{
          margin-bottom: 20px;
        }
        .quantity{
          margin-top: 20px;
        }
        .color1{
          margin-top: 20px;
        }
        .file{
          margin-top: 20px;
        }
      }
    </style>
</head>
<body>
{{-- alert message --}}
@include('admin/alert-message')
    <div id="login">
         <!--  <h3 class="text-center text-white pt-5">Login form</h3> -->
          <div class="container">
              <div id="login-row" class="row justify-content-center align-items-center">
                  <div id="login-column" class="col-md-6">
                      <div id="login-box" class="col-md-12">
                          <form action="{{ route('step1') }}" method="post" enctype="multipart/form-data" data-parsley-validate id="login-form" class="form"  >
                            @csrf
                            <h3 class="text-center text-info mb-3"> Send Your Enquiry</h3>
                              <div class="form-group">
                              <div class="row">
                                  <div class="col-md-6">
                                       <!-- <input type="text" class="form-control" placeholder="product name *" value="" /> -->
                                       <select class="select1 form-control" name="category">
                                        <option value="0">Choose Category</option>
                                        @foreach ($category['a'] as $i => $a)
                                          <option value="{{ $a->name }}">{{ $a->name }}</option>
                                        @endforeach
                                      </select>
                                  </div>
                                  <div class="col-md-6 sub">
                                    <select class="form-control" name="subcategory">
                                      <option value="0">Choose Subcategory</option>
                                      @foreach ($category['a'] as $i => $a)
                                      <optgroup label="{{ $a->name }} " class="{{ $a->name }} box1">
                                        @foreach ($category['b'][$i] as $b)
                                          <option value="{{ $b->name }}">{{ $b->name }}</option>
                                        @endforeach
                                      </optgroup>
                                      @endforeach
                                    </select>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="product_name" placeholder="Product/Service Name *" value="" required/>
                                </div>
                                <div class="col-md-6 quantity">
                                  <input type="text" class="form-control" name="quantity" placeholder="Quantity/Duration/Other*" value="" required/>
                                </div>
                            </div>
                        </div>
                           <div class="form-group">
                              <div class="row">
                                  <div class="col-md-6">
                                       <!-- <input type="text" class="form-control" placeholder="product name *" value="" /> -->
                                      <select class="select form-control Clothing size" name="size">
                                        <option value="NULL" >Size</option>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        <option value="XXL">XXL</option>
                                        <option value="XXXL">XXXL</option>
                                      </select>
                                  </div>
                                  <div class="col-md-6 color1">
                                    <select class="select form-control Clothing color" name="color">
                                      <option value="NULL">Color</option>
                                      <option value="Black">Black</option>
                                      <option value="Blue">Blue</option>
                                      <option value="Red">Red</option>
                                      <option value="Green">Green</option>
                                      <option value="White">White</option>
                                      <option value="Grey">Grey</option>
                                    </select>
                                  </div>
                              </div>
                          </div>
                           <div class="form-group file">
                              <div class="row">
                                <div class="col-md-6 mb-3">
                                  <input type="file" id="file-ip-1" accept="image/*" class="form-control-file border" onchange="showPreview1(event);" name="product-img">
                                  <div class="preview mt-2">
                                    <img src="" id="file-ip-1-preview" height="150px;">
                                  </div>
                                </div>
                                <div class="col-md-6 budget">
                                  <input type="number" class="form-control" name="budget" placeholder="Budget (if any)" value=""/>
                                </div>
                              </div>
                          </div>
                           <div class="form-groupmb-0 textarea">
                              <textarea type="text" rows="5" cols="50" class="form-control" name="description" placeholder="description*" value="" required></textarea>
                          </div>
                               <div class="form-check">
                                  <input type="checkbox" class="form-check-input" name="terms_condition" id="exampleCheck1" required>
                                  <label class="form-check-label" for="exampleCheck1"> I accept all the <a href="" data-toggle="modal" data-target="#exampleModalCenter""><span class="text-primary"><u> terms and conditions</u></span></a></label>
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
                              <div class="form-group">
                                 <button type="submit" onclick="return confirm('Are you sure want to continue?')" class="btn btn-primary">Submit</button>
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
    @include('admin/alert-script')
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
      </script>
</body>
</html>