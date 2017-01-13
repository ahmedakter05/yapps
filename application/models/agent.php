<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ob_start();
class Agent extends CI_Controller {

	protected $sms = array();

	public function __construct(){

		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation','session','pagination','aa_lib'));
		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
		$this->lang->load('clients');
		
		$this->_init();
		
		//$this->load->model('news_model');
		
	} 
	
	private function _init(){

		$this->load->model('yapps_model');

		$this->output->set_template('aries_layout');
					
	}


	public function Index(){

		$data['title'] = "AA Planetica" ;
		$data['activepage'] = "Clients Page" ;

		$page = 'agent_view';

		$base_url = "apps/agent/index";
		$uri_segment = '4';

		$pagin = $this->yapps_pagination($uri_segment, $base_url);
		
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			$this->session->set_userdata('last_page', current_url()); redirect('users/admin/login', 'refresh');
			//echo "Redirect to Login";
		}
		elseif ($this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['agents'] = $this->yapps_model->agent_view($pagin['per_page'], $pagin['page']);

			
			$this->data['links'] = $pagin['links'];
			

			//var_dump($this->data['agents']);


			$this->load->view('aries_admin/apps/agent_view', $this->data);
		}
		elseif (FALSE)
		{
			
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			//echo "Rest of the work as an Admin";
			$data = $this->yapps_model->client_passport_check('AB12345684');
			if ($data == 'true')
			{
				var_dump($this->sms);

				return show_error('Duplicate Accounts, Search in the Clients Section');
			}

			if (isset($this->sms))
			{
				echo $this->sms['msg'] . '</br>' . $this->sms['error'];
			}

		}

	}

	public function add($page = 'client_add'){

		$data['title'] = "AA Planetica" ;
		$data['activepage'] = "Clients Page" ;
		

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			$this->session->set_userdata('last_page', current_url()); redirect('users/admin/login', 'refresh');
		}

		//$tables = $this->config->item('tables','ion_auth');

		// validate form input
		$this->form_validation->set_rules('firstname', $this->lang->line('client_firstname_label'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('lastname', $this->lang->line('client_lastname_label'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('username', $this->lang->line('client_username_label'), 'trim|xss_clean|is_unique[agents.username]');
		$this->form_validation->set_rules('email', $this->lang->line('client_email_label'), 'valid_email|trim|xss_clean|is_unique[agents.email]');
		$this->form_validation->set_rules('passportnoagent', $this->lang->line('client_passport_label'), 'required|trim|xss_clean|is_unique[agents.passportnoagent]');
		$this->form_validation->set_rules('occupation', $this->lang->line('occupation'), 'trim|xss_clean');
		$this->form_validation->set_rules('dateofbirth', $this->lang->line('client_refferenceid_label'), 'trim|xss_clean');
		//$this->form_validation->set_rules('levelid', $this->lang->line('client_status_label'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('status', $this->lang->line('client_status_label'), 'trim|xss_clean');
		$this->form_validation->set_rules('refferenceid', $this->lang->line('client_reff_label'), 'trim|xss_clean');
		$this->form_validation->set_rules('comments', $this->lang->line('client_comments_label'), 'trim|xss_clean');

		if ($this->form_validation->run() == true)
		{
			
			$additional_data = array(
				'firstname' => $this->input->post('firstname'),
				'lastname'  => $this->input->post('lastname'),
				'username'    => $this->input->post('username'),
				'email'      => $this->input->post('email'),
				'passportnoagent'      => $this->input->post('passportnoagent'),
				'occupation'      => $this->input->post('occupation'),
				'dateofbirth'      => $this->input->post('dateofbirth'),
				//'levelid'      => $this->input->post('levelid'),
				'status'      => $this->input->post('status'),
				'refferenceid'      => $this->input->post('refferenceid'),
				'comments'      => $this->input->post('comments')
			);

			
		}

		if ($this->form_validation->run() == true && $this->ion_auth->is_admin())
		{
			if ($this->yapps_model->agent_add($additional_data))
			{
				$this->sms = $this->yapps_model->get_sms();
				//var_dump($this->sms);
				$this->session->set_flashdata('message', $this->yapps_model->errors());
			} else { $this->session->set_flashdata('message', $this->yapps_model->errors()); }
			

			redirect("apps/agent/index", 'refresh');
		}
		else
		{
			// display the create user form
			// set the flash data error message if there is one
			//$this->data['message'] = $this->session->flashdata('message');//$this->yapps_model->errors();
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->yapps_model->errors() ? $this->yapps_model->errors() : $this->session->flashdata('message')));

			
			$this->data['firstname'] = array(
				'name'  => 'firstname',
				'id'    => 'firstname',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('firstname'),
			);
			$this->data['lastname'] = array(
				'name'  => 'lastname',
				'id'    => 'lastname',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('lastname'),
			);
			$this->data['username'] = array(
				'name'  => 'username',
				'id'    => 'username',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('username'),
			);
			$this->data['email'] = array(
				'name'  => 'email',
				'id'    => 'email',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('email'),
			);
			$this->data['passportnoagent'] = array(
				'name'  => 'passportnoagent',
				'id'    => 'passportnoagent',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('passportnoagent'),
			);
			$this->data['occupation'] = array(
				'name'  => 'occupation',
				'id'    => 'occupation',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('occupation'),
			);
			$this->data['dateofbirth'] = array(
				'name'  => 'dateofbirth',
				'id'    => 'dateofbirth',
				'type'  => 'text',
				'id'    => 'datepicker',
				'value' => $this->form_validation->set_value('dateofbirth'),
			);
			$this->data['levelid'] = array(
				'name'  => 'levelid',
				'id'    => 'levelid',
				'options'=> array('1' => $this->lang->line('agent_levelid_1_label'), '2' => $this->lang->line('agent_levelid_2_label'), '3' => $this->lang->line('agent_levelid_3_label'), '4' => $this->lang->line('agent_levelid_4_label'), '5' => $this->lang->line('agent_levelid_5_label'), '6' => $this->lang->line('agent_levelid_6_label')),
				'type'  => 'text',
				'value' => $this->form_validation->set_value('levelid'),
			);
			$this->data['status'] = array(
				'name'  => 'status',
				'id'    => 'status',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('status'),
			);
			$this->data['refferenceid'] = array(
				'name'  => 'refferenceid',
				'id'    => 'refferenceid',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('refferenceid'),
			);
			$this->data['comments'] = array(
				'name'  => 'comments',
				'id'    => 'comments',
				'type'  => 'text',
				//'maxlength'   => '1000',
				//'size'        => '50',
				//'style'       => 'width:100%',
				'value' => $this->form_validation->set_value('comments'),
			);


			$this->load->view('aries_admin/apps/agent_add', $this->data);
		}

	}

	public function fees_add($agentid=NULL)
	{

		$data['title'] = "AA Planetica" ;
		$data['activepage'] = "Clients Page" ;
		$page = 'index';
		
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			// redirect them to the login page
			$this->session->set_userdata('last_page', current_url()); redirect('users/admin/login', 'refresh');
			echo "Redirect to Login";
		}

		$agentid = (!empty($_POST['agentid']) ? $_POST['agentid'] : (isset($agentid) ? $agentid : '0'));

		
		if (!$this->yapps_model->id_check('agents', $agentid))
		{
			$this->session->set_flashdata('message', '<p> No ID Matched to any Agents </p>');
			redirect("errors", 'refresh');
			//echo "Redirect to Login";
		} 


		elseif ($this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{

			$this->form_validation->set_rules('agentid', $this->lang->line('agent_id_label'), 'xss_clean|required');
			$this->form_validation->set_rules('collegename', $this->lang->line('college_name_label'), 'xss_clean|required|callback_same_college_check');
			$this->form_validation->set_rules('fees1', $this->lang->line('Fees 1'), 'xss_clean|required');
			$this->form_validation->set_rules('fees2', $this->lang->line('Fees 2'), 'xss_clean|required');
			$this->form_validation->set_rules('fees3', $this->lang->line('Fees 3'), 'xss_clean|required');
			$this->form_validation->set_rules('fees4', $this->lang->line('Fees 4'), 'xss_clean');
			$this->form_validation->set_rules('fees5', $this->lang->line('Fees 5'), 'xss_clean');
			

			if($this->form_validation->run() == true)
			{
				
				$additional_data = array(
					'agentid'    => $this->input->post('agentid'),
					'collegeid'    => $this->input->post('collegename'),
					'fees1'    => $this->input->post('fees1'),
					'fees2'    => $this->input->post('fees2'),
					'fees3'    => $this->input->post('fees3'),
					'fees4'    => $this->input->post('fees4'),
					'fees5'    => $this->input->post('fees5'),
					'totalfees'    => $this->input->post('fees1') + $this->input->post('fees2') + $this->input->post('fees3') + $this->input->post('fees4') + $this->input->post('fees5'),
				);

				$this->yapps_model->fees_add($additional_data) ? $this->session->set_flashdata('message','Fees Added') : $this->session->set_flashdata('message','Fees not Added');
				redirect('apps/agent/view/'.$this->input->post('agentid'), 'refresh');

			} else
			{
				
				$agentdata = $this->yapps_model->agent_view_single($agentid);
				$collegedata = $this->aa_lib->get_array_data($this->yapps_model->get_college_name());

				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$this->data['agentname'] = array(
				'name'  => 'agentname',
				'id'    => 'agentname',
				'type'  => 'text',
				'value' => $agentdata->firstname . ' ' . $agentdata->lastname,
				'disabled' => 'disabled',
				);
				$this->data['collegename'] = array(
				'name'  => 'collegename',
				'options'    => $collegedata,
				'type'  => 'text',
				'value' => $this->form_validation->set_value('collegename'),
				);
				$this->data['fees1'] = array(
				'name'  => 'fees1',
				'id'    => 'fees1',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('fees1'),
				);
				$this->data['fees2'] = array(
				'name'  => 'fees2',
				'id'    => 'fees2',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('fees2'),
				);
				$this->data['fees3'] = array(
				'name'  => 'fees3',
				'id'    => 'fees3',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('fees3'),
				);
				$this->data['fees4'] = array(
				'name'  => 'fees4',
				'id'    => 'fees4',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('fees4'),
				);
				$this->data['fees5'] = array(
				'name'  => 'fees5',
				'id'    => 'fees5',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('fees5'),
				);
				
				$this->data['id'] = array(
	          	'agentid'  => $agentdata->agentid,
	          	'collegeid'  => $agentdata->agentid,
	        	);

	        	$this->load->view('aries_admin/apps/agent_add_fees', $this->data);
	        }
		}
		else
		{
			
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			echo "Rest of the work as an Admin";
		}

	}

	public function view_old($agentid = NULL)
	{

		//$data['title'] = "AA Planetica" ;
		//$data['activepage'] = "Client View Page" ;
		$page = 'View Agent';

		//echo $clientid;        

        

         
		
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			$this->session->set_userdata('last_page', current_url()); redirect('users/admin/login', 'refresh');
			echo "Redirect to Login";
		}
		elseif ($this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			
			if($this->yapps_model->id_check('agents', $agentid))
			{
				$this->data['agent'] = $this->aa_lib->get_array_data($this->yapps_model->agent_view_single($agentid));
				$this->data['levelstat'] = $this->aa_lib->get_array_data($this->yapps_model->agent_view_levelstat($this->data['agent']['levelid']));
				$this->data['clientstat'] = $this->yapps_model->agent_view_clientstat($this->data['agent']['agentid']);
				$this->data['clientstat']['target'] = $this->aa_lib->get_array_data($this->yapps_model->agent_view_target($this->data['agent']['levelid']));
				$this->data['clientstat']['target']['clientsremaining'] = $this->data['clientstat']['target']['clientsrequired'] - $this->data['clientstat']['current'];
				$timestamp = strtotime(date("Y-m-d"));
				$this->data['clientstat']['target']['daysremaining'] = (int)date('t', $timestamp) - (int)date('j', $timestamp);
				$this->data['message'] = ($this->yapps_model->errors() ? $this->yapps_model->errors() : $this->session->flashdata('message'));
				//var_dump($this->data);

				//var_dump($this->data['levelstat']);
				
				
			} else {

				$this->session->set_flashdata('message', '<div color="red">ID not Matched to any Agents</div>');
				redirect('apps/agent/index', 'refresh');
			}

			$this->load->view('aries_admin/apps/agent_view_single_old', $this->data);
			//return show_error('You must be an administrator to view this page.');
		}
		else
		{
			
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			echo "Rest of the work as an Admin";
		}

	}

	public function view($agentid = NULL)
	{

		//$data['title'] = "AA Planetica" ;
		//$data['activepage'] = "Client View Page" ;
		$page = 'View Agent';

		//echo $clientid;        

        

         
		
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			$this->session->set_userdata('last_page', current_url()); redirect('users/admin/login', 'refresh');
			echo "Redirect to Login";
		}
		elseif ($this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			
			if($this->yapps_model->id_check('agents', $agentid))
			{
				$this->data['agent'] = $this->aa_lib->get_array_data($this->yapps_model->agent_view_single($agentid));
				$this->data['fees'] = $this->aa_lib->get_array_data($this->yapps_model->agent_view_fees($this->data['agent']['agentid']));
				//var_dump($this->data['fees']);
				$this->data['clientstat'] = $this->yapps_model->agent_view_clientstat($this->data['agent']['agentid']);
				$this->data['clientstat']['target'] = $this->aa_lib->get_array_data($this->yapps_model->agent_view_target($this->data['agent']['levelid']));
				$this->data['clientstat']['target']['clientsremaining'] = $this->data['clientstat']['target']['clientsrequired'] - $this->data['clientstat']['current'];
				$timestamp = strtotime(date("Y-m-d"));
				$this->data['clientstat']['target']['daysremaining'] = (int)date('t', $timestamp) - (int)date('j', $timestamp);
				$this->data['message'] = ($this->yapps_model->errors() ? $this->yapps_model->errors() : $this->session->flashdata('message'));
				//var_dump($this->data);

				//var_dump($this->data['levelstat']);
				
				
			} else {

				$this->session->set_flashdata('message', '<div color="red">ID not Matched to any Agents</div>');
				redirect('apps/agent/index', 'refresh');
			}

			$this->load->view('aries_admin/apps/agent_view_single', $this->data);
			//return show_error('You must be an administrator to view this page.');
		}
		else
		{
			
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			echo "Rest of the work as an Admin";
		}

	}

	public function agent_view_client($agentid = NULL)
	{

		//$data['title'] = "AA Planetica" ;
		//$data['activepage'] = "Client View Page" ;
		$page = 'View Agent';

		//echo $agentid;        

        

         
		
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			$this->session->set_userdata('last_page', current_url()); redirect('users/admin/login', 'refresh');
			echo "Redirect to Login";
		}
		elseif ($this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			
			if($this->yapps_model->id_check('agents', $agentid))
			{
				$this->data['agentclients'] = $this->aa_lib->get_array_data($this->yapps_model->agent_view_clients($agentid));
				//var_dump($this->data['agentclients']);
				$this->data['message'] = ($this->yapps_model->errors() ? $this->yapps_model->errors() : $this->session->flashdata('message'));
				//var_dump($this->data);

				//var_dump($this->data['levelstat']);
				
				
			} else {

				$this->session->set_flashdata('message', '<div color="red">ID not Matched to any Agents</div>');
				redirect('apps/agent/index', 'refresh');
			}

			$this->load->view('aries_admin/apps/agent_view_clients', $this->data);
			//return show_error('You must be an administrator to view this page.');
		}
		else
		{
			
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			echo "Rest of the work as an Admin";
		}

	}

	public function edit($agentid=NULL){

		$data['title'] = "AA Planetica" ;
		$data['activepage'] = "Clients Page" ;
		$page = 'agent_edit';

		$agentid = (!empty($_POST['agentid']) ? $_POST['agentid'] : $agentid);

		if (!$this->yapps_model->id_check('agents', $agentid))
		{
			$this->session->set_flashdata('message', 'Agent ID is not Valid or not Matched to our Database.');
			redirect('apps/agent/index', 'refresh');
		}

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			$this->session->set_userdata('last_page', current_url()); redirect('users/admin/login', 'refresh');
		}

		//$tables = $this->config->item('tables','ion_auth');

		// validate form input
		$this->form_validation->set_rules('firstname', $this->lang->line('client_firstname_label'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('lastname', $this->lang->line('client_lastname_label'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('username', $this->lang->line('client_username_label'), 'trim|xss_clean');
		$this->form_validation->set_rules('email', $this->lang->line('client_email_label'), 'valid_email|trim|xss_clean');
		$this->form_validation->set_rules('passportnoagent', $this->lang->line('client_passport_label'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('occupation', $this->lang->line('occupation'), 'trim|xss_clean');
		$this->form_validation->set_rules('dateofbirth', $this->lang->line('client_refferenceid_label'), 'trim|xss_clean');
		//$this->form_validation->set_rules('levelid', $this->lang->line('client_status_label'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('status', $this->lang->line('client_status_label'), 'trim|xss_clean');
		$this->form_validation->set_rules('refferenceid', $this->lang->line('client_reff_label'), 'trim|xss_clean');
		$this->form_validation->set_rules('comments', $this->lang->line('client_comments_label'), 'trim|xss_clean');

		if ($this->form_validation->run() == true)
		{
			
			$additional_data = array(
				'firstname' => $this->input->post('firstname'),
				'lastname'  => $this->input->post('lastname'),
				'username'    => $this->input->post('username'),
				'email'      => $this->input->post('email'),
				'passportnoagent'      => $this->input->post('passportnoagent'),
				'occupation'      => $this->input->post('occupation'),
				'dateofbirth'      => $this->input->post('dateofbirth'),
				'levelid'      => $this->input->post('levelid'),
				'status'      => $this->input->post('status'),
				//'refferenceid'      => $this->input->post('refferenceid'),
				'comments'      => $this->input->post('comments')
			);

			
		}

		if ($this->form_validation->run() == true && $this->ion_auth->is_admin())
		{
			if ($this->yapps_model->agent_update($agentid, $additional_data))
			{
				$this->session->set_flashdata('message', $this->yapps_model->errors());
			} 
			else 
			{ 
				$this->session->set_flashdata('message', $this->yapps_model->errors()); 
			}
			
			redirect("apps/agent/index", 'refresh');
		}
		else
		{
			
			$agentdata = $this->yapps_model->agent_data($agentid);
			//var_dump($agentdata);
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->yapps_model->errors() ? $this->yapps_model->errors() : $this->session->flashdata('message')));

			
			$this->data['firstname'] = array(
				'name'  => 'firstname',
				'id'    => 'firstname',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('firstname') ? $this->form_validation->set_value('firstname') : $agentdata->firstname),
			);
			$this->data['lastname'] = array(
				'name'  => 'lastname',
				'id'    => 'lastname',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('lastname') ? $this->form_validation->set_value('lastname') : $agentdata->lastname),
			);
			$this->data['username'] = array(
				'name'  => 'username',
				'id'    => 'username',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('username') ? $this->form_validation->set_value('username') : $agentdata->username),
			);
			$this->data['email'] = array(
				'name'  => 'email',
				'id'    => 'email',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('email') ? $this->form_validation->set_value('email') : $agentdata->email),
			);
			$this->data['passportnoagent'] = array(
				'name'  => 'passportnoagent',
				'id'    => 'passportnoagent',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('passportnoagent') ? $this->form_validation->set_value('passportnoagent') : $agentdata->passportnoagent),
			);
			$this->data['occupation'] = array(
				'name'  => 'occupation',
				'id'    => 'occupation',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('occupation') ? $this->form_validation->set_value('occupation') : $agentdata->occupation),
			);
			$this->data['dateofbirth'] = array(
				'name'  => 'dateofbirth',
				'id'    => 'dateofbirth',
				'type'  => 'text',
				'id'    => 'datepicker',
				'value' => ($this->form_validation->set_value('dateofbirth') ? $this->form_validation->set_value('dateofbirth') : $agentdata->dateofbirth),
			);
			$this->data['levelid'] = array(
				'name'  => 'levelid',
				'id'    => 'levelid',
				'options'=> array('1' => $this->lang->line('agent_levelid_1_label'), '2' => $this->lang->line('agent_levelid_2_label'), '3' => $this->lang->line('agent_levelid_3_label'), '4' => $this->lang->line('agent_levelid_4_label'), '5' => $this->lang->line('agent_levelid_5_label'), '6' => $this->lang->line('agent_levelid_6_label')),
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('levelid') ? $this->form_validation->set_value('levelid') : $agentdata->levelid),
			);
			$this->data['status'] = array(
				'name'  => 'status',
				'id'    => 'status',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('status') ? $this->form_validation->set_value('status') : $agentdata->status),
			);
			/*$this->data['refferenceid'] = array(
				'name'  => 'refferenceid',
				'id'    => 'refferenceid',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('username') ? $this->form_validation->set_value('username') : $agentdata->username),
			);*/
			$this->data['comments'] = array(
				'name'  => 'comments',
				'id'    => 'comments',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('comments') ? $this->form_validation->set_value('comments') : $agentdata->comments),
			);
			$this->data['id'] = array(
				'agentid'  => ($this->form_validation->set_value('agentid') ? $this->form_validation->set_value('agentid') : $agentid),
			);


			$this->load->view('aries_admin/apps/agent_edit', $this->data);
		}

	}

	public function fees_edit($feesid=NULL)
	{

		$data['title'] = "AA Planetica" ;
		$data['activepage'] = "Clients Page" ;
		$page = 'index';
		
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			//$this->session->set_userdata('last_page', current_url()); redirect('users/admin/login', 'refresh');
			echo "Redirect to Login";
		}

		$feesid = (!empty($_POST['feesid']) ? $_POST['feesid'] : (isset($feesid) ? $feesid : '0'));

		
		if (!$this->yapps_model->id_check('agentfees', $feesid))
		{
			$this->session->set_flashdata('message', '<p> No Data Found </p>');
			redirect("errors", 'refresh');
			//echo "Redirect to Login";
		} 


		elseif ($this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{

			$this->form_validation->set_rules('feesid', $this->lang->line('fees_id_label'), 'xss_clean|required');
			$this->form_validation->set_rules('fees1', $this->lang->line('Fees 1'), 'xss_clean|required');
			$this->form_validation->set_rules('fees2', $this->lang->line('Fees 2'), 'xss_clean|required');
			$this->form_validation->set_rules('fees3', $this->lang->line('Fees 3'), 'xss_clean|required');
			$this->form_validation->set_rules('fees4', $this->lang->line('Fees 4'), 'xss_clean|required');
			$this->form_validation->set_rules('fees5', $this->lang->line('Fees 5'), 'xss_clean|required');
			

			if($this->form_validation->run() == true)
			{
				$additional_data = array(
				
				'fees1'    => $this->input->post('fees1'),
				'fees2'    => $this->input->post('fees2'),
				'fees3'    => $this->input->post('fees3'),
				'fees4'    => $this->input->post('fees4'),
				'fees5'    => $this->input->post('fees5'),
				'totalfees'    => $this->input->post('fees1') + $this->input->post('fees2') + $this->input->post('fees3') + $this->input->post('fees4') + $this->input->post('fees5'),
				);

				$this->yapps_model->fees_edit($feesid, $additional_data) ? $this->session->set_flashdata('message','Fees Updated') : $this->session->set_flashdata('message','Fees not Updated');
				redirect('apps/agent/view/'.$this->input->post('agentid'), 'refresh');

			} else
			{
				
				$fees = $this->yapps_model->fees_data($feesid);
				$collegename = $this->yapps_model->get_college($fees->collegeid);
				$agentdata = $this->yapps_model->agent_view_single($fees->agentid);
				//var_dump($collegename);

				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$this->data['agentname'] = $agentdata->firstname . ' ' . $agentdata->lastname;
				$this->data['collegename'] = $collegename->collegename;

				$this->data['fees1'] = array(
				'name'  => 'fees1',
				'id'    => 'fees1',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('fees1') ? $this->form_validation->set_value('fees1') : $fees->fees1),
				);
				$this->data['fees2'] = array(
				'name'  => 'fees2',
				'id'    => 'fees2',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('fees2') ? $this->form_validation->set_value('fees2') : $fees->fees2),
				);
				$this->data['fees3'] = array(
				'name'  => 'fees3',
				'id'    => 'fees3',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('fees3') ? $this->form_validation->set_value('fees3') : $fees->fees3),
				);
				$this->data['fees4'] = array(
				'name'  => 'fees4',
				'id'    => 'fees4',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('fees4') ? $this->form_validation->set_value('fees4') : $fees->fees4),
				);
				$this->data['fees5'] = array(
				'name'  => 'fees5',
				'id'    => 'fees5',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('fees5') ? $this->form_validation->set_value('fees5') : $fees->fees5),
				);
				
				$this->data['id'] = array(
	          	'feesid'  => $fees->feesid,
	          	'agentid'  => $agentdata->agentid,
	        	);

	        	$this->load->view('aries_admin/apps/agent_edit_fees', $this->data);
	        }
		}
		else
		{
			
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			echo "Rest of the work as an Admin";
		}

	}

	public function delete($page = 'index'){

		$data['title'] = "AA Planetica" ;
		$data['activepage'] = "Clients Page" ;
		
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			$this->session->set_userdata('last_page', current_url()); redirect('users/admin/login', 'refresh');
			echo "Redirect to Login";
		}
		elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			echo "No Admin, only can can add clients";
			return show_error('You must be an administrator to view this page.');
		}
		else
		{
			
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			echo "Rest of the work as an Admin";
		}

	}

	public function status($page = 'index'){

		$data['title'] = "AA Planetica" ;
		$data['activepage'] = "Clients Page" ;
		
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			//$this->session->set_userdata('last_page', current_url()); redirect('users/admin/login', 'refresh');
			echo "Redirect to Login";
		}
		elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			echo "No Admin, only can can add clients";
			return show_error('You must be an administrator to view this page.');
		}
		else
		{
			
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			echo "Rest of the work as an Admin";
		}

	}
	
	public function yapps_pagination($uri_segment,$base_url){


		$config = array();
        $config["base_url"] = (isset($base_url)) ? base_url() . "$base_url" : base_url() . "apps/agent/index";
        $config["total_rows"] = $this->yapps_model->agent_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = (isset($base_url)) ? $uri_segment : "4";

        $this->pagination->initialize($config);

        $pagin['page'] = ($this->uri->segment($config["uri_segment"])) ? $this->uri->segment($config["uri_segment"]) : 0;
        $pagin['per_page'] = $config['per_page'];
        $pagin['links'] = $this->pagination->create_links();

        return $pagin;

    }

    

	public function same_college_check($id)
	{
		//echo 'A'.$id.'Z';
		if ($this->yapps_model->collegefees_alreadyadded_check($id, $_POST['agentid']))
		{
			$this->form_validation->set_message('same_college_check', 'This College Fees Already set.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	



			
}