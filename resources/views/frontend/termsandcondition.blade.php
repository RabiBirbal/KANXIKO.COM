<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Terms and conditions</title>
	@include('layout/frontend/css')
    <style>
    	.terms-condition-text p{
    		text-align: justify;
    	}
    	a{
    		text-decoration: none;
    		color: #000;
    	}
    	.top-image i{
    		margin-top: 20px;
    		font-size: 30px;
    	}
    </style>
</head>
<body>
	<!-- top image -->
	<div class="container top-image">
		<div class="row">
			<div class="col-md-3">
				<a href="{{ route('user-login') }}">
					<img src="{{ asset('frontend/image/Kanxiko-01.jpg') }}" alt="" width="50%">
				</a>
			</div>
			<div class="col-md-3">
				<a href="{{ route('user-login') }}"><i class="fa fa-home" aria-hidden="true"></i></a>
			</div>
		</div>
	</div>
	<!-- top image ends -->
	<div class="terms-condition">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-lg-12">
					<hr>
					<h1>Terms & Condition</h1>
					<hr>
				</div>
			</div>
		</div>
	</div>

	<div class="terms-condition-text">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-lg-12">
					<p>१. खरिदकर्ता लाई kanxiko.com ले कम समयमा आफूले खोजे अनुसारको सामान, सेवा बिक्रि गर्ने बिक्रेतासँग Platform प्रदान गर्दछ।</p>
					<p>२. खरिदकर्तालाई  यो Platform मा जोडिनको लागि कुनै शुल्क लाग्ने छैन। </p>
					<p>३. kanxiko.com खरिदकर्तालाई Direct बिक्रेता संग जोडाउने Bridge मात्र हो। </p>
					<p>४. खरिदकर्ताले आफूले किन्न चाहेको सामानको फोटो र कति बजेटमा किन्न चाहेको हो भन्ने कुरा खुलाएर Detail Submit गर्नु पर्नेछ र त्यसलाई देखेर बिक्रेताले खरिदकर्तासँग सम्पर्क गर्नेछन्।  </p>
					<p>५. खरिदकर्ताले दिएको Demand/Criteria अनुसार  बिक्रेताहरुले सीधै सम्पर्क गर्ने छन्।  </p>
					<p>६. सम्पर्कमा आउने बिक्रेताहरु मध्ये आफ्नो Criteria Match गरेमा कुनै पनि बिक्रेता बाट सामान किन्न सक्ने छन्। </p>
					<p>७. खरिदकर्ताले आफूले कुन बिक्रेता बाट सामान किन्ने भन्ने पूर्ण स्वतन्त्रता रहनेछ।  </p>
					<p>८. खरिद गरेको सामानको गुणस्तरको  र बिक्रि पश्चात सर्विस को  ग्यारेन्टी पूर्ण रुपमा बिक्रेताको हुनेछ। </p>
					<p class="mt-5">Note: यो Platform प्रयोग गर्नको लागि  उमेर  18+ हुनु आवश्यक छ।  कम उमेरको खरिदकर्ता ले बढि उमेर देखाई Order गर्दा हुने क्षति वा कुनै पनि सार्वजनिक अपराध लागू भएमा खरिदकर्ता आफै जिम्मेवार हुनेछन्। </p>  
				</div>
			</div>
		</div>
	</div>
<!-- footer -->
<div class="copyright">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-lg-12">
        <h5>Copyright 2022 Kanxiko.com | All Right Reserved</h5>
        <a href="http://yohoniads.com/"><h6>Powered by: Yohoni Ad Marketing</h6></a>
      </div>
    </div>
  </div>
</div>
<!-- footer ends -->

{{-- script --}}
@include('layout/frontend/js')
</body>
</html>