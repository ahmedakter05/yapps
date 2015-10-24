<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Yapps_model extends CI_Model
{
	/**
	 * Holds an array of tables used
	 *
	 * @var array
	 **/
	public $tables = array();

	/**
	 * activation code
	 *
	 * @var string
	 **/
	public $activation_code;

	/**
	 * forgotten password key
	 *
	 * @var string
	 **/
	public $forgotten_password_code;

	/**
	 * new password
	 *
	 * @var string
	 **/
	public $new_password;

	/**
	 * Identity
	 *
	 * @var string
	 **/
	public $identity;

	/**
	 * Where
	 *
	 * @var array
	 **/
	public $_ion_where = array();

	/**
	 * Select
	 *
	 * @var array
	 **/
	public $_ion_select = array();

	/**
	 * Like
	 *
	 * @var array
	 **/
	public $_ion_like = array();

	/**
	 * Limit
	 *
	 * @var string
	 **/
	public $_ion_limit = NULL;

	/**
	 * Offset
	 *
	 * @var string
	 **/
	public $_ion_offset = NULL;

	/**
	 * Order By
	 *
	 * @var string
	 **/
	public $_ion_order_by = NULL;

	/**
	 * Order
	 *
	 * @var string
	 **/
	public $_ion_order = NULL;

	/**
	 * Hooks
	 *
	 * @var object
	 **/
	protected $_ion_hooks;

	/**
	 * Response
	 *
	 * @var string
	 **/
	protected $response = NULL;

	/**
	 * message (uses lang file)
	 *
	 * @var string
	 **/
	protected $messages;

	protected $sms = array();

	/**
	 * error message (uses lang file)
	 *
	 * @var string
	 **/
	protected $errors;

	/**
	 * error start delimiter
	 *
	 * @var string
	 **/
	protected $error_start_delimiter;

	/**
	 * error end delimiter
	 *
	 * @var string
	 **/
	protected $error_end_delimiter;

	/**
	 * caching of users and their groups
	 *
	 * @var array
	 **/
	public $_cache_user_in_group = array();

	/**
	 * caching of groups
	 *
	 * @var array
	 **/
	protected $_cache_groups = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->config('ion_auth', TRUE);
		$this->load->helper('cookie');
		$this->load->helper('date');
		$this->lang->load('ion_auth');

		// initialize db tables data
		$this->tables  = $this->config->item('tables', 'ion_auth');

		//initialize data
		$this->identity_column = $this->config->item('identity', 'ion_auth');
		$this->store_salt      = $this->config->item('store_salt', 'ion_auth');
		$this->salt_length     = $this->config->item('salt_length', 'ion_auth');
		$this->join			   = $this->config->item('join', 'ion_auth');


		// initialize hash method options (Bcrypt)
		$this->hash_method = $this->config->item('hash_method', 'ion_auth');
		$this->default_rounds = $this->config->item('default_rounds', 'ion_auth');
		$this->random_rounds = $this->config->item('random_rounds', 'ion_auth');
		$this->min_rounds = $this->config->item('min_rounds', 'ion_auth');
		$this->max_rounds = $this->config->item('max_rounds', 'ion_auth');


		// initialize messages and error
		$this->messages    = array();
		$this->errors      = array();
		$delimiters_source = $this->config->item('delimiters_source', 'ion_auth');

		// load the error delimeters either from the config file or use what's been supplied to form validation
		if ($delimiters_source === 'form_validation')
		{
			// load in delimiters from form_validation
			// to keep this simple we'll load the value using reflection since these properties are protected
			$this->load->library('form_validation');
			$form_validation_class = new ReflectionClass("CI_Form_validation");

			$error_prefix = $form_validation_class->getProperty("_error_prefix");
			$error_prefix->setAccessible(TRUE);
			$this->error_start_delimiter = $error_prefix->getValue($this->form_validation);
			$this->message_start_delimiter = $this->error_start_delimiter;

			$error_suffix = $form_validation_class->getProperty("_error_suffix");
			$error_suffix->setAccessible(TRUE);
			$this->error_end_delimiter = $error_suffix->getValue($this->form_validation);
			$this->message_end_delimiter = $this->error_end_delimiter;
		}
		else
		{
			// use delimiters from config
			$this->message_start_delimiter = $this->config->item('message_start_delimiter', 'ion_auth');
			$this->message_end_delimiter   = $this->config->item('message_end_delimiter', 'ion_auth');
			$this->error_start_delimiter   = $this->config->item('error_start_delimiter', 'ion_auth');
			$this->error_end_delimiter     = $this->config->item('error_end_delimiter', 'ion_auth');
		}


		// initialize our hooks object
		$this->_ion_hooks = new stdClass;

		// load the bcrypt class if needed
		if ($this->hash_method == 'bcrypt') {
			if ($this->random_rounds)
			{
				$rand = rand($this->min_rounds,$this->max_rounds);
				$params = array('rounds' => $rand);
			}
			else
			{
				$params = array('rounds' => $this->default_rounds);
			}

			$params['salt_prefix'] = $this->config->item('salt_prefix', 'ion_auth');
			$this->load->library('bcrypt',$params);
		}

		//$this->trigger_events('model_constructor');
	}

	/**
	 * Misc functions
	 *
	 * Hash password : Hashes the password to be stored in the database.
	 * Hash password db : This function takes a password and validates it
	 * against an entry in the users table.
	 * Salt : Generates a random salt value.
	 *
	 * @author Mathew
	 */

	/**
	 * Hashes the password to be stored in the database.
	 *
	 * @return void
	 * @author Mathew
	 **/
	

	

	///////////////   Clients control starts from here .........

	public function client_count() {
        return $this->db->count_all("clients");
    }

    

	public function client_add($additional_data)  // add client
	{
		

		//var_dump($data);

		if ($this->db->insert('clients', $additional_data))
		{
			//$this->sms['msg'] = "Client added Successfully";
			//$this->sms['error'] = "No Error";
			$this->set_error('Client added Successfully');
			return TRUE;
		} else 
		{
			//$this->sms['msg'] = "Client added UnSuccessfully";
			//$this->sms['error'] = "Error Occured";
			$this->set_error('Client added UnSuccessfully');
			return FALSE;
		}
		
		
		
	}

	public function client_edit($clientid=NULL, $additional_data=NULL) 
	{


		$update = $this->db->where('clientid', $clientid)
				 ->update('clients', $additional_data);

		if ($update == true){
			$this->set_error('Client updated Successfully');
			return true;
		} else 
		{
			$this->set_error('Client update UnSuccessfully');
			return false;
		}


	}

	public function client_delete($clntid) 
	{

	}

	public function client_view($limit, $start) // single or all client
	{
		//echo $limit. '=>' . $start;
		$query = $this->db->select('*')
						  ->order_by('clientid', 'desc')
						  ->limit($limit)
						  ->Offset($start)
						  ->join('colleges', 'colleges.collegeid=clients.collegeid')
		                  ->get('clients');

		
		//var_dump($query->result());
		
		return $query->result();
	}

	public function client_data($clientid)
	{	//echo $clientid;
		$query = $this->db->select('clients.clientid as clientid, clients.agentid as agentid, agents.levelid as levelid, clients.firstname as Clientsfirstname, clients.lastname as Clientslastname, agents.firstname as Agentsfirstname, agents.lastname as Agentslastname, clients.email as Clientsemail, clients.created as Clientscreated, clients.refferenceid as Clientsrefid, passportnoclient, filenumber, clients.status as Clientstatus, clients.comments as Clientscomments, agentname, colleges.collegeid, colleges.collegename')
						  ->where('clientid', $clientid)
						  //->order_by('agentid', 'asc')
						  ->limit(1)
						  ->join('agents', 'agents.agentid = clients.agentid')
						  ->join('colleges', 'colleges.collegeid=clients.collegeid')
						  ->get('clients');

						  //var_dump($query->row());

						  return $query->row();
	}

////////////  Agents

	public function agent_count() {
        return $this->db->count_all("agents");
    }

	public function agent_view($limit, $start) // single or all client
	{
		//echo $limit. '=>' . $start;
		$query = $this->db->select('*')
						  ->order_by('agentid', 'desc')
						  ->limit($limit)
						  ->Offset($start)
		                  ->get('agents');

		
		//var_dump($query->result());
		
		return $query->result();
	}

	public function agent_data($agentid)
	{	//echo $clientid;
		$query = $this->db->select('*')
						  ->where('agentid', $agentid)
						  //->order_by('agentid', 'asc')
						  ->limit(1)
						  ->join('levels', 'levels.levelid = agents.levelid')
						  ->get('agents');

						  //var_dump($query->row());

						  return $query->row();
	}

	public function agent_view_single($agentid=NULL)
	{	//echo $clientid;
		$query = $this->db->select('*')
						  ->where('agentid', $agentid)
						  //->order_by('agentid', 'asc')
						  ->limit(1)
						  //->join('agents', 'agents.agentid = clients.agentid')
						  ->get('agents');

						  //var_dump($query->row());

						  return $query->row();
	}
	public function agent_view_levelstat($levelid=NULL)
	{
		$query = $this->db->select('*')
						  ->where('levelid', $levelid)
						  ->limit(1)
						  ->get('levels');

						  //var_dump($query->row());

						  return $query->row();

	}
	public function agent_view_clientstat($agentid=NULL) 
	{

		$query['current'] = $this->db->where('agentid', $agentid)
						  ->where('month(clients.created)<=', date("m"))
						  ->where('month(clients.created)>=', date("m"))
						  ->count_all_results('clients');

		$query['last'] = $this->db->where('agentid', $agentid)
						  ->where('month(clients.created)<=', date("m")-1)
						  ->where('month(clients.created)>=', date("m")-1)
						  ->count_all_results('clients');

		$query['b4last'] = $this->db->where('agentid', $agentid)
						  ->where('month(clients.created)<=', date("m")-2)
						  ->where('month(clients.created)>=', date("m")-2)
						  ->count_all_results('clients');

		$query['total'] = $this->db->where('agentid', $agentid)
								   ->count_all_results('clients');


		$clientdata = array(
			'clientthismonth'   => $query['current'],
			'clientlastmonth'   => $query['last'],
			'clientb4lastmonth' => $query['b4last'],
			'clienttotal'       => $query['total'],
			);

		$this->db->where('agentid', $agentid);
		$this->db->update('agents', $clientdata); 



		return $query;

		
    }

	public function agent_view_target($levelid=NULL) {

        $query = $this->db->select('levelname, discounts, clientsrequired')
						  ->where('levelid', $levelid+1)
						  ->limit(1)
						  ->get('levels');

		return $query->row();

    }

	public function agent_add($additional_data) 
	{

		if (!$this->ion_auth->is_admin())
		{
			$this->set_error('You are Not an Admin');
			return false;
			die;
		}

		if ($this->db->insert('agents', $additional_data))
		{
			$this->sms['msg'] = "Agent added Successfully";
			$this->sms['error'] = "No Error";
			$this->set_error('Agent added Successfully');
			return TRUE;
		} else 
		{
			//$this->sms['msg'] = "Client added UnSuccessfully";
			//$this->sms['error'] = "Error Occured";
			$this->set_error('Agent added UnSuccessfully');
			return FALSE;
		}
	}



	public function agent_update($agentdata=NULL, $additional_data=NULL) 
	{

		if (!$this->ion_auth->is_admin())
		{
			$this->set_error('You are Not an Admin');
			return false;
			die;
		}

		if ($this->db->update('agents', $additional_data, array('agentid' => $agentdata)))
		{
			$this->set_error('Agent updated Successfully');
			return TRUE;
		} else 
		{
			//$this->sms['msg'] = "Client added UnSuccessfully";
			//$this->sms['error'] = "Error Occured";
			$this->set_error('Agent Update UnSuccessful');
			return FALSE;
		}
	}

	public function get_agent_name()
	{
		$query = $this->db->select('firstname, lastname' )
						  ->order_by('agentid', 'asc')
						  ->get('agents');

		return $query->result();
	}

	public function agent_view_clients($agentid=NULL)
	{
		//echo $limit. '=>' . $start;
		$query = $this->db->select('*')
						  ->where('agentid', $agentid)
						  ->order_by('created', 'desc')
						  //->limit(10)
						  //->Offset($start)
		                  ->get('clients');

		
		//var_dump($query->result());
		
		return $query->result();
	}

	public function agent_view_fees($agentid=NULL)
	{
		//echo $limit. '=>' . $start;
		$query = $this->db->select('*')
						  ->where('agentid', $agentid)
						  ->order_by('collegename', 'asc')
						  ->limit(10)
						  ->join('colleges', 'colleges.collegeid=agentfees.collegeid', 'left')
						  //->Offset($start)
						  ->group_by('feesid')
		                  ->get('agentfees');

		
		//var_dump($query->result());
		
		return $query->result();
	}
	
	public function agent_nameid()
	{
		//echo $limit. '=>' . $start;
		$query = $this->db->select('agentid, firstname, lastname')
						  ->order_by('agentid', 'asc')
						  //->limit(10)
						  //->Offset($start)
		                  ->get('agents');

		
		//var_dump($query->result());
		
		return $query->result();
	}


//////////// Payments

	public function payment_count() {
        return $this->db->count_all("payments");
    }

	public function payment_add($paydata) 
	{
		

		

		//var_dump($data);

		if ($this->db->insert('payments', $paydata))
		{
			$this->sms['msg'] = "Payment added Successfully";
			$this->sms['error'] = "No Error";
			$this->set_error('Payment added Successfully');
			return TRUE;
		} else 
		{
			//$this->sms['msg'] = "Client added UnSuccessfully";
			//$this->sms['error'] = "Error Occured";
			$this->set_error('Payment added UnSuccessfully');
			return FALSE;
		}


	}

	public function payment_view_all($limit=NULL, $start=NULL) 
	{
		$limit = (empty($limit) ? '10' : $limit);
		$start = (empty($start) ? '0' : $start);

		
		$query = $this->db->select('*')
					  ->order_by('paydate', 'desc')
					  ->limit($limit)
					  ->Offset($start)
					  ->join('clients', 'payments.clientid=clients.clientid')
	                  ->get('payments');
	
		//var_dump($query->result());
		return $query->result();

	}

	public function payment_view_client($clientid = NULL, $limit=NULL, $start=NULL) 
	{
		//echo $limit. '=>' . $start;
		$limit = (empty($limit) ? '10' : $limit);
		$start = (empty($start) ? '0' : $start);
		if (empty($clientid)){
			$query = $this->db->select('*')
						  ->order_by('paydate', 'desc')
						  ->limit($limit)
						  ->Offset($start)
		                  ->get('payments');
		
			//var_dump($query->result());
		
			return $query->result();

		} else {
		
		$query = $this->db->select('*')
						  ->where('clientid', $clientid)
						  ->order_by('paydate', 'desc')
						  ->limit(10)
						  ->Offset(0)
		                  ->get('payments');

		
		//var_dump($query->result());
		
		return $query->result();
		}
	}

	public function payment_remaining_client($clientid)
	{
		$query = $this->db->select('*')
							  ->where('paymentid', $payid)
							  ->limit(1)
							  ->get('payments');

		//var_dump($query->row());

		return $query->row();
	}

	public function payment_view_payid($payid = NULL) 
	{
		$query = $this->db->select('*')
							  ->where('paymentid', $payid)
							  ->limit(1)
							  ->get('payments');

		//var_dump($query->row());

		return $query->row();
	}
	public function payment_edit($clntid) 
	{

	}

	public function payment_delete($clntid) 
	{

	}

	public function last_payid()
	{

		$query = $this->db->select('paymentid')
							  ->order_by('paymentid', 'desc')
							  ->limit(1)
							  ->get('payments');

		return $query->row();
	}

////////////////// Levels ................

	public function level_view() {
        $query = $this->db->select('*')
							->order_by('levelid', 'asc')
							->get('levels');


		return $query->result();
    }

    public function level_data($levelid = NULL)
	{	//echo $clientid;
		$query = $this->db->select('*')
						  ->where('levelid', $levelid)
						  ->limit(1)
						  ->get('levels');

						  //var_dump($query->row());

		return $query->row();
	}

	public function level_edit($levelid=NULL, $additional_data=NULL) 
	{


		$update = $this->db->where('levelid', $levelid)
				 ->update('levels', $additional_data);

		if ($update == true){
			$this->set_error('Client updated Successfully');
			return true;
		} else 
		{
			$this->set_error('Client update UnSuccessfully');
			return false;
		}


	}


///////////////////   Feessss .........................

	
	public function get_college_name($collegeid = NULL)
	{	//echo $clientid;
		if ( empty($collegeid))
		{
			$query = $this->db->select('*')
							  ->get('colleges');

							  //var_dump($query->result());

			return $query->result();

		} else
		{
			


			$this->db->select('*');
				
				foreach ($collegeid as $value) 
				{	
					$this->db->or_where('collegeid', $value->collegeid);
				}
								  
				$query = $this->db->get('colleges');


			return $query->result();
		} 
	}

	public function get_college($collegeid = NULL)
	{	//echo $clientid;
		if ($this->id_check('colleges', $collegeid))
		{
			$query = $this->db->select('*')
							  ->where('collegeid', $collegeid)
							  ->get('colleges');

							  //var_dump($query->result());

			return $query->row();

		} else 
		{
			return FALSE;

		}
	}

	public function college_add($collegename=NULL) 
	{

		if (!$this->ion_auth->is_admin())
		{
			$this->set_error('You are Not an Admin');
			return false;
			die;
		}

		if ($this->db->insert('colleges', $collegename))
		{
			$this->set_error('College added Successfully');
			$query = $this->db->select('collegeid')
							  ->order_by('collegeid', 'desc')
							  ->limit(1)
							  ->get('colleges');

			return $query->row();

		} else 
		{
			$this->set_error('College added UnSuccessful');
			return FALSE;
		}
	}

	public function college_delete($collegeid=NULL)
	{
		$this->db->where('collegeid', $collegeid);

		if ($this->db->delete('colleges'))
		{
			$this->set_error('College Delete Successfully');
			return TRUE;
		} else {
			$this->set_error('College Delete UnSuccessfully');
			return FALSE;
		}
	}

	public function fees_add($additional_data=NULL) 
	{

		if (!$this->ion_auth->is_admin())
		{
			$this->set_error('You are Not an Admin');
			return false;
			die;
		}

		if ($this->db->insert('agentfees', $additional_data))
		{
			$this->set_error('Fees added Successfully');
			return TRUE;
		} else 
		{
			$this->set_error('Fees added UnSuccessful');
			return FALSE;
		}
	}
	
	public function fees_data($feesid=NULL)
	{	
		
			$query = $this->db->select('*')
							  ->where('feesid', $feesid)
							  ->limit(1)
							  ->get('agentfees');

							  //var_dump($query->row());

			return $query->row();
	}
	public function fees_data_agent($agentid=NULL)
	{	
		
			$query = $this->db->select('collegeid')
							  ->where('agentid', $agentid)
							  ->limit(10)
							  ->get('agentfees');

							  //var_dump($query->row());

			return $query->result();
	}
	public function fees_data_payment($collegeid=NULL, $agentid=NULL)
	{	
		//echo $collegeid . $agentid;
			$query = $this->db->select('*')
							  ->where('collegeid', $collegeid)
							  ->where('agentid', $agentid)
							  ->limit(1)
							  ->get('agentfees');

			
			return $query->row();
	}
	public function fees_edit($feesid=NULL, $additional_data=NULL) 
	{


		$update = $this->db->where('feesid', $feesid)
				 ->update('agentfees', $additional_data);

		if ($update == true){
			$this->set_error('Fees updated Successfully');
			return true;
		} else 
		{
			$this->set_error('Fees update UnSuccessfully');
			return false;
		}


	}
	public function collegefees_alreadyadded_check($collegeid=NULL, $agentid=NULL) 
	{

		$query = $this->db->where('collegeid', $collegeid)
						->where('agentid', $agentid)
						->from('agentfees')
		                ->count_all_results() > 0;
		return $query;

	}

///////////////// Common & Others ..........

	public function search($query, $type) // through passport no or client id or all clients under an agent
	{
		//echo $query, $type;

		if ($type == 'client')
		{

			$query = $this->db->select('*')
							  ->order_by('firstname', 'asc')
							  //->limit(1)	
							  ->where_in('firstname', $query)
							  ->or_where_in('lastname', $query)
							  ->or_where_in('email', $query)
							  ->or_where_in('passportnoclient', $query)
							  ->or_where_in('filenumber', $query)
							  ->or_where_in('status', $query)
							  //->or_like()
							  ->get('clients');

			//foreach ($query as $value) 
			//{
				//$query = $this->db->or_like('firstname',  $value)
								  //->or_like('lastname', $value)
								  //->or_like('passportnoclient', $value);
			//}

			//$query = $this->db->get('clients');
			

			return $query->result();

		} elseif ($type == 'agent')
		{
			$query = $this->db->select('*')
							  ->order_by('firstname', 'asc')
							  //->limit(1)	
							  ->where_in('firstname', $query)
							  ->or_where_in('lastname', $query)
							  ->or_where_in('username', $query)
							  ->or_where_in('email', $query)
							  ->or_where_in('passportnoagent', $query)
							  ->or_where_in('occupation', $query)
							  ->or_where_in('status', $query)
							  //->or_like()
							  ->get('agents');

			return $query->result();			  

		} elseif ($type == 'payment')
		{
			$query = $this->db->select('*')
							  ->join('clients', 'clients.clientid=payments.clientid')
							  ->order_by('firstname', 'asc')
							  //->limit(1)	
							  ->where_in('firstname', $query)
							  ->or_where_in('lastname', $query)
							  ->or_where_in('email', $query)
							  ->or_where_in('clients.passportnoclient', $query)
							  ->or_where_in('payments.comments', $query)
							  //->or_like()
							  ->get('payments');

			//var_dump($query->result());
			return $query->result();	

		} elseif ($type == 'all') {
			
			$this->db->select('*');
			
			foreach ($query as $value) 
			{	
				$this->db->like('firstname', $value)
							->or_like('lastname', $value)
							->or_like('email', $value)
							->or_like('passportnoclient', $value)
							->or_like('status', $value)
							->or_like('agentname', $value);
			}
							  
			$query = $this->db->get('clients');

			return $query->result();
		}

		

	}

	public function page_counter()
	{
		$this->db->set('userid', 'userid+1', FALSE);
		$this->db->where('name','pageview');
		$this->db->update('siteinfo'); 

		$query = $this->db->select('userid')
						  ->where('name','pageview')
						  ->limit(1)
						  ->get('siteinfo');

		$data = $query->row('userid');
		return $data;
	}

	public function faq_view()
	{
		$query = $this->db->select('*')
						  ->limit(10)
						  ->get('faq');

		$this->set_error('FAQ View');

		return $query->result();

	}

	public function set_sms($sms)
	{
		$this->sms = $sms;
		echo $sms;

		return $this->sms;
	}

	public function get_sms()
	{
				
		$sms = $this->sms;
		

		return $sms;
	}

	public function set_error($error)
	{
		$this->errors[] = $error;

		return $error;
	}

	
	public function errors()
	{
		$_output = '';
		foreach ($this->errors as $error)
		{
			$errorLang = $this->lang->line($error) ? $this->lang->line($error) : ' ' . $error . ' ';
			$_output .= $errorLang;
		}
		//$_output .= "Error Defined";

		return $_output;
	}

	
	public function client_passport_check($passport = NULL)
	{
		
		if (empty($passport))
		{
			return FALSE; die;
		}

		return $this->db->where('passportnoclient', $passport)
						->from('clients')
		                ->count_all_results() > 0;

	}

	public function id_check($table = NULL, $id = NULL)
	{
		//echo $table . ' => ' . $id;
		if (empty($table) || empty($id))
		{
			return FALSE; die;
		}

		if ($table == 'clients'){$dbtable = 'clientid';} 
			elseif ($table == 'agents'){$dbtable = 'agentid';} 
				elseif ($table == 'payments'){$dbtable = 'paymentid';}
					elseif ($table == 'levels'){$dbtable = 'levelid';}
						elseif ($table == 'users'){$dbtable = 'id';}
							elseif ($table == 'groups'){$dbtable = 'id';}
								elseif ($table == 'agentfees'){$dbtable = 'feesid';}
									elseif ($table == 'colleges'){$dbtable = 'collegeid';}
										else {return FALSE; die;}

		return $this->db->where($dbtable, $id)
						->from($table)
		                ->count_all_results() > 0;

	}
	

	public function test_aa($value_key = NULL) // single or all client
	{
		$query = $this->db->select('clients.firstname as ClientsFirstName, agents.lastname as AgentsLastName ' )
						  ->order_by('clientid', 'desc')
						  ->limit(10)
						  ->Offset(0)
						  ->join('agents', 'agents.agentid = clients.agentid')
		                  ->get('clients');

		
		//var_dump($query->result());
		
		return $query->result();
	}




}