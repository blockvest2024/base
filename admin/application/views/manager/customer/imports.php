<div class="row">
	<div class="col-md-12">
    	<!-- Dynamic Table Full -->
        <form action="" method="post" id="frm-object">
        	<div class="card">
            	<div class="card-header">
                	 Form Import <small><?=strtoupper($class)?></small> 
                </div>
                <div class="card-body">
                	 
                     <div class="form-group">
                    	<label>File</label>
                        <div class="input-group">
                          <input type="text" class="form-control required" name="img-container" placeholder="File xls,xlsx" id="img-container">
                          <span class="input-group-btn">
                          	<input type="file" class="hide" style="display:none" id="image" name="image"  />
                            <button class="btn btn-secondary" type="button" id="btn-upload"><i class="fa fa-upload"></i></button>
                          </span>
                        </div>
                        
                     </div>
                     <br/>
                     <div class="form-group">
                     <input type="hidden" name="id" id="id" >
                      
                      
                     <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                     <button type="button" class="btn btn-default" id="btn-reset"><i class="fa fa-refresh"></i> Reset</button>
                     </div>
                 </div>
            </div>
         </form>
         <!-- END Dynamic Table Full -->
    </div>
   
     
</div>
<script>
var table_ajax;
var BaseTableDatatables = function() {
    // Init full DataTable, for more examples you can check out https://www.datatables.net/
    var initDataTableFull = function() {
        table_ajax = $('.js-dataTable-full').dataTable({
			paging:false,
			"ordering": false,
			"processing": true, 
			"autoWidth": false,
			"ajax": {
					url :"<?=site_url('banner/getlist')?>",
					type : "GET",
					data : function(d){
						 
					}
			 },
			columnDefs: [ 
			{ orderable: false, searchable:false, targets: [ 4,5 ],className:'text-center',width:'100px' },
			{ orderable: false,visible:false, searchable:false, targets: [ 0 ],className:'text-center',width:'100px' },
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
			'img-container':{
				extension:"xls|xlsx"
			}
		},
		messages:{
			'img-container':{
				extension : "Extenstion file invalid (eq : xls, xlsx)"
			}
		},
		submitHandler:function(){
			var formdata = new FormData($("#frm-object")[0]);
			var req = postFile('<?=site_url('customer/save_imports')?>',formdata);
			req.done(function(out){
				document.location.href="<?=site_url('customer')?>";
			});
			return false;
		}
	});
	$('body').tooltip({selector: '[data-toggle="tooltip"]'});
	 
	$("#chk-all").on('click',function(){
		var chk = $(this).is(':checked');
		$(".js-dataTable-full").find(".chk-item").prop('checked',chk);
	});
	$("#btn-upload").on('click',function(){
		$("#image").trigger('click');
	});
	$("#image").on('change',function(){
		$("#img-container").val($(this).val());
	});
	 
});
</script>