<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Company extends Smart_Controller
{
	private $_users;
	public function __construct()
	{
		parent::__construct();

		 
	}
	public function index()
	{
		$in['company_category'] = $this->db->get('company_category')->result_array();  
		$in['use_hedaer'] = true;
		$in['title'] = 'Project';
		$in['desc'] = 'you can manage your Portal here';
		$in['bread'][''] = 'Project';
		$in['bread'][site_url('manager/company')] = 'Project';
		$in['tpl'] = 'company/main';
		$this->load->view('manager/layout',$in);
	}
	public function getlist()
	{
		if($this->input->is_ajax_request())
		{
			$this->load->library('ssp');
			$ssp = $this->ssp;
			$primaryKey = 'm_company.id';
			$columns    = array(
			array('db'=>'m_company.id','dt'=>0,'alias'=>'ids','formatter'=>function($d,$row){
				return '<input type="checkbox" class="chk-item" value="'.$d.'">';
			}),
			
			 
			array('db'=>'m_company_category.name','dt'=>1,'alias'=>'cats','formatter'=>function($d,$row){
				return $d;
			}),  
			array('db'=>'m_company.images','dt'=>2,'alias'=>'images','formatter'=>function($d,$row){
				if(!empty($d) && is_file(config_item('upload_path').$d) && file_exists(config_item('upload_path').$d))
				{
					return '<img src="'.config_item("main_site")."uploads/".$d.'" width="80" />';
				}
			}), 
			array('db'=>'m_company.name','dt'=>3,'alias'=>'name','formatter'=>function($d,$row){
				return $d;
			}), 
			array('db'=>'m_company.telegram','dt'=>4,'alias'=>'company','formatter'=>function($d,$row){
				return $d;
			}), 
			array('db'=>'m_company.pic','dt'=>5,'alias'=>'pic','formatter'=>function($d,$row){
				 return $d;
			}), 
			array('db'=>'m_company.website','dt'=>6,'alias'=>'website','formatter'=>function($d,$row){
				return '<a href="'.$d.'" target="_blank">'.$d.'</a>';
			}), 
			array('db'=>"m_company.displays",'dt'=>7,'alias'=>'displays','formatter'=>function($d,$row){
				 if($d==1)
				 {
					return "<a href='javascript:void(0);' class='btn btn-checks'  data-ref='".$row->id."' data-check='".$d."'><i class='fa fa-check'></i></a>";	 
				 }
				 return "<a href='javascript:void(0);' class='btn btn-checks'  data-ref='".$row->id."' data-check='".$d."'><i class='fa fa-ban'></i></a>";
			}),
			array('db'=>'m_company.id','dt'=>8,'alias'=>'id','formatter'=>function($d,$row){
				return ' <button class="btn btn-xs btn-sm btn-warning btn-sm btn-edit-sites" type="button" data-toggle="tooltip" title="" data-original-title="Edit " data-ref="'.$d.'"><i class="fa fa-pencil"></i></button>
						  <button class="btn btn-xs btn-sm btn-danger btn-sm btn-delete-sites" type="button" data-toggle="tooltip" title="" data-original-title="Remove " data-ref="'.$d.'"><i class="fa fa-times"></i></button>
						 ';
			}),
			);
			$table = 'm_company inner join m_company_category on(m_company_category.id=m_company.id_company_category)';
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
				
			$this->db->delete('company');
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
		 
			$data = $this->db->get('company');
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
			if(isset($in['img-container']))
			unset($in['img-container']);
			if(isset($_FILES['image']))
			{
				if($_FILES['image']['error']==0)
				{
					$name = get_unique_file($_FILES['image']['name']);
					if(move_uploaded_file($_FILES['image']['tmp_name'],$this->config->item('upload_path').$name))
					{
						$in['images'] = $name;
					}
				}  
			}
			$this->db->trans_begin();
			$time = time();
			 
			if(empty($in['id']))
			{
				$in['created_by'] = user_info('id');
				$in['updated_by'] = user_info('id');
				$in['created_on'] = $time;
				$in['updated_on'] = $time;
				$this->db->insert('company',$in);
			}
			else
			{
				$this->db->where('id',$in['id']);
				$old = $this->db->get('company');
				if($old->num_rows()==1)
				{
					$arr = $old->row_array();
					 
					$in['updated_by'] = user_info('id');
					$in['updated_on'] = $time;
					$this->db->where('id',$in['id']);
					$this->db->update('company',$in);
				}
				else
				{
					echo json_encode(array('error'=>true,'message'=>'Data not found','security'=>token()));
					exit;
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
			->update('company',array("displays"=>$in['displays']));
			
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
}