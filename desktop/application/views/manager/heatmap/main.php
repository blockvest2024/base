<?php
$mobile = $this->agent->is_mobile(); 
$colx = "col-xxl-8 col-xl-8";
if($mobile)
{
	$colx = "col-xxl-10 col-xl-10";
}
?>
<div class="row">
     <div class="col-xl-2 mobile_off">
        <div class="card custom-card xcard" style="margin-top: -25px; padding-top: 0.7rem; font-size: 12px;">
                                <div class="card-body p-0">
                                    
                                    <div class="p-3 task-navigation border-bottom border-block-end-dashed" style="position:fixed;">
                                        <ul class="list-unstyled task-main-nav mb-0" >
                                           <li class="nonex ">
                                                	<a href="<?=site_url("heatmap")?>?c=coin" >
                                                    	Coin
                                                    </a>
                                                </li>
                                                <!--
                                                <li class="nonex ">
                                                	<a href="<?=site_url("heatmap")?>?c=exchanges" >
                                                    	Exchanges
                                                    </a>
                                                </li>
                                               -->
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
             
         	<div class="row">
                 <div class="col-xl-12">
                    <?php
						if($xgets=="exchanges")
						{
					?>
                    		<!-- TradingView Widget BEGIN -->
                            <iframe src="https://coin360.com/widget/map?utm_source=embed_map" frameborder="0" title="Coin360.com: Cryptocurrency Market State" width="100%" height="700"></iframe>
                    <?php
						}else
						{
					?>
                    		<iframe src="https://coin360.com/widget/map?utm_source=embed_map" frameborder="0" title="Coin360.com: Cryptocurrency Market State" width="100%" height="600"></iframe> 
                    <?php
						}
					?>
                 </div>
             </div>  
    </div>
    <div class="col-xxl-2 col-xl-2 mobile_off">
    	   <?php
           include __DIR__."/../chunk/ads_side.php";
		   ?>
    </div>
   
      
</div> 

<script>
 	 
	
 </script>   
 
     