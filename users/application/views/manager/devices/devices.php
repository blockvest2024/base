<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<meta name="keywords" content="marketing, instagram, apple store, download, install, register, google play, facebook, twitter, follow, subscribe, youtube, tik tok,">
<meta name="description" content="Cara mudah mendapatkan earning dengan hanya melakukan tugas ringan sambil rebahan">
<title><?=setting('website_title')?></title>
<base href="<?=base_url()?>">
<!-- -->
<meta property="og:site_name" content="Sospawn">
<meta property="og:url" content="<?=base_url()?>">
<meta property="og:type" content="website">
<meta property="og:title" content="Sospawn">
<meta name='og:image' content='<?=config_item('main_site')?>uploads/<?=setting('favicon')?>'>
<link rel="icon" href="<?=config_item('main_site')?>uploads/<?=setting('favicon')?>" type="image/png" sizes="32x32">


 
<link rel="manifest" href="assets/app/icons/manifest.json">
<link rel="apple-touch-icon" sizes="144x144" href="assets/app/icons/apple-icon-144x144.png">
 
<!-- -->
<link rel="stylesheet" type="text/css" href="assets/styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="assets/fonts/bootstrap-icons.css">
<link rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.css"/>
 
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
<meta id="theme-check" name="theme-color" content="#FFFFFF">

<script src="assets/jquery.min.js"></script>
<script src="assets/scripts/bootstrap.min.js"></script>
 
 
   <script>
		var smart_token_hash = '<?=$this->security->get_csrf_hash();?>';
		var smart_token_name = '<?=$this->security->get_csrf_token_name()?>';
	 	var id_currency = 0; 
 </script>  
 <script src="assets/device-uuid.js"></script>       
  <script src="assets/bootbox.js"></script>         
 <script src="assets/smart.js"></script>
 
<style type="text/css">
.loading {
  position: fixed;
  margin: auto;
  width: 100%;
  height: 100%;
  animation: backGround 5s ease infinite;
 
}
 .loadingWrapper {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    #loading {
      margin: auto;
      height: 100px;
      width: 100px;
      border: transparent;
      border-top: 3px solid #ffcb23;
      border-radius: 50%;
      animation: round 2s linear infinite;
    }
    h1 {
      color: #555555;
      position: relative;
      margin: auto;
      top: 50%;
    }
  }
@keyframes round {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}

@keyframes backGround {

    0%   {background-color: #222222;}
    50%  {background-color: #555555;}
    75%  {background-color: #444444;}
    100% {background-color: #111111;}

}

</style>
</head>

<body >

<div class="loading">
  <div class="loadingWrapper">
    <div id="loading"> </div>
    <h1>Check Device . . .</h1>
  </div>
</div>
<script>
	/* $(window).load(function(){
	  //uncomment the code below to hide the loading screen in response to window on load
			// $(".loading").hide();

      });
	 */
	 $(function()
	 {
		 		var devices = new DeviceUUID();
				var du = devices.parse();
				var uuid = devices.get();
		 			var req = post('<?=site_url('login/devices')?>',{"language":du.language,"platform":du.platform,"os":du.os,"cpuCores":du.cpuCores});
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
</script>
</body>

</html>