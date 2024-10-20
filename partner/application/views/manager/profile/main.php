
<div class="row">
	<div class="col-md-12">
  
   	   <div class="card">
       		<div class="card-header">
                   Info
            </div>
            <div class="card-body">
                
                     <!-- -->
                           <form action="javascript:void(0);" method="post" id="frm-profile">
                                  
                                <div class="singel__input-field mb-15">
                                    <label class="input__field-text">Full Name</label>
                                    <input type="text" name="full_name" id="full_name" value="<?=isset($data['full_name'])?$data['full_name']:""?>" class="form-control required" required>
                                 </div>
                                 <div class="singel__input-field mb-15">
                                    <label class="input__field-text">Telp</label>
                                    <input type="number" name="telp" id="telp" value="<?=isset($data['telp'])?$data['telp']:""?>" class="form-control required" required>
                                 </div>
                                  <div class="singel__input-field mb-15">
                                    <label class="input__field-text">Type</label>
                                    <select name="id_partner_type" class="form-control required" required>
                                       <option value="">-- Type --</option>
                                       <?php
                                        for($i=0;$i<count($partner_type);$i++)
                                        {
											$selected = '';
											if(isset($data['id_partner_type']))
											{
												if($data['id_partner_type']==$partner_type[$i]['id'])	
												{
													$selected = 'selected="selected"';
												}
											}
                                       ?>
                                            <option value="<?=$partner_type[$i]['id']?>" <?=$selected?>><?=$partner_type[$i]['name']?></option>
                                       <?php
                                        }
                                       ?>
                                   </select>
                                 </div>
                                   
                                
                                
                               
                                 
                                
                                <br/>
                                
                                  <div class="form-group">
                                    
                                    
                                    <input type="hidden" name="id" value="<?=user_info('id')?>" id="id" />
                                   
                                    <button type="submit" class="btn btn-primary"><i class="si si-paper-plane "></i> Save</button>
                                    <a href="<?=site_url("profile")?>" class="btn btn-reset"><i class="fa fa-refresh"></i> Refresh</a>
                                </div>
                            </form>            
                     <!--- -->            	
                 
             
            </div>
          
      </div>
                   
                         		   
                         
    </div> 
       
</div>

                     
<script>
$(document).ready(function(){
	$("#frm-profile").validate({
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
			 
			var data = new FormData($("#frm-profile")[0]);
			var req = postFile('<?=site_url('profile/save')?>',data);
			req.done(function(out){
				if(!out.error)
				{
					smart_success_box(out.message,'#frm-object .card-body');
					document.location.href="<?=site_url('profile')?>";
				}
				else
				{
					smart_error_box(out.message,'#frm-object .card-body');
				}
			});
			return false;
		}
	});
	$("#btn-upload").click(function(){
		$("#avatar").trigger('click');
	});
	$("#avatar").change(function(){
		$("#avatar_s").val($(this).val());
	});
	$("#delete-avatar").click(function(){
		var ids = $(this).data('ref');
		if(ids!="")
		{
			bootbox.confirm({
				title: "Delete avatar?",
				message: "Do you want to delete this avatar.",
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
						var req = post('<?=site_url('users/delete-avatar')?>',{id:ids,'<?=$this->security->get_csrf_token_name()?>':smart_token_hash});
						req.done(function(out){
							if(!out.error)
							{
								smart_success_box(out.message,'#frm-object .block-content');
								$("#avatar_container").remove();
							}
							else
							{
								smart_error_box(out.message,'#frm-object .block-content');
							}
						});		
					}
				}
			});
		}
		return false;
	});
	 
	//
			 $('#company_type_bis').select2({
				allowClear: true,
				placeholder: "Select an option"
			}); 
			 $('#country').select2({
				allowClear: true,
				placeholder: "Select an option"
			}); 
			$('#province').select2({
				allowClear: true,
				placeholder: "Select an option"
			});
			$('#city').select2({
				allowClear: true,
				placeholder: "Select an option"
			});
			$('#district').select2({
				allowClear: true,
				placeholder: "Select an option"
			});
			$('#country').change(function()
			{
				var cd = $(this).val();
				$(".prevs").addClass("xhide");
				if(cd == "INDONESIA")
				{
					$(".prevs").removeClass("xhide");					
				}
			});
			
			$('#province').change(function()
			{
				var ids = $(this).val();
				getcity(ids); 
			});
			$('#city').change(function()
			{
				var ids = $(this).val();
				getdistrict(ids); 
			});
			
			// 
			$('#id_bank').select2({
				allowClear: true,
				placeholder: "Select an option"
			});
});
</script>        
 		<style type="text/css">
		html.dark-theme .modal-footer .btn
		{
			color:white;	
		}
		.xhide 
		{
			display:none !important;	
		}
		.select2-container {
			width: 100% !important;
		}
		.select2-container--default .select2-selection--single {
			 
			 
		}
		</style>  