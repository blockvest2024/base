<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
 
<title><?=setting('website_title')?></title>
<base href="<?=base_url()?>">

<!-- -->
 <?php
	include __DIR__."/chunk/metadata.php";
	?> 
 
<!-- -->

<link rel="stylesheet" type="text/css" href="assets/styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="assets/fonts/bootstrap-icons.css">
<link rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.css"/>
<link rel="stylesheet" type="text/css" href="assets/styles/style.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

<meta id="theme-check" name="theme-color" content="#FFFFFF">
<style type="text/css">
.btn-v {
    font-family: "Source Sans Pro", sans-serif;
    text-transform: uppercase;
    font-weight: 700;
    border-radius: 12px;
    font-size: 13px;
    padding: 14px 20px;
    box-shadow: 0 5px 14px 0 rgb(0 0 0 / 10%);
}
.register.op {
    width: 40%;
    float: right;
    text-align: right;
    color: black !important;
    padding: 5px !important;
    font-size: 15px !important;
}
.form-custom span {
    right: 33px;
}
.form-custom a.shows-eye {
    margin-top: -43px;
    position: relative;
    float: right;
    margin-right: 65px;
    right: -35px;
}
#smart-message .btn
{
	color:black !important;	
}
</style>
<!-- Google tag (gtag.js) -->
		<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-123K9NCV7K"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-123K9NCV7K');
</script>
<script src="assets/jquery.min.js"></script>
<script src="assets/scripts/bootstrap.min.js"></script>
<script src="assets/scripts/custom.js"></script>
<script src="assets/plugins/jquery-validation/jquery.validate.js"></script>
  <script src="assets/plugins/jquery-validation/additional-methods.js"></script>
  
<?php
include __DIR__."/chunk/web3.php";
include __DIR__."/chunk/style.php";
?>
</head>

<body class="theme-light">

 

<!-- Page Wrapper-->
<div id="page">

    


    <!-- Page Content - Only Page Elements Here-->
    <div class="page-content footer-clear">

       <!-- Page Title-->
       <div class="pt-3">
           <div class="page-title d-flex">
               <div class="align-self-center me-auto">
                   <p class="color-black opacity-50 header-date"></p>
                   <h1 class="color-black"><?=setting('website_title')?></h1>
               </div>
               <div class="align-self-center ms-auto">
                   
               </div>
           </div>
       </div>

      <!--
       <svg id="header-deco" viewBox="0 0 1440 600" xmlns="http://www.w3.org/2000/svg" class="transition duration-300 ease-in-out delay-150">
           <path id="header-deco-1" d="M 0,600 C 0,600 0,120 0,120 C 92.36363636363635,133.79904306220095 184.7272727272727,147.59808612440193 287,148 C 389.2727272727273,148.40191387559807 501.4545454545455,135.40669856459328 592,129 C 682.5454545454545,122.5933014354067 751.4545454545455,122.77511961722489 848,115 C 944.5454545454545,107.22488038277511 1068.7272727272727,91.49282296650718 1172,91 C 1275.2727272727273,90.50717703349282 1357.6363636363635,105.25358851674642 1440,120 C 1440,120 1440,600 1440,600 Z"></path>
           <path id="header-deco-2" d="M 0,600 C 0,600 0,240 0,240 C 98.97607655502392,258.2105263157895 197.95215311004785,276.4210526315789 278,282 C 358.04784688995215,287.5789473684211 419.16746411483257,280.5263157894737 524,265 C 628.8325358851674,249.4736842105263 777.377990430622,225.47368421052633 888,211 C 998.622009569378,196.52631578947367 1071.3205741626793,191.57894736842107 1157,198 C 1242.6794258373207,204.42105263157893 1341.3397129186603,222.21052631578948 1440,240 C 1440,240 1440,600 1440,600 Z"></path>
           <path id="header-deco-3" d="M 0,600 C 0,600 0,360 0,360 C 65.43540669856458,339.55023923444975 130.87081339712915,319.1004784688995 245,321 C 359.12918660287085,322.8995215311005 521.9521531100479,347.1483253588517 616,352 C 710.0478468899521,356.8516746411483 735.3205741626795,342.3062200956938 822,333 C 908.6794258373205,323.6937799043062 1056.7655502392345,319.62679425837325 1170,325 C 1283.2344497607655,330.37320574162675 1361.6172248803828,345.1866028708134 1440,360 C 1440,360 1440,600 1440,600 Z"></path>
           <path id="header-deco-4" d="M 0,600 C 0,600 0,480 0,480 C 70.90909090909093,494.91866028708137 141.81818181818187,509.8373205741627 239,499 C 336.18181818181813,488.1626794258373 459.6363636363636,451.5693779904306 567,446 C 674.3636363636364,440.4306220095694 765.6363636363636,465.88516746411483 862,465 C 958.3636363636364,464.11483253588517 1059.8181818181818,436.8899521531101 1157,435 C 1254.1818181818182,433.1100478468899 1347.090909090909,456.555023923445 1440,480 C 1440,480 1440,600 1440,600 Z"></path>
       </svg>
       -->

       <div class="card card-style">
           <div class="content">
               <h1 class="mb-0 pt-2">Sign In</h1>
               <p>
                   Sign in your <?=setting('website_title')?> Account
               </p>
              
              <form action="javascript:void(0);" role="form" method="post" id="js-validation-login" class="form-body">
                
                
               
                <div class="row" connectwallet id="vm">
                   <div class="col-12 text-start">
                       <a href="javascript:void(0);"  id="btn_change" class="btn btn-full gradient-highlight shadow-bg shadow-bg-s mt-4"><i class="fa fa-wallet"></i> Connet To Wallet</a>
                   </div>
                    
               </div>  
			    
               
              
              </form> 
           </div>
       </div>

    </div>
    <!-- End of Page Content-->
 



</div>
<!-- End of Page ID-->

  <script src="assets/device-uuid.js"></script>   
   <script>
		var smart_token_hash = '<?=$this->security->get_csrf_hash();?>';
		var smart_token_name = '<?=$this->security->get_csrf_token_name()?>';
	 	 
   		 </script>  
   
   <script src="assets/plugins/telp/js/intlTelInput.js"></script>
   <script src="assets/plugins/telp/js/utils.js"></script>
   <link rel="stylesheet" href="assets/plugins/telp/css/intlTelInput.css" />
   <script src="assets/smart.js"></script>
   <script>
   		 var inputx;
		 var xinput;
   		function deviceid()
		{
			var devices = new DeviceUUID();
			var du = devices.parse();
			var uuid = devices.get();
			$("#device_id").val(uuid);
			$("#language").val(du.language);
			$("#platform").val(du.platform);
			$("#os").val(du.os);
			$("#cpuCores").val(du.cpuCores);
		}
		$(function()
		{
			$('#js-validation-login').submit(function(){
					var dialCode = xinput.selectedCountryData.dialCode; 
					$("#telp").val(dialCode + "" + $("#telps").val());
					console.log($("#js-validation-login").serialize()); 
					var req = post('<?=site_url('login/check')?>',$("#js-validation-login").serialize());
					req.done(function(out){
						if(out.error==false)
						{
							smart_success_box(out.message,'#js-validation-login');
							 
							document.location.href='<?=base_url('home')?>';
							 						
							
						}
						else
						{
							smart_message(out.message);
							//smart_error_box(out.message,'#js-validation-login');
						}
					});
 
			});
			$(".shows-eye").click(function()
			{
				if($(".shows-eye i").hasClass("bi-eye"))
				{
					$(".shows-eye i").removeClass("bi-eye");
					$(".shows-eye i").addClass("bi-eye-slash");
					
					$("#password").attr("type","text");
				}else
				{
					$(".shows-eye i").addClass("bi-eye");
					$(".shows-eye i").removeClass("bi-eye-slash");
					
					$("#password").attr("type","password");
				}
			});
			//deviceid();
			inputx = document.querySelector("#telps");
			 xinput =  window.intlTelInput(inputx, {
				// allowDropdown: false,
				// autoInsertDialCode: true,
				// autoPlaceholder: "off",
				// dropdownContainer: document.body,
				// excludeCountries: ["us"],
				// formatOnDisplay: false,
				// geoIpLookup: function(callback) {
				//   fetch("https://ipapi.co/json")
				//     .then(function(res) { return res.json(); })
				//     .then(function(data) { callback(data.country_code); })
				//     .catch(function() { callback("us"); });
				// },
				// hiddenInput: "telp",
				// initialCountry: "auto",
				// localizedCountries: { 'de': 'Deutschland' },
				// nationalMode: false,
				// onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
				 placeholderNumberType: "MOBILE",
				 preferredCountries: ['id'],
				 separateDialCode: true,
				// showFlags: false,
				utilsScript: "assets/plugins/telp/js/utils.js"
			  }); 
			  console.log(xinput);
		});
		
		</script>
        <style type="text/css">
			.iti {
				width: 100%;
			}
			.iti span {
				position: relative;
				right: 0;
				height: 15px;
				line-height: 15px;
				font-size: 9.5px;
				font-weight: bold;
				color: black;
				border-bottom: 1px !important;
			}
			.iti input, .iti input[type=text], .iti input[type=tel] {
				padding-left: 45px !important;
			}
			 
			.iti__selected-flag {
			  z-index: 4;
			}
			.iti .iti__country-list {
				z-index: 20000;
				background: white !important;
				max-height: 600px;
				width: 320px;
			}
			.form-custom:not(.form-floating) * {
				padding-top: 5px !important;
			}
			.iti__country {
				display: flex;
				align-items: center;
				padding: 10px 10px;
				outline: none;
			}
			.iti input, .iti input[type=text], .iti input[type=tel] {
				padding: 8px 65px 0px 65px !important;
				font-size: 12.5px !important;
				margin-top: -2px !important;
			}
			.iti--separate-dial-code.iti--show-flags .iti__selected-dial-code {
				
				padding-top: 0px !important;
			}
			
		</style>
         
</body>
</html>