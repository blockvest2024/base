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
	    
        	<div class="card custom-card un-read">
                                        <div class="card-body p-3">
                                            <a <?=$urls?>>
                                                <div class="d-flex align-items-top mt-0 flex-wrap">
                                                    <div class="lh-1">
                                                        
                                                        <span class="avatar avatar-md online me-3 avatar-rounded">
                                                            <img alt="Event Image" src="<?=config_item('main_site')?>uploads/<?=$arr[$i]['image']?>">
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <div class="d-flex align-items-center">
                                                            <div class="mt-sm-0 mt-2">
                                                                <h6 class="mb-0 fs-14 fw-semibold juduls"><?=$arr[$i]['title']?></h6>
                                                                <p class="mb-0 text-muted">
                                                                	<?php
																	if($arr[$i]['price']>0)
																	{
																	?>
                                                                    Harga Tiket <?=number_format($arr[$i]['reward'],0)?> <?=setting("coin_name")?>
                                                                    <?php
																	}else
																	{
																	?>
                                                                    	Gratis
                                                                    <?php	
																	}
																	?>
                                                                </p>
                                                                <p>
                                                                <?=$event_category['name']?>
                                                                </p>
                                                                <span class="mb-0 d-block text-muted">
                                                                <?php
																		 if(!empty($arr[$i]['end_date']) && date('Y',strtotime($arr[$i]['end_date']))!=1970)
																		 {
																		
																		 ?>
                                                                         <b><?=date('d-m-Y H:i',strtotime($arr[$i]['start_date']))?> - <?=date('d-m-Y H:i',strtotime($arr[$i]['end_date']))?></b>
                                                                         <?php
																		 }else
																		 {
																		 ?>
                                                                          <b><?=date('d-m-Y H:i',strtotime($arr[$i]['start_date']))?>  </b>
                                                                         <?php
																		 }
																		 ?>
                                                                </span>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <h6 class="float-end badge  text-muted">
                                                                    <?=$arr[$i]['task_complete']?>/<?=$arr[$i]['total_seat']?>
																	
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>    
                                        </div>
                                        <?php
											if(!$mobile)
											{
												if($i==0)
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
										?>
                                    </div>
        </li>
			 
                
<?php
		}
	}
}
?>                                  