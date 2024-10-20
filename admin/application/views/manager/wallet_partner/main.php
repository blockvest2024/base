<div class="row">
	 
    <div class="col-md-12">
    	<div class="card">
        	<div class="card-header">
               List
            </div>
            <div class="card-body" id="tbl-uses">
                <div class="col-12 table-responsive">		
                    <table class="table table-bordered table-striped js-dataTable-full">
                        <thead>
                            <tr>
                                <th class="text-center"><input type="checkbox" id="chk-all" /></th>
                                <th class="">Partner Info</th>
                                <th class="">Network</th>
                                <th class="">Wallet Address</th>
                                <th class="">Private Key</th>
                                  
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div> 
            </div>
        </div>
    </div>
</div>
<!-- modal reset pass -->
<div id="modalstatus" class="modal fade" role="dialog">
  <div class="modal-dialog">
	<form action="" method="post" id="frm-status">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" data-bs-dismiss="modal">&times;</button>
        <h4 class="modal-title">Form Key</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
        	<label>Status</label>
            <select name="status" id="status" class="form-control status_pay">
            	 <option value="0">Closed</option>
                 <option value="1">Open</option>
            </select>
        </div>
        <div class="form-group proof hidden">
        	<label>Password Key</label>
            <input type="password" name="key" id="key" class="form-control" />
        </div>
         
         
      </div>
      <div class="modal-footer">
      	<input type="hidden" name="id" value="" id="id" />
        <!--
        <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash();?>" class="smart-token">
        -->
      	<button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-default close" data-dismiss="modal" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
	</form>
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
					url :"<?=site_url('wallet-partner/getlist')?>",
					type : "GET",
					data : function(d){
						//d.id_supplier = $("#id_supplier").val();
						//d.id_category = $("#id_category").val();
						//d.id_subcategory = $("#id_subcategory").val();
					}
			 },
			columnDefs: [ 
			{ orderable: false, searchable:false,visible:false, targets: [ 0 ],className:'text-center',width:'50px' },
			
			{ orderable: false, searchable:false, targets: [ 0,3 ],className:'text-left' },
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
	 
	 
	$("#frm-status").validate({
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
			var req = post('<?=site_url('wallet-partner/status')?>',$("#frm-status").serialize());
			req.done(function(out){
				if(!out.error)
				{
					table_ajax.api().ajax.reload();
					smart_success_box(out.message,'#frm-reset .modal-body');
					$("#modalstatus").modal('hide');
				}
				else
				{
					smart_message(out.message,'#frm-reset .modal-body');
				}
			});
			return false;
		}
	});
	$(".js-dataTable-full").on('click','.btn-status',function(){
		var ids = $(this).data('ref');
		if(ids!="")
		{
			$("#modalstatus").find("#id").val(ids);
			$("#modalstatus").modal('show');
		}
	});
	$("#modalstatus #status").click(function()
	{
		$(".proof").addClass("hidden");
		var ids = $(this).val();
		if(ids==1)
		{
			$(".proof").removeClass("hidden"); 
			$("#proof").val(""); 
		}
	});
});
</script>