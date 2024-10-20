 
 <div class="row">
 <?php
		for($i=0;$i<count($arr);$i++)
		{
			$images = "assets/images/media/media-49.jpg";
			if(!empty($arr[$i]['images']) && file_exists(config_item('upload_path')."".$arr[$i]['images']))
			{
				$images  = config_item('main_site')."uploads/".$arr[$i]['images'];
			}
	?>
    		<div class="col-md-12">
            		<div class="card custom-card text-center">
                                <div class="card-header border-bottom-0 pb-0">
                                    
                                    
                                </div>
                                <div class="card-body pt-1">
                                    <span class="avatar avatar-xl avatar-rounded me-2 mb-2">
                                        <img src="<?=$images?>" alt="img">
                                    </span>
                                    <div class="fw-semibold fs-16">
									
									<?=$arr[$i]['name']?>
                                    
                                    </div>
                                     <?php
									if(!empty($arr[$i]['website']))
									{
										?>
                                       <a href="<?=$arr[$i]['website']?>" target="_blank" class="btn btn-outline-primary mt-2">WEBSITE</a>
                                         
                                    <?php
									}
									?>
                                    <?php
									if(!empty($arr[$i]['media_link']))
									{
										?>
                                        <a href="<?=$arr[$i]['media_link']?>" target="_blank" class="btn btn-outline-secondary mt-2">Coinmarketcap</a>
                                    <?php
									}
									?> 
                                    <?php
									if(!empty($arr[$i]['smartcontract']))
									{
										?>
                                        <a href="<?=$arr[$i]['smartcontract']?>" target="_blank" class="btn btn-outline-success mt-2">Smartcontract address</a>
                                    <?php
									}
									?> 
                                    <blockquote class="blockquote mb-0 text-center">
                                     
                                    <footer class="blockquote-footer mt-2 fs-14"><?=$arr[$i]['pic']?> 
									<?php
                                    if(!empty($arr[$i]['based']))
									{
									?>
                                    , <cite title="<?=$arr[$i]['based']?> "><?=$arr[$i]['based']?> </cite>
                                    <?php
									}
									?>
                                    <?php
                                    if(!empty($arr[$i]['designation']))
									{
									?>
                                    , <cite title="<?=$arr[$i]['designation']?> "><?=$arr[$i]['designation']?> </cite>
                                    <?php
									}
									?>
                                    </footer>
                                          </blockquote>
                                   
                                    <p class="mb-4 text-muted fs-11"><?=$arr[$i]['description']?></p>
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
                                        <a href="<?=$arr[$i]['linkedin']?>" target="_blank" class="btn btn-icon btn-primary btn-wave waves-effect waves-light">
                                            <i class="ri-linkedin-line"></i>
                                        </a>
                                        <?php
										}
										?>
                                        <?php
										if(!empty($arr[$i]['instagram']))
										{
										?>
                                        <a href="<?=$arr[$i]['instagram']?>" target="_blank" class="btn btn-icon btn-instagram btn-wave waves-effect waves-light">
                                            <i class="ri-instagram-line"></i>
                                        </a>
                                        <?php
										}
										?>
                                        <?php
										if(!empty($arr[$i]['facebook']))
										{
										?>
                                        <a href="<?=$arr[$i]['facebook']?>" target="_blank" class="btn btn-icon btn-facebook btn-wave waves-effect waves-light">
                                            <i class="ri-facebook-line"></i>
                                        </a>
                                        <?php
										}
										?>
                                         <?php
										if(!empty($arr[$i]['discord']))
										{
										?>
                                        <a href="<?=$arr[$i]['discord']?>" target="_blank" class="btn btn-icon btn-info btn-wave waves-effect waves-light">
                                            <i class="ri-discord-line"></i>
                                        </a>
                                        <?php
										}
										?>
                                        <?php
										if(!empty($arr[$i]['tiktok']))
										{
										?>
                                        <a href="<?=$arr[$i]['tiktok']?>" target="_blank" class="btn btn-icon btn-primary btn-wave waves-effect waves-dark">
                                            <i class="ri-music-line"></i>
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