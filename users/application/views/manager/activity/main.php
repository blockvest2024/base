<?php
$avatar = "assets/images/pictures/31t.jpg";
if(!empty(user_info('avatar')))
{
	$avatar = config_item('main_site')."uploads/".user_info('avatar');
}
?>
	<div class="card card-style">
            <div class="content">
                <div class="tabs tabs-pill" id="tab-group-2">
                    <div class="tab-controls rounded-m p-1 overflow-visible">
                        <?php
						/*
                        <a class="font-13 rounded-m shadow-bg shadow-bg-s tab-topup tabsb" data-bs-toggle="collapse" href="#tab-topup" aria-expanded="true"><?=custom_language('Top Up')?></a>
                        */
						?>
                        <a class="font-13 rounded-m shadow-bg shadow-bg-s tab-wd tabsb" data-bs-toggle="collapse" href="#tab-wd" aria-expanded="true"><?=custom_language('My Ticket')?></a>
                        
                       
                    </div>
                    <div class="mt-3"></div>
                    <!-- Tab Group 1 -->
                     
                    <!-- Tab Group 2 -->
                     
                    <!-- Tab Group 3 -->
                    
                    <div class="collapse coltab show" id="tab-wd" data-bs-parent="#tab-group-2">
                        <?php
						for($i=0;$i<count($seat);$i++)
						{
							$cuso = claimstatus($seat[$i]['status']);
							 
							$prices = $seat[$i]['price']." ".setting('coin_name');
								 
						?> 
                        		<a href="<?=site_url("event/claims/".$seat[$i]['id'])?>" class="d-flex py-1" >
                                    <div class="align-self-center">
                                        <span class="icon rounded-s me-2 gradient-brown shadow-bg shadow-bg-xs"><i class="bi bi-wallet color-white"></i></span>
                                    </div>
                                    <div class="align-self-center ps-1">
                                        <h5 class="pt-1 mb-n1">No Tiket : <?=$seat[$i]['pid']?></h5>
                                        <p class="mb-0 font-11 opacity-70"><?=$seat[$i]['event']['title']?></p>
                                        <p class="mb-0 font-11 opacity-70"><?=date('d M Y',strtotime($seat[$i]['tgl']))?></p>
                                    </div>
                                    <div class="align-self-center ms-auto text-end">
                                        <h4 class="pt-1 mb-n1 color-blue-dark"> <?=$prices?></h4>
                                        <p class="mb-0 font-11"><?=custom_language($cuso)?></p>
                                    </div>
                                </a>
                        <?php
							 
						}
						?>
						 
						 
                    </div>
                    
                      
                    <!-- -->
                </div>
            </div>
        </div>
        
        


    </div>
    
 
       
      