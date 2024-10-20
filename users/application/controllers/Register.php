<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

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
		 //return redirect("login"); 
		 
	}
	public function index($ids = "")
	{
		
		$in = array();
		 
		 
		$in['refs'] = $ids; 
		$in['title'] = "Logins";
		$this->load->view('manager/register',$in);
		return; 
	}
	 
	public function views($ids = "")
	{
		 
		$in = array();
		 
		 
		$in['refs'] = $ids; 
		$in['title'] = "Logins";
		$this->load->view('manager/register',$in);
		return; 
	}
	public function cek($ids = "")
	{
		 
		$in = array();
		 
		 
		$in['refs'] = $ids; 
		$in['title'] = "Logins";
		$this->load->view('manager/check_register',$in);
		return; 
	}
	public function save()
	{
		if($this->input->is_ajax_request() && $this->input->post())
		{
			$this->load->library('device'); 
			$in = $this->input->post();
			if(!isset($in['agree']))
			{
				json(array('error'=>true,'message'=>'<b>Checklist Agreement</b>','security'=>token()));
				return;
			}
			unset($in['agree']);
			
			$ip = getUserIP();
			$device = $this->device->getinfo();
			
			if($device['bot'])
			{
				json(array('error'=>true,'message'=>'<b>Bot Not Allowed</b>','security'=>token()));
				return;
			}
			if(!isset($device['data']['device']))
			{
				json(array('error'=>true,'message'=>'<b>Bot Not Allowed</b>','security'=>token()));
				return;
			}
			$get_device = $this->session->userdata('get_device');
			/*if(!empty($get_device))
			{
				json(array('error'=>true,'message'=>'For Security Reason, Register is Failed','security'=>token()));
				return;
			}*/
			$device_id = signature();
			/*$device_id = signature();
			if($get_device==$device_id)
			{
				json(array('error'=>true,'message'=>'For Security signature Reason, Register is Failed','security'=>token()));
				return;
			}
			
			 
			
			
			$cck = false;
			
			 
			$check_ip = $this->db->where('ip_address',$ip)->get('customer')->row_array();
			if(isset($check_ip['id']))
			{
				json(array('error'=>true,'message'=>"For Security Reason, Register is Failed","urlv"=>site_url('page-error/error_ip'),'security'=>token()));
				return;
					
			}*/
			 
			
			
			/*
			if (strpos($in['email'], "gmail") !== false || strpos($in['email'], "yahoo") !== false) {
				//json(array('error'=>true,'message'=>custom_language('Use email only gmail and yahoo'),'security'=>token()));
				//return;	
				$cck = true;
			} 	
			if(!$cck)
			{
				json(array('error'=>true,'message'=>custom_language('Use email only gmail and yahoo'),'security'=>token()));
				return;
			}
			*/
			
			$time = time();
			$check = $this->db->where('email',$in['email'])->get('customer');
			if($check->num_rows()>0)
			{
				json(array('error'=>true,'message'=>'Email Exist','security'=>token()));
				return;	
			}
			//
			 
			//
			if(isset($in['refferal']))
			{
				if(!empty($in['refferal']))
				{
					/*
					$in['refferal'] = str_replace("A-","",$in['refferal']);
					$in['refferal'] = preg_replace("/[^0-9.]/", "", $in['refferal']);
					*/
					
					$refferal = str_replace("A-","",$in['refferal']);
					$refferal = preg_replace("/[^0-9.]/", "", $refferal);
					$check_ref = $this->db->where('pid',$refferal)->get('v_customer');
					unset($in['refferal']);
					if($check_ref->num_rows()>0)
					{
						$arr = $check_ref->row_array();
						$in['refferal'] = $arr['id'];
						
					}
				}
			}
			$in['ip_address'] = $ip;
			 
			$in['os_info'] = $device['data']['os']['name']."".$device['data']['os']['version'];
			$in['device_id'] = $device_id;
			$in['platform'] = $device['data']['device'];
						
			
			
			$in['created_on'] = $time;
			$in['updated_on'] = $time;
			//$in['activation_code'] = get_unique_customer_code();
			 $wa_code = get_unique_wa();
			$in['wa_code'] = $wa_code;
			
			$in['password'] =  $this->encryption->encrypt($in['passwords']);
			if(isset($in['passwords']))
			{
				unset($in['passwords']);	
			}
			 #wa code
		     $this->load->library('smspintar');
			 $smspintar = $this->smspintar;
		
			 $telp = $in['telp'];
			$check = $this->db->where('telp',$in['telp'])->get('customer');
			if($check->num_rows()>0)
			{
				json(array('error'=>true,'message'=>'Telp Exist','security'=>token()));
				return;	
			}
			/* $this->session->set_userdata('wa_code',$wa_code);
			 $this->session->set_userdata('smspintar_wa_code',$wa_code);
			// $data = $smspintar->send('6289517704296',$wa_code);
			 $data = $smspintar->send($telp,$wa_code);
			 
			 if(isset($data['status']))
			 {
				if($data['status']=="000"  || $data['status']=="001"|| $data['status']=="002")
				{
					$this->session->set_userdata('smspintar_wa_code',$wa_code);
					
					//json(array('error'=>false,'message'=>'Proccess','security'=>token()));
					//return;
					
					
				}
			 }*/
			 $this->db->insert("customer",$in);
			 $ids = $this->db->insert_id(); 
			  
			  $cc = $this->db->where('id',$ids)->get('customer')->row_array(); 
			 $this->session->set_userdata('blockvest_customer',$cc);
					//send_mail_link($in);
			 json(array('error'=>false,'message'=>"Success","urlv"=>site_url('otp/verify/'.$ids),'security'=>token()));
			 return;
			#wa code
		
			 
		}
		show_404();
	}
	public function resend()
	{
		$in = $this->session->userdata('blockvest_customer');
		send_mail_link($in);
	}
	 
	 
	 
}

