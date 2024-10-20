<div class="content-wrapper">
   <div class="row">
            <div class="col-lg-12">
                    <div class="card">
                    	<div class="card-header  ">
                        	<?=$title?> Form
                        </div>
                        <div class="card-body">
                        	 <form action="" method="post" id="frm-object">
                                  <div class="col-12 ">	
                                  	<!-- -->
                                     <div class="form-group">
                                        <label>Category</label>
                                        <select name="id_world_event_category" id="id_world_event_category" class="form-control select2 required">
                                            <?php
                                            for($i=0;$i<count($world_event_category);$i++)
                                            {
                                            ?>
                                            <option value="<?=$world_event_category[$i]['id']?>"><?=$world_event_category[$i]['name']?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                     <div class="form-group">
                                        <label>Country</label>
                                        <select name="country" id="country" class="form-control select2 required">
                                            <?php
                                            for($i=0;$i<count($country);$i++)
                                            {
                                            ?>
                                            <option value="<?=$country[$i]['name']?>"><?=$country[$i]['name']?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                	<div class="form-group">
                                            <label>Image </label>
                                            <div class="input-group">
                                              <input type="text" class="form-control required" name="img-container" placeholder="Image" id="img-container">
                                              <span class="input-group-btn">
                                                <input type="file" class="hide" style="display:none" id="image" name="image"  />
                                                <button class="btn btn-secondary" type="button" id="btn-upload"><i class="fa fa-upload"></i></button>
                                              </span>
                                            </div>
                                            
                                         </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control required" name="name" id="name"> 
                                    </div>
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control " name="city" id="city"> 
                                    </div>
                                    <div class="form-group">
                                        <label>Location</label>
                                        <input type="text" class="form-control " name="location" id="location"> 
                                    </div>
                                    <div class="form-group">
                                        <label>Location Map Link</label>
                                        <input type="url" class="form-control " name="location_link" id="location_link"> 
                                    </div>
                                    <div class="form-group">
                                        <label>Entry Status</label>
                                        <select name="entry" id="entry" class="form-control select2 required">
                                            <option value="Free">Free</option>
                                            <option value="Paid">Paid</option>
                                            
                                            <option value="Invitation">Invitation</option>
                                            <option value="Private">Private</option>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Link Registration</label>
                                        <input type="url" class="form-control " name="registration_link" id="registration_link"> 
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Hosted By</label>
                                        <input type="text" class="form-control required" name="hosted" id="hosted"> 
                                    </div>
                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <input type="text" class="form-control" value="<?=date('Y-m-d')?>"  name="start_date" id="start_date"> 
                                    </div>
                                    
									<div class="form-group">
                                        <label>End Date</label>
                                        <input type="text" class="form-control" value="<?=date('Y-m-d')?>" name="end_date" id="end_date"> 
                                    </div>
                                     
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" id="description" class="form-control"></textarea>
                                    </div>
                                    
                                    
                                    <hr>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                                        <input type="hidden" name="id" id="id" />
                                       
                                        <button type="button" class="btn btn-default" id="btn-reset"><i class="fa fa-refresh"></i> Reset</button>
                                    </div>	
                                    <!-- -->
                                  </div>
                             </form> 
                         </div> 
                    </div>
             </div>
        <!-- -->
         <div class="col-md-12">
                    <div class="card">
                    	<div class="card-header ">
                        	List
                        </div>
                        <div class="card-body" >
                        	 <div class="col-12 table-responsive" >	 
                              <table class="table table-bordered table-striped js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th class="hidden-xs" style="width: 50%;">Category</th>
                                        <th class="hidden-xs" style="width: 50%;">Image</th>
                                        <th class="hidden-xs" style="width: 50%;">Name</th>
                                        <th class="hidden-xs" style="width: 50%;">Location</th>
                                        <th class="hidden-xs" style="width: 50%;">City</th>
                                        <th class="hidden-xs" style="width: 10%;">Country</th>  
                                        <th class="hidden-xs" style="width: 10%;">Entry Status</th>
                                        <th class="hidden-xs" style="width: 10%;">Hosted By</th>
                                        
                                        <th class="hidden-xs" style="width: 10%;">Display</th> 
                                        <th class="text-center" style="width: 20%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>	
                            </div>
                        </div>
                     </div>
         </div>               
        <!-- -->     
    </div>
</div>                 
<script>
var table_ajax;
var BaseTableDatatables = function() {
    // Init full DataTable, for more examples you can check out https://www.datatables.net/
    var initDataTableFull = function() {
        table_ajax = $('.js-dataTable-full').dataTable({
			order:[],
			"processing": true, 
			"autoWidth": false,
			"serverSide": true, 
			"ajax": {
					url :"<?=site_url('world_event/getlist')?>",
					type : "GET",
					data : function(d){
						//d.id_supplier = $("#id_supplier").val();
						//d.id_category = $("#id_category").val();
						//d.id_subcategory = $("#id_subcategory").val();
					}
			 },
			columnDefs: [ 
			{ orderable: false, width:'80px', targets:[2]}, 
			{ orderable: false, visible:false, width:'80px', targets:[0]},
			],
			pagingType: "full_numbers",
            pageLength: 10,
            lengthMenu: [[5, 10, 15, 20], [5, 10, 15, 20]]
        });
    };

     

    return {
        init: function() {
            // Init Datatables
           
            initDataTableFull();
        }
    };
}();

// Initialize when page loads
$(document).ready(function(){
	BaseTableDatatables.init();
	CKEDITOR.replace("description",ck_conf);  
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
		rules:{
			sites_logo_s:{
				extension:"jpg|png"
			}
		},
		submitHandler:function(){
			update_ckeditor();
			var obj = new FormData($("#frm-object")[0]);
			var req = postFile('<?=site_url('world_event/save')?>',obj);
			req.done(function(out){
				if(!out.error)
				{
					table_ajax.api().ajax.reload();
					smart_success_box(out.message,'#frm-object');
					document.location.href=window.location;
					//$("#btn-reset").trigger('click');
					
				}
				else
				{
					smart_error_box(out.message,'#frm-object');
				}
			});
			return false;
		}
	});
	$('body').tooltip({selector: '[data-toggle="tooltip"]'});
	$(".js-dataTable-full").on('click','.btn-edit-sites',function(){
		var ids = $(this).data('ref');
		if(ids!="")
		{
			var req = post('<?=site_url('world_event/match')?>',{id:ids,'<?=$this->security->get_csrf_token_name()?>':smart_token_hash});
			req.done(function(out){
				if(!out.error)
				{
					$("#id").val(out.data.id);
					$("#name").val(out.data.name);
					$("#country").val(out.data.country);
					$("#city").val(out.data.city);
					$("#location").val(out.data.location);
					$("#start_date").val(out.data.start_date);
					$("#description").val(out.data.description);
					// add
					$("#location_link").val(out.data.location_link);
					$("#entry").val(out.data.entry).trigger("change");
					$("#registration_link").val(out.data.registration_link);
					// end add
					CKEDITOR.instances['description'].setData(out.data.description);

					$("#hosted").val(out.data.hosted);
					 
					$("#img-container").val(out.data.image);
					$("#id_world_event_category").val(out.data.id_world_event_category).trigger('change');
					
					$("#end_date").val(out.data.end_date);
					 
				}
				else
				{
					smart_error_box(out.message,'#frm-object .block-content');
				}
			});
		}
	});
	$(".js-dataTable-full").on('click','.btn-delete-sites',function(){
		var ids = $(this).data('ref');
		if(ids!="")
		{
			bootbox.confirm({
				title: "Delete data?",
				message: "Do you want to delete this data.",
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
						var req = post('<?=site_url('world_event/delete')?>',{id:ids,'<?=$this->security->get_csrf_token_name()?>':smart_token_hash});
						req.done(function(out){
							if(!out.error)
							{
								table_ajax.api().ajax.reload();
								smart_success_box(out.message,'#tbl-uses');
								document.location.href=window.location;
							}
							else
							{
								smart_error_box(out.message,'#tbl-uses');
							}
						});		
					}
				}
			});
		}
	});
	$("#btn-reset").on('click',function(){
		$("#frm-object")[0].reset();
		reloadToken();
		$("#container-logo").text('');
		$("#close_order").val(1).trigger('change');
		$("#id").val('');
	});
	$("#btn-delete-all").on('click',function(){
		var ids = new Array();
		$(".js-dataTable-full").find(".chk-item").each(function(key,val){
			if($(this).is(':checked'))
			ids.push($(this).val());
		});
		if(ids.length>0)
		{
			bootbox.confirm({
				title: "Delete data?",
				message: "Do you want to delete this data.",
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
						var req = post('<?=site_url('world_event/delete')?>',{id:ids,'<?=$this->security->get_csrf_token_name()?>':smart_token_hash});
						req.done(function(out){
							if(!out.error)
							{
								table_ajax.api().ajax.reload();
								smart_success_box(out.message,'#tbl-uses');
							}
							else
							{
								smart_error_box(out.message,'#tbl-uses');
							}
						});		
					}
				}
			});
		}
	});
	$("#frm-object").on('click','#btn-delete-logo',function(){
		var ids = $(this).data('ref');
		if(ids!="")
		{
			bootbox.confirm({
				title: "Delete data logo?",
				message: "Do you want to delete this Image.",
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
						var req = post('<?=site_url('world_event/delete-logo')?>',{id:ids,'<?=$this->security->get_csrf_token_name()?>':smart_token_hash});
						req.done(function(out){
							if(!out.error)
							{
								table_ajax.api().ajax.reload();
								$("#container-logo").text('');
								smart_success_box(out.message,'#tbl-uses');
							}
							else
							{
								smart_error_box(out.message,'#tbl-uses');
							}
						});		
					}
				}
			});
		}
		return false;
	});
	$("#close_order").select2();
	$(".js-dataTable-full").on('click','.btn-checks',function(){
		var ids = $(this).data('ref');
		var checks = $(this).data('check');
		if(ids!="")
		{
			bootbox.confirm({
				title: "Display ?",
				message: "Do you want to .",
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
						var req = post('<?=site_url('world_event/displays')?>',{id:ids,"displays":checks,'<?=$this->security->get_csrf_token_name()?>':smart_token_hash});
						req.done(function(out){
							if(!out.error)
							{
								table_ajax.api().ajax.reload();
								smart_success_box(out.message,'#tbl-uses');
								document.location.href=window.location;
							}
							else
							{
								smart_error_box(out.message,'#tbl-uses');
							}
						});		
					}
				}
			});
		}
	});
	 
	$("#id_world_event_category").select2(); 
	$("#entry").select2(); 
	$("#country").select2();
	$("#btn-upload").on('click',function(){
		$("#image").trigger('click');
	});
	$("#image").on('change',function(){
		$("#img-container").val($(this).val());
	}); 
	$("#start_date").datepicker({format:"yyyy-mm-dd"}); 
	$("#end_date").datepicker({format:"yyyy-mm-dd"}); 
});
</script>

       
 
