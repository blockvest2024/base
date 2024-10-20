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
                                 <li class="active"><span>My Services</span></li>
                              </ul>
                           </nav>
                        </div>
                     </div>
                     <div class="breadcrumb__tab">
                         
                     </div>
                     <div class="breadcrum__button">
                        <a class="breadcrum__btn  " href="<?=site_url("services/add")?>">Create Services<i class="fa-regular fa-plus"></i></a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="event__list-area pb-20">
               <div class="event__content-inner">
                  <div class="tab-content" id="myTabContent">
                     <div class="tab-pane fade show active" id="day-tab-1-pane" role="tabpanel" aria-labelledby="day-tab-1" tabindex="0">
                        <div class="body__card-wrapper">
                           <h4 class="event__information-title mb-25">My Services Information</h4>
                           <div class="attendant__wrapper mb-35">
                              <div class="table-responsive">
                                      <table class="js-dataTable-full">
                                         <thead>
                                            <tr>
                                               <th>ID No</th>
                                               <th>Type</th>
                                               <th>Sub Type</th>
                                               <th>Services</th>
                                               
                                               <th>Tx Hash</th>
                                               <th>From Address</th>
                                               <th>Purchase Address</th>
                                               <th>Price</th>
                                               <th>Status</th>
                                               <th>Proof</th>
                                               <th>Date</th>
                                                
                                            </tr>
                                         </thead>
                                         <tbody>
                                            
                                         </tbody>
                                      </table>
                                </div>      
                           </div>
                            <div class="basic__pagination d-flex align-items-center justify-content-end">
                            	<nav> 
                                </nav> 
                            </div>
                            
                        </div>
                     </div>
                      
                  </div>
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
						url :"<?=site_url('services/getlist')?>",
						type : "GET",
						data : function(d){
							//d.id_supplier = $("#id_supplier").val();
							//d.id_category = $("#id_category").val();
							//d.id_subcategory = $("#id_subcategory").val();
						}
				 },
				columnDefs: [ 
				 
				],
				pagingType: "full_numbers",
				pageLength: 10,
				lengthMenu: [[5, 10, 15, 20], [5, 10, 15, 20]],
				language: {
					paginate: {
						previous: '<i class="fa-regular fa-arrow-left-long"></i>',
						next: '<i class="fa-regular fa-arrow-right-long"></i>',
						sFirst: '<i class="fa fa-step-backward"></i>',
      					 sLast: '<i class="fa fa-step-forward"></i>',
						 scurrent:'<span></span>'
						 
					}
				},
				 "drawCallback": function () {
					$('.dataTables_paginate > .pagination a').removeClass('page-link');
					$('.dataTables_paginate > .pagination li').removeClass('paginate_button');
					$('.dataTables_paginate > .pagination li.active a').addClass('current');
				},
				 initComplete: (settings, json)=>{
					$('.dataTables_paginate').appendTo('.basic__pagination nav');
				},
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
		 $(".js-dataTable-full").on('click','.dropdown',function(){
			 $(this).find(".dropdown-list").fadeToggle(100);
		 });
		 $(".js-dataTable-full").on('click','.btn-delete-sites',function(){
			var ids = $(this).data('ref');
			if(ids!="")
			{
				bootbox.confirm({
					title: "Delete",
					message: "Do you want to delete this.",
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
							var req = post('<?=site_url('services/delete')?>',{id:ids,'<?=$this->security->get_csrf_token_name()?>':smart_token_hash});
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
		 
	});
 </script>
 <style type="text/css">
	 .basic__pagination ul li a.current {
		width: 30px;
		height: 30px;
		display: -webkit-box;
		display: -moz-box;
		display: -ms-flexbox;
		display: -webkit-flex;
		align-items: center;
		justify-content: center;
		-webkit-border-radius: 6px;
		-moz-border-radius: 6px;
		-o-border-radius: 6px;
		-ms-border-radius: 6px;
		border-radius: 6px;
		position: relative;
		inset-inline-end: 0;
		top: 50%;
		font-weight: var(--bd-fw-sbold);
		font-size: 16px;
		background: var(--clr-gradient-4);
		overflow: hidden;
		color: var(--clr-text-primary);
		z-index: 5;
	}
 </style>           