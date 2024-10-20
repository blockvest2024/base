<?php
$setting = settings(); 
?>
<!doctype html>
<html class="no-js" lang="zxx">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <?php
		include __DIR__."/metadata.php";
		?>
       <base href="<?=base_url()?>">
      <meta name="<?=$this->security->get_csrf_token_name()?>" class="smart-token" content="<?=$this->security->get_csrf_hash();?>" id="nd-meta-token">
      <link rel="icon" href="<?=config_item('main_site')?>uploads/<?=setting('favicon')?>" type="image/png" />
       
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="theme-style-mode" content="1">
      <!-- Place favicon.ico in the root directory -->
      <link rel="shortcut icon" type="image/x-icon" href="<?=config_item('main_site')?>uploads/<?=setting('favicon')?>">
      <!-- CSS here -->
      <title><?=setting('website_title')?></title>
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
       <!-- JS here -->
	   <script src="assets/app/js/jquery-3.6.0.min.js"></script>
       <script src="assets/app/js/waypoints.min.js"></script>
       <script src="assets/app/js/bootstrap.bundle.min.js"></script>
       
        <!-- datatable -->
        
  <link href="assets/plugins/DataTables/datatables.min.css" rel="stylesheet">  
  <script src="assets/plugins/DataTables/datatables.min.js"></script>
   
  <!-- select2 -->
        <link href="assets/plugins/select2/css/select2.css" rel="stylesheet">  
        <script src="assets/plugins/select2/js/select2.js"></script>   
	<script src="assets/plugins/jquery-validation/jquery.validate.js"></script>
 	 <script src="assets/plugins/jquery-validation/additional-methods.js"></script>
       
       <script src="assets/app/js/apexcharts.min.js"></script>
       <script src="assets/app/js/metisMenu.min.js"></script>
       <script src="assets/app/js/meanmenu.min.js"></script>
       <script src="assets/app/js/swiper-bundle.min.js"></script>
       <script src="assets/app/js/slick.min.js"></script>
       <script src="assets/app/js/magnific-popup.min.js"></script>
       
      
       
       <script src="assets/app/js/counterup.js"></script>
       <script src="assets/app/js/wow.min.js"></script>
       <script src="assets/app/js/countdown.js"></script>
       <script src="assets/app/js/smooth-scrollbar.js"></script>
        
		  
        <script src="assets/ckeditor/ckeditor.js"></script>
		<script src="assets/ckfinder/ckfinder.js"></script>
        <script src="assets/ckeditor/adapters/jquery.js"></script>
        
       <script>
		var smart_token_hash = '<?=$this->security->get_csrf_hash();?>';
		var smart_token_name = '<?=$this->security->get_csrf_token_name()?>';
			var ck_conf = {extraPlugins:'youtube',youtube_controls: true,youtube_autoplay : false,allowedContent: true,removePlugins : 'iframe',"toolbar":[["Source","-","Cut","Copy","Paste","PasteText","PasteFromWord","-","Undo","Redo",'textfield'],["Image","Table","Smiley","Link","Unlink","Anchor"],["NumberedList","BulletedList","-","Outdent","Indent","-","Blockquote","CreateDiv","-","JustifyLeft","JustifyCenter","JustifyRight","JustifyBlock","-","BidiLtr","BidiRtl"],["Bold","Italic","Underline","Strike","Subscript","Superscript","-","RemoveFormat","TextColor","BGColor","NumberedList","BulletedList"],["Styles","Format","Font","FontSize",'filebrowser','filebrowser','uploadwidget','filetools','uploadimage','uploadfile',"Youtube"]],"language":"en","width":"100%",
	"filebrowserBrowseUrl":"assets\/ckfinder\/ckfinder.html","filebrowserImageBrowseUrl":"assets\/ckfinder\/ckfinder.html?type=Images",
	"filebrowserFlashBrowseUrl":"assets\/ckfinder\/ckfinder.html?type=Flash",
	"filebrowserUploadUrl":"assets\/ckfinder\/core\/connector\/php\/connector.php?command=QuickUpload&type=Files",
	"filebrowserImageUploadUrl":"assets\/ckfinder\/core\/connector\/php\/connector.php?command=QuickUpload&type=Images",
	"filebrowserFlashUploadUrl":"assets\/ckfinder\/core\/connector\/php\/connector.php?command=QuickUpload&type=Flash"
	
	};
		CKEDITOR.editorConfig = function( config )
		{
			config.resize_enabled = true;
			config.resize_minHeight = 550;
			config.resize_maxHeight = 1000;
			config.filebrowserBrowseUrl = '<?=base_url()?>/assets/kcfinder/browse.php?type=files';
			config.filebrowserImageBrowseUrl = '<?=base_url()?>/assets/kcfinder/browse.php?type=images';
			config.filebrowserFlashBrowseUrl = '<?=base_url()?>/assets/kcfinder/browse.php?type=flash';
			config.filebrowserUploadUrl = '<?=base_url()?>/assets/kcfinder/upload.php?type=files';
			config.filebrowserImageUploadUrl = '<?=base_url()?>/assets/kcfinder/upload.php?type=images';
			config.filebrowserFlashUploadUrl = '<?=base_url()?>/assets/kcfinder/upload.php?type=flash';
		}; 
			 </script>  
	   <script>
		var smart_token_hash = '<?=$this->security->get_csrf_hash();?>';
		var smart_token_name = '<?=$this->security->get_csrf_token_name()?>';
	 	
   		 </script>   
         <!-- scan -->
        
         <!--scan -->
		<script src="assets/bootbox.min.js"></script>
        <script src="assets/smart.js"></script>
        <style type="text/css">
		.hide,.hidden
		{
			display:none !important;
			
		}
		.expovent__sidebar::before {
			 
			background: white;
			border-right: 1px solid #ccc;
			 
		}
		</style>
        
         
       
   </head> 

   <body class="body-area">