<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="dark" data-header-styles="dark" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    
    <?php
	include __DIR__."/metadata.php";
	?>
    
    
    
    <title><?=setting("website_title")?> - Web3 Event Festival Enabler</title>
    <base href="<?=base_url()?>">
    <!-- Favicon -->
   	<link rel="icon" href="assets/images/favicon.png" type="image/png">
    
    <!-- Choices JS -->
    <script src="assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>

    <!-- Main Theme Js -->
    <script src="assets/js/main.js"></script>
    
    <!-- Bootstrap Css -->
    <link id="style" href="assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" >

    <!-- Style Css -->
    <link href="assets/css/styles.min.css" rel="stylesheet" >

    <!-- Icons Css -->
    <link href="assets/css/icons.css" rel="stylesheet" >

    <!-- Node Waves Css -->
    <link href="assets/libs/node-waves/waves.min.css" rel="stylesheet" > 

    <!-- Simplebar Css -->
    <link href="assets/libs/simplebar/simplebar.min.css" rel="stylesheet" >
    
    <!-- Color Picker Css -->
    <link rel="stylesheet" href="assets/libs/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" href="assets/libs/@simonwep/pickr/themes/nano.min.css">
	<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css"/>
    <!-- Choices Css -->
    <link rel="stylesheet" href="assets/libs/choices.js/public/assets/styles/choices.min.css">


    <link rel="stylesheet" href="assets/libs/jsvectormap/css/jsvectormap.min.css">
    
    <link rel="stylesheet" href="assets/libs/swiper/swiper-bundle.min.css">
    
    <script src="assets/jquery.min.js"></script>
    
    <!-- Popper JS -->
    <script src="assets/libs/@popperjs/core/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- datatable -->
        
  <link href="assets/plugins/DataTables/datatables.min.css" rel="stylesheet">  
  <script src="assets/plugins/DataTables/datatables.min.js"></script>
   <link rel="stylesheet" href="assets/datatable/buttons.dataTables.min.css">
  <script src="assets/datatable/dataTables.buttons.min.js"></script>
		<script src="assets/datatable/buttons.flash.min.js"></script>
		<script src="assets/datatable/jszip.min.js"></script>
		<script src="assets/datatable/pdfmake.min.js"></script>
		<script src="assets/datatable/vfs_fonts.js"></script>
		<script src="assets/datatable/buttons.html5.min.js"></script>
		<script src="assets/datatable/buttons.print.min.js"></script>
        <script src="assets/datatable/buttons.colVis.min.js"></script> 
  <!-- select2 -->
        <link href="assets/plugins/select2/css/select2.css" rel="stylesheet">  
        <script src="assets/plugins/select2/js/select2.js"></script>   
	<script src="assets/plugins/jquery-validation/jquery.validate.js"></script>
 	 <script src="assets/plugins/jquery-validation/additional-methods.js"></script>
  
    <!-- Apex Charts JS -->
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Chartjs Chart JS -->
    <script src="assets/libs/chart.js/chart.min.js"></script>
    <script>
		var smart_token_hash = '<?=$this->security->get_csrf_hash();?>';
		var smart_token_name = '<?=$this->security->get_csrf_token_name()?>';
	 	 
   		 </script>   
    <script src="assets/bootbox.min.js"></script>
	<script src="assets/smart.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web">
	<style type="text/css">
		
		body{
			/*
			font-family: "Droid Sans Mono",Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;		
			*/
			font-family: "Titillium Web", sans-serif;
		}
		.app-header {
			-webkit-padding-start: 10rem;
			padding-inline-start: 10rem;
		}
		.app-sidebar, .app-sidebar .main-sidebar-header {
			width: 10rem;
			font-family: "Droid Sans Mono",Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;			 
		}
		.app-content {
			 
			margin-inline-start: 10rem;
			 
		}
		.rounded-pillx
		{
			background-color:var(--menu-bg); 
			border:none;	
		}
		.app-sidebar .side-menu__label {
			font-size: 11px;
		}
		.app-sidebar .side-menu__icon {
			-webkit-margin-end: 0.425rem;
			margin-inline-end: 0.425rem;
		}
		.card.custom-card.xcard {
			min-height: 100%;
		}
		.card.custom-card.xcard {
			overflow-y:auto;
		}
		.border-bottom.border-block-end-dashed
		{
			border-bottom:0 !important;
		
		}
		.ads {
			width: 98%;
			height: 4.75rem;
			
		   
		}
		.ads img {
			 
			height: 100%;
		    margin-left: 20%;
		}
		.app-sidebar .main-sidebar-header, .app-header
		{
			height: 4.75rem;
		}
		.main-content {
			padding: 0;
		}
		.container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
			padding: 0;	
		}
		.app-sidebar .main-sidebar {
			 padding-top: 1.5rem;
		}
		.xcard .task-navigation ul.task-main-nav li.active a {
			color: #EAF205;
		}
		.xjuduls
		{
			color: #EAF205 !important;
			font-weight: bold;
		}
		.besar
		{
			text-transform:uppercase;
			font-weight: bold;
		}
		h6.juduls
		{
			color: #EAF205;
			font-weight: bold;
		}
		.mobile_on
		 {
			   display:none !important;
		 }
		 .mobile_off
		 {
			   display:block !important;
		 }
		 .xhide, .xhide.mobile_on, .xhide.mobile_off
		  {
			  display:none !important;
		   }
		.xcard ul.list-unstyled.task-main-nav.mb-0 {
			overflow: auto;
			height: 600px;
		}   
		.xcard ul.list-unstyled.task-main-nav.mb-0 li {
			width: 260px;
		}
		.card.xcardo {
			margin: 0 4px;
		}
		@media(max-width:699px)
	   {
		   .main-content {
				padding-top: 3.75rem;
			}
		   .mobile_on
		   {
			   display:block !important;
		   }
		    .mobile_off
			 {
				   display:none !important;
			 }
		   .app-content {
				 margin-inline-start: 0rem; 
			}
			.horizontal-logo {
				padding: 1.25rem 4px;
			}
			.xmain-sidebar.active {
				width: 1000px;
				height: 100%;
				position: absolute;
				margin: 0;
				background: #ff00;
				z-index: -2000;
				opacity: 1;
			}
			.x-add img {
				width: 100%;
				padding-top: 5%;
			}
	   }
		 
	</style>
    <!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-6GQJYFVE2E"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-6GQJYFVE2E');
	</script>
    <script>
	function gets(smart_url,smart_data,smart_type)
		{
			$(document).find('#smart-loader').on('hidden.bs.modal',function(){
				$(document).find('#smart-loader').remove();
			});
			smart_type = typeof smart_type !== 'undefined' ? smart_type : 'json';
			smart_data = typeof smart_data !== 'undefined' ? smart_data : {};
			return $.ajax({
			  type: "GET",
			  url: smart_url,
			  data: smart_data,
			  dataType: smart_type,
			  beforeSend: function(request){
				 
			  },
			  error: function()
			  {
					generatetoken();
			  },
			  complete:function(){
				  $("#smart-loader").modal('hide');
				 //unloadSmartAnimation();
				 reloadToken();
			  }
			});
		}
	</script>
</head>

<body>
