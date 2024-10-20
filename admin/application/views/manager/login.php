<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=config_item("site_name")?></title>
    <meta name="Description" content="Blockvest">
    <meta name="Author" content="Blockvest">
	<meta name="keywords" content="Blockvest">

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
                        <p class="h5 fw-semibold mb-2 text-center">Sign In</p>
                        <p class="mb-4 text-muted op-7 fw-normal text-center">Manage Your Data!</p>
                        <div class="row gy-3">
                            <div class="col-xl-12">
                                <label for="signin-username" class="form-label text-default">User Name</label>
                                <input type="text" class="form-control form-control-lg" required="required" name="username" id="username" placeholder="Enter username">
                            </div>
                            <div class="col-xl-12 mb-2">
                                 <label for="signin-username" class="form-label text-default">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control form-control-lg" required="required"  name="password" id="signin-password" placeholder="Enter Password">
                                    <button class="btn btn-light" type="button" onclick="createpassword('signin-password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                                </div>
                               
                            </div>
                            <div class="col-xl-12 d-grid mt-2">
                                <button type="submit" class="btn btn-lg btn-primary">Sign In</button>
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
	<script src="assets/smart.js"></script>
        <script>
		$(function()
		{
			$('#js-validation-login').submit(function(){
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
							smart_error_box(out.message,'#js-validation-login');
						}
					});
 
			});
		});
		</script>
</body>

</html>