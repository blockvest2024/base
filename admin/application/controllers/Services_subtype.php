<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Services_subtype extends Smart_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$in['use_hedaer'] = true;
		 
		$in['title'] = 'Services sub';
		$in['desc'] = 'you can manage your Services sub here';
		$in['bread']['#'] = 'Services sub';
		$in['bread'][site_url('manager/services_subtype')] = 'Services sub';
		$in['tpl'] = 'services_subtype/main';
		 
		$this->load->view('manager/layout',$in);
	}
	public function getlist()
	{
		if($this->input->is_ajax_request())
		{
			$this->load->library('ssp');
			$ssp = $this->ssp;
			$primaryKey = 'm_services_subtype.id';
			$columns    = array(
			array('db'=>'m_services_type.name','dt'=>0,'alias'=>'services','formatter'=>function($d,$row){
				return $d;
			}), 
			array('db'=>'m_services_subtype.name','dt'=>1,'alias'=>'names','formatter'=>function($d,$row){
				return $d;
			}),
			 
			  
			 
			array('db'=>"m_services_subtype.displays",'dt'=>2,'alias'=>'displays','formatter'=>function($d,$row){
				 if($d==1)
				 {
					return "<a href='javascript:void(0);' class='btn btn-info btn-checked'  data-ref='".$row->id."' data-check='".$d."'><i class='fa fa-check'></i></a>";	 
				 }
				 return "<a href='javascript:void(0);' class='btn btn-danger btn-checked'  data-ref='".$row->id."' data-check='".$d."'><i class='fa fa-ban'></i></a>";
			}), 
			
			array('db'=>'m_services_subtype.id','dt'=>3,'alias'=>'id','formatter'=>function($d,$row){
				return ' 
							<a href='.site_url('services-subtype/edit/'.$d).' class="btn btn-xs btn-warning btn-sm " type="button" data-toggle="tooltip" title="" data-original-title="Edit" data-ref="'.$d.'"><i class="fa fa-pencil-alt"></i></a>
							<button class="btn btn-xs btn-danger btn-sm btn-delete-users" type="button" data-toggle="tooltip" title="" data-original-title="Remove " data-ref="'.$d.'"><i class="fa fa-times"></i></button>
						 ';
			}), 
			array('db'=>'m_services_subtype.id','dt'=>4,'alias'=>'ids','formatter'=>function($d,$row){
				return $d;
			}), 
			
			);
			$table = 'm_services_subtype inner join m_services_type on(m_services_subtype.id_services_type=m_services_type.id) ';
			$whereResult = NULL;
			$whereAll = '1=1';
			
			$arr = $ssp::complex( $_GET, $this, $table, $primaryKey, $columns, $whereResult, $whereAll );
			echo json_encode($arr);
			exit;
		}
		show_404();
	}
	public function displays()
	{
		if($this->input->post() && $this->input->is_ajax_request())
		{
			$in = $this->input->post(); 
			if($in['displays']==1)
			{
				$in['displays']=0;
			}
			else
			{
				$in['displays'] = 1;
				 
			}
			$this->db->trans_begin();	
			$this->db->where('id',$in['id'])
			->update('services_subtype',array("displays"=>$in['displays']));
			
			if($this->db->trans_status() === FALSE)
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
	public function add()
	{
		$in['use_hedaer'] = true;
		$in['arr'] = $this->db->get('services_type')->result_array();
		$in['title'] = 'Master Services Sub';
		$in['desc'] = 'you can manage your Services Type here';
		$in['bread']['#'] = 'Services Type';
		$in['bread'][site_url('manager/services_type')] = 'Services Type';
		$in['tpl'] = 'services_subtype/form';
		 
		$this->load->view('manager/layout',$in);
	}
	public function edit($id)
	{
		if(!empty($id))
		{
			$rec = $this->db->where('id',$id)->get('services_subtype');
			if($rec->num_rows()==1)
			{
				$in['arr'] = $this->db->get('services_type')->result_array();
				$in['data'] = $rec->row_array();
				$in['use_hedaer'] = true;
				$in['title'] = 'Master Services Sub';
				$in['desc'] = 'you can manage your Services Type here';
				$in['bread']['#'] = 'Services Type';
				$in['bread'][site_url('manager/services_subtype')] = 'Services Type';
				$in['tpl'] = 'services_subtype/form';
				 
				$this->load->view('manager/layout',$in);
				return;
			}
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
			$this->db->delete('services_subtype');
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
	public function match()
	{
		if($this->input->is_ajax_request() && $this->input->post())
		{
			$id = $this->input->post('id',true);
			$this->db->where('id',$id);
			$data = $this->db->get('services_subtype');
			if($data->num_rows()==1)
			{
				json(array('error'=>false,'message'=>'one data found','data'=>$data->row_array(),'security'=>token()));
				return;
			}
			json(array('error'=>true,'message'=>'data not found','security'=>token()));
			return;
		}
		show_404();
	} 
	public function save()
	{
		if($this->input->is_ajax_request() && $this->input->post())
		{
			$in = $this->input->post();
			$this->db->trans_begin();
			$time = time();
			 
			if(empty($in['id']))
			{
				 
				$this->db->insert('services_subtype',$in);
			}
			else
			{
				$this->db->where('id',$in['id']);
				$old = $this->db->get('services_subtype');
				if($old->num_rows()==1)
				{
					$arr = $old->row_array();
					 
					$this->db->where('id',$in['id']);
					$this->db->update('services_subtype',$in);
				}
				else
				{
					json(array('error'=>true,'message'=>'Data not found','security'=>token()));
					return;
				}
			}
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
	public function childs()
	{
		if($this->input->is_ajax_request() && $this->input->post())
		{
			$id = $this->input->post('id',true);
			$this->db->where('id_services_type',$id);
			$data = $this->db->get('services_subtype');
			if($data->num_rows()>0)
			{
				json(array('error'=>false,'message'=>'one data found','data'=>$data->result_array(),'security'=>token()));
				return;
			}
			json(array('error'=>true,'message'=>'data not found','security'=>token()));
			return;
		}
		show_404();
	} 
}