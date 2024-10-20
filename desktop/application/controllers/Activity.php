<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends Smart_Controller {

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
		$seat = $this->db						
						->where('id_customer',user_info('id')) 			
						->order_by("id asc")
						->get("event_seat")->result_array();
		for($i=0;$i<count($seat);$i++)
		{
			$event = $this->db->where('id',$seat[$i]['id_event'])->get('v_event')->row_array();
			$seat[$i]['event'] = $event;	
		}
		$in['seat'] = $seat;
		$in['bread']['#'] = 'Activity';
		
		$in['title'] = ""; 
		$in['tpl'] = "activity/main";
		$this->load->view('manager/layout',$in);
		return; 
	}
	
	public function logs()
	{
		
		$in = array(); 
		$in['topup'] = $this->db						
						->where('id_customer',user_info('id')) 			
						->order_by("id asc")
						->get("topup")->result_array();
		$in['transfer'] = $this->db						
						->where('from_customer',user_info('id')) 			
						->order_by("id asc")
						->get("transfer")->result_array();
		$in['withdraw'] = $this->db						
						->where('id_customer',user_info('id')) 			
						->order_by("id asc")
						->get("withdraw")->result_array();
		$in['buy'] = $this->db						
						->where('id_customer',user_info('id')) 			
						->order_by("id asc")
						->get("buy")->result_array();
		$in['transfer_in'] = $this->db						
						->where('to_customer',user_info('id')) 			
						->order_by("id asc")
						->get("transfer")->result_array();
						
		$in['ref'] = $this->db
						->select("m_buy_ref.*,m_buy.tanggal")								
						->join('m_buy','m_buy.id=m_buy_ref.id_buy','inner')
						->where('to_customer',user_info('id')) 			
						->order_by("id asc")
						->get("buy_ref")->result_array();								
														
		$in['bread']['#'] = 'Activity';
		
		$in['title'] = ""; 
		$in['tpl'] = "activity/logs";
		$this->load->view('manager/layout',$in);
		return; 
	}
	public function transfer()
	{
		
		$in = array(); 
		$in['transfer'] = $this->db						
						->where('from_customer',user_info('id')) 			
						->order_by("id asc")
						->get("transfer")->result_array();
		$in['transfer_in'] = $this->db						
						->where('to_customer',user_info('id')) 			
						->order_by("id asc")
						->get("transfer")->result_array();
						
														
		$in['bread']['#'] = 'Activity';
		
		$in['title'] = ""; 
		$in['tpl'] = "activity/transfer";
		$this->load->view('manager/layout',$in);
		return; 
	}
	 
	 
}

