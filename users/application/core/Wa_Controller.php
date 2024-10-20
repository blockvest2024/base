<?php
class Wa_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->encryption->initialize(array('driver' => 'openssl'));
		
		$this->checkauth();
		
	}
	private  function checkauth()
	{
		
		$ses = $this->session->userdata('blockvest_customer');
		 
		if(check_proxy())
		{
			redirect('page-error/vpns');
			return;
		}
		//insert_fcm();
		$class = $this->router->fetch_class();
		if($class=='login' && !empty($ses))
		{
			 
			redirect('home');
			return;
		}
		if(empty($ses))
		{
			//$this->session->sess_destroy();
			$this->session->unset_userdata('blockvest_customer');
			redirect('login');
			return;
		}
	}
}