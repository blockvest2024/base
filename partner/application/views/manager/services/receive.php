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
                               <li><span><a href="<?=site_url("services/add")?>">Service List</a></span></li>
                              <li><span><a href="<?=site_url("services/subtype/".$services_type['id'])?>"><?=$services_type['name']?></a></span></li>
                              <li><span><a href="<?=site_url("services/subsubtype/".$services_subtype['id'])?>"><?=$services_subtype['name']?></a></span></li>
                              <li class="active"><span><?=$data['name']?></span></li>
                              
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row g-20">
             
            	 <div class="card">
                 	<h5>Thank you, purchase has been receive</h5>
                 </div>
             
            </div>
         </div>
          
      </div>
      <!-- App side area end -->