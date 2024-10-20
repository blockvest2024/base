<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends Smart_Controller {

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
		$data = $this->db->where('displays',1)->get('portal')->result_array();
		$in = array(); 
		$in['arr'] = $data; 								
														
		$in['bread']['#'] = 'News';
		
		$in['title'] = ""; 
		$in['tpl'] = "news/main";
		$this->load->view('manager/layout',$in);
		return; 
	}
	public function seed()
	{
		$limit = isset($_GET['limit'])?$_GET['limit']:"";
		$ctype = isset($_GET['ctype'])?$_GET['ctype']:"highlight";
		$cid = isset($_GET['cid'])?$_GET['cid']:"";
		if(!empty($cid))
		{
			$data = $this->db->where('displays',1)->where('id',$cid)->get('portal')->row_array();
		}else
		{
			$data = $this->db->where('displays',1)->order_by('RAND()')->get('portal')->row_array();
		}
		if(isset($data['id']))
		{
			$n = get_remote_data($data['rss_link']);
			if(!empty($n))
			{
				libxml_use_internal_errors(true);
				$xml = from_xml($n);
				$xml = get_itemxml($xml);
				$arr = $xml;
				if(!empty($limit))
				{
					$arr = array();	
					for($i=0;$i<count($xml);$i++)
					{
						if($i<$limit)
						 $arr[] = $xml[$i];
					}
				}
				$in['data'] = $data;
				$in['names'] = strtoupper($data['name']);
				$in['arr'] = $arr;
				 
				$cname = "show";
				if($ctype=="list")
				$cname = "lists";
				$in['temps'] = $this->load->view('manager/news/'.$cname, $in, true);
				 
				json(array('error'=>false,'message'=>'Proccess',"arr"=>$in,"temp"=>$in['temps'],'security'=>token()));
				return;
				 
			}
		}
		json(array('error'=>true,'message'=>'Proccess Failed',"arr"=>array(),"temp"=>array(),'security'=>token()));
		return;
	}
	 
	 
	 
}

