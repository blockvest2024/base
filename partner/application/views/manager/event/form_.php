 <div class="breadcrumb__area">
            <div class="breadcrumb__wrapper mb-35">
               <div class="breadcrumb__main">
                  <div class="breadcrumb__inner">
                     <div class="breadcrumb__icon">
                        <i class="flaticon-home"></i>
                     </div>
                     <div class="breadcrumb__menu">
                        <nav>
                           <ul>
                              <li><span><a href="<?=site_url("home")?>">Dashboard</a></span></li>
                             <li><span><a href="<?=site_url("event")?>">Event</a></span></li>
                             <li class="active"><span>Create Event</span></li>
                           </ul>
                        </nav>
                  </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xxl-12">
               <div class="create__event-area">
                  <div class="body__card-wrapper">
                     <div class="card__header-top">
                        <div class="card__title-inner">
                           <h4 class="event__information-title">Event Information</h4>
                        </div>
                        <div class="card__header-dropdown">
                            
                        </div>
                     </div>
                     <form action="javascript:void(0);" id="frm-object">   
                     <div class="create__event-main pt-25">
                     
                        <div class="event__left-box">
                           <div class="create__input-wrapper">
                              
                                 <div class="singel__input-field mb-15">
                                    <label class="input__field-text">Event Title</label>
                                    <input type="text" name="title" id="title" class="form-control required" required>
                                 </div>
                                 <div class="event__input mb-15">
                                    <label class="input__field-text">Event Details</label>
                                    <textarea  placeholder=""  name="description" id="description" class="form-control required" required></textarea>
                                 </div>
                             
                           </div>
                           <div class="event__update-wrapper">
                              <span>Add Image</span>
                             
                              <div class="event__update-file">
                                 
                                 
                                 <div class="event__update-thumb">
                                    <div class="box__input">
                                       <input type="file"  id="filex" name="files"  class="box__file" data-multiple-caption="{count} files selected" multiple>
                                       <label class="input__field-text btn-add-image"  for="file"><span><i class="fa-regular fa-plus"></i></span><span>Add Image</span></label>
                                       <button type="button" class="box__button"></button>
                                    </div>
                                 </div>
                              </div>
                               <div class="event__update-file add-image-s">
                              	 
                                     <?php
									 /*
                                     <div class="event__update-thumb">
                                        <img src="assets/img/event/update/update-thumb-01.png" alt="image not found">
                                        <span class="update__thumb-close"><i class="fa-regular fa-xmark"></i></span>
                                     </div>
                                       
                                     <div class="event__update-thumb">
                                        <img src="assets/img/event/update/update-thumb-02.png" alt="image not found">
                                        <span class="update__thumb-close"><i class="fa-regular fa-xmark"></i></span>
                                     </div>
                                     */
									 ?>
                                    
                              </div>
                          </div>
                             
                              <div class="row g-20">
                                 <div class="col-xxl-12 col-xl-12 col-lg-12">
                                    <div class="singel__input-field is-color-change mb-15">
                                       <label class="input__field-text">From Date</label>
                                       <input type="date" name="from_dates" id="from_dates" class="form-control required" required>
                                    </div>
                                 </div>
                                 <div class="col-xxl-12 col-xl-12 col-lg-12">
                                    <div class="singel__input-field is-color-change mb-15">
                                       <label class="input__field-text">To Date</label>
                                       <input type="date" name="to_dates" id="to_dates" class="form-control required" required>
                                    </div>
                                 </div>
                                 <div class="col-xxl-6 col-xl-6 col-lg-6">
                                    <div class="singel__input-field is-color-change  mb-15">
                                       <label class="input__field-text">From Time</label>
                                       <input type="time" value="13:30" name="from_times" id="from_times" class="form-control required" required>
                                    </div>
                                 </div>
                                  <div class="col-xxl-6 col-xl-6 col-lg-6">
                                    <div class="singel__input-field is-color-change  mb-15">
                                       <label class="input__field-text">To Time</label>
                                       <input type="time" value="13:30" name="to_times" id="to_times" class="form-control required" required>
                                    </div>
                                 </div>
                                 <div class="col-xxl-12 col-xl-12 col-lg-12">
                                    <div class="singel__input-field mb-15">
                                       <label class="input__field-text">Venue / Address</label>
                                       <input type="text" placeholder="" name="address" id="address" class="form-control required" required>
                                    </div>
                                 </div>
                                 <div class="col-xxl-6 col-xl-6 col-lg-6">
                                    <label class="input__field-text">Event Type</label>
                                    <div class="contact__select">
                                       <select name="id_event_category" class="form-control required" required>
                                          <option value="">Select Option</option>
                                          <?php
										  for($i=0;$i<count($event_category);$i++)
										  {
										  ?>
                                          		 <option value="<?=$event_category[$i]['id']?>"><?=$event_category[$i]['name']?></option>
                                          <?php
										  }
										  ?>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-xxl-6 col-xl-6 col-lg-6">
                                    <div class="singel__input-field mb-15">
                                       <label class="input__field-text">Total Seat</label>
                                       <input type="number" value="50" name="total_seat" id="total_seat" class="form-control required" required>
                                    </div>
                                 </div>
                                 <div class="col-xxl-12 col-xl-12 col-lg-12">
                                    <div class="singel__input-field">
                                       <label class="input__field-text">Ticket Price($)</label>
                                       <input type="number" value="0" name="price" id="price" min="0" class="form-control required" required>
                                    </div>
                                 </div>
                                <?php
								/*
                                 <div class="col-xxl-6 col-xl-6 col-lg-6">
                                    <label class="input__field-text">Event Status</label>
                                    <div class="contact__select">
                                       <select>
                                          <option value="0">Confirmed</option>
                                          <option value="1">waiting</option>
                                          <option value="1">confused</option>
                                          <option value="3">Option</option>
                                       </select>
                                    </div>
                                 </div>
								 */
								 ?>
                              </div>
                               
                        </div>
                        <div class="event__right-box">
                           <div class="create__input-wrapper">
                              <div class="table-speaker">
                                <div class="tabl">
                                     <h5> 
                                     <span class="numbers">1.</span> Speaker
                                     <a class="deletes btn btn-sm btn-danger hide" style="float:right;"><i class="fa fa-times"></i></a>
                                     </h5>
                                    <hr/>
                                     <div class="singel__input-field mb-15">
                                        <label class="input__field-text">Name</label>
                                        <input type="text" name="speaker[name][]" class="form-control required" required>
                                     </div>
                                     <?php
									 /*
                                     <div class="singel__input-field mb-15">
                                        <label class="input__field-text">Email</label>
                                        <input type="text" name="speaker[email][]" class="form-control required" required>
                                     </div>
                                     <div class="singel__input-field mb-15">
                                        <label class="input__field-text">Phone Number</label>
                                        <input type="text" name="speaker[phones][]" class="form-control required" required>
                                     </div>
                                     */
									 ?>
									 <div class="singel__input-field mb-15">
                                        <label class="input__field-text">Designation</label>
                                        <input type="text" name="speaker[designation][]" class="form-control required" required >
                                     </div>
                                     <div class="popup__update">
                                        <label>Upload Image ( 200x200px )</label>
                                        <input type="file" name="speaker[image][]" accept="image/*">
                                     </div>
                               </div>  
                             </div>    
                             <div class="clone-table-speaker">
                             </div>
                                 <button type="button" id="btn-add-speaker" class="unfield__input-btn w-100 mb-20"><i class="fa-regular fa-plus"></i>Add More Speaker</button>
                                 <button class="input__btn w-100 create_btn" type="button">Create Event</button>
                             
                           </div>
                        </div>
                       
                     </div>
                       </form>
                  </div>
               </div>
            </div>
         </div>
 <script>
 var nums = 0;
 var xremoves = 0;
 function clonespeaker()
 {
	var cclone = $(".table-speaker").clone();
	cclone.find(".tabl").addClass("speaker-remove-"+ nums); 
	cclone.find(".deletes").removeClass("hide");
	cclone.find(".deletes").attr("onclick","javascript:removespeaker("+ nums +");"); 
	$(".clone-table-speaker").append(cclone.html());
	fix_number();
	nums +=1;	 
 }
 function fix_number()
 {
	var cnumbers = $(".numbers").length;
	$.each($("span.numbers"),function(key,val)
	{
		$(this).text((key+1) + ".");
	});	 
 }
 function removespeaker(nomors)
 {
	 $(".speaker-remove-"+ nomors).remove();
	 fix_number();
 }
 $(function()
 {
	 $("#btn-add-speaker").click(function()
	 {
		 clonespeaker();
	 });
	 $("#filex").change(function()
	 {
		var input = $(this);
		console.log(input);
		 if (input[0].files) {
			var reader = new FileReader();
	
			reader.onload = function (e) {
				//$('#renderImage').attr('src', e.target.result);
				console.log(e.target);
				addimages(e.target.result,input.val());
				xremoves +=1;
				console.log(e);
			}
	
			reader.readAsDataURL(input[0].files[0]);
		} 
	 });
	 $(".btn-add-image").click(function()
	 {
		  $("#filex").trigger("click");
	 });
	 $(".box__button").click(function()
	 {
		 $("#filex").trigger("click");
	 });
 });
 function addimages(imgs,xfiles)
 {
	 console.log(xfiles);
	var chtmls = '<div class="event__update-thumb xremoves-'+ xremoves +'">';
	chtmls += ' <img src="'+ imgs +'" alt="image not found" width="50">';
	//chtmls += '<input type="file"  id="file-'+ xremoves +'" class="hide"/>';
	//chtmls += ' <span class="update__thumb-close" onclick="javascript:remove_images('+ xremoves +');"><i class="fa-regular fa-xmark"></i></span>';
	chtmls += ' </div>';
	$(".add-image-s").html(chtmls);
	//$("#file-"+ xremoves ).val(xfiles);
	xremoves +=1;
 }
 function remove_images(xm)
 {
	 $(".xremoves-"+ xm).remove();
 }
 $(document).ready(function(){
	 CKEDITOR.replace("description",ck_conf); 
	 
	 $("#frm-object").validate({
		ignore:[],
		errorClass: 'help-block text-right animated fadeInDown',
		errorElement: 'div',
		errorPlacement: function(error, e) {
			jQuery(e).parents('.singel__input-field').append(error);
		},
		highlight: function(e) {
			jQuery(e).closest('.singel__input-field').removeClass('has-error').addClass('has-error');
			jQuery(e).closest('.help-block').remove();
		},
		success: function(e) {
			jQuery(e).closest('.singel__input-field').removeClass('has-error');
			jQuery(e).closest('.help-block').remove();
		},
		submitHandler:function(){
			
			setTimeout(function()
			{
				var formdata = new FormData($("#frm-object")[0]);
				var req = postFile('<?=site_url('event/save')?>',formdata);
				req.done(function(out){
					if(!out.error)
					{
						document.location.href = "<?=site_url("event")?>";
					}
					else
					{
						smart_error_box(out.message,'#frm-object .create__event-main');
					}
				});
				return false;
			},1000);
		}
	});
	$(".create_btn").click(function()
	{
		$(smart_loader).appendTo('body');
	 	$("#smart-loader").modal('show');
		update_ckeditor();
		$("#frm-object").trigger("submit");
		
	});
 });
 </script>        