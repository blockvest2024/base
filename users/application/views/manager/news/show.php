 <section class="vertical-center-4 regular slider">
    <?php
		for($i=0;$i<count($arr);$i++)
		{
	?>
    <div>
       <!-- -->
       <!--  -->
                                     <div class="card card-style">
                                        <div class="content padding-0 margin-0" >
                                                <div class="row padding-0 margin-0">
                                                    <div class="col-md-12 padding-0 margin-0" >
                                                        <div class="card  card-style  padding-0 margin-0" style="min-height:150px;">
                                                                
                                                             <div class="card-body  card-news" style="min-height:100px;">
                                                                <div class=" ">
                                                                    <!-- -->
                                                                     <div class="align-self-center">
                                                                         <h4 class="color-black-dark text-center" ><?=$arr[$i]['title']?></h4> 
                                                                          
                                                                     </div>
                                                                      
                                                                    
                                                                    <!-- -->
                                                                </div>
                                                                     
                                                                 <div id="descss">
                                                                 	<?=$arr[$i]['description']?> 
                                                                 </div>   
                                                                 <div class=" d-flex">
                                                                     <div class="align-self-center">
                                                                         <b class="color-black-dark"><?=$names?></b> 
                                                                          
                                                                     </div>
                                                                     <div class="align-self-center ms-auto text-end">
                                                                             <p class="mb-0 font-10"> 
                                                                                <?=isset($arr[$i]['pubDate'])?$arr[$i]['pubDate']:""?>
                                                                             </p>
                                                                         </div> 
                                                                 </div>        
                                                               <hr/>
                                                              <a href="<?=$arr[$i]['link']?>" class="btn btn-sm btn-info btn-xs btn-lg btn-full"  target="_blank" >Visit</a>
                                                             </div>
                                                        </div>
                                                    </div>     
                                                </div>
                                        </div>
                                     </div>   
       <!-- -->
    </div>
    <?php
		}
	?>
  </section>
  <?php
  $mobile = $this->agent->is_mobile();
 
  ?>
  <script type="text/javascript">
    
      
	  setTimeout(function()
	  {
		  $.each($("#descss img"),function()
		  {
			  $(this).attr("height","150");
		  		$(this).attr("width","100%");
		  });
		  
	  },200);
	  
	  setTimeout(function()
	  {
		 $(".regular").slick({
			dots: false,
			infinite: true,
			slidesToShow: <?=($mobile)?1:3?>,
			slidesToScroll: 3
		  });
		  
	  },500);
	 
   </script>
   <style type="text/css">
   .slick-prev, .slick-next
   {
		top:20%;
   }
   </style>	