<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Devices extends CI_Controller {

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
		$this->load->library('device'); 
		$device = $this->device->getinfo();
		
		print_r($device);
		print_r(get_os());
		exit;
		$in = array(); 
								
		 
		$in['bread']['#'] = 'Device';
		
		$in['title'] = ""; 
		$in['tpl'] = "devices/devices";
		$this->load->view('manager/devices/devices',$in);
		return; 
	}
	 
	
}

