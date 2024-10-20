<?php
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
				$names = claimstatus($arr[$i]['user_reward']['status']);
				$bgcolor = $warna[$arr[$i]['user_reward']['status']];
			}
?>
				<div class="col-md-6">
                                    <!--  -->
                                     <div class="card card-style">
                                        <div class="content padding-0 margin-0" >
                                                <div class="row padding-0 margin-0">
                                                    <div class="col-md-12 padding-0 margin-0" >
                                                        <div class="card  card-style  padding-0 margin-0" style="min-height:150px;">
                                                           <div class="card-body padding-0 margin-0 card-task">
                                                              
                                                               <h1 class="text-center h-task">
                                                                   <?php
																	if($data['price']>0)
																	{
																	?>
                                                                    Reward <?=setting("reward_token")?> <?=setting("coin_name")?>
                                                                    <?php
																	}else
																	{
																	?>
                                                                    	Gratis
                                                                    <?php	
																	}
																	?>   
                                                               </h1>
                                                                <img src="<?=config_item('main_site')?>uploads/<?=$arr[$i]['image']?>" alt="img" width="100%" height="370"   class="mx-auto  shadow-l">
                                                                    
                                                            </div>    
                                                             <div class="card-body  card-task" style="min-height:100px;">
                                                                <div class=" d-flex">
                                                                    <!-- -->
                                                                     <div class="align-self-center">
                                                                         <span class="color-red-dark"><?=$event_category['name']?></span> 
                                                                          
                                                                     </div>
                                                                     <div class="align-self-center ps-1 text-center">
                                                                         <span class="color-black ">- <?=$arr[$i]['task_complete']?>/<?=$arr[$i]['total_seat']?></span> 
                                                                          
                                                                     </div>
                                                                     <div class="align-self-center ms-auto text-end">
                                                                         <p class="mb-0 font-10"> 
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
                                                                         </p>
                                                                     </div>
                                                                    <!-- -->
                                                                </div>
                                                                <h1 class="text-left">
                                                                    <?=$arr[$i]['title']?>
                                                               </h1>
                                                               <hr/>
                                                                
                                                               
                                                             </div>
                                                        </div>
                                                    </div>     
                                                </div>
                                        </div>
                                     </div>   
                                  <!-- -->
                                  </div>
<?php
		}
	}
}	
	
?>                                  