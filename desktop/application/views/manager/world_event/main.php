<?php
$mobile = $this->agent->is_mobile(); 
$colx = "col-xxl-9 col-xl-9";
if($mobile)
{
	$colx = "col-xxl-12 col-xl-9";
}
?>
<div class="row">
     <div class="col-xl-3 mobile_off">
        <div class="card custom-card xcard" style="margin-top: -25px; padding-top: 0.7rem; font-size: 12px; min-height:600px;">
                                <div class="card-body p-0">
                                    
                                    <div class="p-3 task-navigation border-bottom border-block-end-dashed" style="position:fixed;">
                                        <ul class="list-unstyled task-main-nav mb-0" >
                                            <?php
											 
											//for($i=0;$i<count($arr);$i++)
											for($i=0;$i<13;$i++)
											{
												if(isset($arr[$i]['id']))
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
           <?php
		   if(!$mobile)
			{
		   ?>
            <div class="pull-left">
            				<select class="form-select rounded-pillx" id="years" aria-label="Default select example">
                                <?php
								for($i=date('Y');$i>(date('Y')-10);$i--)
								{
									$selected = "";
									if($i==0)
									{
										$selected = "selected='selected'";
									}
								?>
                                	<option value="<?=$i?>" <?=$selected?>><?=strtoupper($i)?></option>
								<?php
								}
								?>
                            </select>
            </div>   
            <?php
			}
			?>  
            <table class="table" width="80%">
                
                <tbody id="contentx">
                     
                     
                </tbody>
            </table>
         
    </div>
    
      
</div> 

<script>
 	var cidx = "";
	var yearsx = "<?=date('Y')?>";
 	function cseeds()
	{
		    removeactived();
			cid = cidx;
			console.log(cidx);
			datas = {limit:30,ctype:"list",cid:cidx,'year':yearsx};
				var req = gets('<?=site_url('world_event/seed')?>',datas);
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
		yearsx = $("#years").val();
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
			yearsx = $("#years").val();
			var idsx = $(this).val();
			cid_new(idsx);
		});
		$("#years").change(function()
		{
			yearsx = $(this).val();
			cseeds();
		});
		<?php
		if($mobile)
		{
		?>
		$("#medias").trigger("change");
		<?php
		}else
		{
		?>
		cseeds();
		<?php
		}
		?>
		//cseeds();
		$(".x-n-0").trigger("click");
	});
	
 </script>   
 <style type="text/css">
	 @media (max-width: 699px) {
		table.table #contentx .col-md-6 .d-flex {
			display: block !important;
		}
		table.table #contentx .col-md-6 .d-flex .me-3 {
			margin: 0 !important;
		}	
		table.table #contentx .col-md-6 .d-flex .me-3 span.avatar.avatar-xxl.bg-light {
			width: 100%;
			height: auto;
		}	
	}
 </style>
 