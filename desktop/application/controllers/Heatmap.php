<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Heatmap extends Mobile_Controller {

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
		$cc = $this->input->get("c");
		$data = $this->db->where('displays',1)->get('portal')->result_array();
		$in = array(); 
		$in['arr'] = $data; 								
														
		$in['bread']['#'] = 'News';
		$in['xgets'] = $cc;
		$in['title'] = ""; 
		$in['tpl'] = "heatmap/main";
		$in['page_header'] = "heatmap/page_header";
		$this->load->view('manager/layout',$in);
		return; 
	}
	 
	 
	 
	 
}

