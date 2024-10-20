<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class World_event extends Mobile_Controller {

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
		/*
		$data = $this->db
					->where('name in (select country from m_world_event where m_world_event.country=m_country.name)')
					->get('country')->result_array();//$this->db->where('displays',1)->get('world_event_category')->result_array();
		*/
		$data = array();
		for($i=1;$i<13;$i++)
		{
			$data[$i]['id'] = $i;
			$data[$i]['name'] = bulan_eng($i);
				
		}
		 
		$in = array(); 
		$in['arr'] = $data;
		 								
		$in['bread']['#'] = 'News';
		
		$in['title'] = ""; 
		$in['tpl'] = "world_event/main";
		$in['page_header'] = "world_event/page_header";
		$this->load->view('manager/layout',$in);
		return; 
	}
	public function seed()
	{
		$limit = isset($_GET['limit'])?$_GET['limit']:"";
		$ctype = isset($_GET['ctype'])?$_GET['ctype']:"highlight";
		$cid = isset($_GET['cid'])?$_GET['cid']:"";
		$year = isset($_GET['year'])?$_GET['year']:""; 
		if(!empty($cid) )
		{
			
			/*
			$data = $this->db
			->select('m_world_event.*,(select m_world_event_category.name from m_world_event_category where m_world_event_category.id=m_world_event.id_world_event_category limit 1) as cats')
			->where('displays',1)->where('id_world_event_category',$cid)
			->order_by('id desc')
			->get('world_event')->result_array();
			*/
			$data = $this->db
			->select('m_world_event.*,(select m_world_event_category.name from m_world_event_category where m_world_event_category.id=m_world_event.id_world_event_category limit 1) as cats')
			->where('m_world_event.displays',1)
			->where('month(start_date)',$cid)
			->where('year(start_date)',$year)
			//->where('id_world_event_category in (select id from m_world_event_category where m_world_event_category where m_world_event_category.displays=1)')
			->order_by('id desc')
			->get('world_event')->result_array();
		}else
		{
			$data = $this->db
			->select('m_world_event.*,(select m_world_event_category.name from m_world_event_category where m_world_event_category.id=m_world_event.id_world_event_category limit 1) as cats')	
			->where('year(start_date)',$year)
			//->where('id_world_event_category in (select id from m_world_event_category where m_world_event_category where m_world_event_category.displays=1)')
			->where('m_world_event.displays',1)->order_by('RAND()')->get('world_event')->result_array();
		}
		$in['arr'] = $data;  
		$cname = "content";
		$in['temps'] = $this->load->view('manager/world_event/'.$cname, $in, true);
		json(array('error'=>false,'message'=>'Proccess',"arr"=>$in,"temp"=>$in['temps'],'security'=>token()));
		return;
	}
	public function seed_()
	{
		$limit = isset($_GET['limit'])?$_GET['limit']:"";
		$ctype = isset($_GET['ctype'])?$_GET['ctype']:"highlight";
		$cid = isset($_GET['cid'])?$_GET['cid']:"";
		$country =  $this->db->where('id',$cid)->get('country')->row_array();
		if(!empty($cid) && isset($country['name']))
		{
			
			/*
			$data = $this->db
			->select('m_world_event.*,(select m_world_event_category.name from m_world_event_category where m_world_event_category.id=m_world_event.id_world_event_category limit 1) as cats')
			->where('displays',1)->where('id_world_event_category',$cid)
			->order_by('id desc')
			->get('world_event')->result_array();
			*/
			$data = $this->db
			->select('m_world_event.*,(select m_world_event_category.name from m_world_event_category where m_world_event_category.id=m_world_event.id_world_event_category limit 1) as cats')
			->where('displays',1)->where('country',$country['name'])
			->where('id_world_event_category in (select id from m_world_event_category where m_world_event_category where displays=1)')
			->order_by('id desc')
			->get('world_event')->result_array();
		}else
		{
			$data = $this->db
			->select('m_world_event.*,(select m_world_event_category.name from m_world_event_category where m_world_event_category.id=m_world_event.id_world_event_category limit 1) as cats')	
			->where('id_world_event_category in (select id from m_world_event_category where m_world_event_category where displays=1)')
			->where('displays',1)->order_by('RAND()')->get('world_event')->result_array();
		}
		$in['arr'] = $data;  
		$cname = "content";
		$in['temps'] = $this->load->view('manager/world_event/'.$cname, $in, true);
		json(array('error'=>false,'message'=>'Proccess',"arr"=>$in,"temp"=>$in['temps'],'security'=>token()));
		return;
	}
	public function details($params)
	{
		if(!empty($params))
		{
			$rec = $this->db
			->select('m_world_event.*,(select m_world_event_category.name from m_world_event_category where m_world_event_category.id=m_world_event.id_world_event_category limit 1) as cats')	
			->where('id',$params)->get('world_event');
			if($rec->num_rows()==1)
			{
				$data = $rec->row_array();	
				$data['event_category'] = $this->db->where('id',$data['id_world_event_category'])->get('world_event_category')->row_array();	
				  
				$in['data'] = $data;
				$in['speaker'] = $this->db->where('id_event',$data['id'])->get('event_speaker')->result_array();
				$in['tpl'] = "world_event/cdetail";
				$in['page_header'] = "world_event/page_header";
				$this->load->view('manager/layout',$in);
				return; 
			}
		}
		show_404();
	} 
	 
	 
}

