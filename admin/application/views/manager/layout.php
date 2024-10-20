<?php
include __DIR__."/chunk/header.php";
?>
<!--start wrapper-->
  <div class="wrapper">
  	<?php
		include __DIR__."/chunk/page_header.php";
		include __DIR__."/chunk/sidebar.php";
	?>
    <!--start content-->
       <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">
       		  <!-- Page Header -->
                <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                    
                </div>
                <!-- Page Header Close -->
			 <?php
             	if(isset($tpl) && is_file(__DIR__."/".$tpl.'.php') && file_exists(__DIR__."/".$tpl.'.php'))
				{
					include(__DIR__."/".$tpl.'.php');
				}
			 ?>	
            </div> 
       </div>
    <!--end content-->
       
  </div>
<!--end wrapper-->
   <!-- Defaultmenu JS -->
    <script src="assets/js/defaultmenu.min.js"></script>

    <!-- Node Waves JS-->
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <!-- Sticky JS -->
    <script src="assets/js/sticky.js"></script>

    <!-- Simplebar JS -->
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/js/simplebar.js"></script>

    <!-- Color Picker JS -->
    <script src="assets/libs/@simonwep/pickr/pickr.es5.min.js"></script>


    <!-- JSVector Maps JS -->
    <script src="assets/libs/jsvectormap/js/jsvectormap.min.js"></script>

    <!-- JSVector Maps MapsJS -->
    <script src="assets/libs/jsvectormap/maps/world-merc.js"></script>		
   <!-- Custom-Switcher JS -->
    <script src="assets/js/custom-switcher.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/custom.js"></script>
     <script>
	 	$(function()
		{
			$.each($(".required"),function()
			{
				var sy = $(this).parent("div.form-group").find("label").text();
				$(this).parent("div.form-group").find("label").html(sy + " <span class='txt-danger'>(*)</span>");
				var sy_imag = $(this).parent("div.input-group").parent("div.form-group").find("label").text();
				$(this).parent("div.input-group").parent("div.form-group").find("label").html(sy_imag + " <span class='txt-danger'>(*)</span>");
			});
		});
	 </script>
     <style type="text/css">
	 .help-block
	 {
		 color:red;	
	  }
	  .txt-danger
	{
		color:red;	
	}
	 </style>
 </body>
</html>
 