<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Portal extends Smart_Controller
{
	private $_users;
	public function __construct()
	{
		parent::__construct();

		 
	}
	public function index()
	{
		$in['portal_category'] = $this->db->get('portal_category')->result_array(); 
		$in['use_hedaer'] = true;
		$in['title'] = 'Portal News';
		$in['desc'] = 'you can manage your Portal here';
		$in['bread'][''] = 'Configuration';
		$in['bread'][site_url('manager/portal')] = 'Portal';
		$in['tpl'] = 'portal/main';
		$this->load->view('manager/layout',$in);
	}
	public function getlist()
	{
		if($this->input->is_ajax_request())
		{
			$this->load->library('ssp');
			$ssp = $this->ssp;
			$primaryKey = 'm_portal.id';
			$columns    = array(
			array('db'=>'m_portal.id','dt'=>0,'alias'=>'ids','formatter'=>function($d,$row){
				return '<input type="checkbox" class="chk-item" value="'.$d.'">';
			}),
			
			 
			array('db'=>'(select a.name from m_portal_category a where a.id=m_portal.id_portal_category limit 1)','dt'=>1,'alias'=>'cats','formatter'=>function($d,$row){
				return $d;
			}),
			array('db'=>'m_portal.name','dt'=>2,'alias'=>'portal','formatter'=>function($d,$row){
				return $d;
			}), 
			array('db'=>'m_portal.icon_link','dt'=>3,'alias'=>'icon_link','formatter'=>function($d,$row){
				#return '<img src="'.$d.'" width="80" />';
				/*if(!empty($d) && is_file(config_item('upload_path').$d) && file_exists(config_item('upload_path').$d))
				{
					$thumb = getThumb($d,100,90);
					return '<img class="img-thumbnail" src="cache/'.$thumb.'"  >';
				}*/
				return '<img src="'.config_item("main_site")."uploads/".$d.'" width="80" />';
			}), 
			array('db'=>'m_portal.rss_link','dt'=>4,'alias'=>'type','formatter'=>function($d,$row){
				return '<a href="'.$d.'" target="_blank">Links</a>';
			}), 
			array('db'=>"m_portal.displays",'dt'=>5,'alias'=>'displays','formatter'=>function($d,$row){
				 if($d==1)
				 {
					return "<a href='javascript:void(0);' class='btn btn-checks'  data-ref='".$row->id."' data-check='".$d."'><i class='fa fa-check'></i></a>";	 
				 }
				 return "<a href='javascript:void(0);' class='btn btn-checks'  data-ref='".$row->id."' data-check='".$d."'><i class='fa fa-ban'></i></a>";
			}),
			array('db'=>'m_portal.id','dt'=>6,'alias'=>'id','formatter'=>function($d,$row){
				return ' <button class="btn btn-xs btn-sm btn-warning btn-sm btn-edit-sites" type="button" data-toggle="tooltip" title="" data-original-title="Edit " data-ref="'.$d.'"><i class="fa fa-pencil"></i></button>
						  <button class="btn btn-xs btn-sm btn-danger btn-sm btn-delete-sites" type="button" data-toggle="tooltip" title="" data-original-title="Remove " data-ref="'.$d.'"><i class="fa fa-times"></i></button>
						 ';
			}),
			);
			$table = 'm_portal';
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
				
			$this->db->delete('portal');
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
		 
			$data = $this->db->get('portal');
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
			if(isset($in['img-container']))
			unset($in['img-container']);
			if($_FILES['image']['error']==0)
			{
				$name = get_unique_file($_FILES['image']['name']);
				if(move_uploaded_file($_FILES['image']['tmp_name'],$this->config->item('upload_path').$name))
				{
					$in['icon_link'] = $name;
				}
			} 
			if(empty($in['id']))
			{
				$in['created_by'] = user_info('id');
				$in['updated_by'] = user_info('id');
				$in['created_on'] = $time;
				$in['updated_on'] = $time;
				$this->db->insert('portal',$in);
			}
			else
			{
				$this->db->where('id',$in['id']);
				$old = $this->db->get('portal');
				if($old->num_rows()==1)
				{
					$arr = $old->row_array();
					 
					$in['updated_by'] = user_info('id');
					$in['updated_on'] = $time;
					$this->db->where('id',$in['id']);
					$this->db->update('portal',$in);
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
			->update('portal',array("displays"=>$in['displays']));
			
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