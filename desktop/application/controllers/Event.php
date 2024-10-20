<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

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
		$in['bread']['#'] = 'Task';
		$in['title'] = ""; 
		$event_category = $this->db->where('displays',1)->get('event_category')->result_array();
		$in['event_category'] = $event_category; 
		
		$waktu = date('Y-m-d h:i:s');
		 
		$completed = array();
		$in['page_header'] = "events/page_header";
		$in['tpl'] = "events/main";
		$this->load->view('manager/layout',$in);
		return; 
	}
	public function upcoming($record=0)
	{
		$this->load->helper('url');
        $this->load->library('pagination');
		$waktu = date('Y-m-d h:i:s');
		$recordPerPage = 10;
		if($record != 0){
			$record = ($record-1) * $recordPerPage;
		}  
		$type = $this->input->get('type');
		if($type=="past")
		{
			$counts = $this->db
						->select('count(id) as allcount')
						->where("start_date<NOW()")
						
						->where('status',1)
						->order_by("start_date desc")
						->get('v_event')->row_array();
			$recordCount = isset($counts['allcount'])?$counts['allcount']:0;
			$arr =  $this->db
						->where("start_date<NOW()")
						->where('status',1)
						->limit($recordPerPage,$record)
						->order_by("start_date desc")
						->get('v_event')->result_array();
		}else
		{
		  $counts = $this->db
						->select('count(id) as allcount')
						->where("start_date>NOW()")
						->where("end_date>=NOW()")
						
						->where('status',1)
						->order_by("start_date desc")
						->get('v_event')->row_array();
			$recordCount = isset($counts['allcount'])?$counts['allcount']:0;
			$arr =  $this->db
						->where("start_date>NOW()")
						->where("end_date>=NOW()")
						->where('status',1)
						->limit($recordPerPage,$record)
						->order_by("start_date desc")
						->get('v_event')->result_array();
		}
		for($i=0;$i<count($arr);$i++)
		{
			$arr[$i]['event_category'] = $this->db->where('id',$arr[$i]['id_event_category'])->get('event_category')->row_array();	
			$arr[$i]['reward'] = 0;
			$arr[$i]['task_payment_arr'] = array();
			$tt = $arr[$i]; //json_decode($arr[$i]['task_payment_info'],true);
			if(isset($tt['id']))
			{
				$arr[$i]['task_payment_arr'] = $tt;
				$arr[$i]['reward'] = calc_each_user($arr[$i]['price'],$tt);
			}
			$arr[$i]['task_complete'] = $this->db
									->where('status',1)
									->where('id_event',$arr[$i]['id'])->get('event_seat')
									->num_rows();
		}
		$config = $this->style_pagination();
		$config['base_url'] = base_url().'index.php/event/upcoming';
      	$config['use_page_numbers'] = TRUE;
		//$config['next_link'] = 'Next';
		//$config['prev_link'] = 'Previous';
		$config['total_rows'] = $recordCount;
		$config['per_page'] = $recordPerPage;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['arr'] = $arr;
		$data['type'] = $type; 
		$data['temps'] = $this->load->view('manager/event/item_upcoming', $data, true);
		 
		//$data['sql'] = $this->db->last_query();
		$data['config'] = $config;
		echo json_encode($data);	
		return;	
	}
	
	private function style_pagination()
	{
		$config = array();
		$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
		return $config;	
	} 
	public function cdetail()
	{
		$params = $this->input->get('id');
		if(!empty($params))
		{
			$rec = $this->db->where('id',$params)->get('v_event');
			if($rec->num_rows()==1)
			{
				$data = $rec->row_array();	
				$data['event_category'] = $this->db->where('id',$data['id_event_category'])->get('event_category')->row_array();	
				$data['reward'] = 0;
				$data['task_payment_arr'] = array();
				$tt = $data;
				if(isset($tt['id']))
				{
					$data['task_payment_arr'] = $tt;
					$data['reward'] = calc_each_user($data['price'],$tt);
				}
				$data['task_complete'] = $this->db
										->where('status',1)
										->where('id_event',$data['id'])->get('event_seat')
										->num_rows();
				$check = $this->db->where('id_event',$data['id'])
					->where('id_customer',user_info('id'))
					->get("event_seat")->row_array();
					
				$in = array(); 
				$data['user_reward'] = array();
				$data['user_reward']['status']=0;
				if(isset($check['id']))
				{
					$data['user_reward'] = $check;
				}
				 
				$in['data'] = $data;
				$in['speaker'] = $this->db->where('id_event',$data['id'])->get('event_speaker')->result_array();
				$in['temps'] = $this->load->view('manager/event/cdetail', $in, true);
				echo json_encode($in);	
				return; 
			}
		}
		show_404();
	}
	#=== detail
	public function details($params)
	{
		if(!empty($params))
		{
			$rec = $this->db->where('id',$params)->get('v_event');
			if($rec->num_rows()==1)
			{
				$data = $rec->row_array();	
				$data['event_category'] = $this->db->where('id',$data['id_event_category'])->get('event_category')->row_array();	
				$data['reward'] = 0;
				$data['task_payment_arr'] = array();
				$tt = $data;
				if(isset($tt['id']))
				{
					$data['task_payment_arr'] = $tt;
					$data['reward'] = calc_each_user($data['price'],$tt);
				}
				$data['task_complete'] = $this->db
										->where('status',1)
										->where('id_event',$data['id'])->get('event_seat')
										->num_rows();
				$check = $this->db->where('id_event',$data['id'])
					->where('id_customer',user_info('id'))
					->get("event_seat")->row_array();
					
				$in = array(); 
				$data['user_reward'] = array();
				$data['user_reward']['status']=0;
				if(isset($check['id']))
				{
					$data['user_reward'] = $check;
				}
				 
				$in['data'] = $data;
				$in['speaker'] = $this->db->where('id_event',$data['id'])->get('event_speaker')->result_array();
				$in['tpl'] = "event/cdetail";
				$in['page_header'] = "events/page_header";
				$this->load->view('manager/layout',$in);
				return; 
			}
		}
		show_404();
	}
	  
}

