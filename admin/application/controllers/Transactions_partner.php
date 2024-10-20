<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Transactions_partner extends Smart_Controller
{
	private $_users;
	public function __construct()
	{
		parent::__construct();

		 
	}
	public function index()
	{
		 
		$in['use_hedaer'] = true;
		$in['title'] = 'Event';
		$in['desc'] = 'you can manage your Event here';
		$in['bread'][''] = 'Configuration';
		$in['bread'][site_url('manager/transactions_partner')] = 'Event';
		$in['tpl'] = 'transactions_partner/main';
		$this->load->view('manager/layout',$in);
	}
	public function getlist()
	{
		if($this->input->is_ajax_request())
		{
			$this->load->library('ssp');
			$ssp = $this->ssp;
			$primaryKey = 'm_transactions_partner.id';
			$columns    = array(
			array('db'=>'m_transactions_partner.id','dt'=>0,'alias'=>'ids','formatter'=>function($d,$row){
				return '<input type="checkbox" class="chk-item" value="'.$d.'">';
			}),
			
			 
			array('db'=>"concat(m_partner.full_name,'<br/>',m_partner.email)",'dt'=>1,'alias'=>'partners','formatter'=>function($d,$row){
				return $d;
			}),
			array('db'=>'m_services_type.name','dt'=>2,'alias'=>'servics','formatter'=>function($d,$row){
				return $d;
			}), 
			array('db'=>'m_services_subtype.name','dt'=>3,'alias'=>'subservics','formatter'=>function($d,$row){
				return $d;
			}), 
			array('db'=>'m_services_payment.name','dt'=>4,'alias'=>'name','formatter'=>function($d,$row){
				return $d." (".$row->price_payment."$)";
			}), 
			array('db'=>'m_transactions_partner.transaction_id','dt'=>5,'alias'=>'transaction_id','formatter'=>function($d,$row){
				$networks = $this->db->where('name',$row->network)->get('network')->row_array();
				if(isset($networks['id']))
				{
					$url = $networks['explorer_transaction']."".$d;
					return "<a href='".$url."' target='_blank' class='btn btn-link'><small> ".$d."</small></a>";	
				}
				return  "";
				//return $d;
			}), 
			array('db'=>'m_transactions_partner.from','dt'=>6,'alias'=>'froms','formatter'=>function($d,$row){
				return $d;
			}), 
			array('db'=>'m_transactions_partner.to','dt'=>7,'alias'=>'tos','formatter'=>function($d,$row){
				return $d;
			}), 
			 
			
			array('db'=>'m_transactions_partner.total','dt'=>8,'alias'=>'price','formatter'=>function($d,$row){
				return $d;
			}),
			array('db'=>"concat(DATE_FORMAT(m_transactions_partner.dates, '%d/%m/%Y'))",'dt'=>9,'alias'=>'dates_times','formatter'=>function($d,$row){
				return $d;
			}), 
			 
			
			 
			array('db'=>"m_transactions_partner.proof",'dt'=>10,'alias'=>'proof','formatter'=>function($d,$row){
				return "<a href='".$d."' target='_blank' class='btn btn-link'><small> ".$d."</small></a>";
			}),
			array('db'=>"m_transactions_partner.status",'dt'=>11,'alias'=>'displays','formatter'=>function($d,$row){
				 
				 $bg_color = "background:".colorpayments($d)."; color:white;";
				 $active = "<div><small style='color:".colorpayments(1)."; font-weight:bold;'>".proofstatus(1)."</small></div>";
				 if($d==1)
				 {
					 return $active;
				 }				  
				 return "<button class='btn btn-sm btn-status' style='".$bg_color."' data-ref='".$row->ids."'>".proofstatus($d)."</button>";
			}),
			array('db'=>'m_transactions_partner.id','dt'=>12,'alias'=>'id','formatter'=>function($d,$row){
				return ' 
						  <button class="btn btn-xs btn-sm btn-danger btn-sm btn-delete-sites" type="button" data-toggle="tooltip" title="" data-original-title="Remove " data-ref="'.$d.'"><i class="fa fa-times"></i></button>
						 ';
			}),
			array('db'=>'m_services_payment.prices','dt'=>13,'alias'=>'price_payment','formatter'=>function($d,$row){
				return $d;
			}), 
			array('db'=>'m_transactions_partner.network','dt'=>14,'alias'=>'network','formatter'=>function($d,$row){
				return  $d;
			}),
			);
			$table = 'm_transactions_partner inner join m_partner on(m_transactions_partner.id_partner=m_partner.id) inner join m_services_payment on(m_services_payment.id=m_transactions_partner.id_services_payment) inner join m_services_subtype on(m_services_payment.id_services_subtype=m_services_subtype.id) inner join m_services_type on(m_services_subtype.id_services_type=m_services_type.id)' ;
			$whereResult = NULL;
			$whereAll = 'status_payment=1';
			 
			$arr = $ssp::complex( $_GET, $this, $table, $primaryKey, $columns, $whereResult, $whereAll );
			echo json_encode($arr);
			exit;
		}
		show_404();
	}
	 
	public function delete()
	{
		if($this->input->is_ajax_request() && $this->input->post())
		{
			
			$id = $this->input->post('id',true);
			$this->db->trans_begin();
			if(is_array($id))
				$this->db->where_in('id',$id);
			else
				$this->db->where('id',$id);
				
			 
			
			if(is_array($id))
				$this->db->where_in('id',$id);
			else
				$this->db->where('id',$id);
				
			$this->db->delete('transactions_partner');
			if ($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				json(array('error'=>true,'message'=>'Proccess Failed','security'=>token()));
				return;
			}
			else
			{
				$this->db->trans_commit();
				json(array('error'=>false,'message'=>'Proccess Done','security'=>token()));
				return;
			}
			json(array('error'=>true,'message'=>'Proccess Failed','security'=>token()));
			return;
		}
		show_404();
	}
	public function status()
	{
		if($this->input->is_ajax_request() && $this->input->post())
		{
			$in = $this->input->post();
			$check = $this->db->where('id',$in['id'])->get('transactions_partner')->row_array();
			if(!isset($check['id']))
			{
				json(array('error'=>true,'message'=>'Proccess Failed','security'=>token()));
				return;
			}
			//
			//$price_coin = settings("price_coin"); 
			
			//
			$customer =  $this->db->where('id',$check['id_partner'])->get('partner')->row_array();
			if(!isset($customer['id']))
			{
				json(array('error'=>true,'message'=>'Proccess Failed','security'=>token()));
				return;
			}
			 
			 
			$this->db->trans_begin();
			// update order
			$this->db->where('id',$in['id'])->update('transactions_partner',array("status"=>$in['status'],"proof"=>$in['proof']));
			
			 
			
			
			if ($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				json(array('error'=>true,'message'=>'Proccess Failed','security'=>token()));
				return;
			}
			else
			{
				$this->db->trans_commit();
				json(array('error'=>false,'message'=>'Proccess Done','security'=>token()));
				return;
			}
			json(array('error'=>true,'message'=>'Proccess Failed','security'=>token()));
			return;
		}
		show_404();
	} 
}