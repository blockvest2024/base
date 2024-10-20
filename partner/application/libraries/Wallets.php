<?php
include APPPATH."libraries/erc_bsc/vendor/autoload.php";
include APPPATH."libraries/tronlib/vendor/autoload.php";
use kornrunner\Ethereum\Address;
use TronTool\Credential;
class Wallets
{
	public function wallet_setup_partner($network)
	{
		 
		$CI =& get_instance();
		$arr = array();
		if(strtolower($network)=="bep20" || strtolower($network)=="erc20")
		{
			$address = new Address();
			$arr['address'] = "0x".$address->get();
			$arr['rd_address'] = $address->get();
			$arr['pv_key'] = $address->getPrivateKey();
			$arr['public_key'] =  $address->getPublicKey();
			$arr['network'] = $network;
			$arr['id_partner'] = user_info('id');
			$arr['created_by'] = user_info('id');
			$arr['created_on'] = time();
			if(strtolower($network)=="bep20" || strtolower($network)=="erc20")
			{
				$arr['bridge'] = 1;
			}
			$sql = "select * from m_wallet_partner where address='".$arr['address']."'";
			$wallet = $CI->db->query($sql)->row_array();
			if(!isset($wallet['id']))
			{
				$empty_tran = $this->check_empty_tran($arr['address'],1,$network);
				if($empty_tran==1)
				$this->wallet_setup($network);
			}
		}else if(strtolower($network)=="trc20")
		{
			$address = Credential::create();
			$arr['address'] = $address->address()->base58();
			$arr['rd_address'] = $address->address()->base58();
			$arr['pv_key'] = $address->privateKey();
			$arr['public_key'] =  $address->publicKey();
			$arr['network'] = $network;
			$arr['id_partner'] = user_info('id');
			$arr['created_by'] = user_info('id');
			$arr['created_on'] = time();
			$sql = "select * from m_wallet_partner where address='".$arr['address']."'";
			$wallet = $CI->db->query($sql)->row_array();
			if(!isset($wallet['id']))
			{
				$empty_tran = $this->check_empty_tran($arr['address'],1,$network);
				if($empty_tran==1)
				$this->wallet_setup_partner($network);
			}
		}
		 
		$CI->db->trans_begin();
		$CI->db->insert('wallet_partner',$arr);
		$CI->db->trans_commit(); 
		return $arr;
	}
	public function wallet_setup($network)
	{
		 
		$CI =& get_instance();
		$arr = array();
		if(strtolower($network)=="bep20" || strtolower($network)=="erc20")
		{
			$address = new Address();
			$arr['address'] = "0x".$address->get();
			$arr['rd_address'] = $address->get();
			$arr['pv_key'] = $address->getPrivateKey();
			$arr['public_key'] =  $address->getPublicKey();
			$arr['network'] = $network;
			$arr['id_customer'] = user_balance('id');
			$arr['created_by'] = user_balance('id');
			$arr['created_on'] = time();
			if(strtolower($network)=="bep20" || strtolower($network)=="erc20")
			{
				$arr['bridge'] = 1;
			}
			$sql = "select * from m_wallet where address='".$arr['address']."'";
			$wallet = $CI->db->query($sql)->row_array();
			if(!isset($wallet['id']))
			{
				$empty_tran = $this->check_empty_tran($arr['address'],1,$network);
				if($empty_tran==1)
				$this->wallet_setup($network);
			}
		}else if(strtolower($network)=="trc20")
		{
			$address = Credential::create();
			$arr['address'] = $address->address()->base58();
			$arr['rd_address'] = $address->address()->base58();
			$arr['pv_key'] = $address->privateKey();
			$arr['public_key'] =  $address->publicKey();
			$arr['network'] = $network;
			$arr['id_customer'] = user_balance('id');
			$arr['created_by'] = user_balance('id');
			$arr['created_on'] = time();
			$sql = "select * from m_wallet where address='".$arr['address']."'";
			$wallet = $CI->db->query($sql)->row_array();
			if(!isset($wallet['id']))
			{
				$empty_tran = $this->check_empty_tran($arr['address'],1,$network);
				if($empty_tran==1)
				$this->wallet_setup($network);
			}
		}
		 
		$CI->db->trans_begin();
		$CI->db->insert('wallet',$arr);
		$CI->db->trans_commit(); 
		return $arr;
	}
	public function network_bep20($address,$limit = 1)
	{
		$urlv ="https://api.bscscan.com/api?module=account&action=tokentx&contractaddress=0x55d398326f99059fF775485246999027B3197955&address=".$address."&page=1&offset=".$limit."&startblock=0&endblock=999999999&sort=desc&apikey=CM4GNJ5C2EY11YUG1X1BNS2YNJ4TTKAGCX"; 
	}
	public function network_erc20($address,$limit = 1)
	{
		$urlv = "https://api.etherscan.io/api?module=account&action=tokentx&contractaddress=0xdAC17F958D2ee523a2206206994597C13D831ec7&address=".$address."&page=1&offset=".$limit."&startblock=0&endblock=999999999&sort=desc&apikey=8MFUUAX9R8VAQJXCH56A1QIHIQY2YUN8YT";
	}
	public function network_trc20($address,$limit = 1)
	{
		$urlv = "https://api.trongrid.io/v1/accounts/".$address."/transactions/trc20?&contract_address=TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t&limit=".$limit."&only_to=true&only_confirmed=true";
	}
	public function check_empty_tran($address,$limit = 1,$network)
	{
		$urlv = "";
		if(strtolower($network)=="bep20")
		{
			$urlv = $this->network_bep20($address,$limit);
		} else if(strtolower($network)=="bep20")
		{
			$urlv = $this->network_erc20($address,$limit);
		}else if(strtolower($network)=="trc20")
		{
			$urlv = $this->network_trc20($address,$limit);
		}
		$remoted = remoted($urlv);	
		$stats = 0;
		if(!empty($remoted))
		{
			$remoted = json_decode($remoted,true);
			if(is_array($remoted))
			{
				if(strtolower($network)=="trc20")
				{
					$arr = $remoted['data'];	
				}
				else if(strtolower($network)=="bep20")
				{
					if(!isset($remoted['result']))
					{
						$stats = 0;
					}else
					{
						$arr = $remoted['result'];	
					}
				}
				else if(strtolower($network)=="erc20")
				{
					if(!isset($remoted['result']))
					{
						$stats = 0;
					}else
					{
						$arr = $remoted['result'];	
					}
				}
				
				if(count($arr)>1)
				{
					$stats = 1;
				}
			}
		}
		return $stats;
	
	}
}
