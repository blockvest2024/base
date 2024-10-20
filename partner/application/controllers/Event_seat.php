<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_seat extends Smart_Controller {

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
		
		
	 
		$in['bread']['#'] = 'Event';
		
		$in['title'] = ""; 
		$in['tpl'] = "event_seat/main";
		$this->load->view('manager/layout',$in);
		return; 
	}
	public function getlist()
	{
		if($this->input->is_ajax_request())
		{
			$this->load->library('ssp');
			$ssp = $this->ssp;
			$primaryKey = 'm_event_seat.id';
			$columns    = array(
			array('db'=>'m_event_seat.pid','dt'=>0,'alias'=>'ids','formatter'=>function($d,$row){
				return  '<div class="attendant__serial">
							<span>#'.$d.'</span></div>';
			}),
			
			array('db'=>'m_event_seat.txhash','dt'=>1,'alias'=>'txhash','formatter'=>function($d,$row){
				 $ns = $this->db->where('display',1)->where('lower(network)','base')->get('networks')->row_array();
				 if(isset($ns['id']))
				 {
					return "<a href='".$ns['network_url']."/tx/".$d."' target='_blank'>".$d."</a>"; 
				 }
				 return $d;
			}),  
			array('db'=>'m_event_seat.price','dt'=>2,'alias'=>'price','formatter'=>function($d,$row){
				 
				 return $d." ".setting('coin_name');
			}),  
			array('db'=>'m_event.title','dt'=>3,'alias'=>'titles','formatter'=>function($d,$row){
				 return $d;
			}), 
			array('db'=>'m_customer.name','dt'=>4,'alias'=>'name','formatter'=>function($d,$row){
				 return $d;
			}), 
			array('db'=>'m_customer.telp','dt'=>5,'alias'=>'phone','formatter'=>function($d,$row){
				 return $d;
			}), 
			array('db'=>"DATE_FORMAT(m_event_seat.tgl, '%d/%m/%Y')",'dt'=>6,'alias'=>'tgl','formatter'=>function($d,$row){
				 return $d;
			}), 
			 
			 
			array('db'=>'m_event_seat.status','dt'=>7,'alias'=>'status','formatter'=>function($d,$row){
				$bg_color = "background:".colorpayments($d)."; color:white;";
				  if($d==1)
				 {
					 $active = "<div><small style='color:".colorpayments(1)."; font-weight:bold;'>".claimstatus(1)."</small></div>";
				
				 }else
				 {
				  
				  $active =  "<button class='btn btn-sm btn-status' style='".$bg_color."' data-ref='".$row->ids."'>".claimstatus($d)."</button>";
				 }
				return '<div class="attendant__location">
                                             <span>'. $active.'</span>
                                          </div>';
			}), 
			  
			);
			$table = 'm_event_seat inner join m_event on(m_event.id=m_event_seat.id_event) inner join m_customer on(m_customer.id=m_event_seat.id_customer)';
			$whereResult = NULL;
			$whereAll = "m_event.id_partner='".user_info('id')."'";
			 
			$arr = $ssp::complex( $_GET, $this, $table, $primaryKey, $columns, $whereResult, $whereAll );
			echo json_encode($arr);
			exit;
		}
		show_404();
	}
	public function add()
	{
		
		$in = array();
		
		
	 	$in['event_category'] = $this->db->where('displays',1)->get("event_category")->result_array();
		$in['bread']['#'] = 'Event';
		
		$in['title'] = ""; 
		$in['tpl'] = "event/form";
		$this->load->view('manager/layout',$in);
		return; 
	}
	public function edit($params)
	{
		if(!empty($params))
		{
			$rec = $this->db->where('id',$params)->get('event');
			if($rec->num_rows()==1)
			{
				$in = array();
				 
				$in['event_category'] = $this->db->where('displays',1)->get("event_category")->result_array();
				$in['bread']['#'] = 'Event';
				
				$in['title'] = ""; 
				$in['tpl'] = "event/form";
				$this->load->view('manager/layout',$in);
				return; 
			}
		}
		redirect("event");
		return;
	}
	public function delete()
	{
		if($this->input->is_ajax_request() && $this->input->post())
		{
			
			$id = $this->input->post('id',true);
			$this->db->trans_begin();
			if(is_array($id))
				$this->db->where_in('id',$id);
			else
				$this->db->where('id',$id);
				
			 
			
			if(is_array($id))
				$this->db->where_in('id',$id);
			else
				$this->db->where('id',$id);
				
			$this->db->delete('event');
			if ($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				json(array('error'=>true,'message'=>'Proccess Failed','security'=>token()));
				return;
			}
			else
			{
				$this->db->trans_commit();
				json(array('error'=>false,'message'=>'Proccess Done','security'=>token()));
				return;
			}
			json(array('error'=>true,'message'=>'Proccess Failed','security'=>token()));
			return;
		}
		show_404();
	}
	#==========================
	public function save()
	{
		if($this->input->is_ajax_request() && $this->input->post())
		{
			$in = $this->input->post();
			
			$this->db->trans_begin();
			 
			
			if($_FILES['files']['error']==0)
			{
				$name = get_unique_file($_FILES['files']['name']);
				if(move_uploaded_file($_FILES['files']['tmp_name'],$this->config->item('upload_path').$name))
				{
					$in['image'] = $name;
				}
			}
			$time = time();
			$speaker = $in['speaker'];
			unset($in['speaker']); 
			 	$in['id_partner'] = user_info('id');;
				$in['partner_info'] = json_encode($this->db->where('id',user_info('id'))->get('partner')->row_array());
				
				$in['created_by'] = user_info('id');
				$in['updated_by'] = user_info('id');
				$in['created_on'] = $time;
				$in['updated_on'] = $time;
				$this->db->insert('event',$in);
				$id = $this->db->insert_id(); 
				for($i=0;$i<count($speaker['name']);$i++)
				{
					$rr = array();
					$rr['id_event'] = $id;
					$rr['id_partner'] = $in['id_partner'];
					$rr['partner_info'] = $in['partner_info'];
					$rr['name'] = $speaker['name'][$i];
					$rr['email'] = $speaker['email'][$i];
					$rr['phones'] = $speaker['phones'][$i];
					$rr['designation'] = $speaker['designation'][$i];
					if(isset($_FILES['speaker']['error']['image'][$i]))
					{
						if($_FILES['speaker']['error']['image'][$i]==0)
						{
							$name = get_unique_file($_FILES['speaker']['name']['image'][$i]);
							if(move_uploaded_file($_FILES['speaker']['tmp_name']['image'][$i],$this->config->item('upload_path').$name))
							{
								$rr['images'] = $name;
							}
						}
					}
					$this->db->insert('event_speaker',$rr);
					
				}
			 
			if ($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				json(array('error'=>true,'message'=>'Proccess Failed','security'=>token()));
				return;
			}
			else
			{
				$this->db->trans_commit();
				json(array('error'=>false,'message'=>'Proccess Done','security'=>token()));
				return;
			}
			json(array('error'=>true,'message'=>'Proccess Failed','security'=>token()));
			return;
		}
		show_404();
	} 
	#== details
	public function detail($params)
	{
		if(!empty($params))
		{
			$rec = $this->db->where('id',$params)->get('event');
			if($rec->num_rows()==1)
			{
				$data = $rec->row_array();
				$in = array();
				$in['data'] = $data; 
				$in['partner'] = $this->db->where('id',$data['id_partner'])->get('partner')->row_array();
				$in['event_seat'] = $this->db
									->select("sum(seat) as total")
									->where('id_event',$data['id'])->get("event_seat")->row_array();
				$in['event_category'] = $this->db->where('displays',1)->get("event_category")->result_array();
				$in['bread']['#'] = 'Event';
				
				$in['title'] = ""; 
				$in['tpl'] = "event/detail";
				$this->load->view('manager/layout',$in);
				return; 
			}
		}
		redirect("event");
		return;
	}
	#== seat
	public function save_seat()
	{
		if($this->input->is_ajax_request() && $this->input->post())
		{
			$in = $this->input->post();
			
			$this->db->trans_begin();
			 
			
			 
			$time = time();
			  
			 	$in['id_partner'] = user_info('id');;
				$in['partner_info'] = json_encode($this->db->where('id',user_info('id'))->get('partner')->row_array());
				
				$in['created_by'] = user_info('id');
				$in['updated_by'] = user_info('id');
				$in['created_on'] = $time;
				$in['updated_on'] = $time;
				$this->db->insert('event_seat',$in);
				  
			 
			if ($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				json(array('error'=>true,'message'=>'Proccess Failed','security'=>token()));
				return;
			}
			else
			{
				$this->db->trans_commit();
				json(array('error'=>false,'message'=>'Proccess Done','security'=>token()));
				return;
			}
			json(array('error'=>true,'message'=>'Proccess Failed','security'=>token()));
			return;
		}
		show_404();
	} 
	public function scandata($pid = "")
	{
		if(!empty($pid))
		{
			$rec = $this->db->where('pid',$pid)->get('event_seat')->row_array();
			if(isset($rec['id']))
			{
				$data = $rec;
				$this->db->trans_begin();
				$this->db->where('pid',$pid)->update('event_seat',array('status'=>1));
				  
			 
				if ($this->db->trans_status() === FALSE)
				{
					$this->db->trans_rollback();
					json(array('error'=>true,'message'=>'Proccess Failed','security'=>token()));
					return;
				}
				else
				{
					$this->db->trans_commit();
					json(array('error'=>false,'message'=>'Proccess Done','security'=>token()));
					return;
				}
				json(array('error'=>true,'message'=>'Proccess Failed','security'=>token()));
				return;
			}
		}
		json(array('error'=>true,'message'=>'Proccess Failed','security'=>token()));
		return;
	}
	public function results($params = "")
	{
		if(!empty($params))
		{
			$rec = $this->db->where('pid',$params)->get('event_seat');
			if($rec->num_rows()==1)
			{
				$data = $rec->row_array();
				$in = array();
				$in['data'] = $data; 
				$in['event'] = $this->db
									->where('id',$data['id_event'])->get("v_event")->row_array();
				$in['customer'] = $this->db->where('id',$data['id_customer'])->get('customer')->row_array(); 
				$in['bread']['#'] = 'Event';
				
				$in['title'] = ""; 
				$in['tpl'] = "event/result";
				$this->load->view('manager/layout',$in);
				return; 
			}
		}
		redirect("event");
		return;
	}
	
}

