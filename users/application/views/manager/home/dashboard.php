  <link rel="stylesheet" type="text/css" href="assets/plugins/slick/slick.css?v2022">
  <link rel="stylesheet" type="text/css" href="assets/plugins/slick/slick-theme.css?v2022">
  <script src="assets/plugins/slick/slick.js?v2022" type="text/javascript" charset="utf-8"></script>
  <!-- Main Card Slider-->
       <!-- -->
       <?php
            //include __DIR__."/../chunk/wallet.php";
             
        ?>    
       <!-- -->  
       
                
        <!-- Quick Actions -->
       <?php
	   /*
        <div class="content py-2">
            <div class="d-flex text-center d-iconv">
                 
				 
                <div   class="m-auto">
                    <a href="<?=site_url("project")?>?task=ongoing" class="icon icon-xxl rounded-m bg-theme shadow-m"><i class="font-28 color-blue-dark bi bi-building"></i></a>
                    <h6 class="font-13 opacity-80 font-500 mb-0 pt-2">Project</h6>
                </div>
                <div   class="m-auto">
                    <a href="<?=site_url("project")?>?task=ongoing" class="icon icon-xxl rounded-m bg-theme shadow-m"><i class="font-28 color-blue-dark bi bi-bullseye"></i></a>
                    <h6 class="font-13 opacity-80 font-500 mb-0 pt-2">Authority</h6>
                </div>
                <div   class="m-auto">
                    <a href="<?=site_url("influence")?>?task=ongoing" class="icon icon-xxl rounded-m bg-theme shadow-m"><i class="font-28 color-blue-dark bi bi-broadcast"></i></a>
                    <h6 class="font-13 opacity-80 font-500 mb-0 pt-2">Influencer</h6>
                </div>
                <div   class="m-auto">
                    <a href="<?=site_url("influence")?>?task=ongoing" class="icon icon-xxl rounded-m bg-theme shadow-m"><i class="font-28 color-blue-dark bi bi-distribute-vertical"></i></a>
                    <h6 class="font-13 opacity-80 font-500 mb-0 pt-2">Trading</h6>
                </div>
                <div   class="m-auto">
                    <a href="<?=site_url("influence")?>?task=ongoing" class="icon icon-xxl rounded-m bg-theme shadow-m"><i class="font-28 color-blue-dark bi bi-door-open-fill"></i></a>
                    <h6 class="font-13 opacity-80 font-500 mb-0 pt-2">Market</h6>
                </div>
                  <div   class="m-auto">
                    <a href="<?=site_url("influence")?>?task=ongoing" class="icon icon-xxl rounded-m bg-theme shadow-m"><i class="font-28 color-blue-dark bi bi-book-fill"></i></a>
                    <h6 class="font-13 opacity-80 font-500 mb-0 pt-2">Press Release</h6>
                </div> 
                 
                
                 
                  
                 
            </div>
        </div>
       */
	   ?>   
		 
      
        
          <!-- Recent Activity Title-->
        <div class="content my-0 mt-n2 px-1">
            <div class="d-flex">
                <div class="align-self-center">
                    <h3 class="font-16 mb-2"><?=custom_language('Event')?> </h3>
                </div>
                <div class="align-self-center ms-auto">
                    
                </div>
            </div>
        </div>
        
        <!-- Recent Activity Cards-->
        <div class="card card-style">
            <div class="content">
            	 
                    <a href="<?=site_url("events")?>?task=ongoing" class="d-flex py-1">
                        <div class="align-self-center">
                            <span class="icon rounded-s me-2 gradient-red shadow-bg shadow-bg-s" style="background-color:green; background-image: none;"><i class="bi bi bi-book color-white"></i></span>
                        </div>
                        <div class="align-self-center ps-1">
                            <h5 class="pt-1 mb-n1"><?=custom_language('New ')?> </h5>
                            <p class="mb-0 font-11 opacity-50"> </p>
                        </div>
                        <div class="align-self-center ms-auto text-end">
                            <h4 class="pt-1 mb-n1 color-green-dark">+ <?=number_format($tasks,0)?> </h4>
                        	<p class="mb-0 font-11"> </p>
                        </div>
                    </a>
                     <div class="divider my-2 opacity-50"></div>
                    <a href="<?=site_url("events")?>?task=completed" class="d-flex py-1">
                        <div class="align-self-center">
                            <span class="icon rounded-s me-2 gradient-green shadow-bg shadow-bg-s" style="background-color:orange; background-image: none;"><i class="bi bi bi-book color-white"></i></span>
                        </div>
                        <div class="align-self-center ps-1">
                            <h5 class="pt-1 mb-n1">Completed</h5>
                            <p class="mb-0 font-11 opacity-50"> </p>
                        </div>
                        <div class="align-self-center ms-auto text-end">
                             <h4 class="pt-1 mb-n1 color-green-dark">+ <?=number_format($tasks_completed,0)?> </h4>
                        	<p class="mb-0 font-11"> </p>
                        </div>
                    </a>	
            </div>
        </div>  
          
        <!-- Recent Activity Title-->
        <div class="content my-0 mt-n2 px-1">
            <div class="d-flex">
                <div class="align-self-center">
                    <h3 class="font-16 mb-2"><?=custom_language('Recent')?> <?=custom_language('Activity')?> </h3>
                </div>
                <div class="align-self-center ms-auto">
                    <a href="activity.html" class="font-12 pt-1"><?=custom_language('View All')?></a>
                </div>
            </div>
        </div>

        <!-- Recent Activity Cards-->
        <div class="card card-style">
            <div class="content">
                
                <a href="<?=site_url("refferal")?>" class="d-flex py-1">
                    <div class="align-self-center">
                        <span class="icon rounded-s me-2 gradient-yellow  shadow-bg shadow-bg-s" style="background-color:cyan; background-image: none;"><i class="bi bi-people color-white"></i></span>
                    </div>
                    <div class="align-self-center ps-1">
                        <h5 class="pt-1 mb-n1"><?=custom_language("Referral Reward")?></h5>
                        <p class="mb-0 font-11 opacity-50"></p>
                    </div>
                    <div class="align-self-center ms-auto text-end">
                        <h4 class="pt-1 mb-n1 color-green-dark">+ <?=number_format(floatval(user_balance('refferal_reward')),0)?> <?=setting('coin_name');?></h4>
                        <p class="mb-0 font-11"> </p>
                    </div>
                </a>
                <div class="divider my-2 opacity-50"></div>
                <a href="<?=site_url("activity")?>?active=wd" class="d-flex py-1">
                    <div class="align-self-center">
                        <span class="icon rounded-s me-2 gradient-orange shadow-bg shadow-bg-s" style="background-color:violet; background-image: none;"><i class="bi bi-arrow-down-circle color-white"></i></span>
                    </div>
                    <div class="align-self-center ps-1">
                        <h5 class="pt-1 mb-n1"><?=custom_language("Withdraw")?></h5>
                        <p class="mb-0 font-11 opacity-50"></p>
                    </div>
                    <div class="align-self-center ms-auto text-end">
                        <h4 class="pt-1 mb-n1 color-red-dark">- <?=number_format(floatval(user_balance('withdraw')),0)?> <?=setting('coin_name');?></h4>
                        <p class="mb-0 font-11"> </p>
                    </div>
                </a>
               <?php
			   /*
                <div class="divider my-2 opacity-50"></div>
                <a href="<?=site_url("activity")?>?active=topup" class="d-flex py-1">
                    <div class="align-self-center">
                        <span class="icon rounded-s me-2 gradient-green shadow-bg shadow-bg-s" style="background-color:orange; background-image: none;"><i class="bi bi-caret-up-fill color-white"></i></span>
                    </div>
                    <div class="align-self-center ps-1">
                        <h5 class="pt-1 mb-n1"><?=custom_language('Top Up')?></h5>
                        <?php
							if(isset($top_up['id']))
							{
						?>
                        <p class="mb-0 font-11 opacity-50"><?=date('d M Y',strtotime($topup['tanggal']))?> </p>
                        <?php
							}
						?>
                    </div>
                    <div class="align-self-center ms-auto text-end">
                         
                        <h4 class="pt-1 mb-n1 color-green-dark">+ <?=number_format(floatval(user_balance('topup')),0)?> <?=setting('coin_name');?></h4>
                        <p class="mb-0 font-11"></p>
                    </div>
                </a>
				*/
				?>
               
              
               
            </div>
        </div>
        
        <!-- -->
       
        <?php
		/*
		<!-- Recent Activity Title-->
        <div class="content my-0 mt-n2 px-1">
            <div class="d-flex">
                <div class="align-self-center">
                    <h3 class="font-16 mb-2"><?=custom_language('Transfer')?> <?=custom_language('Activity')?> </h3>
                </div>
                <div class="align-self-center ms-auto">
                    <a href="activity/transfer.html" class="font-12 pt-1"><?=custom_language('View All')?></a>
                </div>
            </div>
        </div>
        <!-- Recent Activity Cards-->
        <div class="card card-style">
            <div class="content">
            	 
                    <a href="<?=site_url("activity/transfer")?>?active=out" class="d-flex py-1">
                        <div class="align-self-center">
                            <span class="icon rounded-s me-2 gradient-red shadow-bg shadow-bg-s" style="background-color:#154bf9; background-image: none;"><i class="bi bi bi-arrow-repeat color-white"></i></span>
                        </div>
                        <div class="align-self-center ps-1">
                            <h5 class="pt-1 mb-n1"><?=custom_language('Transfer')?> </h5>
                            <p class="mb-0 font-11 opacity-50"> </p>
                        </div>
                        <div class="align-self-center ms-auto text-end">
                            <h4 class="pt-1 mb-n1 color-red-dark">- <?=number_format(user_balance('transfer'),0)?>  <?=setting('coin_name');?></h4>
                            <p class="mb-0 font-11"><?=custom_language('Out')?></p>
                        </div>
                    </a>
                     <div class="divider my-2 opacity-50"></div>
                    <a href="<?=site_url("activity/transfer")?>?active=in" class="d-flex py-1">
                        <div class="align-self-center">
                            <span class="icon rounded-s me-2 gradient-green shadow-bg shadow-bg-s" style="background-color:#154bf9; background-image: none;"><i class="bi bi bi-arrow-repeat color-white"></i></span>
                        </div>
                        <div class="align-self-center ps-1">
                            <h5 class="pt-1 mb-n1"><?=custom_language('Transfer ')?> </h5>
                            <p class="mb-0 font-11 opacity-50"> </p>
                        </div>
                        <div class="align-self-center ms-auto text-end">
                            <h4 class="pt-1 mb-n1 color-green-dark">+ <?=number_format(user_balance('transfer_plus'),0)?>  <?=setting('coin_name');?></h4>
                            <p class="mb-0 font-11"><?=custom_language('In')?></p>
                        </div>
                    </a>	
            </div>
        </div>      
       */
	   ?>
             
        <!-- Recent Activity Cards-->
   <script>
		 
		 
		function newportal()
		{
			 
			$.ajax({
                            url: "news/seed?limit=5",
                            type: 'GET',
                            async: false,
                            cache: false,
                            contentType: false,
                            processData: false,
                            beforeSend: function(){
                                 
                            },
                            success: function(out)
                            {
                                
                                 
                            },
                            error: function()
                            {
                                  
                            },
                            complete:function(out){
                                 console.log(out);
								 $(".xnews").html(out.responseJSON.temp);
                            }
                        });	
					 
			 
		}
		$(function()
		{
			newportal();
		});
	  </script>	     