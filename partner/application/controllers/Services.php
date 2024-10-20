<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends Smart_Controller {

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
		$in['tpl'] = "services/main";
		$this->load->view('manager/layout',$in);
		return; 
	}
	public function getlist()
	{
		if($this->input->is_ajax_request())
		{
			$this->load->library('ssp');
			$ssp = $this->ssp;
			$primaryKey = 'm_transactions_partner.id';
			$columns    = array(
			array('db'=>'m_transactions_partner.id','dt'=>0,'alias'=>'ids','formatter'=>function($d,$row){
				return  '<div class="attendant__serial">
							<span>#'.$d.'</span></div>';
			}),
			
			array('db'=>'m_services_type.name','dt'=>1,'alias'=>'types','formatter'=>function($d,$row){
				return  $d;
			}),
			array('db'=>'m_services_subtype.name','dt'=>2,'alias'=>'subtypes','formatter'=>function($d,$row){
				return  $d;
			}),
			array('db'=>'m_services_payment.name','dt'=>3,'alias'=>'payments','formatter'=>function($d,$row){
				return  $d;
			}),
			array('db'=>'m_transactions_partner.transaction_id','dt'=>4,'alias'=>'tx_hash','formatter'=>function($d,$row){
				$networks = $this->db->where('name',$row->network)->get('network')->row_array();
				if(isset($networks['id']))
				{
					$url = $networks['explorer_transaction']."/tx/".$d;
					return "<a href='".$url."' target='_blank' class='btn btn-link'><small> ".$d."</small></a>";	
				}
				return  "";
			}),
			array('db'=>'m_transactions_partner.from','dt'=>5,'alias'=>'wallet_from','formatter'=>function($d,$row){
				return  $d;
			}),
			array('db'=>'m_transactions_partner.to','dt'=>6,'alias'=>'wallets','formatter'=>function($d,$row){
				return  $d;
			}),
			array('db'=>'m_transactions_partner.total','dt'=>7,'alias'=>'prices','formatter'=>function($d,$row){
				return  $d;
			}),
			array('db'=>'m_transactions_partner.status','dt'=>8,'alias'=>'status','formatter'=>function($d,$row){
				return  proofstatus($d);
			}),
			array('db'=>'m_transactions_partner.proof','dt'=>9,'alias'=>'proof','formatter'=>function($d,$row){
				return "<a href='".$d."' target='_blank' class='btn btn-link'><small> ".$d."</small></a>";
			}),
			array('db'=>'m_transactions_partner.dates','dt'=>10,'alias'=>'dates','formatter'=>function($d,$row){
				return  $d;
			}),
			array('db'=>'m_transactions_partner.network','dt'=>11,'alias'=>'network','formatter'=>function($d,$row){
				return  $d;
			}),
			 
			 
			);
			$table = 'm_transactions_partner inner join m_services_payment on(m_transactions_partner.id_services_payment=m_services_payment.id) inner join m_services_subtype on(m_services_payment.id_services_subtype=m_services_subtype.id) inner join m_services_type on(m_services_subtype.id_services_type=m_services_type.id)  ';
			$whereResult = NULL;
			$whereAll = "m_transactions_partner.id_partner='".user_info('id')."'";
			 
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
		$types =  $this->db->where('displays',1)->get("services_type")->result_array();
		for($i=0;$i<count($types);$i++)
		{
			$types[$i]['subs'] =  $this->db->where('id_services_type',$types[$i]['id'])->where('displays',1)->get("services_subtype")->num_rows();	
		}
	 	$in['types'] = $types;
		$in['bread']['#'] = 'Event';
		
		$in['title'] = ""; 
		$in['tpl'] = "services/steps";
		$this->load->view('manager/layout',$in);
		return; 
	}
	 
	public function subtype($params = "")
	{
		if(!empty($params))
		{
			$rec = $this->db->where('id',$params)->get('services_type');
			if($rec->num_rows()==1)
			{
				$data = $rec->row_array();
				$in = array();
				
				
				$in['data'] = $data;
				$types =  $this->db->where('id_services_type',$params)->get("services_subtype")->result_array();
				for($i=0;$i<count($types);$i++)
				{
					$types[$i]['subs'] =  $this->db->where('id_services_subtype',$types[$i]['id'])->get("services_payment")->num_rows();	
				}
				$in['types'] =  $types;
				$in['bread']['#'] = 'Event';
				
				$in['title'] = ""; 
				$in['tpl'] = "services/steps2";
				$this->load->view('manager/layout',$in);
				return; 
			}
		}
		show_404();
	}
	public function subsubtype($params = "")
	{
		if(!empty($params))
		{
			$rec = $this->db->where('id',$params)->get('services_subtype');
			if($rec->num_rows()==1)
			{
				$data = $rec->row_array();
				$services_type = $this->db->where('id',$data['id_services_type'])->get('services_type')->row_array();
				$in = array();
				
				
				$in['services_type'] = $services_type;
				$in['data'] = $data;
				$types =  $this->db->where('id_services_subtype',$params)->get("services_payment")->result_array();
				 
				$in['types'] =  $types;
				$in['bread']['#'] = 'Event';
				
				$in['title'] = ""; 
				$in['tpl'] = "services/steps3";
				$this->load->view('manager/layout',$in);
				return; 
			}
		}
		show_404();
	}
	public function details($params = "")
	{
		if(!empty($params))
		{
			$rec = $this->db->where('id',$params)->get('services_payment');
			if($rec->num_rows()==1)
			{
				$data = $rec->row_array();
				$services_type = $this->db->where('id',$data['id_services_type'])->get('services_type')->row_array();
				$services_subtype = $this->db->where('id',$data['id_services_subtype'])->get('services_subtype')->row_array();
				$in = array();
				
				
				$in['services_type'] = $services_type;
				$in['services_subtype'] = $services_subtype;
				$in['data'] = $data;
				 
				 
				 
				$in['bread']['#'] = 'Event';
				
				$in['title'] = ""; 
				$in['tpl'] = "services/step_detail";
				$this->load->view('manager/layout',$in);
				return; 
			}
		}
		show_404();
	}
	public function purchase($params = "")
	{
		if(!empty($params))
		{
			$rec = $this->db->where('id',$params)->get('services_payment');
			if($rec->num_rows()==1)
			{
				$data = $rec->row_array();
				$services_type = $this->db->where('id',$data['id_services_type'])->get('services_type')->row_array();
				$services_subtype = $this->db->where('id',$data['id_services_subtype'])->get('services_subtype')->row_array();
				$in = array();
				$currency = $rec = $this->db->where('displays',1)->limit(1)->get('currency')->row_array();
				 
				$in['currency'] = $currency;
				$in['wallet'] = $this->setwallet($currency['id']);
				$in['services_type'] = $services_type;
				$in['services_subtype'] = $services_subtype;
				$in['data'] = $data;
				 
				 
				 
				$in['bread']['#'] = 'Event';
				
				$in['title'] = ""; 
				$in['tpl'] = "services/purchase";
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
	public function receive($params = "")
	{
		if(!empty($params))
		{
			$rec = $this->db->where('id',$params)->get('services_payment');
			if($rec->num_rows()==1)
			{
				$data = $rec->row_array();
				$services_type = $this->db->where('id',$data['id_services_type'])->get('services_type')->row_array();
				$services_subtype = $this->db->where('id',$data['id_services_subtype'])->get('services_subtype')->row_array();
				$in = array();
				$currency = $rec = $this->db->where('displays',1)->limit(1)->get('currency')->row_array();
				$in['currency'] = $currency;
				$in['wallet'] = $this->setwallet($currency['id']);
				$in['services_type'] = $services_type;
				$in['services_subtype'] = $services_subtype;
				$in['data'] = $data;
				 
				 
				 
				$in['bread']['#'] = 'Event';
				
				$in['title'] = ""; 
				$in['tpl'] = "services/receive";
				$this->load->view('manager/layout',$in);
				return; 
			}
		}
		show_404();
	}
	
}

