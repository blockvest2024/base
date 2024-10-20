 <?php
		for($i=0;$i<count($arr);$i++)
		{
	?>
    		<tr>
            	<td width="10%">
                	<p class="mb-0 font-15 opacity-70"><?=isset($arr[$i]['pubDate'])?time_elapsed_string(date('Y-m-d H:i:s',strtotime($arr[$i]['pubDate']))):""?>
                                   
                                    </p>
                </td>
                <td>
    
    						<a href="<?=$arr[$i]['link']?>" target="_blank"  class="d-flex py-1" >
                                
                                <div class="align-self-center ps-1">
                                    <h6 class="pt-1 mb-n1"><?=$arr[$i]['title']?></h6>
                                    <p class="mb-0 font-18 opacity-70"><?=substr(preg_replace("/<img[^>]+\>/i", " ", $arr[$i]['description']),0,300); ?> </p>
                                    <p class="mb-0 font-15 opacity-70"> 
                                    <span   target="_blank" style="float:right;"><?=$names?></span>
                                    </p>
                                    
                                   
                                </div>
                                <div class="align-self-center ms-auto text-end">
                                    <h4 class="pt-1 mb-n1 color-blue-dark"></h4>
                                    <p class="mb-0 font-11"> </p>
                                </div>
                                
                            </a>
                             
                 </td>           
             </tr>               
     
    <?php
		}
	?>