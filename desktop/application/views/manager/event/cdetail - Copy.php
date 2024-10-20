<?php
$mobile = $this->agent->is_mobile(); 
$avatar = "assets/images/pictures/31t.jpg";
if(!empty(user_info('avatar')))
{
	$avatar = "uploads/".user_info('avatar');
}
$task_type = $data;
$task_payment_arr = $data['task_payment_arr'];
?>
<div class="card custom-card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <span class="avatar avatar-md avatar-rounded me-3">
                                                    <img src="<?=config_item('main_site')?>uploads/<?=$data['image']?>" alt="img" width="100%" height="370"   class="mx-auto  shadow-l">
                                                </span>
                                                <div>
                                                    <h6 class="mb-0 fw-semibold fs-14  juduls"> <?=$data['title']?></h6>
                                                    <p class="mb-0 fs-10 fw-semibold text-muted"><?=$task_type['title']?></p>
                                                </div>
                                                  
                                            </div>
                                            <div class="mb-3">
                                                <p class="text-muted">
                                                <?php
																		echo $data['description'];
																	?>
                                                </p>
                                                <p>
                                                <span><?=date('d-m-Y',strtotime($data['start_date']))?></span>
                                                    
                                                </p>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <span class="text-muted">
                                                     
                                                    </span>
                                                    <span class="text-warning d-block ms-1">
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
                                                    </span>
                                                </div>
                                                <div class="float-end fs-12 fw-semibold text-muted text-end">
                                                     <span class="d-block fw-normal fs-12 text-success"><i><?=$data['task_complete']?>/<?=$data['total_seat']?></i></span>
                                                </div>
                                            </div>
                                            <div>
                                            	<div class="responsive">
                                                                	  <?php
																	  if(count($speaker)>0)
																	  {
																	  ?>
                                                                      <h6 class="text-left">
																			Speaker
                                                                            
                                                                      </h6>
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
                                                                                 
                                                                              </div>
                                                                            
                                                                            
                                                                            <?php
																				}
																			?>
                                                                       </div> 
                                                                       <?php
																	   }
																	   ?> 
                                                                       <br/>
                                                                       <a href="https://users.blockvest.org/" id="start_task" class="btn btn-info btn-sm btn-xs btn-lg btn-full" style="width:100%;">Join</a>   
                                                                         
                                                                </div>
                                                               
                                                             </div>
                                            </div>
                                        </div>
                                    </div>

<style type="text/css">
	<?php
	if(!$mobile)
	{
	?>
	
	.containerx {
	  display: flex;
	  
	  justify-content: center;
	  align-items: center;
	  padding: 20px;
	   
	  font-family: 'Baloo Paaji 2', cursive;
	  overflow:auto;
	}
	
	.cardx {
	  background-color: #fff;
	  max-height: 37rem;
	  border-radius: 5px;
	  display: flex;
	  flex-direction: column;
	  align-items: center;
	  box-shadow: rgba(0, 0, 0, 0.7);
	  color: white;
	     margin: 2px;
      padding: 0 20px;		  
	}
	.cardx:first-of-type {
		margin: 0px 20px 0 150px;
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
	  box-shadow: 0 10px 50px #7f2a25;
	}
	@media only screen and (max-width: 800px) {
		.containerx {
	  		display: grid;	
			overflow-x: scroll;		
			justify-content: left;
			grid-template-columns: 250px 250px;
		}
	}
	<?php
	}else
	{
	?>
	.containerx {
	  display: grid;
	  grid-template-columns: 100px 100px 100px;
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
	  box-shadow: 0 10px 50px #7f2a25;
	}
	@media only screen and (max-width: 800px) {
		.containerx {
	  		display: grid;	
			overflow-x: scroll;		
			justify-content: left;
			grid-template-columns: 250px 250px;
		}
	}
	<?php
	}
	?>
</style>                                    