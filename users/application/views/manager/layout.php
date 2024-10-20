<?php
$mobile = $this->agent->is_mobile();
$directory = rtrim($this->router->directory,'/');
$class = $this->router->class;
$method = $this->router->method;
$params = $this->uri->segment('3');
$params1 = $this->uri->segment('4');
include __DIR__."/chunk/header.php";
?>
<div id="page">
		<?php
            include __DIR__."/chunk/menu.php";
             
        ?>
        <div class="page-content footer-clear">
            <?php
                include __DIR__."/chunk/top.php";
                 
            ?>
            <?php
                    if(isset($tpl) && is_file(__DIR__."/".$tpl.'.php') && file_exists(__DIR__."/".$tpl.'.php'))
                    {
                        include(__DIR__."/".$tpl.'.php');
                    }
                 ?>	
        </div>
       
	<!-- Off Canvas and Menu Elements-->
    <!-- Always outside the Page Content-->

   
    <!-- Transfer Button Menu -->
    <div id="menu-transfer" data-menu-load="transfer.html"
        class="offcanvas offcanvas-bottom offcanvas-detached rounded-m">
    </div>

    <!-- Exchange Button Menu -->
    <div id="menu-exchange"  
        class="offcanvas offcanvas-bottom offcanvas-detached rounded-m">
        	<!-- menu-size will be the dimension of your menu. If you set it to smaller than your content it will scroll-->
            <div class="menu-size" style="height:260px;">
                <div class="d-flex mx-3 mt-3 py-1">
                    <div class="align-self-center">
                        <h1 class="mb-0">Exchange</h1>
                    </div>
                    <div class="align-self-center ms-auto">
                        <a href="#" class="ps-4 shadow-0 me-n2" data-bs-dismiss="offcanvas">
                            <i class="bi bi-x color-red-dark font-26 line-height-xl"></i>
                        </a>
                    </div>
                </div>
                <div class="divider divider-margins mt-3"></div>
                <div class="content mt-0">
                    <div class="row mt-n3">
                        <div class="col-5">
                            <div class="form-custom form-label form-border">
                                <select class="form-select color-blue-dark exchange-select rounded-xs border-0" id="cura">
                                    <option value="0" selected></option>
                                    
                                </select>
                            </div>
                            <div class="form-custom form-label form-border">
                                <div class="form-custom form-label">
                                    <input type="number" class="form-control exchange-value border-0 rounded-xs" id="val1a" placeholder="50.00"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <h5 class="exchange-arrow"><i class="bi bi-arrow-left-right"></i></h5>
                        </div>
                        <div class="col-5">
                            <div class="form-custom form-label form-border">
                                <select class="form-select color-blue-dark exchange-select rounded-xs border-0" id="curb">
                                    <option value="0" selected>USDT</option>
                                    
                                </select>
                            </div>
                            <div class="form-custom form-label form-border">
                                <div class="form-custom form-label">
                                    <input type="number" class="form-control exchange-value border-0 rounded-xs" id="val2a" placeholder="43.35"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" data-bs-dismiss="offcanvas" class="mx-3 btn btn-full gradient-red shadow-bg shadow-bg-s">Convert and Add to Account</a>
            </div>
    </div>

    <!-- Notifications Bell -->
    <div id="menu-notifications" data-menu-load="menu-notifications.html"
        class="offcanvas offcanvas-top offcanvas-detached rounded-m">
    </div>
    <!-- profile -->
     <div id="menu-information"
        class="offcanvas offcanvas-start">
        <div style="width:100vw">
            <!-- Page Title-->
           <div class="pt-3">
               <div class="page-title d-flex">
                   <div class="align-self-center">
                       <a href="#"
                       data-bs-dismiss="offcanvas"
                       id="backprofile"
                       class="me-3 ms-0 icon icon-xxs bg-theme rounded-s shadow-m">
                           <i class="bi bi-chevron-left color-theme font-14"></i>
                       </a>
                   </div>
                   <div class="align-self-center me-auto">
                       <h1 class="color-theme mb-0 font-18"><?=custom_language('Back to Profile')?></h1>
                   </div>
                   <div class="align-self-center ms-auto">
                       <a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-sidebar"
                       class="icon icon-xxs gradient-highlight color-white shadow-bg shadow-bg-xs rounded-s">
                           <i class="bi bi-list font-20"></i>
                       </a>
                   </div>
               </div>
           </div>
           <div class="content mt-0">
               <h5 class="pb-3 pt-4"><?=custom_language('Personal Information')?></h5>
              <form action="javascript:void(0);" role="form" method="post" id="form-personal" class="form-layout"> 
               <div class="form-custom form-label form-border mb-3 bg-transparent">
                   <input type="text" class="form-control rounded-xs required" id="name" name="name" value="<?=user_info('name')?>" placeholder="<?=custom_language('Nick Name')?>"/>
                   <label for="c1a" class="form-label-always-active color-highlight"><?=custom_language('Username')?></label>
                   <span>(required)</span>
               </div>
                
                 
               
               <?php
			   /*
               <div class="form-custom form-label form-border mb-3 bg-transparent">
                   <input type="text" class="form-control rounded-xs required" id="address" name="address" value="<?=user_info('address')?>"  placeholder="<?=custom_language('Address')?>"/>
                   <label for="c1abcd" class="form-label-always-active color-highlight"><?=custom_language('Address')?></label>
                   <span>(required)</span>
               </div>
			   */
			   ?>
               <div class="form-custom form-label form-border mb-3 bg-transparent">
                   <input type="email" class="form-control rounded-xs required" id="email" name="email" value="<?=user_info('email')?>" placeholder="name@domain.com"/>
                   <label for="c1" class="color-highlight form-label-always-active"><?=custom_language('Email Address')?></label>
                   <span>(required)</span>
               </div>
              
              <?php
			  /*
               <h5 class="pb-3 pt-4">Default Settings</h5>
               <div class="form-custom form-label form-border form-icon">
                   <i class="bi bi-calendar font-13"></i>
                   <label for="c6a" class="color-highlight form-label-always-active"><?=custom_language('Default Account')?></label>
                   <select class="form-select rounded-xs" id="type_account" name="type_account">
                       <option value="Main" <?=(user_info('type_account')=="Main")?'selected="selected"':''?> ><?=custom_language('Main Account')?></option>
                       <option value="Savings" <?=(user_info('type_account')=="Savings")?'selected="selected"':''?>><?=custom_language('Savings Account')?></option>
                        
                   </select>
               </div>
               */
			   ?>
               
               <h5 class="pb-3 pt-4"><?=custom_language('Account Security')?></h5>
               <div class="form-custom form-label form-border mb-3 bg-transparent">
                   <input type="tel" class="form-control rounded-xs" id="telp" name="telp" value="<?=user_info('telp')?>"   />
                   <label for="c21" class="color-highlight form-label-always-active"><?=custom_language('Phone Number')?></label>
                   <span>(<?=custom_language('required')?>)</span>
               </div>
               <?php
			   /*
               <div class="form-custom form-label form-border mb-3 bg-transparent">
                   <input type="password" class="form-control rounded-xs required" id="passwords" name="passwords" value="Old Password"/>
                   <label for="c2" class="color-highlight form-label-always-active"><?=custom_language('Current Password')?></label>
                   <span>(<?=custom_language('required')?>)</span>
               </div>
               <div class="form-custom form-label form-border mb-4 bg-transparent">
                   <input type="password" class="form-control rounded-xs required" id="new_password" name="new_password" value="New Password"/>
                   <label for="c3" class="color-highlight form-label-always-active"><?=custom_language('New Password')?></label>
                   <span>(<?=custom_language('required')?>)</span>
               </div>
               */
			   ?>
			   <button   class="btn btn-full gradient-highlight shadow-bg shadow-bg-s mt-4" style="width:100%;"><?=custom_language('Apply Settings')?></button>
             </form>  
           </div>
           
        </div>
    </div>
    <!-- --> 
	<!-- refferal link -->
     
    <div id="menu-refferal-link"  
        class="offcanvas offcanvas-bottom offcanvas-detached rounded-m">
        	<!-- menu-size will be the dimension of your menu. If you set it to smaller than your content it will scroll-->
            <div class="menu-size" style="height:auto;">
                <div class="d-flex mx-3 mt-3 py-1">
                    <div class="align-self-center">
                        <h1 class="mb-0"><?=custom_language('Refferal link')?></h1>
                    </div>
                    <div class="align-self-center ms-auto">
                        <a href="#" class="ps-4 shadow-0 me-n2" data-bs-dismiss="offcanvas">
                            <i class="bi bi-x color-red-dark font-26 line-height-xl"></i>
                        </a>
                    </div>
                </div>
                <div class="divider divider-margins mt-0"></div>
                <div class="content mt-0">
                      	<div class="col-12">
                             
                             <!-- -->
                             <div class="form-group">
                                 
                                <div class="input-group mb-3"> 
                                	<span class="input-group-text"><i class="bi bi-link"></i></span>
									<input type="text" class="form-control" aria-label="Reffreal" id="refinput" readonly="readonly" value="<?=site_url('register/views/'."A-".user_balance('pid'))?>"> 
                                     <span class="input-group-text" onclick="javascript:CopyToClipboard('refinput');" style="cursor:pointer;"><i class="fa fa-copy"></i></span>
								</div>
                               
                                
                                
                              </div>
                             <!-- -->
                        </div>
                </div>
                 
            </div>
    </div>
    <!-- end refferal -->
    <!-- about -->
     
    <div id="menu-about"  
        class="offcanvas offcanvas-bottom offcanvas-detached rounded-m">
        	<!-- menu-size will be the dimension of your menu. If you set it to smaller than your content it will scroll-->
            <div class="menu-size" style="height:auto;">
                <div class="d-flex mx-3 mt-3 py-1">
                    <div class="align-self-center">
                        <h1 class="mb-0">About Us</h1>
                    </div>
                    <div class="align-self-center ms-auto">
                        <a href="#" class="ps-4 shadow-0 me-n2" data-bs-dismiss="offcanvas">
                            <i class="bi bi-x color-red-dark font-26 line-height-xl"></i>
                        </a>
                    </div>
                </div>
                <div class="divider divider-margins mt-0"></div>
                <div class="content mt-0">
                      	<div class="col-12">
                             
                             <!-- -->
                             <?=custom_language(setting("about_us"))?> 
                             <!-- -->
                        </div>
                </div>
                 
            </div>
    </div>
    <!-- end about -->
     <!-- contact_support -->
     
    <div id="menu-contact"  
        class="offcanvas offcanvas-bottom offcanvas-detached rounded-m">
        	<!-- menu-size will be the dimension of your menu. If you set it to smaller than your content it will scroll-->
            <div class="menu-size" style="height:auto;">
                <div class="d-flex mx-3 mt-3 py-1">
                    <div class="align-self-center">
                        <h1 class="mb-0">Contact support</h1>
                    </div>
                    <div class="align-self-center ms-auto">
                        <a href="#" class="ps-4 shadow-0 me-n2" data-bs-dismiss="offcanvas">
                            <i class="bi bi-x color-red-dark font-26 line-height-xl"></i>
                        </a>
                    </div>
                </div>
                <div class="divider divider-margins mt-0"></div>
                <div class="content mt-0">
                      	<div class="col-12">
                             
                             <!-- -->
                              <?=custom_language(setting("contact_support"))?>
                             <!-- -->
                        </div>
                </div>
                 
            </div>
    </div>
    <!-- end contact_support -->
      <!-- contact_support -->
     
    <div id="menu-terms"  
        class="offcanvas offcanvas-bottom offcanvas-detached rounded-m">
        	<!-- menu-size will be the dimension of your menu. If you set it to smaller than your content it will scroll-->
            <div class="menu-size" style="height:auto;">
                <div class="d-flex mx-3 mt-3 py-1">
                    <div class="align-self-center">
                        <h1 class="mb-0">Term of Services</h1>
                    </div>
                    <div class="align-self-center ms-auto">
                        <a href="#" class="ps-4 shadow-0 me-n2" data-bs-dismiss="offcanvas">
                            <i class="bi bi-x color-red-dark font-26 line-height-xl"></i>
                        </a>
                    </div>
                </div>
                <div class="divider divider-margins mt-0"></div>
                <div class="content mt-0">
                      	<div class="col-12">
                             
                             <!-- -->
                              <?=custom_language(setting("terms"))?>
                             <!-- -->
                        </div>
                </div>
                 
            </div>
    </div>
    <!-- end terms -->
    
    <!-- -->
     
</div>
<!-- End of Page ID-->
<div id="menu-list"
        class="offcanvas offcanvas-start ">
 </div> 
 <div id="menu-tree-list"
        class="offcanvas offcanvas-start ">
 </div>       
<script src="assets/scripts/custom.js"></script>
<script>
var total_coin = 0;
var price_coin = 1;
function topup_c(idv,coinname,totalv,valuesv)
{
	id_currency = idv;
	var coinjson = arr_currency(idv);
	console.log(coinjson.id);
	$.each($(".globaltopup .titletoptup"),function()
	{
		$(this).html('<i class="bi bi-ban"></i>');	
	});
	$(".on-topup-"+ idv +" .titletoptup").html('<i class="bi bi-check"></i>');	
	$(".topup-coin").html(coinname);
	//$(".form-topup #total").val(totalv);
	//$(".form-topup #value_total").val(1);
	
	$("#msform #simbol").val(coinjson.simbol);
	$("#msform #network").val(coinjson.network);
	$("#msform #coin_name").val(coinjson.name);
	$("#msform #received_address").val(coinjson.received_address);
	$("#msform #id_currency").val(idv);
	$(".rec_dev").html(coinjson.name + "Network " + coinjson.network);
	$("#rec_addr").val(coinjson.received_address);
	$("#qrcode").html("");
	$(".qrcode_o").removeClass("xhide");
	new QRCode(document.getElementById("qrcode"), coinjson.received_address);
	total_coin = totalv;
	price_coin = valuesv;
}
function arr_currency(idk)
{
	<?php
	$currencys = get_currency();
	for($i=0;$i<count($currencys);$i++)
	{
	?>
			if(idk==<?=$currencys[$i]['id']?>)
			{
				return <?=json_encode($currencys[$i])?>
			}
	<?php	
	}
	?>	
}
$(function()
{
	$(".form-topup #value_total").keyup(function()
	{
		var yprice = $(this).val();
		var price_x = <?=setting('price_coin')?>;
		 
		var xj = (price_coin * yprice) / parseFloat(price_x);
		$(".form-topup #total").val(xj);
	});
	
	$("#form-personal").validate({
		ignore:[],
		submitHandler:function(){
			 
			var formdata = new FormData($("#form-personal")[0]);
			var req = postFile('<?=site_url('profile/save')?>',formdata);
			req.done(function(out){
				if(!out.error)
				{
					 $("#menu-information").modal('hide');
					 smart_success_box(out.message,'#form-personal');
					 document.location.href = "<?=site_url("profile")?>";
				}
				else
				{
					smart_error_box(out.message,'#form-personal');
				}
			});
			return false;
		}
	});
	// header-date
	var headerLarge = document.querySelectorAll('.header-date')[0];
        if(headerLarge){
            var weekID = new Date();
            var weekdayName = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
            var monthID = new Date();
            var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            var dayID = new Date();
            var dayName = dayID.getDate();
            var daySuffix = 'th';
            if(dayName === 1){daySuffix = 'st'};
            if(dayName === 2){daySuffix = 'nd'};
            if(dayName === 3){daySuffix = 'rd'};
            if(dayName === 21){daySuffix = 'st'};
            if(dayName === 22){daySuffix = 'nd'};
            if(dayName === 22){daySuffix = 'rd'};
            if(dayName === 31){daySuffix = 'st'};
           // headerLarge.innerHTML += weekdayName[weekID.getDay()]  + ' ' +  dayName + daySuffix + ' ' + monthNames[monthID.getMonth()]
		   $('.header-date').html(weekdayName[weekID.getDay()]  + ' ' +  dayName + daySuffix + ' ' + monthNames[monthID.getMonth()]);
        }
	// header date
	 $(".a-link").click(function()
	 {
		var cda = $(this).attr("href");
		document.location.href= cda; 
	 }); 
			 $('#province').change(function()
			{
				var ids = $(this).val();
				getcity(ids); 
			});
			$('#city').change(function()
			{
				var ids = $(this).val();
				getdistrict(ids); 
			});
});
		function getcity(ids)
		{
			var req = post('<?=site_url('api/get-by-province')?>',{id:ids,'<?=$this->security->get_csrf_token_name()?>':smart_token_hash});
			$("#city").find('option').remove();
			req.done(function(out){
				if(!out.error)
				{
					$.each(out.data,function(key,val){
						$("#city").append("<option value='"+val.id+"'>"+val.name+"</option>");
					});
					$("#smart-loader").modal('hide');
				}
				$("#city").trigger('change.select2');
				$("#city").val(city_sel).trigger('change');
				
			});	
		}
		function getdistrict(ids)
		{
			var req = post('<?=site_url('api/get-by-city')?>',{id:ids,'<?=$this->security->get_csrf_token_name()?>':smart_token_hash});
			$("#district").find('option').remove();
			req.done(function(out){
				if(!out.error)
				{
					$.each(out.data,function(key,val){
						$("#district").append("<option value='"+val.id+"'>"+val.name+"</option>");
					});
					$("#smart-loader").modal('hide');
				}
				$("#district").trigger('change.select2');
				$("#district").val(city_sel).trigger('change');
				
			});	
		}
</script>
</body>
</html>
 