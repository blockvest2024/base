<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title><?=config_item("site_name")?></title>
     

    <!-- Favicon -->
    <link rel="icon" href="assets/images/favicon.png" type="image/png">

    <!-- Main Theme Js -->
    <script src="assets/js/authentication-main.js"></script>

    <!-- Bootstrap Css -->
    <link id="style" href="assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" >

    <!-- Style Css -->
    <link href="assets/css/styles.min.css" rel="stylesheet" >

    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" >


</head>

<body>

    

    <div class="container">
        <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                <div class="my-5 d-flex justify-content-center">
                    
                        <img src="assets/images/blockvest-color.svg" alt="logo" class="desktop-logo">
                        <img src="assets/images/blockvest-color.svg" alt="logo" class="desktop-dark">
                    
                </div>
                <div class="card custom-card">
                    <form action="javascript:void(0);" role="form" method="post" id="js-validation-login" class="form-body">
                    <div class="card-body p-5">
                        <p class="h5 fw-semibold mb-2 text-center">Welcome</p>
                        <p class="mb-4 text-muted op-7 fw-normal text-center">Login To Access Your Data</p>
                        <div class="row gy-3">
                            <div class="col-xl-12">
                                <label for="signin-username" class="form-label text-default">Phone Number</label>
                                <input type="tel" class="form-control form-control-lg bfh-phone" required="required" data-country="ID" name="telps" id="telps"  placeholder="Phone Number">
                            </div>
                            <div class="col-xl-12 mb-2">
                                 <label for="signin-username" class="form-label text-default">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control form-control-lg" required="required"  name="password" id="signin-password" placeholder="Enter Password">
                                    <button class="btn btn-light" type="button" onclick="createpassword('signin-password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                                </div>
                               <a href="<?=site_url("forgot")?>" style="float:right; color:blue;">Forgot Password</a>
                            </div>
                            
                            
                            <hr/>
                             <div class="col-xl-6 d-grid mt-2">
                                <input type="hidden" name="telp" id="telp" />
                                <input class="form-check-input" type="hidden" name="device_id" id="device_id" value="" >
                                <input class="form-check-input" type="hidden" name="language" id="language" value="" >
                                <input class="form-check-input" type="hidden" name="platform" id="platform" value="" >  
                                <input class="form-check-input" type="hidden" name="os" id="os" value="" > 
                                <input class="form-check-input" type="hidden" name="cpuCores" id="cpuCores" value="" >  	
                                <button type="submit" class="btn btn-lg btn-primary">Sign In</button>
                            </div>
                            <div class="col-xl-6 d-grid mt-2">
                                <a href="<?=site_url("register")?>" class="btn btn-lg btn-primary">Register</a>
                            </div>
                             
                        </div>
                        <div class="text-center">
                            
                        </div>
                        <div class="text-center my-3 authentication-barrier">
                             
                        </div>
                        <div class="btn-list text-center">
                           
                        </div>
                    </div>
                   </form> 
                </div>
            </div>
        </div>
    </div>


    <!-- Custom-Switcher JS -->
    <script src="assets/jquery.min.js"></script>
    <script src="assets/js/custom-switcher.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Show Password JS -->
    <script src="assets/js/show-password.js"></script>
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
								 
								document.location.href='<?=base_url('news')?>';
														
								
							}
							else
							{
								smart_message(out.message);
								//smart_error_box(out.message,'#js-validation-login');
							}
						});
	 
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
				padding: 2px 95px 0px 85px !important;
				font-size: 12.5px !important;
				margin-top: -2px !important;
			}
			.iti--separate-dial-code.iti--show-flags .iti__selected-dial-code {
				
				padding-top: 0px !important;
			}
			
		</style>
</body>

</html>