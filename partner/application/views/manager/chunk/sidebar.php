<!-- App sidebar area start -->
      <div class="expovent__sidebar" data-background="assets/img/bg/dropdown-bg.png">
         <div class="logo-details">
            <span>
               <a href="dashboard.html">
                  <img class="logo__white" src="<?=config_item('main_site')?>uploads/<?=setting('logo')?>" alt="logo not found">
               </a>
            </span>
            <span>
               <a href="dashboard.html">
                  <img class="log__smnall" src="<?=config_item('main_site')?>uploads/<?=setting('logo')?>" alt="logo not found">
               </a>
            </span>
            
         </div>
         <div class="sidebar__inner simple-bar">
           <?php
		   /*
            <div class="alert alert-info" style="width:100%;">
                 Balance 
                 <br/>
                 <strong style="color:red; font-size:20px;">0</strong>
                 <br/>
                 <a href="<?=site_url('withdraw')?>" class="btn btn-sm btn-warning">Withdraw</a>
            </div>
            */
			?>
			<div class="dlabnav">
               <ul class="metismenu" id="menu">
                  
                  <li><a href="<?=site_url("home")?>" aria-expanded="false">
                        <i class="flaticon-home"></i>
                        <span class="nav-text">Dashboard</span>
                     </a>
                      
                  </li>
                  <?php
		   		  /*
                  <li><a href="<?=site_url("withdraw")?>" aria-expanded="false">
                        <i class="fa fa-info"></i>
                        <span class="nav-text">Withdraw</span>
                     </a>
                  </li>
                  */
				  ?>
				  <?php
				  /*
                  <li><a href="<?=site_url('event-seat')?>" aria-expanded="false">
                        <i class="flaticon-speaker"></i>
                        <span class="nav-text">Speaker List</span>
                     </a>
                  </li>
                  */
				  ?>
                  <li><a href="<?=site_url('event')?>" aria-expanded="false">
                        <i class="flaticon-calendar-1"></i>
                        <span class="nav-text">Event List</span>
                     </a>
                  </li>
				  <li><a href="<?=site_url('event-seat')?>" aria-expanded="false">
                        <i class="flaticon-user-1"></i>
                        <span class="nav-text">Attendant List</span>
                     </a>
                  </li>
                  <li><a href="<?=site_url('services/add')?>" aria-expanded="false">
                        <i class="flaticon-workshop"></i>
                        <span class="nav-text">Create Services</span>
                     </a>
                  </li>
                  <li><a href="<?=site_url('services')?>" aria-expanded="false">
                        <i class="flaticon-round-table"></i>
                        <span class="nav-text">My Services</span>
                     </a>
                  </li>
                  <?php
				  /*
                  <li><a href="<?=site_url('event/add')?>" aria-expanded="false">
                        <i class="flaticon-calendar-1"></i>
                        <span class="nav-text">Create Event</span>
                     </a>
                  </li>
                  
				  <li><a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                     <i class="flaticon-reminder"></i>
                     <span class="nav-text">Event</span>
                  </a>
                  <ul aria-expanded="false">
                     
                     <li><a href="<?=site_url("event")?>"> Event List</a></li>
                     <li><a href="event-details.html"> Event Details</a></li>
                  </ul>
                  </li>
                  
                  
                  <li><a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                     <i class="flaticon-user-1"></i>
                     <span class="nav-text">Profile</span>
                  </a>
                  <ul aria-expanded="false">
                     <li><a href="profile.html">Profile</a></li>
                     <li><a href="setting.html">Setting</a></li>
                      
                  </ul>
                  </li>
                  */
				  ?>
                  <li><a href="<?=site_url('profile')?>" aria-expanded="false">
                        <i class="flaticon-user-1"></i>
                        <span class="nav-text">Profile</span>
                     </a>
                  </li>
				  <li><a href="<?=site_url('login/logout')?>" aria-expanded="false">
                        <i class="flaticon-log-out-3"></i><span class="links_name">Log out</span>
                     </a>
                  </li>
               </ul>
               
                
               <div class="sidebar__copyright">
                  <p>Copyright @ <?=setting('website_title')?> 2024</p>
               </div>
            </div>
         </div>
      </div>
      <div class="app__offcanvas-overlay"></div>
      <!-- App sidebar area end -->