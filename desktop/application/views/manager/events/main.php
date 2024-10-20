<?php
$mobile = $this->agent->is_mobile(); 
$colx1 = "col-xxl-6 col-xl-6";
$colx2 = "col-xxl-4 col-xl-4";
if($mobile)
{
	$colx1 = "col-xxl-7 col-xl-7";
	$colx2 = "col-xxl-4 col-xl-4";
}
?>
<link rel="stylesheet" type="text/css" href="assets/plugins/slick/slick.css?v2022">
<link rel="stylesheet" type="text/css" href="assets/plugins/slick/slick-theme.css?v2022">
<script src="assets/plugins/slick/slick.js?v2022" type="text/javascript" charset="utf-8"></script>

                                    <!-- -->
                                        <div class="row p-3">
                                              
                                             
                                             
                                            <div class="<?=$colx1?>">
                                                 <!-- -->
                                                 <div class="card custom-card">
                                                        <div class="card-body">
                                                    
                                                                <div class="tab-controls rounded-m p-1 overflow-visible">
                                                                             
                                                                    <ul class="nav nav-tabs mb-3 nav-justified nav-style-1 d-sm-flex d-block" role="tablist">
                                                                                        <li class="nav-item ">
                                                                                            <a class="nav-link active" data-bs-toggle="tab" role="tab" href="#upcoming-p"
                                                                                                aria-selected="true">Upcoming</a>
                                                                                        </li>
                                                                                        <li class="nav-item">
                                                                                            <a class="nav-link" data-bs-toggle="tab" role="tab" href="#past-p"
                                                                                                aria-selected="false">Past</a>
                                                                                        </li>
                                                                                       
                                                                                    </ul>
                                                                                    <div class="tab-content">
                                                 <!-- -->
                                                 <div class="tab-pane active text-muted show" id="upcoming-p" role="tabpanel"> 
                                                    <!-- -->
                                                    <div class="mobile_on  ">
                                                                 
                                                                    <a href="https://sospawn.com" target="blank" class="td_spot_img_all"><img src="ads/banner.jpg" alt="spot_img" width="100%"></a>
                                                         </div>
                                                    <div class="ceve">
                                                         <div id='pagination_upcoming'></div>
                                                                    <div class="row" >
                                                                         
                                                                             <ul class="timeline list-unstyled" id="data_upcoming">
                                                                             
                                                                             </ul>
                                                                             
                                                                          
                                                                           
                                                                    </div>	
                                                    </div>
                                                    <!-- -->
                                                    </div>
                                                   <!-- --> 
                                                    <!-- -->
                                                 <div class="tab-pane text-muted" id="past-p" role="tabpanel"> 
                                                    <!-- -->
                                                    <div class="mobile_on  ">
                                                                 
                                                                     <?php
																	 	include __DIR__."/../chunk/ads.php";
																	 ?>
                                                         </div>
                                                    <div class="ceve">
                                                         <div id='pagination_past'></div>
                                                                    <div class="row" >
                                                                         
                                                                             <ul class="timeline list-unstyled" id="data_past">
                                                                             
                                                                             </ul>
                                                                             
                                                                          
                                                                           
                                                                    </div>	
                                                    </div>
                                                    <!-- -->
                                                    </div>
                                                   <!-- --> 
                                                  </div> 
                                                </div>    
                                             </div>   
                                             </div>     
                                            </div>
                                            <div class="<?=$colx2?> mobile_off">
                                                 <div class="card xcardo" >
                                                     
                                                    <div class="card-body"  style="min-height:300px;">
                                                        <h6 class="text-primary">Information</h6>
                                                        <div id="viewevent">
                                                        
                                                        </div>
                                                    </div>
                                                 </div>   
                                            </div>
                                            <!-- -->
                                            <div class="col-xxl-2 col-xl-2 mobile_off">
												   <?php
                                                   include __DIR__."/../chunk/ads_side.php";
                                                   ?>
                                            </div>
                                            <!-- -->
                                           
                                              
                                        </div> 
                                       <!-- -->
                                

  
 <script type='text/javascript'>
	$(document).ready(function() {   
		createPagination_upcoming(0);
		$('#pagination_upcoming').on('click','a',function(e){
			e.preventDefault(); 
			var pageNum = $(this).attr('data-ci-pagination-page');
			createPagination_upcoming(pageNum);
		});
		
		createPagination_past(0);
		$('#pagination_past').on('click','a',function(e){
			e.preventDefault(); 
			var pageNum = $(this).attr('data-ci-pagination-page');
			createPagination_past(pageNum);
		});
		 
		 
		 
	});
 	function createPagination_upcoming(pageNum){
		$.ajax({
			url: '<?=base_url()?>index.php/event/upcoming/'+pageNum + "?type=up",
			type: 'get',
			dataType: 'json',
			success: function(responseData){
				$('#pagination_upcoming').html(responseData.pagination);
				$("#data_upcoming").html(responseData.temps);
				//paginationData(responseData.empData);
			}
		});
	}
	function createPagination_past(pageNum){
		$.ajax({
			url: '<?=base_url()?>index.php/event/upcoming/'+pageNum + "?type=past",
			type: 'get',
			dataType: 'json',
			success: function(responseData){
				$('#pagination_past').html(responseData.pagination);
				$("#data_past").html(responseData.temps);
				//paginationData(responseData.empData);
			}
		});
	}
	function viewevents(ids)
	{
		$.ajax({
			url: '<?=site_url('event/cdetail')?>',
			data:{id:ids},
			type: 'get',
			dataType: 'json',
			success: function(responseData){
				$("#viewevent").html(responseData.temps);
			}
		});
	}
	 
 </script>   
 <style type="text/css">
 .tab-content .tab-pane
 {
	border:0; 
 }
 .timeline .timeline-body {
    width: 80%;
	background:transparent;
}
.img-detailx
{
	width:100%;
	height:100%;	
}
 @media(max-width:699px)
 {
	 div#data_upcoming {
		margin-left: 1px;
	}
	.timeline .timeline-body {
		 
		padding-left: 0;
		padding-right: 0;
		inset-block-start: 0.1rem; 
		width: 100%;
	}
	.timeline>li {
		padding: 2px 10px !important;
		border-style: solid;
		border-color: #ccc;
		border-top: 1px;
		border-left: 0;
		border-right: 0;
		border-bottom-width: 0.1rem;
	}
 }
 
 </style>
 