
<!-- app-header -->
         <header class="app-header">

            <!-- Start::main-header-container -->
            <div class="main-header-container container-fluid">

                <!-- Start::header-content-left -->
                <div class="header-content-left">

                    <!-- Start::header-element -->
                    <?php
						include __DIR__."/../chunk/logo.php";						
					?>
                    
                    
                     <div class="header-element">
                         <div class="header-element">
                            <!-- Start::header-link|dropdown-toggle -->
                             <select class="form-select rounded-pillx" id="medias" aria-label="Default select example">
                                <?php
								for($i=0;$i<count($arr);$i++)
								{
									$selected = "";
									if($i==0)
									{
										$selected = "selected='selected'";
									}
								?>
                                	<option value="<?=$arr[$i]['id']?>" <?=$selected?>><?=strtoupper($arr[$i]['channel_name'])?></option>
								<?php
								}
								?>
                            </select>
                        </div>  
                    </div>
                    
                    
                </div>
                <!-- End::header-content-left -->

                <!-- Start::header-content-right -->
                <div class="header-content-right">

                    

                    <?php
						//include __DIR__."/../chunk/static.php";
						if(!empty(user_info('id')))
						{
							include __DIR__."/../chunk/profile.php";
						}
					?>

                    

                    <!-- Start::header-element -->
                  
                    
                </div>
                <!-- End::header-content-right -->

            </div>
            <!-- End::main-header-container -->

        </header>
        <!-- /app-header -->