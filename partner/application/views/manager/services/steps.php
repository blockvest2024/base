<div class="row">
            <div class="col-xl-12">
               <div class="breadcrumb__wrapper mb-35">
                  <div class="breadcrumb__inner">
                     <div class="breadcrumb__icon">
                        <i class="flaticon-home"></i>
                     </div>
                     <div class="breadcrumb__menu">
                        <nav>
                           <ul>
                              <!-- <li><span><a href="<?=site_url("home")?>">Home</a></span></li> -->
                              <li class="active"><span>Service List</span></li>
                              
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row g-20">
             
            <?php
			 for($i=0;$i<count($types);$i++)
			 {
			?>
           
                <a href="<?=site_url('services/subtype/'.$types[$i]['id'])?>" class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                    
                   <div class="expovent__count-item mb-20">
                      <div class="expovent__count-thumb include__bg transition-3"
                         data-background="assets/img/bg/count-bg.png"></div>
                      <div class="expovent__count-content">
                         <h3 class="expovent__count-number"> <?=$types[$i]['subs']?>+</h3> 
                         <span class="expovent__count-text"><?=$types[$i]['name']?></span>
                      </div>
                      <div class="expovent__count-icon">
                         <i class="flaticon-workshop"></i>
                      </div>
                   </div>
                    
                </a>
              
            <?php
			 }
			?>
             
            </div>
         </div>
          
      </div>
      <!-- App side area end -->