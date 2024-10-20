<link rel="stylesheet" type="text/css" href="assets/plugins/slick/slick.css?v2022">
<link rel="stylesheet" type="text/css" href="assets/plugins/slick/slick-theme.css?v2022">
<script src="assets/plugins/slick/slick.js?v2022" type="text/javascript" charset="utf-8"></script>
<?php
$avatar = "assets/images/pictures/31t.jpg";
if(!empty(user_info('avatar')))
{
	$avatar = "uploads/".user_info('avatar');
}
$task_type = $data;
$task_payment_arr = $data['task_payment_arr'];
?>
	<div class="content my-0 mt-n2 px-1">
            <div class="d-flex">
                <div class="align-self-center">
                    <h3 class="font-16 mb-2"><?=custom_language('Event Detail')?> </h3>
                </div>
                <div class="align-self-center ms-auto">
                </div>
            </div>
        </div>
	<div class="card card-style">
            <div class="content">
                 <!-- -->
                		 <div class="col-md-12">
                                    <!--  -->
                                     <div class="card card-style">
                                        <div class="content padding-0 margin-0" >
                                                <div class="row padding-0 margin-0">
                                                    <div class="col-md-12 padding-0 margin-0" >
                                                        <div class="card  card-style  padding-0 margin-0" style="min-height:150px;">
                                                           <div class="card-body padding-0 margin-0 card-task">
                                                              
                                                               <h1 class="text-center h-task">
                                                                     <?php
																	if($data['price']>0)
																	{
																	?>
                                                                    Harga Tiket <?=number_format($data['reward'],0)?> <?=setting("coin_name")?>
                                                                    <?php
																	}else
																	{
																	?>
                                                                    	Gratis
                                                                    <?php	
																	}
																	?>
                                                               </h1>
                                                                <img src="<?=config_item('main_site')?>uploads/<?=$data['image']?>" alt="img" width="100%" height="370"   class="mx-auto  shadow-l">
                                                                    
                                                            </div>    
                                                             <div class="card-body  card-task" style="min-height:100px;">
                                                                <div class=" d-flex">
                                                                    <!-- -->
                                                                     <div class="align-self-center">
                                                                         <span class="color-red-dark"><?=$task_type['title']?></span> 
                                                                          
                                                                     </div>
                                                                     <div class="align-self-center ps-1 text-center">
                                                                         <span class="color-black ">- <?=$data['task_complete']?>/<?=$data['total_seat']?></span> 
                                                                          
                                                                     </div>
                                                                     <div class="align-self-center ms-auto text-end">
                                                                         <p class="mb-0 font-10"> <b><?=date('d-m-Y',strtotime($data['start_date']))?></b></p>
                                                                     </div>
                                                                    <!-- -->
                                                                </div>
                                                               <h1 class="text-left">
                                                                    <?=$data['title']?>
                                                               </h1>
                                                               
                                                               <hr/>
                                                               <div>
                                                               		<a href="" target="_blank" id="goto" style="display:none;">Apps</a>
																	<?php
																		echo $data['description'];
																	?>
                                                               </div>
                                                               <hr/>
                                                               
                                                                <div class="responsive">
                                                                	  <?php
																	  if(count($speaker)>0)
																	  {
																	  ?>
                                                                      <h1 class="text-left">
																			Speaker
                                                                            
                                                                      </h1>
                                                                      <?php
																	  if(count($speaker)>1)
																	  {
																	  ?>
                                                                      <i>Geser untuk melihat</i>
                                                                      <?php
																	  }
																	  ?>
                                                                       <div class="containerx">
                                                                        	<?php
																				for($i=0;$i<count($speaker);$i++)
																				{
																			?>
                                                                        	
                                                                              <div class="cardx">
                                                                                <img src="<?=config_item('main_site')?>uploads/<?=$speaker[$i]['images']?>" alt="Person" class="card__imagex">
                                                                                  
                                                                                <p class="card__namex"><?=strtoupper($speaker[$i]['name'])?></p>
                                                                                <div class="grid-container">
                                                                            
                                                                                  <div class="grid-child-posts">
                                                                                    <?=strtoupper($speaker[$i]['designation'])?>
                                                                                  </div>
                                                                            
                                                                                  <div class="grid-child-followers">
                                                                                    <?=$speaker[$i]['email']?>
                                                                                  </div>
                                                                            
                                                                                </div>
                                                                                <!--
                                                                                <ul class="social-icons">
                                                                                 
                                                                                  <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                                                                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                                  <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                                                  <li><a href="#"><i class="fa fa-codepen"></i></a></li>
                                                                                 
                                                                                </ul>
                                                                                  -->
                                                                              </div>
                                                                            
                                                                            
                                                                            <?php
																				}
																			?>
                                                                       </div> 
                                                                       <?php
																	   }
																	   ?>    
                                                                         
                                                                </div>
                                                              <?php
															  	if(isset($data['user_reward']['id']))
																{
															  ?>  
                                                              <a href="<?=site_url("event/claims/".$data['user_reward']['id'])?>"  class="btn btn-primary btn-sm btn-xs btn-lg btn-full">My Ticket</a>
                                                              <?php
																}else
																{
															  ?>
                                                               <a href="javascript:void(0);" id="start_task" class="btn btn-info btn-sm btn-xs btn-lg btn-full">Claim</a>
                                                              <?php
																}
															  ?>
                                                             </div>
                                                        </div>
                                                    </div>     
                                                </div>
                                        </div>
                                     </div>   
                                  <!-- -->
                                  </div>
                 <!-- -->
            </div>
        </div>
  
  
 <script type='text/javascript'>
 	var task_types = "<?=isset($data['user_reward']['status'])?strtolower(claimstatus($data['user_reward']['status'])):'waiting'?>";
	var userdata = <?=json_encode($data['user_reward'])?>;
	function checkstatuses()
	{
		if(task_types=="waiting")
		{
			$("#start_task").text("Claim");
			$("#start_task").addClass("btn-info");
			$("#start_task").removeClass("btn-success");	
		}else if(task_types=="screenshot")
		{
			 
			$("#start_task").text("Send "+ task_types);
			$("#start_task").addClass("btn-success");
			$("#start_task").removeClass("btn-info");
		}else if(task_types=="denied")
		{
			$("#start_task").text("Denied");
			$("#start_task").addClass("btn-danger");
			$("#start_task").removeClass("btn-success");
		}
		 
	}
	$(document).ready(function() {   
		  
		 $("#start_task").click(function()
		 {
			
				 
				var req = post('<?=site_url('event/save')?>',{id:<?=$data['id']?>,status:3,osc:window.browserInfo});
				req.done(function(out){
					if(!out.error)
					{
						 document.location.href = out.urls;
					}
					else
					{
						smart_message(out.message);
					}
				});
				return false;
		 });
		$("#btn-upload").click(function(){
			$("#avatar").trigger('click');
		});
		$("#avatar").change(function(){
			$("#avatar_s").val($(this).val());
		});
		
		$("#frm-screenshot").validate({
			ignore:[],
			onkeyup:false,
			errorClass: 'help-block text-right animated fadeInDown',
			errorElement: 'div',
			errorPlacement: function(error, e) {
				jQuery(e).parents('.form-group').append(error);
			},
			highlight: function(e) {
				jQuery(e).closest('.form-group').removeClass('has-error').addClass('has-error');
				jQuery(e).closest('.help-block').remove();
			},
			success: function(e) {
				jQuery(e).closest('.form-group').removeClass('has-error');
				jQuery(e).closest('.help-block').remove();
			},
			submitHandler:function(){
				var data = new FormData($("#frm-screenshot")[0]);
				var req = postFile('<?=site_url("tasks/updatescreenshot")?>',data);
				req.done(function(out){
					if(!out.error)
					{
						smart_success_box(out.message,'#frm-screenshot .message');
						document.location.href= window.location;
					}
					else
					{
						smart_error_box(out.message,'#frm-screenshot .message');
					}
				});
				return false;
			}
		}); 
		checkstatuses();		
	});
 	
	function openInNewTab(url) {
	  window.open(url, '_blank').focus();
	}


</script>	
<style type="text/css">

	.containerx {
	  display: grid;
	  grid-template-columns: 300px 300px 300px;
	  grid-gap: 50px;
	  justify-content: center;
	  align-items: center;
	  padding: 20px;
	   
	  font-family: 'Baloo Paaji 2', cursive;
	  overflow-x:auto;
	}
	
	.cardx {
	  background-color: #222831;
	  max-height: 37rem;
	  border-radius: 5px;
	  display: flex;
	  flex-direction: column;
	  align-items: center;
	  box-shadow: rgba(0, 0, 0, 0.7);
	  color: white;
	}
	
	.card__namex {
	  
	  font-size: 1.5em;
	  
	}
	
	.card__imagex {
	  height: 160px;
	  width: 160px;
	  border-radius: 50%;
	  border: 5px solid #272133;
	  margin-top: 20px;
	  box-shadow: 0 10px 50px rgba(235, 25, 110, 1);
	}
	@media only screen and (max-width: 800px) {
		.containerx {
	  		display: grid;	
			overflow-x: scroll;		
			justify-content: left;
			grid-template-columns: 250px 250px;
		}
	}
</style>
 
 
    
 
       
      