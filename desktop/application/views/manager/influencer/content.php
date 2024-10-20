 <?php
		for($i=0;$i<count($arr);$i++)
		{
			$urly = "https://www.youtube.com/watch?v=";
			
			$snippet = $arr[$i]['snippet']; 
			$dd = preg_replace("/<img[^>]+\>/i", " ", $snippet['description']);
			$viewcount = you_view($arr[$i]['id']['videoId']);
			$datajson = json_decode($viewcount,true);
			 
			 if(isset($datajson['items'][0]['statistics']))
			 {
				$statistics =  $datajson['items'][0]['statistics'];
				if(isset($statistics['viewCount']))
				{
	?>
    		<tr>
            	 
                <td>
    						<iframe width="100%" height="220" src="https://www.youtube.com/embed/<?=$arr[$i]['id']['videoId']?>" title=<?=$snippet['title']?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    						 <p > 
                                 		<span><i class="fa fa-eye"></i> <?=number_format($statistics['viewCount'],0)?></span>
                                        <span><i class="fa fa-thumbs-up"></i> <?=number_format($statistics['likeCount'],0)?></span>
                                        
                                 </p>
                            <a href="<?=$urly."".$arr[$i]['id']['videoId']?>" target="_blank"  class="d-flex py-1" >
                                
                                <div class="align-self-center ps-1">
                                    <h6 class="pt-1 mb-n1 juduls"><?=$snippet['title']?></h6>
                                    <?php
									if(!is_array($dd))
									{
									?>
                                    <p class="mb-0 font-18 opacity-70"><?=$dd?> </p>
                                    <?php
                                    }else
									{
									?>
                                    <p class="mb-0 font-18 opacity-70"></p>
                                    <?php
									}
									?>
                                 <?php
								 /*
								 
                                 <p > 
                                 		<span><i class="fa fa-eye"></i> <?=$statistics['viewCount']?></span>
                                        <span><i class="fa fa-thumbs-up"></i> <?=$statistics['likeCount']?></span>
                                        
                                 </p>
								 */
								 ?>
                                    
                                    
                                   
                                </div>
                                <div class="align-self-center ms-auto text-end">
                                    <p class="mb-0 font-15 opacity-70"> 
                                    <span   target="_blank" style="float:right;"><?=$names?></span>
                                    </p>
                                   
                                </div>
                                
                                
                            </a>
                             
                 </td>           
             </tr>               
     
    <?php
				}
			 }
		}
	?>