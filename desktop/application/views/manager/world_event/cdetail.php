<?php
$mobile = $this->agent->is_mobile(); 
 $images = "assets/images/media/media-49.jpg";
			if(!empty($data['image']) && file_exists(config_item('upload_path')."".$data['image']))
			{
				$images  = config_item('main_site')."uploads/".$data['image'];
			}
 
?>
 <div class="row">
 	<div class="col-md-7">
    	<!-- -->
        		<div class="col-md-12">
        					<div class="card custom-card">
                                <img src="<?=$images?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h6 class="card-title fw-semibold"> <span class="badge bg-purple float-start fs-10"><?=$data['entry']?></span> <span class="badge bg-secondary float-end fs-10"><?=$data['cats']?></span></h6>
                                    <br/>
                                    <h6 class="card-title fw-semibold"><?=$data['name']?> </h6>
                                    <p class="card-text text-muted">
									 
									<?=$data['description']?>
                                    
                                    </p>
                                       
                                     <!-- -->
                                     			<div class="d-flex ">
                                                        
                                                        <div class="me-3">
                                                            <span class="avatar avatar-xl bg-light">
                                                                <i class="fa fa-calendar"></i>
                                                            </span>
                                                        </div>
                                                        <div>
                                                            
                                                            <div class="mb-1 fs-14 fw-semibold text-primary">
                                                                 <?=date('d/m/Y',strtotime($data['start_date']))?> - <?=date('d/m/Y',strtotime($data['end_date']))?>
                                                         	</div>
                                                            <div class="mb-1 fs-14 fw-semibold">
                                                                <?=$data['country']?> 
                                                            </div>
                                                             
                                                        </div>
                                                    </div>
                                                  <br/>  
                                                  <a href=" <?=$data['location_link']?> " class="" target="_blank" tooltip="Link" title="Link">     
                                                 <div class="d-flex ">
                                                  
                                                        <div class="me-3">
                                                            <span class="avatar avatar-xl bg-light">
                                                                <i class="fa fa-map-o"></i>
                                                            </span>
                                                        </div>
                                                        <div>
                                                            
                                                            <div class="mb-1 fs-14 fw-semibold text-primary">
                                                                 <?=$data['location']?> 
                                                                 
                                                         	</div>
                                                            <div class="mb-1 fs-14 fw-semibold">
                                                                <?=$data['city']?>,<?=$data['country']?> 
                                                            </div>
                                                             
                                                        </div>
                                                    
                                                        
                                              </div>
                                               </a>   
                                     <!-- -->
                                </div>
                                <div class="card-footer">
                                    <a href=" <?=$data['registration_link']?> " class="card-link text-success float-start m-1" target="_blank" tooltip="Link" title="Link"> <i class="fa fa-link"></i> Registration Link</a>
                                     <a href=" <?=$data['location_link']?> " class="card-link float-end text-primary m-1" target="_blank" tooltip="Link" title="Link"> <i class="fa fa-map-o"></i> Map Location</a> 
                                     
                                </div>
                            </div>	
                            
        		 
               
            </div>
        
        <!-- -->
    	
    </div>
    <!-- -->
    <div class="col-md-5">
    	<!-- -->
        		<div class="col-md-12">
        					
                            <div class="card custom-card">
                            	<div class="card-header">
                                    <span class="card-text">Hosted by</span>
                                </div>	
                                <div class="card-body">
                                     <h4><?=$data['hosted']?> </h4>
                                </div>	
                           </div>
                </div>
    </div>                        
    <!-- -->
 
 </div>
 <style type="text/css">
 .main-content {
    padding: 0 .5rem;
}
img.card-img-top {
    max-height: 400px;
}
.btn-circle.btn-xl {
    width: 70px;
    height: 70px;
    padding: 10px 16px;
    border-radius: 35px;
    font-size: 24px;
    line-height: 1.33;
}

  
 </style>
 

                                  