 <?php

$directory = rtrim($this->router->directory,'/');
$class = $this->router->class;
$method = $this->router->method;
$params = $this->uri->segment('3');
$params1 = $this->uri->segment('4');
$ima = user_info('avatar');
$avatar = user_info('avatar');
 

 
?>
 <!-- Start::app-sidebar -->
        <aside class="app-sidebar sticky" id="sidebar">

            <!-- Start::main-sidebar-header -->
            <div class="main-sidebar-header">
                <a href="news.html" class="header-logo">
                    <img src="assets/images/blockvest-color.svg" alt="logo" class="desktop-logo">
                    <img src="assets/images/logos.svg" alt="logo" class="toggle-logo">
                    <img src="assets/images/logos.svg" alt="logo" class="desktop-dark">
                    <img src="assets/images/favicon.png" alt="logo" class="toggle-dark">
                </a>
            </div>
            <!-- End::main-sidebar-header -->
              <div class="xmain-sidebar mobile_on"></div>

            <!-- Start::main-sidebar -->
            <div class="main-sidebar" id="sidebar-scroll">

                <!-- Start::nav -->
                <nav class="main-menu-container nav nav-pills flex-column sub-open">
                    <div class="slide-left" id="slide-left">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path> </svg>
                    </div>
                    <ul class="main-menu">
                         
                        
                       
					    <?php
						$active = "";
						$active_page = "";
						if($class=="news")
						{
							$active = "active";	
							$active_page = "active-page";
						}
					   ?>
                         
                        <li class="slide  <?=$active?>">
                            <a href="<?=site_url("news")?>" class="side-menu__item besar <?=$active?>">
                                <i class="bx bx-paperclip side-menu__icon"></i>
                                <span class="side-menu__label">News</span>
                                
                            </a>
                             
                        </li>
                         <?php
						$active = "";
						$active_page = "";
						if($class=="event")
						{
							$active = "active";	
							$active_page = "active-page";
						}
					   ?>
                         
                        <li class="slide  <?=$active?>">
                        
                            <a href="<?=site_url("event")?>" class="side-menu__item besar <?=$active?>">
                                <i class="bi bi-calendar-event side-menu__icon"></i>
                                <span class="side-menu__label">Event</span>
                                
                            </a>
                             
                        </li>
                        <?php
						$active = "";
						$active_page = "";
						if($class=="heatmap")
						{
							$active = "active";	
							$active_page = "active-page";
						}
					   ?>
                         
                        <li class="slide  <?=$active?>">
                            <a href="<?=site_url("heatmap")?>" class="side-menu__item besar <?=$active?>">
                                <i class="bx bx-box  side-menu__icon"></i>
                                <span class="side-menu__label">Heatmap </span>
                                
                            </a>
                             
                        </li>
                         <?php
						$active = "";
						$active_page = "";
						if($class=="market")
						{
							$active = "active";	
							$active_page = "active-page";
						}
					   ?>
                         
                        <li class="slide  <?=$active?>">
                            <a href="<?=site_url("market")?>" class="side-menu__item besar <?=$active?>">
                                <i class="bx bx-share  side-menu__icon"></i>
                                <span class="side-menu__label">Market </span>
                                
                            </a>
                             
                        </li>
                         
                         <?php
						$active = "";
						$active_page = "";
						if($class=="web3")
						{
							$active = "active";	
							$active_page = "active-page";
						}
					   ?>
                         
                        <li class="slide  <?=$active?>">
                            <a href="<?=site_url("media")?>" class="side-menu__item besar <?=$active?>">
                                <i class="bx bx-image side-menu__icon"></i>
                                <span class="side-menu__label">Media</span>
                                
                            </a>
                             
                        </li>
                        
                          <?php
						$active = "";
						$active_page = "";
						if($class=="influencer")
						{
							$active = "active";	
							$active_page = "active-page";
						}
					   ?>
                         
                        <li class="slide  <?=$active?>">
                            <a href="<?=site_url("podcast")?>" class="side-menu__item besar <?=$active?>">
                                <i class="bx bx-user-voice side-menu__icon"></i>
                                <span class="side-menu__label">Podcast </span>
                                
                            </a>
                             
                        </li>
                         <?php
						$active = "";
						$active_page = "";
						if($class=="reviews")
						{
							$active = "active";	
							$active_page = "active-page";
						}
					   ?>
                         
                        <li class="slide  <?=$active?>">
                            <a href="<?=site_url("reviews")?>" class="side-menu__item besar <?=$active?>">
                                <i class="bx bx-file side-menu__icon"></i>
                                <span class="side-menu__label">Review </span>
                                
                            </a>
                             
                        </li>
                         <?php
						$active = "";
						$active_page = "";
						if($class=="trading")
						{
							$active = "active";	
							$active_page = "active-page";
						}
					   ?>
                         
                        <li class="slide  <?=$active?>">
                            <a href="<?=site_url("trading")?>" class="side-menu__item besar <?=$active?>">
                                <i class="bx bx-move-vertical side-menu__icon"></i>
                                <span class="side-menu__label">Trading</span>
                                
                            </a>
                             
                        </li>
                        <?php
						$active = "";
						$active_page = "";
						if($class=="company")
						{
							$active = "active";	
							$active_page = "active-page";
						}
					   ?>
                         
                        <li class="slide  <?=$active?>">
                            <a href="<?=site_url("project")?>" class="side-menu__item besar <?=$active?>">
                                <i class="bx bx-box side-menu__icon"></i>
                                <span class="side-menu__label">Project</span>
                                
                            </a>
                             
                        </li>
                         <?php
						$active = "";
						$active_page = "";
						if($class=="community")
						{
							$active = "active";	
							$active_page = "active-page";
						}
					   ?>
                         
                        <li class="slide  <?=$active?>">
                            <a href="<?=site_url("community")?>" class="side-menu__item besar <?=$active?>">
                                <i class="bx bx-user-circle  side-menu__icon"></i>
                                <span class="side-menu__label">Community </span>
                                
                            </a>
                             
                        </li>
                        <?php
						$active = "";
						$active_page = "";
						if($class=="speaker")
						{
							$active = "active";	
							$active_page = "active-page";
						}
					   ?>
                         
                        <li class="slide  <?=$active?>">
                            <a href="<?=site_url("kol")?>" class="side-menu__item besar <?=$active?>">
                                <i class="bx bx-male-female side-menu__icon"></i>
                                <span class="side-menu__label">KOL</span>
                                
                            </a>
                             
                        </li>
                         <?php
						$active = "";
						$active_page = "";
						if($class=="speaker")
						{
							$active = "active";	
							$active_page = "active-page";
						}
					   ?>
                         
                        <li class="slide  <?=$active?>">
                            <a href="<?=site_url("people")?>" class="side-menu__item besar <?=$active?>">
                                <i class="bi bi-people side-menu__icon"></i>
                                <span class="side-menu__label">People</span>
                                
                            </a>
                             
                        </li>
                        
                        <?php
						$active = "";
						$active_page = "";
						if($class=="world_event")
						{
							$active = "active";	
							$active_page = "active-page";
						}
					   ?>
                         
                        <li class="slide  <?=$active?>">
                        
                            <a href="<?=site_url("world-event")?>" class="side-menu__item besar <?=$active?>">
                                <i class="bx bx-globe side-menu__icon"></i>
                                <span class="side-menu__label">World Event</span>
                                
                            </a>
                             
                        </li>
                        <li class="slide ">
                            <a href="https://partner.blockvest.org" class="side-menu__item besar <">
                                <i class="bx bx-book  side-menu__icon"></i>
                                <span class="side-menu__label">Partner </span>
                                
                            </a>
                             
                        </li>
                        
                         
                        <li class="slide ">
                            <a href="https://users.blockvest.org" class="side-menu__item besar <">
                                <i class="bx bx-user  side-menu__icon"></i>
                                <span class="side-menu__label">User </span>
                                
                            </a>
                             
                        </li>
                        
                       <?php
					   /*
					   <li class="slide">
                            <a href="<?=site_url("exchange")?>" class="side-menu__item">
                                <i class="bx bx-building side-menu__icon"></i>
                                <span class="side-menu__label">Projects</span>
                                
                            </a>
                             
                        </li>
					   <li class="slide">
                            <a href="<?=site_url("exchange")?>" class="side-menu__item">
                                <i class="bx bx-move-horizontal side-menu__icon"></i>
                                <span class="side-menu__label">Exchanges</span>
                                
                            </a>
                             
                        </li>
                       
                        <li class="slide">
                            <a href="<?=site_url("exchange")?>" class="side-menu__item">
                                <i class="bx bx-building-house side-menu__icon"></i>
                                <span class="side-menu__label">Marketprice</span>
                                
                            </a>
                             
                        </li>
                        <!-- End::slide -->
                         
                        
                         <li class="slide">
                            <a href="<?=site_url("exchange")?>" class="side-menu__item">
                                <i class="bx bx-book side-menu__icon"></i>
                                <span class="side-menu__label">NFT Marketplace</span>
                                
                            </a>
                             
                        </li>
                        <li class="slide">
                            <a href="frontend/index.html" target="_blank" class="side-menu__item">
                                <i class="fa fa-info side-menu__icon"></i>
                                <span class="side-menu__label">About Us</span>
                                
                            </a>
                             
                        </li>
                     
                        */
						?>
                        <!-- End::slide -->

                         
                        <!-- End::slide -->
                    </ul>
                    <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path> </svg></div>
                    <div class="p-3 text-center">
                             <div class="header-element header-theme-mode">
                                <!-- Start::header-link|layout-setting -->
                                <a href="javascript:void(0);" onclick="javsacript:toggleTheme();" class="header-link layout-setting">
                                    <span class="light-layout">
                                        <!-- Start::header-link-icon -->
                                    <i class="bx bx-moon header-link-icon"></i>
                                        <!-- End::header-link-icon -->
                                    </span>
                                    <span class="dark-layout">
                                        <!-- Start::header-link-icon -->
                                    <i class="bx bx-sun header-link-icon"></i>
                                        <!-- End::header-link-icon -->
                                    </span>
                                </a>
                                <!-- End::header-link|layout-setting -->
                            </div>
                             
                   </div>
                   
                </nav>
                <!-- End::nav -->

            </div>
            <!-- End::main-sidebar -->

        </aside>
        <!-- End::app-sidebar -->
<script>
function toggleTheme() {
        let html = document.querySelector('html');
        if (html.getAttribute('data-theme-mode') === "dark") {
            html.setAttribute('data-theme-mode', 'light');
            html.setAttribute('data-header-styles', 'light');
            html.setAttribute('data-menu-styles', 'light');
            html.removeAttribute('data-bg-theme');
            html.removeAttribute('style');
            document.querySelector('#switcher-light-theme').checked = true;
            document.querySelector('#switcher-menu-light').checked = true;
            document.querySelector('html').style.removeProperty('--body-bg-rgb', localStorage.bodyBgRGB);
            checkOptions();
            document.querySelector('#switcher-header-light').checked = true;
            document.querySelector('#switcher-menu-light').checked = true;
            document.querySelector('#switcher-light-theme').checked = true;
            document.querySelector("#switcher-background4").checked = false;
            document.querySelector("#switcher-background3").checked = false;
            document.querySelector("#switcher-background2").checked = false;
            document.querySelector("#switcher-background1").checked = false;
            document.querySelector("#switcher-background").checked = false;
            localStorage.removeItem("ynexdarktheme");
            localStorage.removeItem("ynexMenu");
            localStorage.removeItem("ynexHeader");
            localStorage.removeItem("bodylightRGB");
            localStorage.removeItem("bodyBgRGB");
            if(localStorage.getItem("ynexlayout")!= "horizontal"){
                html.setAttribute("data-menu-styles", "dark");
            }
            html.setAttribute("data-header-styles", "light");
        } else {
            html.setAttribute('data-theme-mode', 'dark');
            html.setAttribute('data-header-styles', 'dark');
            html.setAttribute('data-menu-styles', 'dark');
            document.querySelector('#switcher-dark-theme').checked = true;
            document.querySelector('#switcher-menu-dark').checked = true;
            document.querySelector('#switcher-header-dark').checked = true;
            checkOptions();
            document.querySelector('#switcher-menu-dark').checked = true;
            document.querySelector('#switcher-header-dark').checked = true;
            document.querySelector('#switcher-dark-theme').checked = true;
            document.querySelector("#switcher-background4").checked = false
            document.querySelector("#switcher-background3").checked = false
            document.querySelector("#switcher-background2").checked = false
            document.querySelector("#switcher-background1").checked = false
            document.querySelector("#switcher-background").checked = false
            localStorage.setItem("ynexdarktheme", "true")
            localStorage.setItem("ynexMenu", "dark")
            localStorage.setItem("ynexHeader", "dark")
            localStorage.removeItem("bodylightRGB")
            localStorage.removeItem("bodyBgRGB")
        }
    }
</script>        