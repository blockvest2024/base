<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Partner extends Smart_Controller
{
	private $_users;
	public function __construct()
	{
		parent::__construct();

		 
	}
	public function index()
	{
		 
		$in['use_hedaer'] = true;
		$in['title'] = 'Partner';
		$in['desc'] = 'you can manage your Partner here';
		$in['bread'][''] = 'Configuration';
		$in['bread'][site_url('manager/partner')] = 'Partner';
		$in['tpl'] = 'partner/main';
		$this->load->view('manager/layout',$in);
	}
	public function getlist()
	{
		if($this->input->is_ajax_request())
		{
			$this->load->library('ssp');
			$ssp = $this->ssp;
			$primaryKey = 'm_partner.id';
			$columns    = array(
			array('db'=>'m_partner.id','dt'=>0,'alias'=>'ids','formatter'=>function($d,$row){
				return '<input type="checkbox" class="chk-item" value="'.$d.'">';
			}),
			
			 
			 
			array('db'=>'m_partner.full_name','dt'=>1,'alias'=>'full_name','formatter'=>function($d,$row){
				return $d;
			}), 
			array('db'=>'(select j.name from m_partner_type j where j.id=m_partner.id_partner_type limit 1)','dt'=>2,'alias'=>'partner_types','formatter'=>function($d,$row){
				return $d;
			}), 
			array('db'=>'m_partner.email','dt'=>3,'alias'=>'email','formatter'=>function($d,$row){
				return $d;
			}), 
			array('db'=>'m_partner.telp','dt'=>4,'alias'=>'telp','formatter'=>function($d,$row){
				return $d;
			}), 
			array('db'=>"DATE_FORMAT(FROM_UNIXTIME(m_partner.created_on),'%d-%m-%Y')",'dt'=>5,'alias'=>'created_on'), 
			array('db'=>"m_partner.status",'dt'=>6,'alias'=>'displays','formatter'=>function($d,$row){
				 if($d==1)
				 {
					return "<a href='javascript:void(0);' class='btn btn-checks'  data-ref='".$row->id."' data-check='".$d."'><i class='fa fa-check'></i></a>";	 
				 }
				 return "<a href='javascript:void(0);' class='btn btn-checks'  data-ref='".$row->id."' data-check='".$d."'><i class='fa fa-ban'></i></a>";
			}),
			array('db'=>'m_partner.id','dt'=>7,'alias'=>'id','formatter'=>function($d,$row){
				return ' 
						  <button class="btn btn-xs btn-sm btn-danger btn-sm btn-delete-sites" type="button" data-toggle="tooltip" title="" data-original-title="Remove " data-ref="'.$d.'"><i class="fa fa-times"></i></button>
						 ';
			}),
			);
			$table = 'm_partner';
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
				
			$this->db->delete('partner');
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