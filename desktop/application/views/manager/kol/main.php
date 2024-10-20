<?php
$mobile = $this->agent->is_mobile(); 
$colx = "col-xxl-7 col-xl-7";
if($mobile)
{
	$colx = "col-xxl-9 col-xl-9";
}
?>
<div class="row">
     <div class="col-xl-3 mobile_off">
        <div class="card custom-card xcard" style="margin-top: -25px; padding-top: 0.7rem; font-size: 12px;">
                                <div class="card-body p-0">
                                    
                                    <div class="p-3 task-navigation border-bottom border-block-end-dashed" style="position:fixed;">
                                        <ul class="list-unstyled task-main-nav mb-0" >
                                            <?php
											 
											for($i=0;$i<count($arr);$i++)
											{
												 
											?>
												<li class="nonex cidx-<?=$arr[$i]['id']?>">
                                                	<a href="javascript:void(0);" class="x-n-<?=$i?>" onclick="javascript:cid_new(<?=$arr[$i]['id']?>);">
                                                    	<?=strtoupper($arr[$i]['name'])?>
                                                   
                                                    
                                                    <?php
													/*
                                                    <br/>
                                                    <small>
                                                     <i class="fa fa-bell"></i> <?=$statistic['subscriberCount']?></small>
                                                    
                                                    <small><i class="fa fa-eye"></i> <?=$statistic['viewCount']?></small>
                                                    */
													?>
                                                     
                                                     </a>
                                                </li>
											<?php
												  
											}
											?>
                                             
                                        </ul>
                                    </div>
                                     
                                </div>
                            </div>
     </div>
	
    <div class="<?=$colx?>">
    	    <div class="mobile_on  ">
                     	 
                            <?php
                          include __DIR__."/../chunk/ads.php";
						  ?>
                 </div>
            <table class="table" width="80%">
                
                <tbody id="contentx">
                     
                     
                </tbody>
            </table>
         
    </div>
    <div class="col-xxl-2 col-xl-2 mobile_off">
    	   <?php
           include __DIR__."/../chunk/ads_side.php";
		   ?>
    </div>
      
</div> 

<script>
 	var cidx = "";
 	function cseeds()
	{
		    removeactived();
			cid = cidx;
			console.log(cidx);
			datas = {limit:30,ctype:"list",cid:cidx};
				var req = gets('<?=site_url('kol/seed')?>',datas);
				req.done(function(out){
					if(out.error==false)
					{
						$("#contentx").html(out.temp);
						//$(".title-portal").text(out.arr.names);
						console.log(out.arr);
						
						$(".cidx-"+ cidx).addClass("active");
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
			$(this).removeClass("active");
		});
	}
	function cid_new(idj)
	{
		cidx = idj;
		cseeds();
	}
	$(function()
	{
		/*$("#form-object").validate({
			ignore:[],
			
			submitHandler:function(){
				 cseeds();
				
			}
		});
		*/
		$("#medias").change(function()
		{
			var idsx = $(this).val();
			cid_new(idsx);
		});
		//cseeds();
		$(".x-n-0").trigger("click");
	});
	
 </script>   
 