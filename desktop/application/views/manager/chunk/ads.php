<?php
$mobile = $this->agent->is_mobile(); 
if($mobile)
{
?>
<div class="x-add">
<script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/coinMarquee.js"></script><div id="coinmarketcap-widget-marquee" coins="1,1027,1839,52,2010,74,5426,1958,6636,2,5994,1975,5805,3897,7083" currency="IDR" theme="dark" transparent="true" show-symbol-logo="true"></div>
</div>  
<div class="x-add">

<!--<a href="https://www.cgmdminer.com/?reference=651CFA8C1C9C3" target="_blank"> 
<img src="<?=config_item('main_site')?>uploads/banner.jpg" />
</a>
-->
<a href="https://user.sospawn.com/login.html" target="_blank"> 
	<img src="<?=config_item('main_site')?>uploads/frames_2.jpg" />
</a>

</div>  

<?php
}
?>                         