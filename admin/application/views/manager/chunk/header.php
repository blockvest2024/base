<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=config_item("site_name")?></title>
    <meta name="Description" content="Blockvest">
    <meta name="Author" content="Blockvest">
	<meta name="keywords" content="Blockvest">
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
        <link href="assets/datepicker/css/datepicker.css" rel="stylesheet">  
        <script src="assets/datepicker/js/bootstrap-datepicker.js"></script>
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
                
    <script src="assets/bootbox.min.js"></script>
	<script src="assets/smart.js"></script>
    <style type="text/css">
	.hide,.hidden
	{
		display:none !important;	
	}
	</style>

</head>

<body>
