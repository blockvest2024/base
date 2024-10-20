<form action="javascript:void(0);" method="post" id="frm-object">
<div class="row">
	<div class="col-md-12">
  
   	   <div class="card">
       		<div class="card-header">
                   Form Setting
            </div>
            <div class="card-body">
                
                                     
                                <div class="form-group">
                                    <label>Coin Name</label>
                                    <input type="text" class="form-control required" id="coin_name" name="coin_name" placeholder="" value="<?=isset($data['coin_name'])?$data['coin_name']:''?>" />
                                </div> 
                                <div class="form-group">
                                     <label>Reward Token</label>
                                    <input type="text" class="form-control required" id="reward_token" name="reward_token" min="1" placeholder="" value="<?=isset($data['reward_token'])?$data['reward_token']:'2500'?>" />
                                </div>
                                
                                <div class="form-group">
                                     <label>Price 1 Event (ETH)</label>
                                    <input type="text" class="form-control required" id="price_event" name="price_event"   placeholder="" value="<?=isset($data['price_event'])?$data['price_event']:'2500'?>" />
                                </div>
                                
                                <hr/>
                                
                                <div class="form-group">
                                        <label>Contact support</label>
                                        <textarea name="contact_support" id="contact_support"  class="form-control"><?=isset($data['contact_support'])?$data['contact_support']:""?></textarea>
                                 </div>
                                <div class="form-group">
                                        <label>About Us</label>
                                        <textarea name="about_us" id="about_us"  class="form-control"><?=isset($data['about_us'])?$data['about_us']:""?></textarea>
                                 </div> 
                                 <div class="form-group">
                                        <label>Term of Services</label>
                                        <textarea name="terms" id="terms"  class="form-control"><?=isset($data['terms'])?$data['terms']:""?></textarea>
                                 </div>
                                  
                                
                                <br/>
                                
                                  <div class="form-group">
                                    
                                    <input type="hidden" name="id" value="<?=isset($data['id'])?$data['id']:''?>" id="id" />
                                    <!-- 
                                    <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash();?>" class="smart-token">
                                    -->
                                    <button type="submit" class="btn btn-primary"><i class="si si-paper-plane "></i> Save</button>
                                    <button type="button" class="btn btn-secondary btn-reset"><i class="fa fa-refresh"></i> Refresh</button>
                                </div>       	
                 </div>
             
            </div>
         </div>
      </div>
                      
                         		   
                         
         
</div>
</form>                        
<script>
$(document).ready(function(){
	CKEDITOR.replace("contact_support",ck_conf); 
	CKEDITOR.replace("about_us",ck_conf); 
	CKEDITOR.replace("terms",ck_conf); 
	$("#frm-object").validate({
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
			update_ckeditor();
			var data = new FormData($("#frm-object")[0]);
			var req = postFile('<?=site_url("setting/save")?>',data);
			req.done(function(out){
				if(!out.error)
				{
					smart_success_box(out.message,'#frm-object .block-content');
					document.location.href="<?=site_url('setting')?>";
				}
				else
				{
					smart_error_box(out.message,'#frm-object .block-content');
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
						var req = post('<?=site_url('setting/delete-avatar')?>',{id:ids,'<?=$this->security->get_csrf_token_name()?>':smart_token_hash});
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
	$("#btn-favicon").click(function(){
		$("#favicon").trigger('click');
	});
	$("#favicon").change(function(){
		$("#favicon_s").val($(this).val());
	});
	$("#delete-favicon").click(function(){
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
						var req = post('<?=site_url('setting/delete-favicon')?>',{id:ids,'<?=$this->security->get_csrf_token_name()?>':smart_token_hash});
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
});
</script>          