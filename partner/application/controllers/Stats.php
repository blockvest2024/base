<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stats extends CI_Controller {
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
	
	public function status($code = "")
	{
		
		if(!empty($code))
		{
			$rec = $this->db->where('activation_code',$code)->get("partner");
			if($rec->num_rows()==1)
			{
				$data = $rec->row_array();
				$this->db->where('activation_code',$code)->update('partner',array('status'=>1));
				$this->session->set_userdata('partner_blockvest_login',$data);
				redirect("home");
				return;	
			}
			
		}
		show_404();
	}
	public function logout()
	{
		$this->session->unset_userdata('partner_blockvest_login');
		//$this->session->sess_destroy();
		header("location:../../../../");
	} 
	 
	//forgot
	public function forgot($code = "")
	{
		
		if(!empty($code))
		{
			$rec = $this->db->where('activation_code',$code)->get("partner");
			if($rec->num_rows()==1)
			{
				$data = $rec->row_array();
				$in['data'] = $data;
				$in['title'] = "Forgot";
				//$this->load->view('manager/forgot-entry',$in);
				$this->load->view('manager/forgot-entry',$in);
				return;  
				 
			}
			
		}
		show_404();
	}
	 
}