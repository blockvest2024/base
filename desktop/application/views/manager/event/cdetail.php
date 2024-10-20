<?php
$mobile = $this->agent->is_mobile(); 
$avatar = "assets/images/pictures/31t.jpg";
if(!empty(user_info('avatar')))
{
	$avatar = "uploads/".user_info('avatar');
}
$task_type = $data;
$task_payment_arr = $data['task_payment_arr'];
?>
 
	        
            <div class="card custom-card">
                                <img src="<?=config_item('main_site')?>uploads/<?=$data['image']?>" width="200" height="200" class="card-img-top img-detailx" alt="...">
                                <div class="card-body">
                                    <h6 class="card-title fw-semibold juduls fs-18"><?=$data['title']?>
                                    | <?=$data['event_category']['name']?> | <?=date('d-m-Y',strtotime($data['start_date']))?>
                                    <span class="badge bg-primary float-end fs-14"><?=$data['total_seat']?></span>
                                    </h6>
                                    <p class="card-text text-muted">
                                     <i class="fa fa-money"></i>   
									<b>
									<?php
																	if($data['price']>0)
																	{
																	?>
                                                                    <?=number_format($data['reward'],0)?> <?=setting("coin_name")?>
                                                                    <?php
																	}else
																	{
																	?>
                                                                    	Free
                                                                    <?php	
																	}
																	?>
                                    </b> | <i class="fa fa-map"></i> 
									<b>
									 <a href="<?=$data['link_address']?>" target="_blank"><?=$data['address']?></a>
                                    </b>
                                    </p>
                                    <!-- -->
                                    <?php
									$urlwhatsapp = "https://web.whatsapp.com/send?text=".urlencode(site_url('event/details/'.$data['id'])."?id=".$data['id']);
									if($mobile)
									{
										$urlwhatsapp = "whatsapp://send?text=".urlencode(site_url('event/details/'.$data['id'])."?id=".$data['id']);
									}
									?>
                                    <p class="text-muted ">
                                         <a class="btn btn-sm btn-success" target="_new" href="<?=$urlwhatsapp?>" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"></i></a>   
                                         <a class="btn btn-sm btn-primary"  href="https://www.facebook.com/sharer/sharer.php?u=<?=site_url('event/details/'.$data['id'])."?id=".$data['id']?>" target="_blank">
                                         <i class="fa fa-facebook"></i>
                                         </a>
                                         <a class="btn btn-sm btn-success" style="background-color:#096"  href="https://twitter.com/intent/tweet?text=<?=urlencode($data['title'])?>&url=<?=site_url('event/details/'.$data['id'])."?id=".$data['id']?>&hashtags=blockvest" target="_blank">
                                         <i class="fa fa-twitter"></i>
                                         </a>
                                    </p>   
                                    <!-- -->
                                    <p class="text-muted ">
                                                <?php
																		echo $data['description'];
																	?>
                                                </p>
                                     <!-- -->
                                      <?php
                                      if(count($speaker)>0)
									  {
									  ?>
                                      <h6 class="text-left">Speaker</h6>
                                         <div class="row">
                                         	<?php
                                            for($i=0;$i<count($speaker);$i++)
											{
											?>
                                            	<div class="col-xl-12">
                                                    <div class="card custom-card card-bg-danger">
                                                        <div class="card-body">
                                                            <div class="d-flex align-items-center w-100">
                                                                <div class="me-2">
                                                                    <?php
																		if(!empty($speaker[$i]['images']) && file_exists(config_item('upload_path').$speaker[$i]['images']))
																		{
																	?>
                                                                    <span class="avatar avatar-rounded">
                                                                        <img src="<?=config_item('main_site')?>uploads/<?=$speaker[$i]['images']?>" alt="img">
                                                                    </span>
                                                                    <?php
																		}
																	?>
                                                                </div>
                                                                <div class="">
                                                                    <div class="fs-15 fw-semibold"><?=strtoupper($speaker[$i]['name'])?></div>
                                                                    <p class="mb-0 text-fixed-white op-7 fs-12"><?=strtoupper($speaker[$i]['designation'])?></p>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
											}
											?>                             	
                                         </div>
                                      <?php
                                      }
									  ?>   
                                      <a href="https://users.blockvest.org/" id="start_task" class="btn btn-info btn-sm btn-xs btn-lg btn-full" style="width:100%;">Join</a> 
                                     <!-- -->           
                                </div>
                                
                            </div>
          
  <style type="text/css">
  
.img-detailx
{
	width:100%;
	height:100%;	
}     
</style>   

                                  