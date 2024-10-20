  <link rel="stylesheet" type="text/css" href="assets/plugins/slick/slick.css?v2022">
  <link rel="stylesheet" type="text/css" href="assets/plugins/slick/slick-theme.css?v2022">
  <script src="assets/plugins/slick/slick.js?v2022" type="text/javascript" charset="utf-8"></script>
<?php
$avatar = "assets/images/pictures/31t.jpg";
if(!empty(user_info('avatar')))
{
	$avatar = config_item('main_site')."uploads/".user_info('avatar');
}
?>
	 <h4 class="text-center">PORTAL NEWS</h4>
   <?php
   /*
    <form id="form-object"> 
    <div class="card card-style">
            <div class="content">
                <div class="form-group">
                    <label>Portal</label>
                    <div class="input-group">
                        <select name="cid" id="cid" class="form-control rounded-xs">
                        	<option value="">-- Default --</option>
							<?php
							for($i=0;$i<count($arr);$i++)
							{
							?>
                            	<option value="<?=$arr[$i]['id']?>"><?=$arr[$i]['name']?></option>
                            <?php
							}
							?>
                        </select>
                        <span class="input-group-btn">
                            <input type="hidden" name="limit" value="10" />
                            <input type="hidden" name="ctype" value="list" />
                            
                            <button class="btn btn-primary btn-sm btn-smallest" type="submit" id="btn-upload" data-toggle="tooltip"  s><i class="fa fa-search"></i></button>
                     </span>
                    </div>
               </div>
            </div>
    </div>   
    </form>        
	*/
	?>
    
	
	<div class="card card-style">
            <div class="content">
				<section class="centerx slider">
					 
					<?php
                    for($i=0;$i<count($arr);$i++)
                    {
                    ?>
                    	<div class="ic">
                        	<a href="javascript:void(0);" class="nonex" onclick="javascript:cid_new(<?=$arr[$i]['id']?>);" id="cidx-<?=$arr[$i]['id']?>">
                            	<span class="c-check"><i class="bi bi-check"></i></span>
                            	<?php
								/*
                                <img src="<?=$arr[$i]['icon_link']?>"  class="img-resonsive" width="100" height="60" />
								*/
								?>
                                 
                                <img src="<?=config_item('main_site')?>uploads/<?=$arr[$i]['icon_link']?>" alt="img" width="135" height="80"   class="mx-auto  shadow-l">
                            </a>
                        </div>
                         
                    <?php
                    }
                    ?>
                    
                </section>    
             </div>
    </div>            
	<div class="card card-style">
            <div class="content">
                 
                    <div class="mt-3"></div>
                    <!-- Tab Group 1 -->
                     
                    <!-- Tab Group 2 -->
                     
                    <!-- Tab Group 3 -->
                    
                      
                         <h4 class="title-portal text-center color-blue-dark"></h4>
                        <div class="news">
                        	
                        </div>
						<?php
						/*
                        <a href="#" class="d-flex py-1" data-bs-toggle="offcanvas" data-bs-target="#menu-activity-2">
                            <div class="align-self-center">
                                <span class="icon rounded-s me-2 gradient-brown shadow-bg shadow-bg-xs"><i class="bi bi-wallet color-white"></i></span>
                            </div>
                            <div class="align-self-center ps-1">
                                <h5 class="pt-1 mb-n1">0xCc8E6d00C17eB431350C6c50d8b8F05176b90b11</h5>
                                <p class="mb-0 font-11 opacity-70">3rd November <span class="copyright-year"></span></p>
                            </div>
                            <div class="align-self-center ms-auto text-end">
                                <h4 class="pt-1 mb-n1 color-blue-dark">$300</h4>
                                <p class="mb-0 font-11">Transferred</p>
                            </div>
                        </a>
						
						<a href="#" class="d-flex py-1" data-bs-toggle="offcanvas" data-bs-target="#menu-activity-2">
                            <div class="align-self-center">
                                <span class="icon rounded-s me-2 gradient-green shadow-bg shadow-bg-xs"><i class="bi bi-wallet color-white"></i></span>
                            </div>
                            <div class="align-self-center ps-1">
                                <h5 class="pt-1 mb-n1">0xCc8E6d00C17eB431350C6c50d8b8F05176b90b11</h5>
                                <p class="mb-0 font-11 opacity-70">3rd November <span class="copyright-year"></span></p>
                            </div>
                            <div class="align-self-center ms-auto text-end">
                                <h4 class="pt-1 mb-n1 color-blue-dark">$800</h4>
                                <p class="mb-0 font-11">Transferred</p>
                            </div>
                        </a>
						
						<a href="#" class="d-flex py-1" data-bs-toggle="offcanvas" data-bs-target="#menu-activity-2">
                            <div class="align-self-center">
                                <span class="icon rounded-s me-2 gradient-orange shadow-bg shadow-bg-xs"><i class="bi bi-wallet color-white"></i></span>
                            </div>
                            <div class="align-self-center ps-1">
                                <h5 class="pt-1 mb-n1">0xCc8E6d00C17eB431350C6c50d8b8F05176b90b11</h5>
                                <p class="mb-0 font-11 opacity-70">3rd November <span class="copyright-year"></span></p>
                            </div>
                            <div class="align-self-center ms-auto text-end">
                                <h4 class="pt-1 mb-n1 color-blue-dark">$400</h4>
                                <p class="mb-0 font-11">Pending</p>
                            </div>
                        </a>
						
						<a href="#" class="d-flex py-1" data-bs-toggle="offcanvas" data-bs-target="#menu-activity-2">
                            <div class="align-self-center">
                                <span class="icon rounded-s me-2 gradient-red shadow-bg shadow-bg-xs"><i class="bi bi-wallet color-white"></i></span>
                            </div>
                            <div class="align-self-center ps-1">
                                <h5 class="pt-1 mb-n1">0xCc8E6d00C17eB431350C6c50d8b8F05176b90b11</h5>
                                <p class="mb-0 font-11 opacity-70">3rd November <span class="copyright-year"></span></p>
                            </div>
                            <div class="align-self-center ms-auto text-end">
                                <h4 class="pt-1 mb-n1 color-blue-dark">$600</h4>
                                <p class="mb-0 font-11">Rejected</p>
                            </div>
                        </a>
                        */
						?>
                    </div>
                    
                      
                    <!-- -->
                 
             
        </div>
        
        


    </div>
 <?php
  $mobile = $this->agent->is_mobile();
 
  ?>   
 <script>
 $(function()
 {
	$("#id_portal").select2(); 
 });
 </script>
 <style type="text/css">
 button.btn-smallest {
    padding: 4px 15px;
    border: none;
    border-radius: inherit;
}
.ic {
    
   
}
.ic img.img-resonsive {
     
}
.nonex .c-check i {
   display:none;
}
span.c-check {
    position: absolute;
	background: #ccc;
}
.nonex.actived .c-check i {
    display:block;
	color:white;
	font-size: 20px;
    
}
 </style>
 <script>
 	var cidx = "";
 	function cseeds()
	{
		    removeactived();
			cid = cidx;
			datas = {limit:10,ctype:"list",cid:cidx};
				var req = get('<?=site_url('news/seed')?>',datas);
				req.done(function(out){
					if(out.error==false)
					{
						$(".news").html(out.temp);
						$(".title-portal").text(out.arr.names);
						console.log(out.arr);
						
						$("#cidx-"+ out.arr.data.id).addClass("actived");
					}
					else
					{
						smart_message(out.message);
						smart_error_box(out.message,'#frm-object .block-content');
					}
				});
				return false;	
	}
	function removeactived()
	{
		$.each($(".nonex"),function()
		{
			$(this).removeClass("actived");
		});
	}
	function cid_new(idj)
	{
		cidx = idj;
		cseeds();
	}
	$(function()
	{
		$("#form-object").validate({
			ignore:[],
			
			submitHandler:function(){
				 cseeds();
				
			}
		});
		cseeds();
	});
	
 </script>
  <script type="text/javascript">
    
      
	 
	  
	  setTimeout(function()
	  {
		  $(".centerx").slick({
			dots: true,
			infinite: false,
			centerMode: true,
			slidesToShow: <?=($mobile)?1:8?>,
			slidesToScroll: <?=($mobile)?1:8?>,
		  });
		  
	  },500);
	 
   </script>
       
      