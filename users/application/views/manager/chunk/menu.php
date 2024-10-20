	<div id="footer-bar" class="footer-bar-1 footer-bar-detached">
        
        
        
        <?php
		 
		$active = "";
		if($class=="event")
		{
			$active = "circle-nav-2 scale-box";
		}
		?>
        <a href="<?=site_url("event")?>" class="<?=$active?>"><i class="bi bi-calendar-event"></i><span><?=custom_language('Ticket')?></span></a>
		
		<?php
		 
		$active = "";
		if($class=="home")
		{
			$active = "circle-nav-2 scale-box";
		}
		?>
        <a href="<?=site_url("home")?>" class="<?=$active?>"><i class="bi bi-house"></i><span><?=custom_language('Home')?></span></a>
		
		
        <?php
         
		$active = "";
		if($class=="activity")
		{
			$active = "circle-nav-2 scale-box";
		}
		?>
        <a href="<?=site_url("activity")?>?active=wd" class="<?=$active?>"><i class="bi bi-graph-up"></i><span><?=custom_language('Activity')?></span></a>
         <?php
		/*$active = "";
		if($class=="payment")
		{
			$active = "circle-nav-2 scale-box";
		}
		?>
        <a href="<?=site_url("payment")?>" class="<?=$active?>"><i class="bi bi-receipt"></i><span><?=custom_language('Payments')?></span></a>
         <?php
		*/
		?>
        <?php
		 
			$active = "";
			if($class=="leaderboard")
			{
				$active = "circle-nav-2 scale-box";
			}
			?>
			<a href="<?=site_url("leaderboard")?>" class="<?=$active?>"><i class="bi bi-people"></i><span><?=custom_language('Leaderboard')?></span></a>
        
    </div>