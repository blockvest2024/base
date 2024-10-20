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
       <main class="page-content">
       		 <?php
             	if(isset($tpl) && is_file(__DIR__."/".$tpl.'.php') && file_exists(__DIR__."/".$tpl.'.php'))
				{
					include(__DIR__."/".$tpl.'.php');
				}
			 ?>	
       </main>
    <!--end content-->
       
  </div>
<!--end wrapper-->
   
  <!-- Custom-Switcher JS -->
    <script src="../assets/js/custom-switcher.min.js"></script>

    <!-- Custom JS -->
    <script src="../assets/js/custom.js"></script>
 </body>
</html>
 