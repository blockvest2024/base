
<!-- app-header -->
         <header class="app-header">

            <!-- Start::main-header-container -->
            <div class="main-header-container container-fluid">

                <!-- Start::header-content-left -->
                <div class="header-content-left">

                    <!-- Start::header-element -->
                    <div class="header-element">
                        <div class="horizontal-logo">
                            <a href="<?=site_url("home")?>" class="header-logo">
                                <img src="assets/images/favicon.png" alt="logo" class="desktop-logo">
                                <img src="assets/images/favicon.png" alt="logo" class="toggle-logo">
                                <img src="assets/images/favicon.png" alt="logo" class="desktop-dark">
                                <img src="assets/images/favicon.png" alt="logo" class="toggle-dark">
                            </a>
                        </div>
                    </div>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <div class="header-element">
                         <div class="header-element">
                            <!-- Start::header-link|dropdown-toggle -->
                             
                        </div>  
                    </div> 
                    
                    
                </div>
                <!-- End::header-content-left -->
                 <div class="ads mobile_off">
                     		<!--<a href="https://sospawn.com" target="blank" class="td_spot_img_all"><img src="ads/banner.jpg" alt="spot_img"></a>
                            -->
                          <div class="x-add">
                           <script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/coinMarquee.js"></script><div id="coinmarketcap-widget-marquee" coins="1,1027,1839,52,2010,74,5426,1958,6636,2,5994,1975,5805,3897,7083" currency="IDR" theme="dark" transparent="true" show-symbol-logo="true"></div>
                         </div>  
                 </div>

                <!-- Start::header-content-right -->
                <div class="header-content-right">
					
                    

                    <?php
						//include __DIR__."/../chunk/static.php";
						if(!empty(user_info('id')))
						{
							include __DIR__."/profile.php";
						}
					?>

                    

                    <!-- Start::header-element -->
                  
                    
                </div>
                <!-- End::header-content-right -->

            </div>
            <!-- End::main-header-container -->

        </header>
        <!-- /app-header -->
<style type="text/css">
.ads {
    width: 90%;
    height: 4.75rem;
}
</style>        