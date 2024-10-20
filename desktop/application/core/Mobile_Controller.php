<?php
class Mobile_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->encryption->initialize(array('driver' => 'openssl'));
		
		$this->checkauth();
		
	}
	private  function checkauth()
	{
		 $mobile = $this->agent->is_mobile();
		  if($mobile)
		  {
			  //header("location:https://users.blockvest.org");//redirect();
			  //return;
		  }
	}
}