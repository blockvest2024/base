 <?php

$directory = rtrim($this->router->directory,'/');
$class = $this->router->class;
$method = $this->router->method;
$params = $this->uri->segment('3');
$params1 = $this->uri->segment('4');
$ima = user_info('avatar');
$avatar = user_info('avatar');
 

 
?>
<?php
if($class=="event" && ($method=="details" || $method=="cdetail" ))
{
	if(isset($data['id']))
	{
		$partner_name = "Blockvest";
		if(isset($data['partner_info']))
		{
			if(!empty($data['partner_info']))
			{
				$partner_info = json_decode($data['partner_info'],true);
				if(isset($partner_info['id']))
				{
					$partner_name = $partner_info['full_name'];
				}
			}
		}
?>
<meta name="Description" content="<?=strip_tags($data['description'])?>">
    <meta name="Author" content="<?=$partner_name?>">
	<meta name="keywords" content="<?=$data['title']?>">
    <meta property="og:url" content="<?=site_url('event/details/'.$data['id'])."?id=".$data['id']?>" />     
    <meta property="og:site_name" content="Blockvest" />
    <meta property="og:title" content="<?=$data['title']?>" />
    <meta property="og:description" content="<?=strip_tags($data['description'])?>" />
    <meta property="og:image" content="<?=config_item('main_site')?>uploads/<?=$data['image']?>" />
    <meta property="og:image:width" content="750"/>
    <meta property="og:image:height" content="500"/>
    <meta property="og:type" content="article"/>
    <meta property="og:locale" content="en_US"/>
    
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@Blockvest_App" />
    <meta name="twitter:title" content="<?=$data['title']?>" />
    <meta name="twitter:description" content="<?=strip_tags($data['description'])?>" />
    <meta name="twitter:image" content="<?=config_item('main_site')?>uploads/<?=$data['image']?>" />
    <meta name="twitter:url" content="<?=site_url('event/details/'.$data['id'])."?id=".$data['id']?>" />
    
    <link rel="canonical" href="<?=site_url('event/details/'.$data['id'])."?id=".$data['id']?>" />
 <?php
	}
}else
{
 ?>
 <meta name="Description" content="BlockVest is Management of Event both Offline and Online covering industry in Blockchain and Crypto Industry in Indonesia. One stop solution for creating event between Developer, Community, Investor, Media, Influencer, Association, and Regulator.">
    <meta name="Author" content="Blockvest">
	<meta name="keywords" content="Event, Web3, Blockchain, Festival, Developer, Community, Investor, Media, Influencer, Association, Regulator, Bitcoin, Ethereum ">
    <meta property="og:url" content="https://blockvest.org" />     
    <meta property="og:site_name" content="Blockvest" />
    <meta property="og:title" content="Web3 Event Festival Enabler" />
    <meta property="og:description" content="BlockVest is Management of Event both Offline and Online covering industry in Blockchain and Crypto Industry in Indonesia. One stop solution for creating event between Developer, Community, Investor, Media, Influencer, Association, and Regulator." />
    <meta property="og:image" content="//blockvest.org/assets/images/favicon.jpg" />
    <meta property="og:image:width" content="750"/>
    <meta property="og:image:height" content="500"/>
    <meta property="og:type" content="article"/>
    <meta property="og:locale" content="en_US"/>
    
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@Blockvest_App" />
    <meta name="twitter:title" content="Web3 Event Festival Enabler" />
    <meta name="twitter:description" content="BlockVest is Management of Event both Offline and Online covering industry in Blockchain and Crypto Industry in Indonesia. One stop solution for creating event between Developer, Community, Investor, Media, Influencer, Association, and Regulator." />
    <meta name="twitter:image" content="//blockvest.org/assets/images/favicon.jpg" />
    <meta name="twitter:url" content="https://blockvest.org" />
    
    <link rel="canonical" href="https://blockvest.org/" />
 <?php
}
 ?>   