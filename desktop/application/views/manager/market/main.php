<?php
$mobile = $this->agent->is_mobile(); 
$colx = "col-xl-10";
if($mobile)
{
	$colx = "col-xl-12";
}
?>
<div class="row">
     <div class="<?=$colx?>">
            <div class="tradingview-widget-container">
              <div class="tradingview-widget-container__widget"></div>
              <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank"><span class="blue-text">Track all markets on TradingView</span></a></div>
              <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
              {
              "width": "100%",
              "height": "100%",
               
              "defaultColumn": "performance",
              "screener_type": "crypto_mkt",
              "displayCurrency": "USD",
              "colorTheme": "dark",
              "locale": "en",
              "isTransparent": true
            }
              </script>
            </div>
            <!-- TradingView Widget END -->
            <!-- TradingView Widget END -->
     </div>
     <div class="col-xxl-2 col-xl-2 mobile_off">
    	   <?php
           include __DIR__."/../chunk/ads_side.php";
		   ?>
    </div>
 </div> 
 <style type="text/css">
 
 .tradingview-widget-container
 {
	min-height:800px; 
 }
 </style>    
