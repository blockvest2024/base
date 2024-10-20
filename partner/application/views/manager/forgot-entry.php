<?php
$setting = settings(); 
?>
<!doctype html>
<html class="no-js" lang="zxx">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <?php
		include __DIR__."/chunk/metadata.php";
	?>
      <base href="<?=base_url()?>">
      <meta name="<?=$this->security->get_csrf_token_name()?>" class="smart-token" content="<?=$this->security->get_csrf_hash();?>" id="nd-meta-token">
      <title><?=setting('website_title')?></title>
      <link rel="icon" href="<?=config_item('main_site')?>uploads/<?=setting('favicon')?>" type="image/png" />
       
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="theme-style-mode" content="1">
      <!-- Place favicon.ico in the root directory -->
      <link rel="shortcut icon" type="image/x-icon" href="<?=config_item('main_site')?>uploads/<?=setting('favicon')?>">
      <!-- CSS here -->
      <link rel="stylesheet" href="assets/app/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/app/css/meanmenu.min.css">
      <link rel="stylesheet" href="assets/app/css/animate.css">
      <link rel="stylesheet" href="assets/app/css/metisMenu.min.css">
      <link rel="stylesheet" href="assets/app/css/swiper-bundle.min.css">
      <link rel="stylesheet" href="assets/app/css/slick.css">
      <link rel="stylesheet" href="assets/app/css/backtotop.css">
      <link rel="stylesheet" href="assets/app/css/magnific-popup.css">
      <link rel="stylesheet" href="assets/app/css/flaticon_expovent.css">
      <link rel="stylesheet" href="assets/app/css/fontawesome-pro.css">
      <link rel="stylesheet" href="assets/app/css/spacing.css">
      <link rel="stylesheet" href="assets/app/css/main.css">
      <style type="text/css">
	  	.sign__input select {
			width: 100%;
			height: 55px;
			border: 1px solid var(--clr-border-4);
			padding-inline-start: 50px;
			padding-inline-end: 20px;
			-webkit-border-radius: 6px;
			-moz-border-radius: 6px;
			-o-border-radius: 6px;
			-ms-border-radius: 6px;
			border-radius: 6px;
		}	
	  </style>
   </head> 

   <body class="body-area">

      <!--[if lte IE 9]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
      <![endif]-->

      <!-- Preloder start -->
      <div id="preloader">
         <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
         </div>
      </div>
      <!-- Preloder start -->

       
      <!-- Offcanvas area start -->

      <!--Speaker popup area start -->
       
      <!-- Event popup area end -->

      <!-- signin area start -->
      <section class="signin__area">
         <div class="sign__main-wrapper">
            <div class="sign__left">
               <div class="sign__header">
                  <div class="sign__logo">
                     <a href="dashboard.html">
                        <img class="logo-black" src="<?=config_item('main_site')?>uploads/<?=setting('logo')?>" width="40%" alt="image not found">
                        <img class="logo-white" src="<?=config_item('main_site')?>uploads/<?=setting('logo')?>" alt="image not found">
                     </a>
                  </div>
                  <div class="sign__link">
                      
                  </div>
               </div>
               <div class="sign__center-wrapper text-center mt-90">
                  <div class="sign__title-wrapper mb-40">
                     <h3 class="sign__title">Forgot Password <?=setting('website_title')?></h3>
                     <p>Fill The Form in below.</p>
                  </div>
                  <div class="sign__input-form text-center">
                  	<div class="message"></div>
                     <form action="javascript:void(0);" role="form" method="post" id="js-validation-login">
                         
                        <div class="sign__input">
                           <input type="email" readonly placeholder="Email Address" required="required" class="required" name="email" value="<?=$data['email']?>" id="email">
                           <span><i class="flaticon-email"></i></span>
                        </div>
                         <div class="sign__input">
                           <input type="password" placeholder="Enter New Password" min="8" class="required" required="required"  name="password" id="signin-password">
                           <span><i class="flaticon-password"></i></span>
                        </div>
                        <div class="sign__input">
                           <input type="password" placeholder="Confirm New Password" min="8" class="required" required="required"    id="confirm-password" equalTo="#signin-password">
                           <span><i class="flaticon-password"></i></span>
                        </div>
                        
                        <div class="sing__button mb-20">
                        	<input type="hidden" value="<?=$data['id']?>" name="id" /> 
                           <button class="input__btn w-100 mb-20" type="submit">Forgot</button>
                           
                        </div>
                     </form>
                     <div class="if__account mt-85">
                        <p>Have An Account?<a href="<?=site_url('login')?>"> Sign in</a></p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="sign__right">
               <div class="sign__input-thumb" data-background="<?=config_item('main_site')?>uploads/schedule-thumb.jpg">
               </div>
            </div>
         </div>
      </section>
      <!-- signin area end -->
   
   <!-- Back to top start -->
   <div class="progress-wrap">
      <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
         <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
      </svg>
   </div>
   <!-- Back to top end -->

   <!-- JS here -->
   <script src="assets/app/js/jquery-3.6.0.min.js"></script>
   <script src="assets/app/js/waypoints.min.js"></script>
   <script src="assets/app/js/bootstrap.bundle.min.js"></script>
   <script src="assets/app/js/apexcharts.min.js"></script>
   <script src="assets/app/js/metisMenu.min.js"></script>
   <script src="assets/app/js/meanmenu.min.js"></script>
   <script src="assets/app/js/swiper-bundle.min.js"></script>
   <script src="assets/app/js/slick.min.js"></script>
   <script src="assets/app/js/magnific-popup.min.js"></script>
   <script src="assets/app/js/backtotop.js"></script>
   <script src="assets/app/js/counterup.js"></script>
   <script src="assets/app/js/wow.min.js"></script>
   <script src="assets/app/js/countdown.js"></script>
   <script src="assets/app/js/smooth-scrollbar.js"></script>
   <script src="assets/app/js/ajax-form.js"></script>
   <script src="assets/app/js/custom.js"></script>
   <script src="assets/app/js/mains.js"></script>
   <script src="assets/plugins/jquery-validation/jquery.validate.js"></script>
  <script src="assets/plugins/jquery-validation/additional-methods.js"></script>
   <script>
		var smart_token_hash = '<?=$this->security->get_csrf_hash();?>';
		var smart_token_name = '<?=$this->security->get_csrf_token_name()?>';
	 	 
   		 </script>
   <script src="assets/smart.js"></script>
   <script>
		$(function()
		{
			$('#js-validation-login').submit(function(){
					console.log($("#js-validation-login").serialize()); 
					var req = post('<?=site_url('api/forgotsave')?>',$("#js-validation-login").serialize());
					req.done(function(out){
						if(out.error==false)
						{
							 document.location.href='<?=base_url('home')?>';
									return;			
							
						}
						else
						{
							smart_success_box(out.message,'#js-validation-login');
							 
						}
					});
 
			});
		});
		function resendclick()
		{
			$.ajax({
                            url: "api/resendforgot",
                            type: 'POST',
                            data: {id:1},
                            async: false,
                            cache: false,
                            contentType: false,
                            processData: false,
                            beforeSend: function(){
                                 
                            },
                            success: function(out)
                            {
                                
                                 smart_message("Resend success");
                            },
                            error: function()
                            {
                                 smart_message("Resend Failed");
                            },
                            complete:function(out){
                                
                            }
                        });	
		}
		</script>
   </body>
</html>

