	<div class="row">
               <div class="col-xl-12">
                  <div class="breadcrumb__wrapper mb-35">
                     <div class="breadcrumb__inner">
                        <div class="breadcrumb__icon">
                           <i class="flaticon-home"></i>
                        </div>
                        <div class="breadcrumb__menu">
                           <nav>
                              <ul>
                              <li><span><a href="<?=site_url("event")?>">Event</a></span></li>
                                 <li class="active"><span>Result Scan</span></li>
                              </ul>
                           </nav>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="event__details-area">
               <div class="row">
                  <div class="col-xxl-12 col-xl-12">
                     <div class="event__details-left">
                        <div class="body__card-wrapper mb-20">
                           <div class="card__header-top">
                              <div class="card__title-inner">
                                 <h4 class="event__information-title">No Ticket <?=strtoupper($data['pid'])?></h4>
                              </div>
                              <div class="card__header-dropdown">
                                	
                              </div>
                           </div>
                           <div class="review__main-wrapper pt-25">
                                <!-- -->
                                
                                <table class="table">
                                	<tbody>
                                    	<tr>
                                        	 
                                            <th colspan="2" align="center" valign="middle" class="text-center"><?=$event['title']?></th>
                                        </tr>
                                        <tr>
                                        	 
                                            <td colspan="2" align="center" valign="middle" class="text-center"><?=$event['description']?></td>
                                        </tr>
                                         
                                        <tr>
                                        	<th width="20%">Customer</th>
                                            <td><?=$customer['name']?></td>
                                        </tr>
                                        <tr>
                                        	<th width="20%">Customer Phone</th>
                                            <td><?=$customer['telp']?></td>
                                        </tr>
                                        <tr>
                                        	<th width="20%">Customer Date Claim </th>
                                            <td><?=date('d/m/Y H:i',strtotime($data['tgl']))?> </td>
                                        </tr>
                                        <tr>
                                        	<th width="20%">Address</th>
                                            <td><?=$event['address']?></td>
                                             
                                        </tr>
                                         <tr>
                                        	<th width="20%">Date Event</th>
                                            <td><?=date('d/m/Y H:i',strtotime($event['start_date']))?> - <?=date('d/m/Y H:i',strtotime($event['end_date']))?></td>
                                             
                                        </tr>
                                        <tr>
                                        	<th width="20%">Reward Token</th>
                                            <td><?=$data['price']?> <?=setting('coin_name')?></td>
                                             
                                        </tr>
                                        <tr>
                                        	<th width="20%">Info</th>
                                            <td><a href="<?=$data['network_url']?>/tx/<?=$data['txhash']?>" target="_blank"><?=$data['txhash']?></a></td>
                                             
                                        </tr>
                                        
                                    </tbody>
                                </table>
                                 <a href="<?=site_url("event-seat")?>" class="btn btn-primary btn-sm btn-xs btn-lg btn-full">View History</a>   
                                <!-- -->
							 
                           </div>
                        </div>
                     </div>
                  </div>
                  
               </div>
            </div>
  s