<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
	public function index()
	{
		$this->load->library('facebook');
		//echo $this->encryption->encrypt('123qweasd');;
		//exit; 
		 
		$in['google_url'] = $this->googleplus->loginURL();
		$in['facebook_url'] = $this->facebook->loginURL(); 
		$in['title'] = "Logins";
		$this->load->view('manager/login',$in);
		return; 
	}
	public function check()
	{
		if($this->input->is_ajax_request() && $this->input->post())
		{
			$this->load->library('device'); 
			$device = $this->device->getinfo();
			if($device['bot'])
			{
				json(array('error'=>true,'message'=>'<b>Bot Not Allowed</b>','security'=>token()));
				return;
			}
			$telps = $this->input->post('telps',true);
			$username = $this->input->post('telp',true);
			$pass = $this->input->post('password',true);
			//
			$block =  $this->db->where("( email = '".$username."')")->where("status=2")->get('v_customer')->row_array();
			if(isset($block['id']))
			{
				json(array('error'=>true,'message'=>'<b>Blocked Account</b><br/><small style="font-weight:normal;">Reason:  '.$block['reason']."</small>",'security'=>token()));
				return;
			}
			$ip = getUserIP();
			$device_id = signature(); //uniqid();
			//
			$this->db
			->where("status=1")
			  
			->where("( telp = '".$username."' or telp='".$telps."')");
			$arr =  $this->db->get('v_customer')->result_array();
			 
			for($i=0;$i<count($arr);$i++)
			{
				 if($arr[$i]['status']!=1)
				 {
					 json(array('error'=>true,'message'=>'User not found','security'=>token()));
					 return;	
				 }
				 $arr[$i]['password'] = $this->encryption->decrypt($arr[$i]['password']);
                 if($arr[$i]['password']==$pass)
                 {
					 
					$c = $arr[$i];
					$logs = array();
					
					
					if(isset($device['data']['device']))
					{
						$this->db->trans_begin();
						$up = array();
						$up['ip_address'] = $ip;
						$up['os_info'] = $device['data']['os']['name']."".$device['data']['os']['version'];
						$up['device_id'] = $device_id;
						$up['platform'] = $device['data']['device'];
						$this->session->set_userdata('get_device',$device_id);
						
						$this->db->where('id',$c['id'])->update('customer',$up);  
						$this->db->trans_commit(); 
						insert_log($c['id']);
						$this->session->set_userdata('blockvest_customer',$c);
						json(array('error'=>false,'message'=>'Proses User','security'=>token(),'data'=>$arr[$i]));
						return;
					}
				}
			}
			json(array('error'=>true,'message'=>'User not found','security'=>token()));
			return;	
		}
		show_404();
	}
	public function logout()
	{
		$this->session->unset_userdata('blockvest_customer');
		$this->session->unset_userdata('get_user_login'); 
		redirect('login');
	}
	public function forgot()
	{
		//echo $this->encryption->encrypt('seller');
		//exit;
		$in['title'] = "Logins";
		$this->load->view('manager/forgot',$in);
		return; 
	}
	public function token()
	{
		json(array('error'=>false,'message'=>'token generate','security'=>token()));
		return;
	}
	 
	 
}

