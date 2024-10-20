<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Community extends Mobile_Controller {

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
		 
		$in = array(); 
	 						
		 										
		$in['bread']['#'] = 'News';
		
		$in['title'] = ""; 
		$in['tpl'] = "community/main";
		$in['page_header'] = "community/page_header";
		$this->load->view('manager/layout',$in);
		return; 
	}
	public function getlist()
	{
		 $data = $this->db->where('displays',1)->get('community')->result_array();
		 for($i=0;$i<count($data);$i++)
		 {
			 	$data[$i]['id'] = $i+1;
			 	$d = $data[$i]['images'];
			 	if(!empty($d) && is_file(config_item('upload_path').$d) && file_exists(config_item('upload_path').$d))
				{
					$data[$i]['images'] = '<img src="'.config_item("main_site")."uploads/".$d.'" width="80" />';
				}
		 }
		 $rr = array();
		 $rr['data'] = $data; 
		 json($rr);
		 return;
		 
	}
		
	 
	 
	 
	 
}

