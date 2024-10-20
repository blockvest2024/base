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
		 
		$in['title'] = "Logins";
		 
		$this->load->view('manager/login',$in);
		return; 
	}
	public function check()
	{
		if($this->input->is_ajax_request() && $this->input->post())
		{
			$email = $this->input->post('email',true);
			$pass = $this->input->post('password',true);
			$this->db
			->where("status=1")
			->where("( email = '".$email."')");
			$arr =  $this->db->get('partner')->result_array();
			 
			for($i=0;$i<count($arr);$i++)
			{
				 
				 $arr[$i]['passwords'] = $this->encryption->decrypt($arr[$i]['password']);
                 if($arr[$i]['passwords']==$pass)
                 {
					$c = $arr[$i];
					 
					$this->session->set_userdata('partner_blockvest_login',$c);
					json(array('error'=>false,'message'=>'Proses User','security'=>token(),'data'=>$arr[$i]));
					return;
				}
			}
			json(array('error'=>true,'message'=>'User not found','security'=>token()));
			return;	
		}
		show_404();
	}
	public function logout()
	{
		$this->session->unset_userdata('partner_blockvest_login');
		//$this->session->sess_destroy();
		redirect('login');
	}
	public function chex()
	{
		echo $this->encryption->encrypt('123qwe');
	}
	public function forgot()
	{
		//echo $this->encryption->encrypt('seller');
		//exit;
		$in['title'] = "Logins";
		//$this->load->view('manager/forgot',$in);
		$this->load->view('manager/forgot',$in);
		return; 
	}
	public function token()
	{
		json(array('error'=>false,'message'=>'token generate','security'=>token()));
		return;
	}
	 
	 
}

