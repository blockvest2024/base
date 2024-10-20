<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends Smart_Controller {

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
		$in['tpl'] = "event/main";
		$this->load->view('manager/layout',$in);
		return; 
	}
	public function getlist()
	{
		if($this->input->is_ajax_request())
		{
			$this->load->library('ssp');
			$ssp = $this->ssp;
			$primaryKey = 'm_event.id';
			$columns    = array(
			array('db'=>'m_event.id','dt'=>0,'alias'=>'ids','formatter'=>function($d,$row){
				return  '<div class="attendant__serial">
							<span>#'.$d.'</span></div>';
			}),
			
			array('db'=>'m_event.txhash','dt'=>1,'alias'=>'tx_hash','formatter'=>function($d,$row){
				$networks = $this->db->where('name','base')->get('network')->row_array();
				if(isset($networks['id']))
				{
					$url = $networks['explorer_transaction']."/tx/".$d;
					return "<a href='".$url."' target='_blank' class='btn btn-link'><small> ".$d."</small></a>";	
				}
				return  "";
			}),
			 
			array('db'=>'m_event.title','dt'=>2,'alias'=>'name','formatter'=>function($d,$row){
				return '<div class="attendant__seminer">
                                             <span><a href="'.site_url('event/detail/'.$row->ids).'">'.$d.'</a></span>
                                          </div>';
			}), 
			 
			array('db'=>"m_event.id",'dt'=>3,'alias'=>'id_speak','formatter'=>function($d,$row){
				 $speaker = $this->db->where('id_event',$d)->get('event_speaker')->result_array();
				 $chtml = '<div class="attendant__speakers">';
				 $chtml .= '<div class="attendant__speakers-thumb">';
				 for($i=0;$i<count($speaker);$i++)
				 {
					 if(!empty($speaker[$i]['images']) && is_file(config_item('upload_path').$speaker[$i]['images']) && file_exists(config_item('upload_path').$speaker[$i]['images']))
					 {
						 
						 $imgs = config_item('main_site').'uploads/'.$speaker[$i]['images'];
					 	 $chtml .= '<img src="'.$imgs.'" alt="image not found">';
					 }
					
				 }
				 
				 $chtml .= '<div class="attendant__count-inner">';
				 $chtml .= '<span class="attendant__meta-count">'.count($speaker).'+</span>';
				 $chtml .= '</div>';
				 $chtml .= '</div>';
				 $chtml .= '</div>';
				 
				 return $chtml;
				 
                                              
                                                
			}),
			array('db'=>'m_event.from_times','dt'=>4,'alias'=>'from_times','formatter'=>function($d,$row){
				return '<div class="attendant__time">
                                             <span>'.date('h:i A', strtotime($d)).' - '.date('h:i A', strtotime($row->to_times)).'</span>
                                          </div>';
			}), 
			array('db'=>"concat(DATE_FORMAT(m_event.from_dates, '%d/%m/%Y') ,' - ',DATE_FORMAT(m_event.to_dates, '%d/%m/%Y'))",'dt'=>5,'alias'=>'dates','formatter'=>function($d,$row){
				return '<div class="attendant__date">
                                             <span>'.$d.'</span>
                                          </div>';
			}), 
			array('db'=>'m_event.address','dt'=>6,'alias'=>'address','formatter'=>function($d,$row){
				return '<div class="attendant__location">
                                             <span>'.$d.'</span>
                                          </div>';
			}), 
			array('db'=>'m_event.status','dt'=>7,'alias'=>'status','formatter'=>function($d,$row){
				$bg_color = "background:".colorpayments($d)."; color:white;";
				  if($d==1)
				 {
					 $active = "<div><small style='color:".colorpayments(1)."; font-weight:bold;'>".reward_event(1)."</small></div>";
				
				 }else
				 {
				  
				  $active =  "<button class='btn btn-sm btn-status' style='".$bg_color."' data-ref='".$row->ids."'>".reward_event($d)."</button>";
				 }
				return '<div class="attendant__location">
                                             <span>'. $active.'</span>
                                          </div>';
			}), 
			array('db'=>'m_event.id','dt'=>8,'alias'=>'id','formatter'=>function($d,$row){
				
				if($row->status==0)
				{
					$ht = '<div class="attendant__action">
                                             <div class="card__header-dropdown">
                                                <div class="dropdown">
                                                   <button>
                                                      <svg class="attendant__dot" width="14" height="4" viewBox="0 0 14 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                      <path d="M2 0.75C2.69036 0.75 3.25 1.30964 3.25 2C3.25 2.69036 2.69036 3.25 2 3.25C1.30964 3.25 0.75 2.69036 0.75 2C0.75 1.30964 1.30964 0.75 2 0.75Z" fill="white"></path>
                                                      <path d="M7 0.75C7.69036 0.75 8.25 1.30964 8.25 2C8.25 2.69036 7.69036 3.25 7 3.25C6.30964 3.25 5.75 2.69036 5.75 2C5.75 1.30964 6.30964 0.75 7 0.75Z" fill="white"></path>
                                                      <path d="M13.25 2C13.25 1.30964 12.6904 0.75 12 0.75C11.3096 0.75 10.75 1.30964 10.75 2C10.75 2.69036 11.3096 3.25 12 3.25C12.6904 3.25 13.25 2.69036 13.25 2Z" fill="white"></path>
                                                      </svg>
                                                   </button>
                                                   <div class="dropdown-list">
                                                      <a class="dropdown__item" href="'.site_url('event/edit/'.$d).'">Edit</a>
                                                      <a class="dropdown__item btn-delete-sites" href="javascript:void(0)" data-ref="'.$d.'">Delete</a>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>';
					 return $ht;
				}
				if($row->status==1)
				{
					$ht = '<div class="attendant__action">
                                             <div class="card__header-dropdown">
                                                <div class="dropdown">
                                                   <button>
                                                      <svg class="attendant__dot" width="14" height="4" viewBox="0 0 14 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                      <path d="M2 0.75C2.69036 0.75 3.25 1.30964 3.25 2C3.25 2.69036 2.69036 3.25 2 3.25C1.30964 3.25 0.75 2.69036 0.75 2C0.75 1.30964 1.30964 0.75 2 0.75Z" fill="white"></path>
                                                      <path d="M7 0.75C7.69036 0.75 8.25 1.30964 8.25 2C8.25 2.69036 7.69036 3.25 7 3.25C6.30964 3.25 5.75 2.69036 5.75 2C5.75 1.30964 6.30964 0.75 7 0.75Z" fill="white"></path>
                                                      <path d="M13.25 2C13.25 1.30964 12.6904 0.75 12 0.75C11.3096 0.75 10.75 1.30964 10.75 2C10.75 2.69036 11.3096 3.25 12 3.25C12.6904 3.25 13.25 2.69036 13.25 2Z" fill="white"></path>
                                                      </svg>
                                                   </button>
                                                   <div class="dropdown-list">
                                                      <a class="dropdown__item" href="'.site_url('event/edit/'.$d).'">Edit</a>
                                                     
                                                   </div>
                                                </div>
                                             </div>
                                          </div>';
					 return $ht;
				}
			}),
			array('db'=>'m_event.to_times','dt'=>9,'alias'=>'to_times','formatter'=>function($d,$row){
				return '<div class="attendant__time">
                                             <span>'.date('h:i A', strtotime($d))
.'</span>
                                          </div>';
			}),
			);
			$table = 'm_event';
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
		
		$in['speaker'] = array();
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
				$data = $rec->row_array();
				$in = array();
				$data['speaker'] = $this->db->where('id_event',$data['id'])->get("event_speaker")->result_array();
				$in['data'] = $data; 
				$in['speaker'] = $data['speaker'];
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
				
			$id = 0;	
			if(empty($in['id']))
			{
				$in['created_by'] = user_info('id');
				$in['created_on'] = $time;
				
				$in['price'] = setting('price_event');
				$this->db->insert('event',$in);
				$id = $this->db->insert_id(); 
				$urls = site_url("event/purchase/".$id);
				for($i=0;$i<count($speaker['name']);$i++)
				{
					$rr = array();
					$rr['id_event'] = $id;
					$rr['id_partner'] = $in['id_partner'];
					$rr['partner_info'] = $in['partner_info'];
					$rr['name'] = $speaker['name'][$i];
					if(isset($speaker['email'][$i]))
					$rr['email'] = $speaker['email'][$i];
					if(isset($speaker['phones'][$i]))
					$rr['phones'] = $speaker['phones'][$i];
					
					if(isset($speaker['company'][$i]))
					$rr['company'] = $speaker['company'][$i];
					
					
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
			}else
			{
				$in['updated_by'] = user_info('id');
				$in['updated_on'] = $time;
				$this->db->where('id',$in['id'])->update('event',$in);
				$id = $in['id']; 
				$urls = site_url("event");
				for($i=0;$i<count($speaker['name']);$i++)
				{
					$speaker['images'][$i] = "";
					$cids = "";
					if(isset($speaker['id'][$i]))
					$cids = $speaker['id'][$i];
					
					if(isset($_FILES['speaker']['error']['image'][$i]))
					{
						if($_FILES['speaker']['error']['image'][$i]==0)
						{
							$name = get_unique_file($_FILES['speaker']['name']['image'][$i]);
							if(move_uploaded_file($_FILES['speaker']['tmp_name']['image'][$i],$this->config->item('upload_path').$name))
							{
								$speaker['images'][$i] = $name;
							}
						}
					}
					
					if(!empty($cids))
					{
						if(empty($speaker['images'][$i]))
						{
							$check_spekaer = $this->db->where('id',$cids)->get('event_speaker')->row_array();
							if(isset($check_spekaer['id']))
							{
								 $speaker['images'][$i] = $check_spekaer['images'];
							}
						}
					}
				}
				$this->db->where('id_event',$in['id'])->delete('event_speaker');
				for($i=0;$i<count($speaker['name']);$i++)
				{
					$cids = "";
					if(isset($speaker['id'][$i]))
					$cids = $speaker['id'][$i];
					
					$rr = array();
					$rr['id_event'] = $id;
					$rr['id_partner'] = $in['id_partner'];
					$rr['partner_info'] = $in['partner_info'];
					$rr['name'] = $speaker['name'][$i];
					if(isset($speaker['email'][$i]))
					$rr['email'] = $speaker['email'][$i];
					if(isset($speaker['phones'][$i]))
					$rr['phones'] = $speaker['phones'][$i];
					
					if(isset($speaker['company'][$i]))
					$rr['company'] = $speaker['company'][$i];
					
					$rr['designation'] = $speaker['designation'][$i];
					/*if(isset($_FILES['speaker']['error']['image'][$i]))
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
					if(!empty($cids))
					{
						if(!isset($rr['images']))
						{
							$check_spekaer = $this->db->where('id',$cids)->get('event_speaker')->row_array();
							if(isset($check_spekaer['id']))
							{
								$rr['images'] = $check_spekaer['images'];
							}
						}
					}
					*/
					if(empty($speaker['images']))
					{
						unset($speaker['images']);	
					}else
					{
						$rr['images'] = $speaker['images'][$i];
					}
					$this->db->insert('event_speaker',$rr);
					
				}
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
				
				json(array('error'=>false,'message'=>'Proccess Done',"urls"=>$urls,'security'=>token()));
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
			$this->load->library('smartcontract');
			$smartcontract = $this->smartcontract;
			$rec = $this->db
					->select('m_event_seat.*,m_customer.wallet_address')
					->where('pid',$pid)
					->join('m_customer','m_customer.id=m_event_seat.id_customer','inner')
					->get('event_seat')->row_array();
			$ns = $this->db->where('display',1)->where('lower(network)','base')->get('networks')->row_array();		
			 
			if(isset($rec['id']) && isset($ns['id']))
			{
				
				$data = $rec;
				if($data['status']==1)
				{
					json(array('error'=>true,'message'=>'Already Scan','security'=>token()));
					return;
				}
				$r = array();
				$r['network_name'] = $ns['network'];
				$r['network_url'] =  $ns['network_url'];
				$r['status'] = 1;
				if(empty($chk['txhash']))
				{
					$r['txhash'] = $smartcontract->send($data['wallet_address'],$data['price']);
				}
				$this->db->trans_begin();
				$this->db->where('pid',$pid)->update('event_seat',$r);
				  
			 
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
	
	public function purchase($params = "")
	{
		if(!empty($params))
		{
			$rec = $this->db->where('id',$params)->get('event');
			if($rec->num_rows()==1)
			{
				$data = $rec->row_array();
				 
				$in = array();
				$currency = $rec = $this->db->where('displays',1)->limit(1)->get('currency')->row_array();
				 
				$in['currency'] = $currency;
				$in['wallet'] = $this->setwallet($currency['id']);
				 
				$in['data'] = $data;
				 
				 
				 
				$in['bread']['#'] = 'Event';
				
				$in['title'] = ""; 
				$in['tpl'] = "event/purchase";
				$this->load->view('manager/layout',$in);
				return; 
			}
		}
		show_404();
	}
	
	private function setwallet($id = "")
	{
			$this->load->library('wallets');
			$wallet_lib = $this->wallets;
			if(!empty($id)) 
			{
				$rec = $this->db->where('id',$id)->get('currency');
				if($rec->num_rows()==1)
				{
					$data = $rec->row_array(); 
					$arr = array();
					$in['wallet'] = "";
					
					if(strtolower($data['network'])=="bep20" || strtolower($data['network'])=="erc20" || strtolower($data['network'])=="base")
					{
						$sql = "select * from m_wallet_partner where id_partner='".user_info('id')."' and (lower(network)='bep20' or lower(network)='erc20' or lower(network)='base')";
						$wallet = $this->db->query($sql)->row_array();
									 
						if(isset($wallet['id']))
						{
							$in['wallet'] = $wallet['address'];
						}else
						{
							$arr = $wallet_lib->wallet_setup_partner($data['network']); 
							$in['wallet'] = $arr['address'];
	
						}
					}else if(strtolower($data['network'])=="trc20")
					{
						$sql = "select * from m_wallet where partner='".user_info('id')."' and (lower(network)='trc20')";
						$wallet = $this->db->query($sql)->row_array();
									 
						if(isset($wallet['id']))
						{
							$in['wallet'] = $wallet['address'];
						}else
						{
							$arr = $wallet_lib->wallet_setup_partner($data['network']); 
							$in['wallet'] = $arr['address'];
	
						}
						 
					}
					$data['wallet'] = $in['wallet'];
					return $data; 
					 
				}
			}
			return array();	
	}
	
}

