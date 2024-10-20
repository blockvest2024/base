<?php
$mobile = $this->agent->is_mobile(); 
if(count($arr)>0)
{
	for($i=0;$i<count($arr);$i++)
	{
		$event_category = $arr[$i]['event_category'];
		if(isset($event_category['id']))
		{
			$names = "Click To Start";
			$warna = array("black","blue","red","green","orange");
			$bgcolor = "#0dcaf0";
			if(isset($arr[$i]['user_reward']['id']))
			{
				$names = rewardstatus($arr[$i]['user_reward']['status']);
				$bgcolor = $warna[$arr[$i]['user_reward']['status']];
			}
			$urls = 'href="javascript:void(0);" onclick="javascript:viewevents('.$arr[$i]['id'].')";';
			if($mobile)
			{
				$urls = 'href="'.site_url("event/details/".$arr[$i]['id']).'"';
			}
?>

        <li>
         <a <?=$urls?>>
                            <div class="timeline-time text-end mobile_off">
                               <span class="date"><?=date('d-m-Y',strtotime($arr[$i]['start_date']))?></span>
                               <span class="time d-inline-block"><?=date('H:i',strtotime($arr[$i]['from_times']))?></span>
                            </div>
                            <div class="timeline-icon mobile_off">
                               <span href="javascript:void(0);"></span>
                            </div>
                            <div class="timeline-body">
                               
                                <div class="d-flex align-items-top timeline-main-content flex-wrap mt-0">
                                   
                                    <div class="flex-fill">
                                        <div class="d-flex align-items-left">
                                            <div class="mt-sm-0 mt-2">
                                                 <span class="date mobile_on"><?=date('d-m-Y',strtotime($arr[$i]['start_date']))?> - <?=date('d-m-Y',strtotime($arr[$i]['to_dates']))?></span>
												<?=date('H:i',strtotime($arr[$i]['from_times']))?> - <?=date('H:i',strtotime($arr[$i]['to_times']))?>
                                                
                                                <p class="mb-0 fs-16 fw-semibold xjuduls"><?=$arr[$i]['title']?></p>
                                                <p class="mb-0 fs-12 fw-semibold"><i class="fa fa-map"></i> <?=$arr[$i]['address']?></p>
                                                 <p class="mb-0 fs-12 fw-semibold"><i class="fa fa-money"></i>
                                                 <?php
																	if($arr[$i]['price']>0)
																	{
																	?>
                                                                     <?=number_format($arr[$i]['reward'],0)?> <?=setting("coin_name")?>
                                                                    <?php
																	}else
																	{
																	?>
                                                                    	Free
                                                                    <?php	
																	}
																	?>
                                                 </p>
                                                 <p class="mb-0 fs-12 fw-semibold"><i class="fa fa-wheelchair"></i> <?=$arr[$i]['total_seat']?>
                                                 </p>
                                                
                                                 
                                            </div>
                                            <div class="ms-auto">
                                                <!-- 
                                                <img alt="avatar" src="<?=config_item('main_site')?>uploads/<?=$arr[$i]['image']?>" width="90">
                                                -->
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
      	 </a> 
      </li>
                         
         
       <?php
											if(!$mobile)
											{
												if($type!="past")
												{
													if($i==1)
													{
										?>
													<script>
                                                        $(function()
                                                        {
                                                            viewevents(<?=$arr[$i]['id']?>);
                                                        });
                                                    </script>
                                                    
                                        <?php
													}
												}
											}
										?>
			 
              
<?php
		}
	}
}
?>
<style type="text/css">
.timeline .timeline-icon span {
    width: 0.625rem;
    height: 0.625rem;
    display: inline-block;
    border-radius: 50%;
    background: rgb(var(--light-rgb));
    color: var(--primary-color);
    line-height: .625rem;
    font-size: .875rem;
    border: 0.188rem solid var(--primary05);
}

</style>                                  