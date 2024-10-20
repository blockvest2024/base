<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Smart_Controller {

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
		 
		
		 							  	
		$in['bread']['#'] = 'Dashboard';
		$in['community'] = $this->db->get('community')->num_rows();
		$in['company'] = $this->db->get('company')->num_rows();
		$in['review'] = $this->db->get('review')->num_rows();
		$in['event'] = $this->db->get('event')->num_rows();
		$in['media'] = $this->db->get('portal')->num_rows();
		$in['partner'] = $this->db->get('partner')->num_rows();
		$in['trading'] = $this->db->get('trading')->num_rows();
		$in['speaker'] = $this->db->get('speaker')->num_rows();
		
		$in['seats'] = $this->db->select('coalesce(sum(seat),0) as total')
						->join('m_event','m_event.id=m_event_seat.id_event','inner')
						->get('event_seat')->row_array();
		$in['tokens'] = $this->db->select('coalesce(sum(m_event_seat.price),0) as total')
										
						->join('m_event','m_event.id=m_event_seat.id_event','inner')
						->get('event_seat')->row_array();
		
		$in['deps'] = $this->db->select('sum(m_event.price) as total')
						->get('event')->row_array();				
		
		$in['title'] = ""; 
		$in['tpl'] = "home/main";
		$this->load->view('manager/layout',$in);
		return; 
	}
	public function charts()
	{
		if($this->input->is_ajax_request() && $this->input->post())
		{
			$year = $this->input->post('tahun',true);
			$out = array();
			$bulan = array();
			for($i=1;$i<=12;$i++)
			{
				$c = $this->db
				->select('sum(budget) as total')
				->where('MONTH(FROM_UNIXTIME(created_on))',$i)
				->where('Year(FROM_UNIXTIME(created_on))',$year)
				->where('status',1)
				->get('v_task')
				->row_array();
				$s = isset($c['total'])?$c['total']:0;
				$out[count($out)] = array("label"=>bulan_name($i),"value"=>$s);  
				
			}
			json(array('error'=>false,'message'=>'Data','security'=>token(),"data"=>$out));
			return;		
		}
		show_404();
	} 
	
}

