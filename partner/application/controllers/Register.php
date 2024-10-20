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
		 
	}
	public function index($ids = "")
	{
		 
		$in = array();
		$in['partner_type'] = $this->db->where('displays',1)->get('partner_type')->result_array(); 
		 
		$in['refs'] = $ids; 
		$in['title'] = "Logins";
		$this->load->view('manager/register',$in);
		return; 
	}
	public function save()
	{
		if($this->input->is_ajax_request() && $this->input->post())
		{
			$in = $this->input->post();
			$time = time();
			$check = $this->db->where('email',$in['email'])->get('partner');
			if($check->num_rows()>0)
			{
				json(array('error'=>true,'message'=>'Email Exist','security'=>token()));
				return;	
			}
			 
			//
			 
			//
			
			//$in['refferal'] = str_replace("DENS-","",$in['refferal']);
			//$in['refferal'] = str_replace("XOME-","",$in['refferal']);
			$in['created_on'] = $time;
			$in['updated_on'] = $time;
			 
			$in['activation_code'] = get_unique_partner_code();
			$in['password'] =  $this->encryption->encrypt($in['password']);
			
			$this->session->set_userdata('blockvest_task_login_session',$in);
			 
			//unset($in['password']);
			$this->db->insert("partner",$in);
			$in['urls'] = site_url("stats/status/".$in['activation_code']);
			$this->session->set_userdata('blockvest_task_login_session',$in);
			send_mail_link($in);
			json(array('error'=>false,'message'=>"Check your email inbox or spam, for confirmation email  </h5><br/> <a href='javascript:void(0);' class='resends btn btn-small btn-sm btn-xs btn-danger' style='float:right;' onclick='javascript:resendclick();'>Resend</a><br/>",'security'=>token()));
			return;
		}
		show_404();
	}
	public function resend()
	{
		$in = $this->session->userdata('blockvest_task_login_session');
		send_mail_link($in);
	}
	 
	 
	 
}

