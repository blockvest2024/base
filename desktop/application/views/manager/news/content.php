 <?php
		for($i=0;$i<count($arr);$i++)
		{
			$dd = preg_replace("/<img[^>]+\>/i", " ", $arr[$i]['description']);
	?>
    		<tr>
            	<td width="10%">
                	<p class="mb-0 font-15 opacity-70"><?=isset($arr[$i]['pubDate'])?time_elapsed_string(date('Y-m-d H:i:s',strtotime($arr[$i]['pubDate']))):""?>
                                   
                                    </p>
                </td>
                <td>
    
    						<a href="<?=$arr[$i]['link']?>" target="_blank"  class="d-flex py-1" >
                                
                                <div class="align-self-center ps-1">
                                    <h6 class="pt-1 mb-n1 juduls"><?=$arr[$i]['title']?></h6>
                                    <?php
									if(!is_array($dd))
									{
									?>
                                    <p class="mb-0 font-18 opacity-70"><?=(strlen($dd)>300)?substr($dd,0,300)."..":$dd; ?> </p>
                                    <?php
                                    }else
									{
									?>
                                    <p class="mb-0 font-18 opacity-70"></p>
                                    <?php
									}
									?>
                                    <p class="mb-0 font-15 opacity-70 mobile_on"> 
                                    <b   target="_blank" style="float:right;"><?=$names?></b>
                                    </p>
                                    
                                    <p class="mb-0 font-15 opacity-70 mobile_off"> 
                                    	<b   target="_blank" style="float:right;"><?=$names?></b>
                                    </p>
                                </div>
                                <?php
								/*
                                <div class="align-self-center ms-auto text-end mobile_off">
                                     <p class="mb-0 font-15 opacity-70 mobile_off"> 
                                    <b   target="_blank" style="float:right;"><?=$names?></b>
                                    </p>
                                </div>
                                */
								?>
                            </a>
                             
                 </td>           
             </tr>               
     
    <?php
		}
	?>