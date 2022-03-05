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
					<p>१. kanxiko.com ले बिक्रेता र खरिदकर्ता लाई आफ्नो Platform मार्फत  Bridge को रुपमा  जोडाउने काम मात्र गर्दछ। </p>
					<p>२. बिक्रेताले kanxiko.com मा Register गर्दा आफ्नो पसल को सम्पूर्ण जानकारी राख्नु पर्ने छ।</p>  
					<p>३. बिक्रेताले  Register गर्दा तिरेको शुल्क बराबर Points प्राप्त गर्नेछन्। </p> 
					<p>४.उक्त Points Lead खरिद गर्नको लागि प्रयोग गर्न सक्नेछन्। </p>
					<p>५. बिक्रेताले kanxiko.com Platform मा Display भएका  Leads को Category मा गएर Leads खरिद गर्न सक्ने छन्। </p>
					<p>६. बिक्रेताले   Register भईसके पछि Unlimited Free Leads प्रयोग गर्न पाउनेछन्। </p>
					<p>७. Free Leads  बाहेक अन्य Leads को Category अनुसार मुल्य फरक रहने छ।  </p>
					<p>८. Leads खरिद गर्दा खरिदकर्ताको आवश्यकता / बजेट र लोकेशन आदि कुरा आफूमा Match भए अनुसार leads खरिद गर्न  सक्ने छन्।</p>
					<p>९. बिक्रेताले खरिद गर्न सक्ने leads मा कुनै सिमा छैन। आफ्नो आवश्यकता अनुसार जति पनि Leads खरिद गर्न सक्ने छन्।</p> 
					<p>१०. Leads खरिद गरिसके पछि खरिदकर्ता को सम्पर्क नं  सहित को Full Detail बिक्रेताले पाउने छन्। </p>
					<p>११. सम्पर्क नं सहितको जानकारी पाए पछि बिक्रेताले खरिदकर्ता लाई सम्पर्क गरि अगाडि Process गरि आफ्नो समान Sales गर्न सक्नेछन्।</p> 
					<p>१२.Regular Lead र Premium Lead Verify गरेको हुन्छ तर खरिद गरेको leads बाट  सामान बिक्रि हुन्छ  नै भन्ने Guarantee kanxiko.com ले गर्दैन। </p>   
					<p>१३. खरिदकर्ता सामान किन्न तयार भए पछि Billing /Payment Collection /Exchange / Delivery आदिको  प्रक्रिया बिक्रेता स्वयम्ले नै गर्नु पर्ने छ। </p>
					<p>१४.खरिदकर्ताले  खरिद गरेको  सामानमा केहि टुटफुट / Damage /Quality सम्बन्धि आउने गुनासाहरुको, बिक्रेता स्वयम्ले नै  जिम्मेवारी लिनु पर्ने छ। </p> 
					<p>१५.बिक्रेताले आफूले बेच्ने सामग्रीको मूल्य ,नापतौल तथा गुणस्तर (kanxiko.com Platform) राखिए बमोजिम हुनुपर्ने छ। </p>
					<p>१६. Registration शुल्क Non Refundable हो।</p>
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