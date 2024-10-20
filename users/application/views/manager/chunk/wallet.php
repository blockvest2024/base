<div class="card card-style bg-light sswallt">  
       	<div class="content my-2">
           
                <h4 ><?=custom_language("Balance")?> </h4>
                <?php
					$bal = floatval(user_balance('balance'));
					$bals = $bal;
					$bal += floatval(user_balance('buy_nopromo'));
					$pricex = setting('price_coin');
					$totalp = ($pricex>0 && $bal>0)? $bal/$pricex:0;
					$totalp = number_format($totalp,4);
					
					$coinx = floatval(user_balance('buy_coin'));
					$price_coinx = $coinx * floatval(setting('coin_exc'));
				?>
                <div class="content my-2 text-black" >
                     <table class="table color-black">
                     	<tr class="a-link" href="<?=site_url("activity/logs")?>" style="cursor:pointer;">
                        	 
                            <td width="8%"><h3><?=number_format($bals,2)?></h3></td>
                            <td><h3> <?=setting('coin_name');?></h3></td>
                           
                        </tr>
                         
                       
                        
                     </table>
                     
                  </div>
          </div>
       </div> 
 <style type="text/css">
 .sswallt h4, .sswallt h3, .sswallt p, .sswallt strong
 {
	color:#333 !important; 
 }
 
 </style>      