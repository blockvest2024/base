 
 <div class="row">
 <?php
		for($i=0;$i<count($arr);$i++)
		{
			$images = "assets/images/media/media-49.jpg";
			if(!empty($arr[$i]['image']) && file_exists(config_item('upload_path')."".$arr[$i]['image']))
			{
				$images  = config_item('main_site')."uploads/".$arr[$i]['image'];
			}
	?>
    		<div class="col-md-6">
                    <!-- -->
                    <div class="card custom-card">
                    		<div class="card-body">
                            	<a href="<?=site_url('world-event/details/'.$arr[$i]['id'])?>">						 
                                <div class="d-flex ">
                                                        
                                                        <div class="me-3">
                                                            <span class="avatar avatar-xxl bg-light">
                                                                <img src="<?=$images?>" alt="">
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <div class=" mb-1 fs-14 fw-semibold ">
                                                                 <span class="badge bg-purple float-start  "><?=$arr[$i]['entry']?></span> <span class="float-end badge bg-secondary"><?=$arr[$i]['cats']?></span> 
                                                         	</div>
                                                            <br/>
                                                            <div class="mb-1 fs-14 fw-semibold">
                                                                <?=$arr[$i]['name']?> 
                                                            </div>
                                                            <div class="mb-1">
                                                                <span class="me-1"><?=$arr[$i]['description']?></span>
                                                            </div>
                                                            <div class="mb-1">
                                                                <!-- <span class="me-1"><?=$arr[$i]['country']?></span>-->
                                                                <span class="fw-semibold text-muted"><span class=" ms-3"><i class="fa fa-clock-o"></i> <?=date('d/m/Y',strtotime($arr[$i]['start_date']))?> - <?=date('d/m/Y',strtotime($arr[$i]['end_date']))?></span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                      </a>                 
                         </div>
                                                 
                    </div>
                    <!-- -->
            		 
            </div>
    		                
     
    <?php
			 
		}
	?>
</div>	