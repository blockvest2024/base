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
		
		
		 
		$in['customers'] = $this->db->where('status',1)->get('customer')->num_rows();	
		$in['event_speaker'] = $this->db
								->where('m_event_speaker.id_partner',user_info('id'))
								 ->get('event_speaker')->num_rows();	
		$in['events'] = $this->db
						->where('m_event.id_partner',user_info('id'))
						->get('event')->num_rows();
		$in['seats'] = $this->db->select('coalesce(sum(seat),0) as total')
						->where('m_event.id_partner',user_info('id'))
										
						->join('m_event','m_event.id=m_event_seat.id_event','inner')
						->get('event_seat')->row_array();
		$in['tokens'] = $this->db->select('coalesce(sum(m_event_seat.price),0) as total')
						->where('m_event.id_partner',user_info('id'))
										
						->join('m_event','m_event.id=m_event_seat.id_event','inner')
						->get('event_seat')->row_array();
							
		$in['bread']['#'] = 'Dashboard';
		
		$in['title'] = ""; 
		$in['tpl'] = "home/main";
		$this->load->view('manager/layout',$in);
		return; 
	}
	 
	
}

