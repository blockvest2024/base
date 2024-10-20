<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH."libraries/CoinGeckoApi/vendor/autoload.php";
use Codenixsv\CoinGeckoApi\CoinGeckoClient;

class Deposit extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		 parent::__construct();
		  
		 //0x55d398326f99059fF775485246999027B3197955 
	} 
	
	 
	public function receive()
	{
		 
		 
		$in['title'] = ""; 
		$in['tpl'] = "deposit/receive";
		$this->load->view('manager/layout',$in);
		return; 
	}
	 
	public function savebuy()
	{
		if($this->input->is_ajax_request() && $this->input->post())
		{
			$in = $this->input->post();
			$this->session->set_userdata('depo_wallet',$in);
			$this->session->set_userdata('depo_uuid',$in['uuid']);
			json(array('error'=>false,'message'=>'Process','security'=>token(),'data'=>$in));
			return;
		}
		json(array('error'=>true,'message'=>'not found','security'=>token()));
		return;	
	}
	//api deposit
	public function gettran_partner($id = "",$id_service = "")
	{
		$type = isset($_GET['type'])?$_GET['type']:"service";
		if($type=="service")
		{
			$services = $this->db->where('id',$id_service)->get('services_payment');
		}else
		{
			$services = $this->db->where('id',$id_service)->get('event');	
		}
		if($services->num_rows()==0)
		{
			json(array('error'=>true,'message'=>'failed respon','data'=>array(),'success_detect'=>false,'approve_payments'=>false,'security'=>token()));
			return;	
		}
		$dataservices = $services->row_array();
		$rec = $this->db->where('id',$id)->get('currency');
		if($rec->num_rows()==0)
		{
			json(array('error'=>true,'message'=>'failed respon','data'=>array(),'success_detect'=>false,'approve_payments'=>false,'security'=>token()));
			return;	
		}
		$data = $rec->row_array();
		$params = $data['network'];
		
		$limit = isset($_GET['limit'])?$_GET['limit']:1;
		$new_tran = isset($_GET['new'])?$_GET['new']:false;
		$time = time();
		$dates = date('Y-m-d H:i:s');
		$uuid = isset($_GET['uuid'])?$_GET['uuid']:"";
		$ses_uuid = $this->session->userdata('depo_uuid');
		if(!empty($ses_uuid))
		{
			$uuid = $ses_uuid;	
		}
		$depo_wallet = $this->session->userdata('depo_wallet');
		$idr = 0;
		if(isset($depo_wallet['idr']))
		{
			$idr = $depo_wallet['idr'];	
		}else
		{
			$idr = 0; //$this->idr_price();	
		}
		$success_detect = false;	
		$approve_payments = false;	
		 
		if(!empty($params))
		{ 
			$network = $data; //$this->db->where('displays',1)->where('network',$params)->get('currency')->row_array();
			
			if(isset($network['id']))
			{
				$ns = $this->db->where('displays',1)->where('lower(name)',strtolower($network['network']))->get('network')->row_array();
				
				if(strtolower($params)=="base" && isset($ns['id']))
				{
					$sql = "select * from m_wallet_partner where id_partner='".user_info('id')."' and (lower(network)='bep20' or lower(network)='erc20' or lower(network)='base')";
					$wallet = $this->db->query($sql)->row_array();
					
					if(!isset($wallet['id']))
					{
						json(array('error'=>true,'message'=>'Process','security'=>token(),'data'=>$arr,'new_data'=>array(),'success_detect'=>false,'approve_payments'=>false));
						return;
					}
					 
					//0x55d398326f99059fF775485246999027B3197955
					/*$urlv = "https://api.bscscan.com/api?module=account&action=tokentx&contractaddress=0x55d398326f99059fF775485246999027B3197955&address=".$wallet['address']."&page=1&offset=".$limit."&startblock=0&endblock=999999999&sort=desc&apikey=CM4GNJ5C2EY11YUG1X1BNS2YNJ4TTKAGCX"; 
					*/ 
					$urlv = "https://base-sepolia.blockscout.com/api/v2/addresses/".$wallet['address']."/transactions?filter=to&page=1&offset=".$limit.""; 
					  
					$remoted = remoted($urlv); //get_remote_data($urlv);
					
					if(!empty($remoted))
					{
						##=== get data
						$remoted = json_decode($remoted,true);
						 
						if(is_array($remoted))
						{
							if(!isset($remoted['items']))
							{
								json(array('error'=>true,'message'=>'Process','security'=>token(),'data'=>array(),'new_data'=>array(),'success_detect'=>false,'approve_payments'=>false));
								return;
							}
							$arr = $remoted['items'];
							
							if(!is_array($arr))
							{
								json(array('error'=>true,'message'=>'Process','security'=>token(),'data'=>array(),'new_data'=>array(),'success_detect'=>false,'approve_payments'=>false));
								return;
							}
							  
							if($new_tran==true)
							{
								$check = $this->db->where('transaction_id',$arr[0]['transaction_id'])->where('network',$network['network'])->get('transactions_partner')->row_array();	
								if(!isset($check['id']))
								{
									$success_detect = false;	
								}
								
							}
							$in = array();
							$in['total'] = 0; 
							$intran = array();
							for($i=0;$i<count($arr);$i++)
							{
								//$token_info = $arr[$i]['token_info'];
								//unset($arr[$i]['token_info']);
								
								$in = array(); //$arr[$i];
								$in['from'] = $arr[$i]['from']['hash'];
								$in['to'] = $arr[$i]['to']['hash'];
								if($in['from']==$wallet['address'])
								{
									 
									$intran = $in;
								}
								
								 
								//
								$in['transaction_id'] = $arr[$i]['hash'];
								$in['block_timestamp'] = $arr[$i]['timestamp'];
								$in['value'] =  bcdiv($arr[$i]['value'], bcpow("10", 18),6);  //$arr[$i]['value']; 
								$in['total'] =  bcdiv($arr[$i]['value'], bcpow("10", 18),6); 
								
								$in['network'] = $network['network'];
								$in['token_info'] = ""; //json_encode($token_info);
								$in['rawdata'] = json_encode($remoted);
								$in['created_on'] = $time;
								$in['dates'] = $dates;
								$in['uuid'] = ""; //$uuid;
								$in['idr'] = $idr;
								if($type=="service")
								$in['id_services_payment'] = $id_service; 
								else
								$in['id_event'] = $dataservices['id']; 
								
								$in['status_payment'] = 0;
								if($type=="service")
								{
									if($in['total']>=$dataservices['prices'])
									{
										$in['status_payment'] = 1;
										//$approve_payments = false;
									}
								}
								if($type=="event")
								{
									if($in['total']>=$dataservices['price'])
									{
										$in['status_payment'] = 1;
										//$approve_payments = false;
									}
								}
								
								$check = $this->db->where('transaction_id',$arr[$i]['hash'])->where('network',$network['network'])->get('transactions_partner')->row_array();	
								//if($in['from']==user_balance("wallet_address"))
								//{ 
								//if($in['total']>=$data['min_depo'])
								//{
									 
									if(!isset($check['id']))
									{
										$this->session->set_userdata('depo_wallet',"");
										$in['id_partner'] = user_info('id');
										$success_detect = true;
										$approve_payments = true;
										$this->db->trans_begin();
										$this->db->insert('transactions_partner',$in);
										
										if($type=="event")
										{
											$this->db->where('id',$dataservices['id'])->update('event',array('status'=>1,"txhash"=>$in['transaction_id']));	
										}
										
										$this->db->trans_commit();
									}
								//}
								//}
							}
							$news = array();
							if(isset($arr[0]))
							{
								$news = $arr[0];
								$news['transaction_id'] = $news['hash'];
								$news['url'] = $ns['explorer_transaction']."".$news['hash'];
							}
							json(array('error'=>false,'message'=>'Process',"total"=>$in['total'],"min_depo"=>$data['min_depo'],'security'=>token(),'data'=>$arr,'new_data'=>$news,'success_detect'=>$success_detect,'approve_payments'=>$approve_payments));
							return;
							
							
						}
						#=== get data
					}
				} 
				else if(strtolower($params)=="trc20" && isset($ns['id']))
				{
					$sql = "select * from m_wallet_partner where id_partner='".user_info('id')."' and (lower(network)='bep20' or lower(network)='erc20')";
					$wallet = $this->db->query($sql)->row_array();
					if(!isset($wallet['id']))
					{
						json(array('error'=>true,'message'=>'Process','security'=>token(),'data'=>$arr,'new_data'=>array(),'success_detect'=>false,'approve_payments'=>false));
						return;
					}
					$urlv = "https://api.trongrid.io/v1/accounts/".$wallet['address']."/transactions/trc20?&contract_address=TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t&limit=".$limit."&only_to=true&only_confirmed=true";
					 
					
					$remoted = remoted($urlv);
					if(!empty($remoted))
					{
						$remoted = json_decode($remoted,true);
						if(is_array($remoted))
						{
							$arr = $remoted['data'];
							 
							if($new_tran==true)
							{
								$check = $this->db->where('transaction_id',$arr[0]['transaction_id'])->where('network',$network['network'])->get('transactions_partner')->row_array();	
								if(!isset($check['id']))
								{
									$success_detect = false;	
								}
								
							}
							/*$c = $this->session->userdata('depo_wallet');
							if(empty($c))
							{
								json(array('error'=>false,'message'=>'Process','security'=>token(),'data'=>$arr,'new_data'=>array(),'success_detect'=>false));
								return;
							}*/
							$intran = array();
							for($i=0;$i<count($arr);$i++)
							{
								$token_info = $arr[$i]['token_info'];
								unset($arr[$i]['token_info']);
								
								$in = $arr[$i];
								if($in['from']==$wallet['address'])
								{
									 
									$intran = $in;
								}
								
								//
								$in['total'] =  bcdiv($in['value'], bcpow("10", 6), 6); 
								
								$in['network'] = $network['network'];
								$in['token_info'] = json_encode($token_info);
								$in['rawdata'] = json_encode($remoted);
								$in['created_on'] = $time;
								$in['dates'] = $dates;
								$in['uuid'] = $uuid;
								$in['idr'] = $idr;
								$in['id_services_payment'] = $id_service;
								$in['status_payment'] = 0;
								if($in['total']>=$dataservices['prices'])
								{
									$in['status_payment'] = 1;
									$approve_payments = true;
								}
								
								$check = $this->db->where('transaction_id',$arr[$i]['transaction_id'])->where('network',$network['network'])->get('transactions_partner')->row_array();	
								//if($in['from']==user_balance("wallet_address"))
								//{ 
								//if($in['total']>=$data['min_depo'])
								//{
									if(!isset($check['id']))
									{
										$this->session->set_userdata('depo_wallet',"");
										$in['id_partner'] = user_info('id');
										$success_detect = true;
										$this->db->trans_begin();
										$this->db->insert('transactions_partner',$in);
										$this->db->trans_commit();
									}
								//}
								//}
							}
							$news = array();
							if(isset($arr[0]))
							{
								$news = $arr[0];
								$news['url'] = $ns['explorer_transaction']."".$news['transaction_id'];
							}
							json(array('error'=>false,'message'=>'Process','security'=>token(),'data'=>$arr,'new_data'=>$news,'success_detect'=>$success_detect,'approve_payments'=>$approve_payments));
							return;
							
							
						}
					}
					
				}
				#========= bep20
				else if(strtolower($params)=="bep20" && isset($ns['id']))
				{
					$sql = "select * from m_wallet_partner where id_partner='".user_info('id')."' and (lower(network)='bep20' or lower(network)='erc20')";
					$wallet = $this->db->query($sql)->row_array();
					
					if(!isset($wallet['id']))
					{
						json(array('error'=>true,'message'=>'Process','security'=>token(),'data'=>$arr,'new_data'=>array(),'success_detect'=>false,'approve_payments'=>false));
						return;
					}
					//$urlv = "https://api.trongrid.io/v1/accounts/".$network['received_address']."/transactions/trc20?&contract_address=TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t&limit=".$limit."&only_to=true&only_confirmed=true";
					//0x55d398326f99059fF775485246999027B3197955
					$urlv = "https://api.bscscan.com/api?module=account&action=tokentx&contractaddress=0x55d398326f99059fF775485246999027B3197955&address=".$wallet['address']."&page=1&offset=".$limit."&startblock=0&endblock=999999999&sort=desc&apikey=CM4GNJ5C2EY11YUG1X1BNS2YNJ4TTKAGCX"; 
					 
					$remoted = remoted($urlv); //get_remote_data($urlv);
					
					if(!empty($remoted))
					{
						##=== get data
						$remoted = json_decode($remoted,true);
						
						if(is_array($remoted))
						{
							if(!isset($remoted['result']))
							{
								json(array('error'=>false,'message'=>'Process','security'=>token(),'data'=>$arr,'new_data'=>array(),'success_detect'=>false,'approve_payments'=>false));
								return;
							}
							$arr = $remoted['result'];
							if(!is_array($arr))
							{
								json(array('error'=>false,'message'=>'Process','security'=>token(),'data'=>$arr,'new_data'=>array(),'success_detect'=>false,'approve_payments'=>false));
								return;
							}
							  
							if($new_tran==true)
							{
								$check = $this->db->where('transaction_id',$arr[0]['transaction_id'])->where('network',$network['network'])->get('transactions_partner')->row_array();	
								if(!isset($check['id']))
								{
									$success_detect = false;	
								}
								
							}
							$in = array();
							$in['total'] = 0; 
							$intran = array();
							for($i=0;$i<count($arr);$i++)
							{
								//$token_info = $arr[$i]['token_info'];
								//unset($arr[$i]['token_info']);
								
								$in = array(); //$arr[$i];
								$in['from'] = $arr[$i]['from'];
								$in['to'] = $arr[$i]['to'];
								if($in['from']==$wallet['address'])
								{
									 
									$intran = $in;
								}
								
								 
								//
								$in['transaction_id'] = $arr[$i]['hash'];
								$in['block_timestamp'] = $arr[$i]['timeStamp'];
								$in['value'] =  $arr[$i]['value']; 
								$in['total'] =  bcdiv($arr[$i]['value'], bcpow("10", 18),6); 
								
								$in['network'] = $network['network'];
								$in['token_info'] = ""; //json_encode($token_info);
								$in['rawdata'] = json_encode($remoted);
								$in['created_on'] = $time;
								$in['dates'] = $dates;
								$in['uuid'] = ""; //$uuid;
								$in['idr'] = $idr;
								$in['id_services_payment'] = $id_service; 
								$in['status_payment'] = 0;
								if($in['total']>=$dataservices['prices'])
								{
									$in['status_payment'] = 1;
									$approve_payments = true;
								}
								
								$check = $this->db->where('transaction_id',$arr[$i]['hash'])->where('network',$network['network'])->get('transactions_partner')->row_array();	
								//if($in['from']==user_balance("wallet_address"))
								//{ 
								//if($in['total']>=$data['min_depo'])
								//{
									 
									if(!isset($check['id']))
									{
										$this->session->set_userdata('depo_wallet',"");
										$in['id_partner'] = user_info('id');
										$success_detect = true;
										$this->db->trans_begin();
										$this->db->insert('transactions_partner',$in);
										$this->db->trans_commit();
									}
								//}
								//}
							}
							$news = array();
							if(isset($arr[0]))
							{
								$news = $arr[0];
								$news['transaction_id'] = $news['hash'];
								$news['url'] = $ns['explorer_transaction']."".$news['hash'];
							}
							json(array('error'=>false,'message'=>'Process',"total"=>$in['total'],"min_depo"=>$data['min_depo'],'security'=>token(),'data'=>$arr,'new_data'=>$news,'success_detect'=>$success_detect,'approve_payments'=>$approve_payments));
							return;
							
							
						}
						#=== get data
					}
				}
				#== erc20
				
				else if(strtolower($params)=="erc20" && isset($ns['id']))
				{
					$sql = "select * from m_wallet_partner where id_partner='".user_info('id')."' and (lower(network)='bep20' or lower(network)='erc20')";
					$wallet = $this->db->query($sql)->row_array();
					if(!isset($wallet['id']))
					{
						json(array('error'=>true,'message'=>'Process','security'=>token(),'data'=>$arr,'new_data'=>array(),'success_detect'=>false,'approve_payments'=>false));
						return;
					}
					//$urlv = "https://api.trongrid.io/v1/accounts/".$network['received_address']."/transactions/trc20?&contract_address=TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t&limit=".$limit."&only_to=true&only_confirmed=true";
					$urlv = "https://api.etherscan.io/api?module=account&action=tokentx&contractaddress=0xdAC17F958D2ee523a2206206994597C13D831ec7&address=".$wallet['address']."&page=1&offset=".$limit."&startblock=0&endblock=999999999&sort=desc&apikey=8MFUUAX9R8VAQJXCH56A1QIHIQY2YUN8YT"; 
					 
					$remoted = remoted($urlv); //get_remote_data($urlv);
					
					if(!empty($remoted))
					{
						##=== get data
						$remoted = json_decode($remoted,true);
						
						if(is_array($remoted))
						{
							if(!isset($remoted['result']))
							{
								json(array('error'=>false,'message'=>'Process','security'=>token(),'data'=>$arr,'new_data'=>array(),'success_detect'=>false,'approve_payments'=>false));
								return;
							}
							$arr = $remoted['result'];
							if(!is_array($arr))
							{
								json(array('error'=>false,'message'=>'Process','security'=>token(),'data'=>$arr,'new_data'=>array(),'success_detect'=>false,'approve_payments'=>false));
								return;
							}
							  
							if($new_tran==true)
							{
								$check = $this->db->where('transaction_id',$arr[0]['transaction_id'])->where('network',$network['network'])->get('transactions_partner')->row_array();	
								if(!isset($check['id']))
								{
									$success_detect = false;	
								}
								
							}
							 
							$intran = array();
							for($i=0;$i<count($arr);$i++)
							{
								//$token_info = $arr[$i]['token_info'];
								//unset($arr[$i]['token_info']);
								
								$in = array(); //$arr[$i];
								$in['from'] = $arr[$i]['from'];
								$in['to'] = $arr[$i]['to'];
								if($in['from']==$wallet['address'])
								{
									 
									$intran = $in;
								}
								
								 
								//
								$in['transaction_id'] = $arr[$i]['hash'];
								$in['block_timestamp'] = $arr[$i]['timeStamp'];
								$in['value'] =  $arr[$i]['value']; 
								$in['total'] =  bcdiv($arr[$i]['value'], bcpow("10", 6),6); 
								
								$in['network'] = $network['network'];
								$in['token_info'] = ""; //json_encode($token_info);
								$in['rawdata'] = json_encode($remoted);
								$in['created_on'] = $time;
								$in['dates'] = $dates;
								$in['uuid'] = ""; //$uuid;
								$in['idr'] = $idr;
								$in['id_services_payment'] = $id_service;
								$in['status_payment'] = 0;
								if($in['total']>=$dataservices['prices'])
								{
									$in['status_payment'] = 1;
									$approve_payments = true;
								} 
								 
								
								$check = $this->db->where('transaction_id',$arr[$i]['hash'])->where('network',$network['network'])->get('transactions')->row_array();	
								//if($in['from']==user_balance("wallet_address"))
								//{ 
								//if($in['total']>=$data['min_depo'])
								//{
									 
									if(!isset($check['id']))
									{
										$this->session->set_userdata('depo_wallet',"");
										$in['id_partner'] = user_info('id');
										$success_detect = true;
										$this->db->trans_begin();
										$this->db->insert('transactions_partner',$in);
										$this->db->trans_commit();
									}
								//}
								//}
							}
							$news = array();
							if(isset($arr[0]))
							{
								$news = $arr[0];
								$news['transaction_id'] = $news['hash'];
								$news['url'] = $ns['explorer_transaction']."".$news['hash'];
							}
							json(array('error'=>false,'message'=>'Process',"total"=>$in['total'],"min_depo"=>$data['min_depo'],'security'=>token(),'data'=>$arr,'new_data'=>$news,'success_detect'=>$success_detect,'approve_payments'=>$approve_payments));
							return;
							
							
						}
						#=== get data
					}
				}
				#== end
			}
		}
		json(array('error'=>true,'message'=>'failed respon','data'=>array(),'success_detect'=>false,'approve_payments'=>false,'security'=>token()));
		return;	
	} 
	
}

