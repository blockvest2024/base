<?php
include __DIR__."/chunk/header.php";
?>
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
   <div class="fix">
      <div class="offcanvas__info">
         <div class="offcanvas__wrapper">
            <div class="offcanvas__content">
               <div class="offcanvas__top mb-40 d-flex justify-content-between align-items-center">
                  <div class="offcanvas__logo">
                     <a href="dashboard.html">
                        <img src="assets/img/logo/logo-black.svg" alt="logo not found">
                     </a>
                  </div>
                  <div class="offcanvas__close">
                     <button>
                        <i class="fal fa-times"></i>
                     </button>
                  </div>
               </div>
               <div class="offcanvas__search mb-25">
                  <form action="#">
                     <input type="text" placeholder="What are you searching for?">
                     <button type="submit"><i class="far fa-search"></i></button>
                  </form>
               </div>
               <div class="mobile-menu fix mb-40"></div>
               <div class="offcanvas__contact mt-30 mb-20">
                  <h4>Contact Info</h4>
                  <ul>
                     <li class="d-flex align-items-center">
                        <div class="offcanvas__contact-icon mr-15">
                           <i class="fal fa-map-marker-alt"></i>
                        </div>
                        <div class="offcanvas__contact-text">
                           <a target="_blank"
                              href="https://www.google.com/maps/place/Dhaka/@23.7806207,90.3492859,12z/data=!3m1!4b1!4m5!3m4!1s0x3755b8b087026b81:0x8fa563bbdd5904c2!8m2!3d23.8104753!4d90.4119873">12/A,
                              Mirnada City Tower, NYC</a>
                        </div>
                     </li>
                     <li class="d-flex align-items-center">
                        <div class="offcanvas__contact-icon mr-15">
                           <i class="far fa-phone"></i>
                        </div>
                        <div class="offcanvas__contact-text">
                           <a href="tel:+088889797697">+088889797697</a>
                        </div>
                     </li>
                     <li class="d-flex align-items-center">
                        <div class="offcanvas__contact-icon mr-15">
                           <i class="fal fa-envelope"></i>
                        </div>
                        <div class="offcanvas__contact-text">
                           <a href="tel:+012-345-6789"><span class="mailto:support@mail.com">support@mail.com</span></a>
                        </div>
                     </li>
                  </ul>
               </div>
               <div class="offcanvas__social">
                  <ul>
                     <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                     <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                     <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                     <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="offcanvas__overlay"></div>
   <div class="offcanvas__overlay-white"></div>
   <!-- Offcanvas area start -->

   <!--Speaker popup area start -->
   <section class="speaker__popup-area">
      <div class="popup__wrapper">
         <div class="popup__title-wrapper">
            <h3 class="popup__title">Add Event Speaker</h3>
         </div>
         <div class="popup__input-wrapper">
            <form action="#">
               <div class="singel__input-field mb-15">
                  <label class="input__field-text">Speaker Name</label>
                  <input type="text">
               </div>
               <div class="singel__input-field mb-15">
                  <label class="input__field-text">Email</label>
                  <input type="text">
               </div>
               <div class="singel__input-field mb-15">
                  <label class="input__field-text">Phone Number</label>
                  <input type="text">
               </div>
               <div class="singel__input-field mb-15">
                  <label class="input__field-text">Organization Name</label>
                  <input type="text">
               </div>
               <div class="singel__input-field mb-15">
                  <label class="input__field-text">Designation</label>
                  <input type="text">
               </div>
               <div class="popup__update mb-15">
                  <label class="input__field-text">Upload Image ( 200x200px )</label>
                  <input type="file">
               </div>
               <button class="input__btn w-100" type="submit"><i class="fa-regular fa-plus"></i>Add Speaker</button>
            </form>
         </div>
      </div>
   </section>
   <!--Speaker popup area end -->

   <!-- Event popup area start -->
   <section class="event__popup-area">
      <div class="popup__wrapper">
         <div class="popup__title-wrapper">
            <h3 class="popup__title">Add Event Attendant</h3>
         </div>
         <div class="popup__input-wrapper">
            <form action="#">
               <div class="singel__input-field mb-15">
                  <label class="input__field-text">Name</label>
                  <input type="text">
               </div>
               <div class="singel__input-field mb-15">
                  <label class="input__field-text">Email</label>
                  <input type="email">
               </div>
               <div class="singel__input-field mb-15">
                  <label class="input__field-text">Phone Number</label>
                  <input type="text">
               </div>
               <div class="singel__input-field mb-15">
                  <label class="input__field-text">Organization Name</label>
                  <input type="text">
               </div>
               <div class="singel__input-field mb-15">
                  <label class="input__field-text">Ticket ID No</label>
                  <input type="text">
               </div>
               <div class="popup__update">
                  <label class="input__field-text">Upload Image ( 200x200px )</label>
                  <input type="file" name="img" accept="image/*">
               </div>
               <button class="input__btn w-100" type="submit"><i class="fa-regular fa-plus"></i>Add
                  Attendant</button>
            </form>
         </div>
      </div>
   </section>
   <!-- Event popup area end -->
  
 
 <!-- Dashboard area start -->
   <div class="page__full-wrapper">
  	<?php
		 
		include __DIR__."/chunk/sidebar.php";
	?>
     <div class="page__body-wrapper">
     	<?php
		 
			include __DIR__."/chunk/page_header.php";
		?>
    <!--start content-->
       <!-- Start::app-content -->
       <!-- App side area start -->
      <div class="app__slide-wrapper">
       		  <!-- Page Header -->
                
                <!-- Page Header Close -->
			 <?php
             	if(isset($tpl) && is_file(__DIR__."/".$tpl.'.php') && file_exists(__DIR__."/".$tpl.'.php'))
				{
					include(__DIR__."/".$tpl.'.php');
				}
			 ?>	
            
       </div>
    <!--end content-->
       
  </div>
  <!-- Back to top start -->
   <div class="progress-wrap">
      <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
         <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
      </svg>
   </div>
   <!-- Back to top end -->
    <!-- Event popup area start -->
   <section class="scanner-area">
      <div class="popup__wrapper">
         <div class="popup__title-wrapper">
            <h3 class="popup__title">Scan Ticket <span class="close btn closescan" style="float:right;"><i class="fa fa-times"></i></span></h3>
           
         </div>
         <div class="popup__input-wrapper">
              <h3 class="messagescan color-red-light" style="color:red; text-align:center;"></h3>
             <!-- -->
             <div id="qr-reader" class="qr-reader"></div>
             <div id="qr-reader-results"></div>
             <!-- -->
         </div>
      </div>
   </section>
   <!-- Event popup area end -->
<!--end wrapper-->
 <style type="text/css">
 .scanner-area {
    position: fixed;
    z-index: 999;
    top: 50%;
    margin: 0 auto;
    inset-inline-start: 0;
    inset-inline-end: 0;
    display: none;
    max-width: 756px;
    transform: translateY(-50%);
}
.scanner-area.open {
    display: inline-block;
}
 </style>
    
   <script src="assets/app/js/backtotop.js"></script>
   <script src="assets/app/js/custom.js"></script>
   <script src="assets/app/js/mains.js"></script>
   <script src="assets/html5-qrcode.js"></script>	
        <script>
		var html5QrcodeScanner;
		$(function()
		{
			 $("#scanme").click(function()
			 {
				$(".messagescan").text("");	 
				 scanscreen();
			 });
			 $(".closescan").click(function()
			 {
				 $(".offcanvas__close,.offcanvas__overlay").trigger("click");
			 });
			 $(".offcanvas__close,.offcanvas__overlay").on("click", function () {
				$(".offcanvas__info").removeClass("info-open");
				$(".offcanvas__overlay").removeClass("overlay-open");
				if($(".scanner-area").hasClass("open"))
				{
					$(".scanner-area").removeClass("open");	
					  html5QrcodeScanner.clear().then(_ => {
						// the UI should be cleared here      
					  }).catch(error => {
						// Could not stop scanning for reasons specified in `error`.
						// This conditions should ideally not happen.
					  });
				}
			});
			 
			 
		});
		function docReady(fn) {
			// see if DOM is already available
			if (document.readyState === "complete"
				|| document.readyState === "interactive") {
				// call on next available tick
				setTimeout(fn, 1);
			} else {
				document.addEventListener("DOMContentLoaded", fn);
			}
		}
		function callscan()
		{
			docReady(function () {
				/*var resultContainer = document.getElementById('qr-reader-results');
				var lastResult, countResults = 0;
				function onScanSuccess(decodedText, decodedResult) {
					if (decodedText !== lastResult) {
						++countResults;
						lastResult = decodedText;
						// Handle on success condition with the decoded message.
						console.log(`Scan result ${decodedText}`, decodedResult);
					}
				}
		
				html5QrcodeScanner = new Html5QrcodeScanner(
					"qr-reader", { fps: 10, qrbox: 250 });
				html5QrcodeScanner.render(onScanSuccess);
				*/
				html5QrcodeScanner = new Html5QrcodeScanner(
					"qr-reader", { fps: 10, qrbox: 250 });
					
				function onScanSuccess_(qrMessage) {
					  // handle the scanned code as you like
					  //console.log(`QR matched = ${qrMessage}`);
					  // Stop scanning
					  //callrequest(qrMessage);
					  //document.location.href="<?=site_url('dropbox/fullviews')?>?uuid="+ qrMessage;  
					  
						/*html5QrcodeScanner.clear().then(_ => {
						// the UI should be cleared here   
							callrequest(qrMessage);    
						}).catch(error => {
							// Could not stop scanning for reasons specified in `error`.
							// This conditions should ideally not happen.
						});*/
				}
				function callrequestv(qrMessage)
				{
					//dropbox/views
						var req = get('<?=site_url('event/scans')?>',{pud:qrMessage});
						req.done(function(out){
							 
							document.location.href="<?=site_url("dropbox/scans")?>";  
						});
						
						return false;	
				} 
				var lastResult, countResults = 0;
				function onScanSuccess(qrMessage) {
					 
						// Handle on success condition with the decoded message.
						//console.log(`Scan result ${decodedText}`, decodedResult);
						var xhr = new XMLHttpRequest();
						xhr.onreadystatechange = function() {
							if (xhr.readyState == XMLHttpRequest.DONE) {
								//console.log(JSON.parse(xhr.response));
								//alert(xhr.responseText);
								var out = JSON.parse(xhr.response);
								 
								if(out.error==false)
								{
									document.location.href="event/results/"+ qrMessage;
								}else
								{
									$(".messagescan").text(out.message);	
								}
							}
						}
						
				
						xhr.open('GET', 'event/scandata/'+ qrMessage, true);
						//xhr.setRequestHeader('Authorization','Basic ' + admin_token);
						xhr.send(null);
					 
				}
				function onScanFailure(error) {
				  // handle scan failure, usually better to ignore and keep scanning
				  //smartmessage("scan faield");
				  console.log(`QR error = ${error}`);
				}
				
				html5QrcodeScanner.render(onScanSuccess, onScanFailure); 
			});	
		}
		function scanscreen()
		{
			$(".scanner-area").addClass("open");
			$(".offcanvas__overlay").addClass("overlay-open");	
			callscan();
		}
		
		</script>
    
 </body>
</html>
 