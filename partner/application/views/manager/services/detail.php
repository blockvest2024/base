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
                              <li><span><a href="<?=site_url("event")?>">Event</a></span></li>
                                 <li class="active"><span>event details</span></li>
                              </ul>
                           </nav>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="event__details-area">
               <div class="row">
                  <div class="col-xxl-7 col-xl-6">
                     <div class="event__details-left">
                        <div class="body__card-wrapper mb-20">
                           <div class="card__header-top">
                              <div class="card__title-inner">
                                 <h4 class="event__information-title"><?=strtoupper($data['title'])?></h4>
                              </div>
                              <div class="card__header-dropdown">
                                
                              </div>
                           </div>
                           <div class="review__main-wrapper pt-25">
                              <div class="review__meta mb-25">
                                 <ul>
                                    <?php
									$left_seat = ($data['total_seat'] - $event_seat['total']);
									?> 
                                    <li><?=number_format($left_seat,0)?> Ticket Left</li>
                                    <li><?=number_format($event_seat['total'],0)?> Attendant</li>
                                 </ul>
                              </div>
                              <div class="review__author-meta mb-15">
                                 <div class="review__author-thumb">
                                    <?php
									$imgs = config_item('main_site')."uploads/noimage.jpg";
									if(!empty($partner['avatar']) && is_file(config_item('upload_path').$partner['avatar']) && file_exists(config_item('upload_path').$partner['avatar']))
									{
										$thumb = getThumb($partner['avatar'],76,76);
										$imgs = "cache/".$thumb;
									}
									?>
                                    <img src="<?=$imgs?>" alt="image not found">
                                 </div>
                                 <div class="review__author-name">
                                    <h4><?=$partner['full_name']?></h4>
                                 </div>
                              </div>
                              <div class="review__tab">
                                 <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">about</button>
                                     
                                    </div>
                                 </nav>
                                 <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                                       <div class="about__event-thumb w-img mt-40">
                                           <?php
											$imgs = config_item('main_site')."uploads/noimage.jpg";
											if(!empty($data['image']) && is_file(config_item('upload_path').$data['image']) && file_exists(config_item('upload_path').$data['image']))
											{
												$thumb = getThumb($data['image'],700,400);
												$imgs = "cache/".$thumb;
											}
											?>
                                          <img src="<?=$imgs?>" alt="image not found">
                                       </div>
                                       <div class="about__content mt-30">
                                           <?=$data['description']?>
                                       </div>
                                  <?php
								  if($partner['id']!=user_info('id'))
								  {
								  ?>      
                                  <form action="javascript:void(0);" id="frm-object">  
                                       <div class="ticket__purchase-wrapper mt-30">
                                          <?php
										  	 
										  ?>
                                          <h4 class="ticket__purchase-title">Purchase Ticket </h4>
                                          <div class="ticket__price-inner">
                                             <div class="ticket__price-item">
                                                <label class="input__field-text">Total Person</label>
                                                <div class="contact__select">
                                                   <select name="seat" id="seat">
                                                      <?php
													  for($i=1;$i<=10;$i++)
													  {
														$no = $i;
														$nox = $i;  
														if($i<10)
														{
															$nox = "0".$no;
														}
														if($i<=$left_seat)
														{
													  ?>
                                                      <option value="<?=$no?>"><?=$nox?></option>
                                                      <?php
														}
													  }
													  ?> 
                                                   </select>
                                                </div>
                                             </div>
                                             <div class="ticket__price-item">
                                                <label>Ticket Price :</label>
                                                <strong>
                                                   <?=$data['price']?>
                                                </strong>
                                             </div>
                                             <div class="ticket__price-item">
                                                <label>Sub Total :</label>
                                                <strong class="subtotal">
                                                    0
                                                </strong>
                                             </div>
                                             <div class="ticket__price-item">
                                                <label>Buy now :</label>
                                                <input type="hidden" name="total_price" id="total_price" value="" />
                                                <input type="hidden" name="price" id="price" value="<?=$data['price']?>" />
                                                <input type="hidden" name="id_event" id="id_event" value="<?=$data['id']?>" />
                                                
                                                <button class="unfield__input-btn" type="submit">Buy ticket</button>
                                             </div>
                                          </div>
                                       </div>
                                       </form>
                                       <?php
								  		}
									   ?>
                                    </div>
                                    
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                                       <?php
									   /* 
                                       <div class="review__item mt-35">
                                          <div class="review__item-inner">
                                             <div class="review__item-thumb">
                                                <img src="assets/img/meta/chatbox/02.png" alt="image not found">
                                             </div>
                                             <div class="review__item-content">
                                                <h4>David Warner</h4>
                                                <ul>
                                                   <li>
                                                      <span>5.0</span>
                                                      <i class="fa-solid fa-star"></i>
                                                      <i class="fa-solid fa-star"></i>
                                                      <i class="fa-solid fa-star"></i>
                                                      <i class="fa-solid fa-star"></i>
                                                      <i class="fa-solid fa-star"></i>
                                                   </li>
                                                   <li>23 Days Ago</li>
                                                </ul>
                                             </div>
                                          </div>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas quae totam fuga possimus facere animi maxime. Atque illum eum pariatur! Nostrum hic similique debitis fugit ad perspiciatis vero quas doloribus.</p>
                                       </div>
                                      
                                       <div class="review__item mt-40">
                                          <div class="review__item-inner">
                                             <div class="review__item-thumb">
                                                <img src="assets/img/meta/chatbox/04.png" alt="image not found">
                                             </div>
                                             <div class="review__item-content">
                                                <h4>David Warner</h4>
                                                <ul>
                                                   <li>
                                                      <span>5.0</span>
                                                      <i class="fa-solid fa-star"></i>
                                                      <i class="fa-solid fa-star"></i>
                                                      <i class="fa-solid fa-star"></i>
                                                      <i class="fa-solid fa-star"></i>
                                                      <i class="fa-solid fa-star"></i>
                                                   </li>
                                                   <li>1 Month Ago</li>
                                                </ul>
                                             </div>
                                          </div>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas quae totam fuga possimus facere animi maxime. Atque illum eum pariatur! Nostrum hic similique debitis fugit ad perspiciatis vero quas doloribus.</p>
                                       </div>
                                       <div class="review__item mt-40">
                                          <div class="review__item-inner">
                                             <div class="review__item-thumb">
                                                <img src="assets/img/meta/chatbox/07.png" alt="image not found">
                                             </div>
                                             <div class="review__item-content">
                                                <h4>David Warner</h4>
                                                <ul>
                                                   <li>
                                                      <span>5.0</span>
                                                      <i class="fa-solid fa-star"></i>
                                                      <i class="fa-solid fa-star"></i>
                                                      <i class="fa-solid fa-star"></i>
                                                      <i class="fa-solid fa-star"></i>
                                                      <i class="fa-solid fa-star"></i>
                                                   </li>
                                                   <li>2 Month Ago</li>
                                                </ul>
                                             </div>
                                          </div>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas quae totam fuga possimus facere animi maxime. Atque illum eum pariatur! Nostrum hic similique debitis fugit ad perspiciatis vero quas doloribus.</p>
                                       </div>
                                       */
									   ?>
                                    </div>
									
                                 </div>
								 
                              </div>
							 
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xxl-5 col-xl-6">
                     <div class="event__details-right">
                        
                          
                        <div class="body__card-wrapper mb-20">
                           <div class="event__meta-time">
                              <ul>
                                 <li>
                                    <span> Date : </span>
                                    <?=date('d/m/Y',strtotime($data['from_dates']))?> - <?=date('d/m/Y',strtotime($data['to_dates']))?> 							
                                 </li>
                                 <li>
                                    <span>Time :</span>
                                    <?=date('h:i A',strtotime($data['from_times']))?> - <?=date('h:i A',strtotime($data['to_times']))?> 							
                                 </li>
                                 
                                 <li>
                                    <span>Venue : </span>
                                    <?=$data['address']?>									
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
 <script>
 $(document).ready(function(){
	$("#seat").change(function()
	{
		var sprice = <?=$data['price']?>;
		var sseat = $(this).val();
		var total = sprice * sseat;
		$("#total_price").val(total);
		$(".subtotal").text("$"+ total.toFixed(2));
	}); 
	$("#frm-object").validate({
		ignore:[],
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
			update_ckeditor();
			var formdata = new FormData($("#frm-object")[0]);
			var req = postFile('<?=site_url('event/save-seat')?>',formdata);
			req.done(function(out){
				if(!out.error)
				{
					bootbox.confirm({
						title: "Thank You For Purchase",
						message: "Do you want to Event Page.",
						buttons: {
							cancel: {
								label: '<i class="fa fa-times"></i> Cancel'
							},
							confirm: {
								label: '<i class="fa fa-check"></i> Confirm'
							}
						},
						callback: function (result) {
							if(result)
							{
								document.location.href = "<?=site_url("event")?>";
							}else
							{
								document.location.href = window.location;	
							}
						}
					});
					
				}
				else
				{
					smart_error_box(out.message,'#frm-object .block-content');
				}
			});
			return false;
		}
	});
 });
 </script>           