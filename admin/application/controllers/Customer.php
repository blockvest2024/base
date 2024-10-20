<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customer extends Smart_Controller
{
	private $_users;
	public function __construct()
	{
		parent::__construct();

		 
	}
	public function index()
	{
		 
		$in['use_hedaer'] = true;
		$in['title'] = 'Customer';
		$in['desc'] = 'you can manage your Customer here';
		$in['bread'][''] = 'Configuration';
		$in['bread'][site_url('manager/customer')] = 'Customer';
		$in['tpl'] = 'customer/main';
		$this->load->view('manager/layout',$in);
	}
	public function getlist()
	{
		if($this->input->is_ajax_request())
		{
			$this->load->library('ssp');
			$ssp = $this->ssp;
			$primaryKey = 'm_customer.id';
			$columns    = array(
			array('db'=>'m_customer.id','dt'=>0,'alias'=>'ids','formatter'=>function($d,$row){
				return '<input type="checkbox" class="chk-item" value="'.$d.'">';
			}),
			
			 
			 
			array('db'=>'m_customer.name','dt'=>1,'alias'=>'full_name','formatter'=>function($d,$row){
				return $d;
			}), 
			array('db'=>'m_customer.email','dt'=>2,'alias'=>'email','formatter'=>function($d,$row){
				return $d;
			}), 
			array('db'=>'m_customer.telp','dt'=>3,'alias'=>'telp','formatter'=>function($d,$row){
				return $d;
			}), 
			array('db'=>"DATE_FORMAT(FROM_UNIXTIME(m_customer.created_on),'%d-%m-%Y')",'dt'=>4,'alias'=>'created_on'), 
			array('db'=>"m_customer.status",'dt'=>5,'alias'=>'displays','formatter'=>function($d,$row){
				 if($d==1)
				 {
					return "<a href='javascript:void(0);' class='btn btn-checks'  data-ref='".$row->id."' data-check='".$d."'><i class='fa fa-check'></i></a>";	 
				 }
				 return "<a href='javascript:void(0);' class='btn btn-checks'  data-ref='".$row->id."' data-check='".$d."'><i class='fa fa-ban'></i></a>";
			}),
			array('db'=>'m_customer.id','dt'=>6,'alias'=>'id','formatter'=>function($d,$row){
				return ' 
						  <button class="btn btn-xs btn-sm btn-danger btn-sm btn-delete-sites" type="button" data-toggle="tooltip" title="" data-original-title="Remove " data-ref="'.$d.'"><i class="fa fa-times"></i></button>
						 ';
			}),
			);
			$table = 'm_customer';
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
				
			$this->db->delete('customer');
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
	public function imports()
	{
		$in['use_hedaer'] = true;
		$in['title'] = "imports";
		$in['desc'] = 'anda dapat menambah data imports disini.';
		$in['bread']['#'] = 'Imports';
		 
		$in['bread'][site_url('manager/imports')] = 'imports';
		$in['tpl'] = 'customer/imports';
		return $this->load->view('manager/layout',$in);
		
	}
	public function save_imports()
	{
		if($this->input->is_ajax_request())
		{
			if(isset($_FILES['image']))
			{
				if($_FILES['image']['error']==0)
				{
					$names = $_FILES['image']['name']; //get_unique_file($_FILES['image']['name']);
					$this->simport($_FILES['image']['tmp_name'],$names);
					json(array('error'=>false,'message'=>'Proccess Done','security'=>token()));
					return;
				}
			}
		}
		json(array('error'=>true,'message'=>'Proccess Failed','security'=>token()));
		return;
	}
	public function simport($temp,$names)
	{
		
		$this->load->library('PHPExcel');
		if (PHP_SAPI == 'cli')
		die('This example should only be run from a Web Browser');
		$objPHPExcel = new \PHPExcel();
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load($temp); 
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);	
		 
		
		$no = 0;
		$time = time();
		$datetime = date('Y-m-d H:i:s');
		 
		foreach($sheet as $row)
		{
			if($no>0)
			{
				if(!empty($row['A']))
				{
					$customer = $this->db->where('email',strtolower($row['A']))->get('customer')->row_array();
					if(!isset($customer['id']))
					{ 
						$k = array();
						$k['email'] = trim($row['A']);
						$k['name'] = trim($row['B']);
						$k['telp'] = trim($row['C']);
						$k['status'] = 1;
						$k['created_on'] = $time;
						$k['password'] = $this->encryption->encrypt('import123'); 
						//
						 
						$this->db->trans_begin();
						$this->db->insert("customer",$k);
						$this->db->trans_commit();
					}
					
				}
			}
			$no++;
		}
		
	}
	 
}