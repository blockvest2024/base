<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Event extends Smart_Controller
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
		$in['bread'][site_url('manager/event')] = 'Event';
		$in['tpl'] = 'event/main';
		$this->load->view('manager/layout',$in);
	}
	public function getlist()
	{
		if($this->input->is_ajax_request())
		{
			$this->load->library('ssp');
			$ssp = $this->ssp;
			$primaryKey = 'm_event.id';
			$columns    = array(
			array('db'=>'m_event.id','dt'=>0,'alias'=>'ids','formatter'=>function($d,$row){
				return '<input type="checkbox" class="chk-item" value="'.$d.'">';
			}),
			
			 
			array('db'=>"concat(m_partner.full_name,'<br/>',m_partner.email)",'dt'=>1,'alias'=>'partners','formatter'=>function($d,$row){
				return $d;
			}),
			array('db'=>'m_event.title','dt'=>2,'alias'=>'title','formatter'=>function($d,$row){
				return $d;
			}), 
			array('db'=>"concat(DATE_FORMAT(m_event.from_times, '%r') ,' - ',DATE_FORMAT(m_event.to_times, '%r'))",'dt'=>3,'alias'=>'description','formatter'=>function($d,$row){
				return $d;
			}), 
			array('db'=>"concat(DATE_FORMAT(m_event.from_dates, '%d/%m/%Y') ,' - ',DATE_FORMAT(m_event.to_dates, '%d/%m/%Y'))",'dt'=>4,'alias'=>'dates_times','formatter'=>function($d,$row){
				return $d;
			}), 
			array('db'=>'m_event.price','dt'=>5,'alias'=>'price','formatter'=>function($d,$row){
				return $d;
			}),
			array('db'=>'m_event.total_seat','dt'=>6,'alias'=>'total_seat','formatter'=>function($d,$row){
				return $d;
			}),
			
			
			array('db'=>'m_event.txhash','dt'=>7,'alias'=>'txhash','formatter'=>function($d,$row){
				 $ns = $this->db->where('display',1)->where('lower(network)','base')->get('networks')->row_array();
				 if(isset($ns['id']))
				 {
					return "<a href='".$ns['network_url']."/tx/".$d."' target='_blank'>".$d."</a>"; 
				 }
				 return $d;
			}), 
			array('db'=>"m_event.status",'dt'=>8,'alias'=>'displays','formatter'=>function($d,$row){
				 
				 $bg_color = "background:".colorpayments($d)."; color:white;";
				 $active = "<div><small style='color:".colorpayments(1)."; font-weight:bold;'>".reward_event(1)."</small></div>";
				 if($d==1)
				 {
					 return $active;
				 }
				 if($d==1)
				 {
					 return $active;
				 }
				  return "<button class='btn btn-sm btn-status' style='".$bg_color."' data-ref='".$row->ids."'>".reward_event($d)."</button>";
			}),
			array('db'=>'m_event.id','dt'=>9,'alias'=>'id','formatter'=>function($d,$row){
				return ' 
						  <button class="btn btn-xs btn-sm btn-danger btn-sm btn-delete-sites" type="button" data-toggle="tooltip" title="" data-original-title="Remove " data-ref="'.$d.'"><i class="fa fa-times"></i></button>
						 ';
			}),
			);
			$table = 'm_event inner join m_partner on(m_event.id_partner=m_partner.id)';
			$whereResult = NULL;
			$whereAll = '';
			 
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
				
			$this->db->delete('event');
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
			$check = $this->db->where('id',$in['id'])->get('event')->row_array();
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
			$this->db->where('id',$in['id'])->update('event',array("status"=>$in['status']));
			
			 
			
			
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