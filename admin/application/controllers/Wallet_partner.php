<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Wallet_partner extends Smart_Controller
{
	private $_users;
	public function __construct()
	{
		parent::__construct();

		 
	}
	public function index()
	{
		 
		$in['use_hedaer'] = true;
		$in['title'] = 'Wallet Partner';
		$in['desc'] = 'you can manage your Wallet Partner here';
		$in['bread'][''] = 'Configuration';
		$in['bread'][site_url('manager/wallet_partner')] = 'wallet_partner';
		$in['tpl'] = 'wallet_partner/main';
		$this->load->view('manager/layout',$in);
	}
	public function getlist()
	{
		if($this->input->is_ajax_request())
		{
			$this->load->library('ssp');
			$ssp = $this->ssp;
			$primaryKey = 'm_wallet_partner.id';
			$columns    = array(
			array('db'=>'m_wallet_partner.id','dt'=>0,'alias'=>'ids','formatter'=>function($d,$row){
				return '<input type="checkbox" class="chk-item" value="'.$d.'">';
			}),
			
			 
			array('db'=>"concat(m_partner.full_name,'<br/>',m_partner.email)",'dt'=>1,'alias'=>'partners','formatter'=>function($d,$row){
				return $d;
			}),
			array('db'=>'m_wallet_partner.network','dt'=>2,'alias'=>'network','formatter'=>function($d,$row){
				return $d;
			}),  
			array('db'=>'m_wallet_partner.address','dt'=>3,'alias'=>'address','formatter'=>function($d,$row){
				return $d;
			}), 
			array('db'=>"m_wallet_partner.pv_key",'dt'=>4,'alias'=>'pv_key','formatter'=>function($d,$row){
				 $name = "*********";
				 $v = $this->session->userdata('adminwallet_partner_login');			  
				 if($v==wallet_partner())
				 {
					$name = $d;
				 	return $name."<button class='btn btn-sm btn-status'  data-ref='".$row->ids."'><i class='fa fa-eye'></a></button>";
				 }
				 return "<button class='btn btn-sm btn-status'  data-ref='".$row->ids."'>".$name."<i class='fa fa-eye-slash'></a></button>";
			}),
			  
			);
			$table = 'm_wallet_partner inner join m_partner on(m_wallet_partner.id_partner=m_partner.id) ' ;
			$whereResult = NULL;
			$whereAll = '1=1';
			 
			$arr = $ssp::complex( $_GET, $this, $table, $primaryKey, $columns, $whereResult, $whereAll );
			echo json_encode($arr);
			exit;
		}
		show_404();
	}
	 
	 
	public function status()
	{
		if($this->input->is_ajax_request() && $this->input->post())
		{
			$in = $this->input->post();
			$this->session->set_userdata('adminwallet_partner_login',"");
			if($in['status']==1)
			{
				$this->session->set_userdata('adminwallet_partner_login',$in['key']);
			}
			json(array('error'=>false,'message'=>'Proccess Done','security'=>token()));
			return;
			 
		}
		show_404();
	} 
}