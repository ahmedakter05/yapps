<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ob_start();
class Client extends CI_Controller {

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

		$page = 'client_view';

		$base_url = "apps/client/index";
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
			
			$this->data['clients'] = $this->yapps_model->client_view($pagin['per_page'], $pagin['page']);
			$this->data['message'] =  $this->session->flashdata('message');
			
			$this->data['links'] = $pagin['links'];
			

			//var_dump($this->data['clients']);


			$this->load->view('aries_admin/apps/'.$page, $this->data);
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

	public function add($agentid=NULL){

		$data['title'] = "AA Planetica" ;
		$data['activepage'] = "Clients Page" ;
		$page = 'client_add';

		$agentid = (!empty($_POST['agent_name']) ? $_POST['agent_name'] : $agentid);

		if ($this->yapps_model->id_check('agents', $agentid))
		{
			$agentid = $agentid;
			
		} else {
			$agentid = NULL;
		}

		//echo $_POST['collegeid'];	

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			$this->session->set_userdata('last_page', current_url()); redirect('users/admin/login', 'refresh');
		}

		//$tables = $this->config->item('tables','ion_auth');
		//echo $this->input->post('agent_name');
		// validate form input
		$this->form_validation->set_rules('agent_name', $this->lang->line('client_agentname_label'), 'required|trim|xss_clean|callback_agent_id_check');
		$this->form_validation->set_rules('collegeid', $this->lang->line('college_id_label'), 'callback_agent_college_check');
		$this->form_validation->set_rules('college_name', $this->lang->line('college_name_label'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('first_name', $this->lang->line('client_firstname_label'), 'trim|xss_clean');
		$this->form_validation->set_rules('last_name', $this->lang->line('client_lastname_label'), 'trim|xss_clean');
		$this->form_validation->set_rules('email', $this->lang->line('client_email_label'), 'valid_email|trim|xss_clean');
		$this->form_validation->set_rules('passportnoclient', $this->lang->line('client_passport_label'), 'required|trim|xss_clean|is_unique[clients.passportnoclient]');
		$this->form_validation->set_rules('filenumber', $this->lang->line('client_filenumber_label'), 'required|trim|xss_clean|is_unique[clients.filenumber]');
		$this->form_validation->set_rules('refferenceid', $this->lang->line('client_refferenceid_label'), 'trim|xss_clean');
		$this->form_validation->set_rules('status', $this->lang->line('client_status_label'), 'trim|xss_clean');
		$this->form_validation->set_rules('comments', $this->lang->line('client_comments_label'), 'trim|xss_clean');
		//$this->form_validation->set_rules('agentid', $this->lang->line('agent_id_label'), 'required|trim|xss_clean');
		//$this->form_validation->set_rules('levelid', $this->lang->line('level_id_label'), 'required|trim|xss_clean');

		if ($this->form_validation->run() == true)
		{
			$agentdata = $this->aa_lib->get_array_data($this->yapps_model->agent_data($this->input->post('agent_name')));
			
			$additional_data = array(
				'agentid'   => $agentdata['agentid'],
				'agentname'    => $agentdata['firstname'] . ' ' . $agentdata['lastname'],
				'collegeid'  =>$this->input->post('college_name'),
				'firstname' => $this->input->post('first_name'),
				'lastname'  => $this->input->post('last_name'),
				'email'      => $this->input->post('email'),
				'passportnoclient'      => $this->input->post('passportnoclient'),
				'filenumber'      => $this->input->post('filenumber'),
				'refferenceid'      => $this->input->post('refferenceid'),
				'status'      => $this->input->post('status'),
				'comments'      => $this->input->post('comments')
			);

		}

		if ($this->form_validation->run() == true && $this->ion_auth->is_admin())
		{
			if ($this->yapps_model->client_add($additional_data))
			{
				$this->sms = $this->yapps_model->get_sms();
				//var_dump($this->sms);
				$this->session->set_flashdata('message', $this->yapps_model->errors());
			}
			

			redirect("apps/client/index", 'refresh');
		}
		else
		{
			
			$agents = $this->aa_lib->get_array_data($this->yapps_model->agent_nameid());
			$collegeid = $this->aa_lib->get_array_data($this->yapps_model->fees_data_agent($agentid));
			$collegedata = $this->aa_lib->get_array_data($this->yapps_model->get_college_name($collegeid));
			//var_dump($agents);
			//var_dump($collegeid);
			//var_dump($collegedata);

			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->yapps_model->errors() ? $this->yapps_model->errors() : $this->session->flashdata('message')));

			
			/*$this->data['agent_name'] = array(
				'name'  => 'agent_name',
				'id'    => 'agent_name',
				'type'  => 'text',
				'value' => $agentdata['firstname'] .' '. $agentdata['lastname'],
				'disabled'=> 'disabled',
			);*/
			$this->data['agent_name'] = array(
				'name'  => 'agent_name',
				'options'    => $agents,
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('agent_name') ? $this->form_validation->set_value('agent_name') : $agentid),
			);
			$this->data['college_name'] = array(
				'name'  => 'college_name',
				'options'    => $collegedata,
				'type'  => 'text',
				'value' => $this->form_validation->set_value('college_name'),
			);
			$this->data['first_name'] = array(
				'name'  => 'first_name',
				'id'    => 'first_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('first_name'),
			);
			$this->data['last_name'] = array(
				'name'  => 'last_name',
				'id'    => 'last_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('last_name'),
			);
			$this->data['email'] = array(
				'name'  => 'email',
				'id'    => 'email',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('email'),
			);
			$this->data['passportnoclient'] = array(
				'name'  => 'passportnoclient',
				'id'    => 'passportnoclient',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('passportnoclient'),
			);
			$this->data['filenumber'] = array(
				'name'  => 'filenumber',
				'id'    => 'filenumber',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('filenumber') ? $this->form_validation->set_value('filenumber') : 'F' .'#' . rand(10, 9999) .'-' . date("d").date("m")),
			);
			$this->data['refferenceid'] = array(
				'name'  => 'refferenceid',
				'id'    => 'refferenceid',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('refferenceid'),
			);
			$this->data['status'] = array(
				'name'  => 'status',
				'id'    => 'status',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('status'),
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
			$this->data['id'] = array(
              //'agentid'  => ($this->form_validation->set_value('agentid') ? $this->form_validation->set_value('agentid') : $agentdata['agentid'] ),
              //'levelid' => ($this->form_validation->set_value('levelid') ? $this->form_validation->set_value('levelid') : $agentdata['levelid'] ),
              'collegeid' => (!empty($collegeid['0']->collegeid) ? $collegeid['0']->collegeid : NULL),
            );


			$this->load->view('aries_admin/apps/client_add', $this->data);
		}

	}

	public function view($clientid = NULL)
	{

		//$data['title'] = "AA Planetica" ;
		//$data['activepage'] = "Client View Page" ;
		$page = 'View Client';

		//echo $clientid;        

        

         
		
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			$this->session->set_userdata('last_page', current_url()); redirect('users/admin/login', 'refresh');
			echo "Redirect to Login";
		}
		elseif ($this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			
			if($this->yapps_model->id_check('clients', $clientid))
			{
				$this->data['client'] = $this->aa_lib->get_array_data($this->yapps_model->client_data($clientid));
				$this->data['payments'] = $this->yapps_model->payment_view_client($clientid);
				$this->data['message'] = ($this->yapps_model->errors() ? $this->yapps_model->errors() : $this->session->flashdata('message'));
				$this->data['fees'] = $this->aa_lib->get_array_data($this->yapps_model->fees_data_payment($this->data['client']['collegeid'], $this->data['client']['agentid']));
				//var_dump($this->data['client']);
				//var_dump($this->data['payments']);
				//var_dump($this->data['fees']);
				foreach ($this->data['payments'] as $payment) {
					$this->data['payment_summary']['totalpaid'] = (!empty($this->data['payment_summary']['totalpaid']) ? $this->data['payment_summary']['totalpaid'] : '0') + $payment->payamount;
					$this->data['payment_summary']['feesname'] = (!empty($this->data['payment_summary']['feesname']) ? $this->data['payment_summary']['feesname'] : '') . $payment->feesname . ',';
				}

				$this->data['payment_summary']['allfees'] = array('fees1', 'fees2', 'fees3', 'fees4', 'fees5');
				$this->data['payment_summary']['totalpaid'] = (!empty($this->data['payment_summary']['totalpaid']) ? $this->data['payment_summary']['totalpaid'] : '0');
				$this->data['payment_summary']['feesname']  = (!empty($this->data['payment_summary']['feesname']) ? array_filter(explode(',', $this->data['payment_summary']['feesname']), 'strlen') : array());
				//var_dump($this->data['payment_summary']['feesname']);
				$this->data['payment_summary']['paymenttotal'] = $this->data['fees']['totalfees'];
				$this->data['payment_summary']['payremaining'] = $this->data['fees']['totalfees'] - $this->data['payment_summary']['totalpaid'];
				
				$remfeesname = array_diff($this->data['payment_summary']['allfees'], $this->data['payment_summary']['feesname']);
				$this->data['payment_summary']['remfeesname'] = (!empty($remfeesname) ? $remfeesname : array());
				//var_dump($this->data['payment_summary']);
				
				
			} else {

				//$this->session->set_flashdata('message', '<div color="red">ID not Matched to any Clients</div>');
				redirect('apps/client/index', 'refresh');
			}

			$this->load->view('aries_admin/apps/client_view_single', $this->data);
			//return show_error('You must be an administrator to view this page.');
		}
		else
		{
			
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			echo "Rest of the work as an Admin";
		}

	}

	public function edit($clientid=NULL){

		$data['title'] = "AA Planetica" ;
		$data['activepage'] = "Clients Page" ;
		$page = 'index';
		

		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			$this->session->set_userdata('last_page', current_url()); redirect('users/admin/login', 'refresh');
			echo "Redirect to Login";
		}
		elseif ($this->ion_auth->is_admin() && $this->yapps_model->id_check('clients', $clientid)) // remove this elseif if you want to enable this for non-admins
		{
			//echo 'Form Submitted';
			$this->form_validation->set_rules('agentname', $this->lang->line('payment_client_name_label'), 'xss_clean');
			$this->form_validation->set_rules('college_name', $this->lang->line('college_name_label'), 'required|trim|xss_clean');
			$this->form_validation->set_rules('firstname', $this->lang->line('payment_client_name_label'), 'xss_clean');
			$this->form_validation->set_rules('lastname', $this->lang->line('payment_client_name_label'), 'xss_clean');
			$this->form_validation->set_rules('email', $this->lang->line('payment_client_name_label'), 'xss_clean|valid_email');
			$this->form_validation->set_rules('passportnoclient', $this->lang->line('payment_client_name_label'), 'xss_clean|required');
			$this->form_validation->set_rules('filenumber', $this->lang->line('payment_client_name_label'), 'xss_clean|required');
			$this->form_validation->set_rules('status', $this->lang->line('payment_client_name_label'), 'xss_clean');
			$this->form_validation->set_rules('comments', $this->lang->line('payment_client_name_label'), 'xss_clean');

			if($this->form_validation->run() == true)
			{
				$additional_data = array(
				//'agentname' => $this->input->post('agentname'),
				'collegeid'  =>$this->input->post('college_name'),
				'firstname'  => $this->input->post('firstname'),
				'lastname'    => $this->input->post('lastname'),
				'email'      => $this->input->post('email'),
				'passportnoclient'      => $this->input->post('passportnoclient'),
				'filenumber'      => $this->input->post('filenumber'),
				'status'      => $this->input->post('status'),
				'comments'      => $this->input->post('comments')
				);

				$this->yapps_model->client_edit($clientid, $additional_data) ? $this->session->set_flashdata('message','Client Updated') : $this->session->set_flashdata('message','Client not Updated');
				redirect('apps/client/view/'.$clientid, 'refresh');

			} else
			{
				$client_data =  $this->yapps_model->client_data($clientid);
				//var_dump($client_data);
				$collegeid = $this->aa_lib->get_array_data($this->yapps_model->fees_data_agent($client_data->agentid));
				$collegedata = $this->aa_lib->get_array_data($this->yapps_model->get_college_name($collegeid));

				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$this->data['agentname'] = array(
				'name'  => 'agentname',
				'id'    => 'agentname',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('agentname') ? $this->form_validation->set_value('agentname') : $client_data->Agentsfirstname .' '. $client_data->Agentslastname),
				'disabled' => 'disabled',
				);
				$this->data['college_name'] = array(
				'name'  => 'college_name',
				'options'    => $collegedata,
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('college_name') ? $this->form_validation->set_value('college_name') : $client_data->collegeid),
				);
				$this->data['firstname'] = array(
				'name'  => 'firstname',
				'id'    => 'firstname',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('firstname') ? $this->form_validation->set_value('firstname') : $client_data->Clientsfirstname),
				);
				$this->data['lastname'] = array(
				'name'  => 'lastname',
				'id'    => 'lastname',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('lastname') ? $this->form_validation->set_value('lastname') : $client_data->Clientslastname),
				);
				$this->data['email'] = array(
				'name'  => 'email',
				'id'    => 'email',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('email') ? $this->form_validation->set_value('email') : $client_data->Clientsemail),
				);
				$this->data['passportnoclient'] = array(
				'name'  => 'passportnoclient',
				'id'    => 'passportnoclient',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('passportnoclient') ? $this->form_validation->set_value('passportnoclient') : $client_data->passportnoclient),
				);
				$this->data['filenumber'] = array(
				'name'  => 'filenumber',
				'id'    => 'filenumber',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('filenumber') ? $this->form_validation->set_value('filenumber') : $client_data->filenumber),
				);
				$this->data['status'] = array(
				'name'  => 'status',
				'id'    => 'status',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('status') ? $this->form_validation->set_value('status') : $client_data->Clientstatus),
				);
				$this->data['comments'] = array(
				'name'  => 'comments',
				'id'    => 'comments',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('comments') ? $this->form_validation->set_value('comments') : $client_data->Clientscomments),
				);
				$this->data['id'] = array(
	          	'agentid'  => $client_data->agentid,
	          	'clientid' => $client_data->clientid,
	        	);

	        	$this->load->view('aries_admin/apps/client_edit', $this->data);
	        }
		}
		else
		{
			
			//$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			//echo "Not Admin or Client Not Found in the Database";
			$this->session->set_flashdata('message', 'Not Admin or Client Not Found in the Database');
			redirect('apps/client/index', 'refresh');
		}


	}

	public function delete($page = 'index'){

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
        $config["base_url"] = (isset($base_url)) ? base_url() . "$base_url" : base_url() . "apps/client/index";
        $config["total_rows"] = $this->yapps_model->client_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = (isset($base_url)) ? $uri_segment : "4";

        $this->pagination->initialize($config);

        $pagin['page'] = ($this->uri->segment($config["uri_segment"])) ? $this->uri->segment($config["uri_segment"]) : 0;
        $pagin['per_page'] = $config['per_page'];
        $pagin['links'] = $this->pagination->create_links();

        return $pagin;

    }

    

	public function agent_id_check($id)
	{
		//echo 'A'.$id.'Z';
		if (!$this->yapps_model->id_check('agents', $id))
		{
			$this->form_validation->set_message('agent_id_check', 'The Agent not found in the Databse.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	
	public function agent_college_check($id)
	{
		//echo 'A'.$id.'Z';
		if ($id == NULL)
		{
			var_dump($id);
			$this->form_validation->set_message('agent_college_check', 'No College Added to this Agent');

			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	



			
}