<?php
$mobile = $this->agent->is_mobile(); 
$colx = "col-xxl-10 col-xl-10";
if($mobile)
{
	$colx = "";
}
?>
<div class="row">
      
	
    <div class="<?=$colx?>">
    	    <div class="mobile_on  ">
                     	 
                            <?php
                          include __DIR__."/../chunk/ads.php";
						  ?>
                 </div>
            <!-- -->
            <div class="polx">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-header">
                                <div class="card-title">
                                    Community
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="grid"></div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- -->
         
    </div>
    <div class="col-xxl-2 col-xl-2 mobile_off">
    	   <?php
           include __DIR__."/../chunk/ads_side.php";
		   ?>
    </div>
      
</div> 
<style type="text/css">
.polx {
    padding-left: 2%;
}
</style>
<link rel="stylesheet" href="assets/libs/gridjs/theme/mermaid.min.css">
<script src="assets/libs/gridjs/gridjs.umd.js"></script>

<script>
 var grid;
 $(function()
 { 
	new gridjs.Grid({
       pagination: {
		limit: 50
	  },
        search: true,
        sort: true,
        fixedHeader: true,
        height: '500px',
        columns: [{
            name: "ID",
            width: "150px",
			formatter: (_, row) => gridjs.html("#"+ row.cells[0].data)
        }, {
            name: "Image",
            width: "150px",
			formatter: (_, row) => gridjs.html(row.cells[1].data)
        },{
            name: "Name",
            width: "150px"
			 
        }, {
            name: "Telegram",
            width: "200px",
			formatter: (_, row) => gridjs.html("<a href='"+ row.cells[3].data +"' style='color:yellow;' target='_blank'>"+ row.cells[3].data +"</a>")
        }, {
            name: "PIC",
            width: "150px",
        }, {
            name: "Member",
            width: "100px",
        }],
		server: {
		url: '<?=site_url("community/getlist")?>',
		then: data => data.data.map(card => [card.id, card.images, card.name,card.telegram, card.pic, card.member])
	  }
    }).render(document.getElementById("grid"));	
 }); 	 
	
 </script>   
 