<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Otp extends Wa_Controller {
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
		 
	}
	
	//forgot
	public function auth()
	{
		if($this->input->is_ajax_request() && $this->input->post())
		{
			 $this->load->library('smspintar');
			 $smspintar = $this->smspintar;
		
			 $telp = user_info('telp');
			 $wa_code = user_info('wa_code'); #get_unique_wa();
			 $this->session->set_userdata('wa_code',$wa_code);
			// $data = $smspintar->send('6289517704296',$wa_code);
			 $data = $smspintar->send($telp,$wa_code);
			 if(isset($data['status']))
			 {
				if($data['status']=="000"  || $data['status']=="001"|| $data['status']=="002")
				{
					$this->session->set_userdata('smspintar_wa_code',$wa_code);
					json(array('error'=>false,'message'=>'Proccess','security'=>token()));
					return;
				}
			 }
		}
		json(array('error'=>true,'message'=>'Proccess Failed','security'=>token()));
		return;
	}
	public function signed()
	{
		if($this->input->is_ajax_request() && $this->input->post())
		{
			$wa_code = $this->session->userdata('smspintar_wa_code');
			$id = user_info('id');
			$check = $this->db->where('id',$id)->get('customer')->row_array();
			$in = $this->input->post();
			if(isset($check['id']))
			{
				if($check['wa_code']==$wa_code)
				{
					$id = user_info('id');
					$this->db->trans_begin();
					#$this->db->where('id',$id)->update('customer',array("wa_code"=>$wa_code,"status"=>1));
					$this->db->where('id',$id)->update('customer',array("status"=>1));
					$this->db->trans_commit();
					$cdata = $this->db->where('id',$id)->get('customer')->row_array();
					if(isset($cdata['id']))
					{
						$this->session->set_userdata('blockvest_customer',$cdata);
					}
					json(array('error'=>false,'message'=>'Proccess','security'=>token()));
					return;
				}
			}
			
		}
		json(array('error'=>true,'message'=>'Invalid Code','security'=>token()));
		return;
	}
	#== page verify
	public function verify()
	{
		$in = array(); 
		 			
		$in['bread']['#'] = 'profile';
		 
		$in['title'] = ""; 
		$in['tpl'] = "otp/verify";
		$this->load->view('manager/layout',$in);
		return; 
	}
	 
	 
}