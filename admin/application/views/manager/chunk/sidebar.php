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
                <a href="index.html" class="header-logo">
                    <img src="assets/images/logos.svg" alt="logo" class="desktop-logo">
                    <img src="assets/images/logos.svg" alt="logo" class="toggle-logo">
                    <img src="assets/images/logos.svg" alt="logo" class="desktop-dark">
                    <img src="assets/images/logos.svg" alt="logo" class="toggle-dark">
                </a>
            </div>
            <!-- End::main-sidebar-header -->

            <!-- Start::main-sidebar -->
            <div class="main-sidebar" id="sidebar-scroll">

                <!-- Start::nav -->
                <nav class="main-menu-container nav nav-pills flex-column sub-open">
                    <div class="slide-left" id="slide-left">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path> </svg>
                    </div>
                    <ul class="main-menu">
                        <!-- Start::slide__category -->
                        <li class="slide__category"><span class="category-name">Main</span></li>
                        <!-- End::slide__category -->

                        <!-- Start::slide -->
                        <li class="slide">
                            <a href="<?=site_url("home")?>" class="side-menu__item">
                                <i class="bx bx-home side-menu__icon"></i>
                                <span class="side-menu__label">Dashboards</span>
                                
                            </a>
                             
                        </li>
                        
                        <?php
						$active = "";
						$active_page = "";
						if($class=="services_type" || $class=="services_payment" || $class=="services_subtype" || $class=="transactions_partner" || $class=="wallet_partner")
						{
							$active = "active open";	
							$active_page = "active-page";
						}
					   ?>
                         
                        <li class="slide has-sub <?=$active?>">
                            <a href="javascript:void(0);" class="side-menu__item <?=$active?>">
                                <i class="bx bx-file side-menu__icon"></i>
                                <span class="side-menu__label">Services</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <?php
									$active = "";
									$active_page = "";
									if($class=="services_type")
									{
										$active = "active";	
										$active_page = "active-page";
									}
								   ?>   
                                <li class="slide">
                                    <a href="<?=site_url("services-type")?>" class="side-menu__item <?=$active?>">Type</a>
                                </li>
                                <?php
									$active = "";
									$active_page = "";
									if($class=="services_subtype")
									{
										$active = "active";	
										$active_page = "active-page";
									}
								   ?>   
                                <li class="slide">
                                    <a href="<?=site_url("services-subtype")?>" class="side-menu__item <?=$active?>">Sub</a>
                                </li>
								<?php
									$active = "";
									$active_page = "";
									if($class=="services_payment")
									{
										$active = "active";	
										$active_page = "active-page";
									}
								   ?>   
                                <li class="slide">
                                    <a href="<?=site_url("services-payment")?>" class="side-menu__item <?=$active?>">Price</a>
                                </li>
                                <?php
									$active = "";
									$active_page = "";
									if($class=="transactions_partner")
									{
										$active = "active";	
										$active_page = "active-page";
									}
								   ?>   
                                <li class="slide">
                                    <a href="<?=site_url("transactions-partner")?>" class="side-menu__item <?=$active?>">Order Partner</a>
                                </li>
                                <?php
									$active = "";
									$active_page = "";
									if($class=="wallet_partner")
									{
										$active = "active";	
										$active_page = "active-page";
									}
								   ?>   
                                <li class="slide">
                                    <a href="<?=site_url("wallet-partner")?>" class="side-menu__item <?=$active?>">Wallet Partner</a>
                                </li>
                              
                            </ul>
                        </li>
                        
                        <?php
						$active = "";
						$active_page = "";
						if($class=="portal" || $class=="portal_category")
						{
							$active = "active open";	
							$active_page = "active-page";
						}
					   ?>
                         
                        <li class="slide has-sub <?=$active?>">
                            <a href="javascript:void(0);" class="side-menu__item <?=$active?>">
                                <i class="bx bx-paperclip side-menu__icon"></i>
                                <span class="side-menu__label">News</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <?php
									$active = "";
									$active_page = "";
									if($class=="portal_category")
									{
										$active = "active";	
										$active_page = "active-page";
									}
								   ?>   
                                <li class="slide">
                                    <a href="<?=site_url("portal-category")?>" class="side-menu__item <?=$active?>">Category</a>
                                </li>
								<?php
									$active = "";
									$active_page = "";
									if($class=="portal")
									{
										$active = "active";	
										$active_page = "active-page";
									}
								   ?>   
                                <li class="slide">
                                    <a href="<?=site_url("portal")?>" class="side-menu__item <?=$active?>">Rss News</a>
                                </li>
                              
                            </ul>
                        </li>
                        <?php
						$active = "";
						$active_page = "";
						if($class=="event_category" || $class=="event")
						{
							$active = "active open";	
							$active_page = "active-page";
						}
					   ?>
                         
                        <li class="slide has-sub <?=$active?>">
                            <a href="javascript:void(0);" class="side-menu__item <?=$active?>">
                                <i class="bx bx-file-blank side-menu__icon"></i>
                                <span class="side-menu__label">Event</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                 <?php
									$active = "";
									$active_page = "";
									if($class=="event_category")
									{
										$active = "active";	
										$active_page = "active-page";
									}
								   ?>
                                <li class="slide">
                                    <a href="<?=site_url("event-category")?>" class="side-menu__item <?=$active?>">Category</a>
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
                                <li class="slide">
                                    <a href="<?=site_url("event")?>" class="side-menu__item <?=$active?>">Event</a>
                                </li>
                                   
                            </ul>
                        </li>
                        
                        <?php
						$active = "";
						$active_page = "";
						if($class=="kol" || $class=="kol_category")
						{
							$active = "active open";	
							$active_page = "active-page";
						}
					   ?>
                         
                        <li class="slide has-sub <?=$active?>">
                            <a href="javascript:void(0);" class="side-menu__item <?=$active?>">
                                <i class="bx bx-male-female side-menu__icon"></i>
                                <span class="side-menu__label">KOL</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <?php
									$active = "";
									$active_page = "";
									if($class=="kol_category")
									{
										$active = "active";	
										$active_page = "active-page";
									}
								   ?>   
                                <li class="slide">
                                    <a href="<?=site_url("kol-category")?>" class="side-menu__item <?=$active?>">Category</a>
                                </li>
								<?php
									$active = "";
									$active_page = "";
									if($class=="kol")
									{
										$active = "active";	
										$active_page = "active-page";
									}
								   ?>   
                                <li class="slide">
                                    <a href="<?=site_url("kol")?>" class="side-menu__item <?=$active?>">KOL</a>
                                </li>
                              
                            </ul>
                        </li>
                        
					   <?php
						$active = "";
						$active_page = "";
						if($class=="speaker" || $class=="speaker_category")
						{
							$active = "active open";	
							$active_page = "active-page";
						}
					   ?>
                         
                        <li class="slide has-sub <?=$active?>">
                            <a href="javascript:void(0);" class="side-menu__item <?=$active?>">
                                <i class="bx bx-user-voice side-menu__icon"></i>
                                <span class="side-menu__label">Speaker</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <?php
									$active = "";
									$active_page = "";
									if($class=="speaker_category")
									{
										$active = "active";	
										$active_page = "active-page";
									}
								   ?>   
                                <li class="slide">
                                    <a href="<?=site_url("speaker-category")?>" class="side-menu__item <?=$active?>">Category</a>
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
                                <li class="slide">
                                    <a href="<?=site_url("speaker")?>" class="side-menu__item <?=$active?>">Speaker</a>
                                </li>
                              
                            </ul>
                        </li>
                        <li class="slide">
                            <a href="<?=site_url("community")?>" class="side-menu__item">
                                <i class="bx bx-user-circle side-menu__icon"></i>
                                <span class="side-menu__label">Community</span>
                                
                            </a>
                             
                        </li>
                        <?php
						$active = "";
						$active_page = "";
						if($class=="company" || $class=="company_category")
						{
							$active = "active open";	
							$active_page = "active-page";
						}
					   ?>
                         
                        <li class="slide has-sub <?=$active?>">
                            <a href="javascript:void(0);" class="side-menu__item <?=$active?>">
                                <i class="bx bx-box side-menu__icon"></i>
                                <span class="side-menu__label">Project</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                 <?php
									$active = "";
									$active_page = "";
									if($class=="company_category")
									{
										$active = "active";	
										$active_page = "active-page";
									}
								   ?>
                                <li class="slide">
                                    <a href="<?=site_url("company_category")?>" class="side-menu__item <?=$active?>">Category</a>
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
                                <li class="slide">
                                    <a href="<?=site_url("company")?>" class="side-menu__item <?=$active?>">Project</a>
                                </li>
                                   
                            </ul>
                        </li> 
                         <?php
						$active = "";
						$active_page = "";
						if($class=="world_event_category" || $class=="world_event")
						{
							$active = "active open";	
							$active_page = "active-page";
						}
					   ?>
                         
                        <li class="slide has-sub <?=$active?>">
                            <a href="javascript:void(0);" class="side-menu__item <?=$active?>">
                                <i class="bx bx-globe side-menu__icon"></i>
                                <span class="side-menu__label">World Event</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                 <?php
									$active = "";
									$active_page = "";
									if($class=="world_event_category")
									{
										$active = "active";	
										$active_page = "active-page";
									}
								   ?>
                                <li class="slide">
                                    <a href="<?=site_url("world-event-category")?>" class="side-menu__item <?=$active?>">Category</a>
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
                                <li class="slide">
                                    <a href="<?=site_url("world-event")?>" class="side-menu__item <?=$active?>">World event</a>
                                </li>
                                   
                            </ul>
                        </li> 
                         
                         
                         <?php
						/*$active = "";
						$active_page = "";
						if($class=="authority")
						{
							$active = "active open";	
							$active_page = "active-page";
						}
					   ?>
                         <li class="slide <?=$active?>">
                            <a href="<?=site_url("authority")?>" class="side-menu__item <?=$active?>">
                                <i class="bx bx-bullseye side-menu__icon"></i>
                                <span class="side-menu__label">Authority</span>
                                
                            </a>
                             
                        </li>
						*/
						?>
                        <li class="slide">
                            <a href="<?=site_url("influencer")?>" class="side-menu__item">
                                <i class="bx bx-user-voice side-menu__icon"></i>
                                <span class="side-menu__label">Podcast</span>
                                
                            </a>
                             
                        </li>
                         <li class="slide">
                            <a href="<?=site_url("web3")?>" class="side-menu__item">
                                <i class="bx bx-image side-menu__icon"></i>
                                <span class="side-menu__label">Media</span>
                                
                            </a>
                             
                        </li>
                       <li class="slide">
                            <a href="<?=site_url("trading")?>" class="side-menu__item">
                                <i class="bx bx-move-vertical side-menu__icon"></i>
                                <span class="side-menu__label">Trading</span>
                                
                            </a>
                             
                        </li>
                        <li class="slide">
                            <a href="<?=site_url("review")?>" class="side-menu__item">
                                <i class="bx bx-file side-menu__icon"></i>
                                <span class="side-menu__label">Review</span>
                                
                            </a>
                             
                        </li>
                        <!-- End::slide -->
                        
                         
                        
                         

                        <!-- Start::slide -->
                         
                        <?php
						$active = "";
						$active_page = "";
						if($class=="partner" || $class=="partner_type")
						{
							$active = "active open";	
							$active_page = "active-page";
						}
					   ?>
                         
                        <li class="slide has-sub <?=$active?>">
                            <a href="javascript:void(0);" class="side-menu__item <?=$active?>">
                                <i class="bx bx-user side-menu__icon"></i>
                                <span class="side-menu__label">Partner</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                 <?php
									$active = "";
									$active_page = "";
									if($class=="partner_type")
									{
										$active = "active";	
										$active_page = "active-page";
									}
								   ?>
                                <li class="slide">
                                    <a href="<?=site_url("partner_type")?>" class="side-menu__item <?=$active?>">Type</a>
                                </li>
                                <?php
									$active = "";
									$active_page = "";
									if($class=="partner")
									{
										$active = "active";	
										$active_page = "active-page";
									}
								   ?>
                                <li class="slide">
                                    <a href="<?=site_url("partner")?>" class="side-menu__item <?=$active?>">Partner</a>
                                </li>
                                   
                            </ul>
                        </li>
                        <!-- End::slide -->

                        <!-- Start::slide -->
                       <?php
						$active = "";
						$active_page = "";
						if($class=="users"   || $class=="customer")
						{
							$active = "active open";	
							$active_page = "active-page";
						}
					   ?>
                         
                        <li class="slide has-sub <?=$active?>">
                            <a href="javascript:void(0);" class="side-menu__item <?=$active?>">
                                <i class="bx bx-user side-menu__icon"></i>
                                <span class="side-menu__label">Users</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <?php
									$active = "";
									$active_page = "";
									if($class=="users")
									{
										$active = "active";	
										$active_page = "active-page";
									}
								   ?>   
                                <li class="slide">
                                    <a href="<?=site_url("users")?>" class="side-menu__item <?=$active?>">Admin</a>
                                </li>
                                 
                                 <?php
									$active = "";
									$active_page = "";
									if($class=="customer")
									{
										$active = "active";	
										$active_page = "active-page";
									}
								   ?>   
                                <li class="slide">
                                    <a href="<?=site_url("customer")?>" class="side-menu__item <?=$active?>">Customer</a>
                                </li>
                            </ul>
                        </li>
                        <!-- End::slide -->
                        <li class="slide">
                            <a href="<?=site_url("setting")?>" class="side-menu__item">
                                <i class="bx bx-cog side-menu__icon"></i>
                                <span class="side-menu__label">Setting</span>
                                
                            </a>
                             
                        </li>
                         
                        <!-- End::slide -->
                    </ul>
                    <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path> </svg></div>
                </nav>
                <!-- End::nav -->

            </div>
            <!-- End::main-sidebar -->

        </aside>
        <!-- End::app-sidebar -->