 
 <div class="row">
 <?php
		for($i=0;$i<count($arr);$i++)
		{
			$images = "assets/images/media/media-49.jpg";
			//if(!empty($arr[$i]['images']) && file_exists(config_item('upload_path')."uploads/".$arr[$i]['images']))
			$d = $arr[$i]['images'];
			if(!empty($d) && is_file(config_item('upload_path').$d) && file_exists(config_item('upload_path').$d))
			{
				$images  = config_item('main_site')."uploads/".$arr[$i]['images'];
			}
	?>
    		<div class="col-md-4">
            		<div class="card custom-card text-center">
                                <div class="card-header border-bottom-0 pb-0">
                                    <span class="ms-auto shadow-lg fs-17"><i class="ri-star-fill text-danger"></i></span>
                                </div>
                                <div class="card-body pt-1">
                                    <span class="avatar avatar-xl avatar-rounded me-2 mb-2">
                                        <img src="<?=$images?>" alt="img">
                                    </span>
                                    <div class="fw-semibold fs-16"><?=$arr[$i]['nama']?></div>
                                    <p class="mb-4 text-muted fs-11"><?=$arr[$i]['company']?></p>
                                    <p class="mb-4 text-muted fs-11"><?=$arr[$i]['designation']?></p>
                                    <div class="btn-list">
                                    	<?php
										if(!empty($arr[$i]['telegram']))
										{
										?>
                                        <a href="<?=$arr[$i]['telegram']?>" target="_blank" class="btn btn-icon btn-info btn-wave waves-effect waves-light">
                                            <i class="ri-telegram-line"></i>
                                        </a>
                                        <?php
										}
										?>
                                        <?php
										if(!empty($arr[$i]['twitter']))
										{
										?>
                                        <a href="<?=$arr[$i]['twitter']?>" target="_blank" class="btn btn-icon btn-success btn-wave waves-effect waves-light">
                                            <i class="ri-twitter-line"></i>
                                        </a>
                                         <?php
										}
										?>
                                        <?php
										if(!empty($arr[$i]['linkedin']))
										{
										?>
                                        <a href="<?=$arr[$i]['linkedin']?>" target="_blank" class="btn btn-icon btn-instagram btn-wave waves-effect waves-light">
                                            <i class="ri-linkedin-line"></i>
                                        </a>
                                        <?php
										}
										?>
                                        <?php
										if(!empty($arr[$i]['website']))
										{
										?>
                                        <a href="<?=$arr[$i]['website']?>" target="_blank" class="btn btn-icon btn-primary btn-wave waves-effect waves-light">
                                            <i class="ri-links-fill"></i>
                                        </a>
                                         <?php
										}
										?>
                                        
                                    </div>
                                </div>
                            </div>
            </div>
    		                
     
    <?php
			 
		}
	?>
</div>	