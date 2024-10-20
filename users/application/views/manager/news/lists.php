 <section class="">
    <?php
		for($i=0;$i<count($arr);$i++)
		{
	?>
    
    						<a href="<?=$arr[$i]['link']?>" target="_blank" class="d-flex py-1" >
                                
                                <div class="align-self-center ps-1">
                                    <h5 class="pt-1 mb-n1"><?=$arr[$i]['title']?></h5>
                                    <p class="mb-0 font-18 opacity-70"><?=preg_replace("/<img[^>]+\>/i", " ", $arr[$i]['description']); ?> </p>
                                    <p class="mb-0 font-15 opacity-70"><?=isset($arr[$i]['pubDate'])?$arr[$i]['pubDate']:""?></p>
                                </div>
                                <div class="align-self-center ms-auto text-end">
                                    <h4 class="pt-1 mb-n1 color-blue-dark"></h4>
                                    <p class="mb-0 font-11"> </p>
                                </div>
                            </a>
     
    <?php
		}
	?>
  </section>
  <?php
  $mobile = $this->agent->is_mobile();
 
  ?>
  