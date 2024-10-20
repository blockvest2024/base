<link rel="stylesheet" type="text/css" href="assets/plugins/slick/slick.css?v2022">
<link rel="stylesheet" type="text/css" href="assets/plugins/slick/slick-theme.css?v2022">
<script src="assets/plugins/slick/slick.js?v2022" type="text/javascript" charset="utf-8"></script>
<?php
$avatar = "assets/images/pictures/31t.jpg";
if(!empty(user_info('avatar')))
{
	$avatar = "uploads/".user_info('avatar');
}
 
?>
	<div class="content my-0 mt-n2 px-1">
            <div class="d-flex">
                <div class="align-self-center">
                    <h3 class="font-16 mb-2"><?=custom_language('Claim Event')?> </h3>
                </div>
                <div class="align-self-center ms-auto">
                </div>
            </div>
        </div>
	<div class="card card-style card-small">
            <div class="content">
                 <!-- -->
                	 <div class="row">
                            <div class="col-12" >
                                <center>
                                     <span><i class="">Tunjukkan dan scan oleh partner Event</i></span>
                                     <br/><br/>
                                     <div id="qrcodes" style="width:400px; background:"></div>
                                     
                               </center>     
                               <hr/>
                            </div>
                            <div class="col-12">
                                <table class="table">
                                	<tbody>
                                    	<tr>
                                        	 
                                            <th colspan="2" align="center" valign="middle" class="text-center"><?=$event['title']?></th>
                                        </tr>
                                        <tr>
                                        	 
                                            <td colspan="2" align="center" valign="middle" class="text-center"><?=$event['description']?></td>
                                        </tr>
                                        <tr>
                                        	<th width="20%">No Tiket</th>
                                            <td><?=$data['pid']?></td>
                                             
                                        </tr>
                                        <tr>
                                        	<th width="20%">Partner</th>
                                            <td><?=$partner['full_name']?></td>
                                             
                                        </tr>
                                        <tr>
                                        	<th width="20%">Lokasi</th>
                                            <td><?=$event['address']?></td>
                                             
                                        </tr>
                                         <tr>
                                        	<th width="20%">Tanggal</th>
                                            <td><?=date('d/m/Y H:i',strtotime($event['start_date']))?> - <?=date('d/m/Y H:i',strtotime($event['end_date']))?></td>
                                             
                                        </tr>
                                        
                                    </tbody>
                                </table>
                                 <a href="<?=site_url("home")?>" class="btn btn-primary btn-sm btn-xs btn-lg btn-full">Kembali Ke Dashboard</a>   
                            </div>
                       </div>      
                    	
                        
                 <!-- -->
            </div>
        </div>
  
  
  <script>
   $(function()
	{
    	new QRCode(document.getElementById("qrcodes"), '<?=$data['pid']?>');
	});
	
 </script> 
 <style type="text/css">
 .card.card-style.card-small {
    
    width: 50%;
    left: 25%;
}
	@media only screen and (max-width: 800px) {
		.card.card-style.card-small {
    
			width: 94%;
			left: 0%;
		}
		#qrcodes
		{
			width:auto !important;	
		}
	}
 </style>
 
 
    
 
       
      