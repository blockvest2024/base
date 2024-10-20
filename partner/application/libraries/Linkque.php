<?php
class Linkque {
	/**
	 * Create the data output array for the DataTables rows
	 *
	 *  @param  array $columns Column information array
	 *  @param  array $data    Data from the SQL get
	 *  @return array          Formatted data in a row based format
	 */
	 public $type = "production";//"development";
	 
	 private function api_config()
	 {
		 $arr = array(); 
		 if($this->type=="development")
		 {
			
			 $arr['username'] = 'LI307GXIN';
			 $arr['pin'] = '2K2NPCBBNNTovgB';
			 $arr['client-id'] = 'testing';
			 $arr['client-secret'] = '123';
			 $arr['signature'] = 'LinkQu@2020';			 
		 }
		 if($this->type=="production")
		 {
			 $arr['username'] = 'LI715VSNX';
			 $arr['pin'] = 'XDIu1SlbllZV637';
			 $arr['client-id'] = '6d661dd4-947c-44ad-974a-c0c0a447049b';
			 $arr['client-secret'] = 'lCv3zIGxkutOFUq23k2P6wccT';
			 $arr['signature'] = 'LinkQu@2020';			 
		 }
		 return $arr;
	 }
	 private function get_url()
	 {
		 $urls = "";
		 if($this->type=="development")
		 {
			$urls = "https://gateway-dev.linkqu.id"; 		 
		 }
		 if($this->type=="production")
		 {
			$urls = "https://gateway-prod-a2.linkqu.id";//"https://gateway.linkqu.id"; 			 
		 }
		 return $urls;
	 }
	 
	 public function get_urls($urls)
	{
		$type = settings("type_payment");
		$url_init = $this->get_url();
		$set = $this->api_config(); 
		$headers = array(
			'Content-Encoding: gzip',
			'Content-Type: application/json',
			'client-id:'.$set['client-id'],
			'client-secret:'.$set['client-secret'],
			
		);
		$url = $url_init."".$urls;
		$ch = curl_init($url);
		
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		//curl_setopt($ch, CURLOPT_NOBODY, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		$resp = curl_exec($ch);
		$retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		print_r($resp);
		exit; 
		curl_close($ch);
		 
		
		if (200==$retcode) {
			return $resp;
		} 
		return "";
	}
	public function post_curl($urls,$send,$error=false)
	{
		// Get cURL resource
		$vsend = array("data"=>array());
		$vsend['data'] = array("attributes"=>$send); 
		//print_r(json_encode($vsend));
		//exit; 
		$url_init = $this->get_url();
		$set = $this->api_config(); 
		$headers = array(
			'Content-Type: application/json',
			'client-id:'.$set['client-id'],
			'client-secret:'.$set['client-secret'],
			
		);
		$url = $url_init."".$urls;
		
		$curl = curl_init();
		 
		// Set some options - we are passing in a useragent too here
		curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $url,
			CURLOPT_USERAGENT => 'mozilla firefox',
			CURLOPT_POST => 1,
			CURLOPT_FOLLOWLOCATION=>1,
			CURLOPT_HTTPHEADER =>$headers,
			
			CURLOPT_POSTFIELDS => json_encode($vsend)
		));
		// Send the request & save response to $resp
		
		$resp = curl_exec($curl);
		$retcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		// Close request to clear up some resources
		curl_close($curl);	
		
		
		if($error==true)
		{
			return $resp;
		}
		 
		if (200==$retcode || 201==$retcode) {
			return $resp;
		} else {
			return false;
		}
		 
	}
	public function get_bank()
	{
		$arr = $this->get_urls("/linkqu-partner/masterbank/list");
		return $arr;
	}
}
?>