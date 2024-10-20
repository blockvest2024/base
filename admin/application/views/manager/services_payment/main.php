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
                                        <label>Services Type</label>
                                        <select name="id_services_type" id="id_services_type" class="form-control required select2">
                                           <option value=""></option>
										   <?php
										   	for($i=0;$i<count($arr);$i++)
											{
										   ?>
                                           		<option value="<?=$arr[$i]['id']?>"><?=$arr[$i]['name']?></option>
                                           <?php
											}
										   ?>
                                        </select>
                                    </div>
                                     <div class="form-group">
                                        <label>Services Sub</label>
                                        <select name="id_services_subtype" id="id_services_subtype" class="form-control required select2">
                                           
                                        </select>
                                    </div>
                                     <div class="form-group">
                                        <label>Name</label>
                                       <input type="text" class="form-control required" name="name" id="name" placeholder="Name" value="" />
                                    </div>
                                    <div class="form-group">
                                        <label>Price(ETH)</label>
                                       <input type="number" class="form-control required" name="prices" id="prices" placeholder="Price" value="0.002"  pattern="[0-9]+([\.,][0-9]+)?"  />
                                    </div>
                                     
                                     <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" id="description"  class="form-control"><?=isset($data['description'])?$data['description']:""?></textarea>
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
                        <div class="card-body">
                        	  <form action="javascript:void(0);" method="post" id="frm-mb">
                                 <div class="form-group">
                                       <label>Services Type</label>
                                         <div class="input-group">
                                            <select name="id_services_type" id="id_services_typex" class="form-control required select2">
											   <?php
                                                for($i=0;$i<count($arr);$i++)
                                                {
                                               ?>
                                                    <option value="<?=$arr[$i]['id']?>"><?=$arr[$i]['name']?></option>
                                               <?php
                                                }
                                               ?>
                                            </select>
                                          <span class="input-group-btn">
                                            <button type="submit" class="btn btn-default btn-mini btn-sm btn-primary"><i class="fa fa-search"></i></button>
                                          </span>
                                        </div>
                                       
                                  </div>
                                    
                              </form>
                              <hr/>
                        	 <div class="col-12 table-responsive">	 
                              <table class="table table-bordered table-striped js-dataTable-full">
                                <thead>
                                    <tr>
                                        
                                        <th class="hidden-xs" style="width: 25%;">Services Type</th>
                                        <th class="hidden-xs" style="width: 25%;">Services Sub</th>
                                        <th class="hidden-xs" style="width: 35%;">Name</th>
                                        <th class="hidden-xs" style="width: 15%;">Price(Eth) </th>
                                        <th class="hidden-xs" style="width: 25%;">Description</th>
                                        <th class="text-center" style="width: 10%;">Actions</th>
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
					url :"<?=site_url('services-payment/getlist')?>",
					type : "GET",
					data : function(d){
						 d.id_services_type = $("#frm-mb #id_services_typex").val();
					}
			 },
			columnDefs: [ 
			{ orderable: false, width:'80px', targets:[2]}, 
			 
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
var selecteds_childs = '';
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
			var req = postFile('<?=site_url('services-payment/save')?>',obj);
			req.done(function(out){
				if(!out.error)
				{
					table_ajax.api().ajax.reload();
					smart_success_box(out.message,'#frm-object');
					$("#btn-reset").trigger('click');
					$("#frm-object")[0].reset;
					$("#id_services_type").select2("val", "");
					$("#id_services_subtype").select2('destroy').select2({
					placeholder: "Please select"
					
					});
					$("#id_services_subtype").select2("val", "");
					$("#frm-object").find("id").val("");
					$("#description").val("");
					CKEDITOR.instances["description"].setData("");
					
					
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
			var req = post('<?=site_url('services-payment/match')?>',{id:ids,'<?=$this->security->get_csrf_token_name()?>':smart_token_hash});
			req.done(function(out){
				if(!out.error)
				{
					var idser = out.data.id_services_type;
					selecteds_childs = idser;
					$("#id").val(out.data.id);
					
					
					$("#name").val(out.data.name);
					$("#prices").val(out.data.prices);
					$("#description").val(out.data.description);
					CKEDITOR.instances["description"].setData(out.data.description);
					$("#id_services_type").val(idser).trigger('change');
					
					//getchilds(idser);
					setTimeout(function()
					{
						 
						$("#id_services_subtype").val(out.data.id_services_subtype).trigger('change');
						update_ckeditor();
					},600);
					
					 
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
						var req = post('<?=site_url('services-payment/delete')?>',{id:ids,'<?=$this->security->get_csrf_token_name()?>':smart_token_hash});
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
						var req = post('<?=site_url('services-payment/delete')?>',{id:ids,'<?=$this->security->get_csrf_token_name()?>':smart_token_hash});
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
						var req = post('<?=site_url('services-payment/delete-logo')?>',{id:ids,'<?=$this->security->get_csrf_token_name()?>':smart_token_hash});
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
	$(".js-dataTable-full").on('click','.btn-checked',function(){
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
						var req = post('<?=site_url('services-payment/displays')?>',{id:ids,"displays":checks,'<?=$this->security->get_csrf_token_name()?>':smart_token_hash});
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
	$(".js-dataTable-full").on('click','.btn-check',function(){
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
						var req = post('<?=site_url('services-payment/displays')?>',{id:ids,"displays":checks,'<?=$this->security->get_csrf_token_name()?>':smart_token_hash});
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
	$("#frm-mb").validate({
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
			table_ajax.api().ajax.reload(); 
			return false;
		}
	});
	$("#id_services_type").select2({
	placeholder: "Please select"
	
	});
	$("#id_services_typex").select2();
	$("#id_services_type").change(function()
	{
		selecteds_childs = '';
		var ids = $(this).val();
		getchilds(ids);					
	});
	$("#id_services_subtype").select2({
	placeholder: "Please select"
	
	});
});

function getchilds(xids)
{
	$("#id_services_subtype").html("");
	var req = post('<?=site_url('services-subtype/childs')?>',{id:xids,'<?=$this->security->get_csrf_token_name()?>':smart_token_hash});
						req.done(function(out){
							if(!out.error)
							{
								 var xhtml = '<option value=""></option>';
								 $.each(out.data,function(keys,vals)
								 {
									 var xselects = '';
									 if(selecteds_childs==vals.id)
									 {
											xselects = 'selected="selected"'; 
									 }
									 xhtml += '<option value="'+ vals.id +'" '+ xselects +'>'+ vals.name +'</option>';
								 });
								 $("#id_services_subtype").html(xhtml);
								 $("#id_services_subtype").select2('destroy').select2({
	placeholder: "Please select"
	
	});
							}
							else
							{
								smart_error_box(out.message,'#tbl-uses');
							}
						});		
}
</script>

       
 
