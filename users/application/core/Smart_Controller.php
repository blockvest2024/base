<?php
class Smart_Controller extends CI_Controller
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
		$class = $this->router->fetch_class(); 
		if(check_proxy())
		{
			redirect('page-error/vpns');
			return;
		}
		
		if( isset($ses['status']))
		{
			if(!empty($ses) && $ses['status']==0)
			{
				//$this->session->unset_userdata('blockvest_customer');
				redirect('login');
				return;
			}
		}
		//insert_fcm();
		#phone
		if($class!='otp' && !empty($ses))
		{
			$phone_verification = user_balance("phone_verification");
			 
			if($phone_verification==0)
			{
				redirect('otp/verify');
				return;	
			}
		}
		#phone
		if($class=='login' && !empty($ses))
		{
			if(isset($ses['status']))
			{
				if($ses['status']!=1)
				{
					$this->session->unset_userdata('blockvest_customer');
					redirect('login');
					return;
				}
			}
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