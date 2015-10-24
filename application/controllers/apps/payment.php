<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ob_start();
class Payment extends CI_Controller {

	protected $sms = array();

	public function __construct(){

		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation','session','grocery_CRUD','pagination','aa_lib'));
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

		
        $base_url = "apps/payment/index";
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
			//$clientid=NULL;
			$this->data['all_payment'] = $this->yapps_model->payment_view_all($pagin['per_page'], $pagin['page']);
			$this->data['message'] = ($this->yapps_model->errors() ? $this->yapps_model->errors() : $this->session->flashdata('message'));
			//var_dump($this->data['all_payment']);
			$this->data['links'] = $pagin['links'];
			$this->load->view('aries_admin/apps/payment_view', $this->data);
		}
		else
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



	public function add($clientid = NULL, $select=NULL){

		$data['title'] = "AA Planetica" ;
		$data['activepage'] = "Clients Page" ;

		$page = 'client_add';

		//echo $this->input->post('feesname');

		$select = (!empty($_POST['select']) ? $_POST['select'] : $select);

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			$this->session->set_userdata('last_page', current_url()); redirect('users/admin/login', 'refresh');
		}

		//$tables = $this->config->item('tables','ion_auth');

		// validate form input
		$this->form_validation->set_rules('agent_name', $this->lang->line('payment_agentname_label'), 'trim|xss_clean');
		$this->form_validation->set_rules('client_name', $this->lang->line('payment_clientname_label'), 'trim|xss_clean');
		$this->form_validation->set_rules('collegeid', $this->lang->line('college_name_label'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('passportnoclient', $this->lang->line('payment_client_passportno_label'), 'xss_clean|callback_passport_check_client_check');
		$this->form_validation->set_rules('feesname', 'Fees Name', 'required');
		$this->form_validation->set_rules('pay_amount', $this->lang->line('payment_pay_amount_label'), 'trim|xss_clean');
		$this->form_validation->set_rules('pay_type', $this->lang->line('payment_pay_type_label'), 'trim|xss_clean');
		$this->form_validation->set_rules('pay_date', $this->lang->line('payment_pay_date_label'), 'xss_clean');
		$this->form_validation->set_rules('pay_to', $this->lang->line('payment_pay_to_label'), 'trim|xss_clean');
		$this->form_validation->set_rules('comments', $this->lang->line('payment_comments_label'), 'trim|xss_clean');
		$this->form_validation->set_rules('agentid', $this->lang->line('payment_comments_label'), 'trim|xss_clean');
		$this->form_validation->set_rules('clientid', $this->lang->line('payment_comments_label'), 'trim|xss_clean');

		if ($this->form_validation->run() == true)
		{
			/*if ($this->input->post('fees_one') == 'accept'){ $fees_name = 'Fees 1';	}
			elseif ($this->input->post('fees_two') == 'accept'){ $fees_name = 'Fees 2';	}
			elseif ($this->input->post('fees_three') == 'accept'){ $fees_name = 'Fees 3';	}
			elseif ($this->input->post('fees_four') == 'accept'){ $fees_name = 'Fees 4';	}
			elseif ($this->input->post('fees_five') == 'accept'){ $fees_name = 'Fees 5';	}
			else {redirect("apps/payment/add", 'refresh');} 

			//if ($this->input->post('feesname') == fees_)
			if ($this->input->post('feesname') == 'fees_one'){ $fees_name = 'fees1';	}
			elseif ($this->input->post('feesname') == 'fees_two'){ $fees_name = 'fees2';	}
			elseif ($this->input->post('feesname') == 'fees_three'){ $fees_name = 'fees3';	}
			elseif ($this->input->post('feesname') == 'fees_four'){ $fees_name = 'fees4';	}
			elseif ($this->input->post('feesname') == 'fees_five'){ $fees_name = 'fees4';	}
				*/
			$fees = explode(' ', $this->input->post('feesname'));
			$feesname = $fees['0'];
			$feesamount = (!empty($_POST['pay_amount']) ? $_POST['pay_amount'] : $fees['1']);

			$additional_data = array(
				'clientid' => $this->input->post('clientid'),
				'agentid' => $this->input->post('agentid'),
				//'agentname' => $this->input->post('agent_name'),
				//'clientname'  => $this->input->post('client_name'),
				'collegeid'  => $this->input->post('collegeid'),
				'passportnoclient' => $this->input->post('passportnoclient'),
				'feesname'    => $feesname,
				/*'fees_two'    => $this->input->post('fees_two'),
				'fees_three'    => $this->input->post('fees_three'),
				'fees_four'    => $this->input->post('fees_four'),
				'fees_five'    => $this->input->post('fees_five'),*/
				'payamount'      => $feesamount,
				'paytype'      => $this->input->post('pay_type'),
				'payto'      => $this->input->post('pay_to'),
				'comments'      => $this->input->post('comments'),
			);

			
		}

		if ($this->form_validation->run() == true && $this->ion_auth->is_admin())
		{	
			if($this->yapps_model->payment_add($additional_data))
			{
				$this->session->set_flashdata('message', $this->yapps_model->errors());
				$payid = $this->yapps_model->last_payid();
				$pay_id = $this->aa_lib->get_array_data($payid);
				//var_dump($pay_id);
				redirect("apps/payment/view/payid/$pay_id[paymentid]", 'refresh');
			}

			

			


			//$this->session->set_flashdata('message', $this->yapps_model->errors());

			//redirect("apps/payment/view/", 'refresh');
		}
		else
		{
			// display the create user form
			// set the flash data error message if there is one
			//$this->data['message'] = $this->session->flashdata('message');//$this->client_model->errors();
			if ( !$this->yapps_model->id_check('clients', $clientid) && empty($_POST['submit']))
				{
					$this->session->set_flashdata('message', '<p> No Client Selected or Client doesnt match to our Database </p>');
					redirect("errors", 'refresh');
					//echo "Redirect to Login";
				} 


			$clientid = (!empty($_POST['clientid']) ? $_POST['clientid'] : $clientid);
			$clientdata = $this->aa_lib->get_array_data($this->yapps_model->client_data($clientid));
			//$leveldata = $this->aa_lib->get_array_data($this->yapps_model->level_data($clientdata['levelid']));
			$payments = $this->yapps_model->payment_view_client($clientid);
			$fees = $this->yapps_model->fees_data_payment($clientdata['collegeid'], $clientdata['agentid']);
			//var_dump($payments);
			

			foreach ($payments as $payment) 
			{
				$paidfees = (!empty($paidfees) ? $paidfees : '') . $payment->feesname . ',';
			}
			$paidfees = array_filter(explode(',', (!empty($paidfees)) ? $paidfees : ''), 'strlen');
			//var_dump($paidfees);

			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->yapps_model->errors() ? $this->yapps_model->errors() : $this->session->flashdata('message')));

			
			$this->data['agent_name'] = array(
				'name'  => 'agent_name',
				'id'    => 'agent_name',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('agent_name') ? $this->form_validation->set_value('agent_name') : (isset($clientdata) ? $clientdata['Agentsfirstname'] .' '. $clientdata['Agentslastname'] : NULL)),
				'disabled' => 'disabled',
			);
			$this->data['client_name'] = array(
				'name'  => 'client_name',
				'id'    => 'client_name',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('client_name') ? $this->form_validation->set_value('client_name') : (isset($clientdata) ? $clientdata['Clientsfirstname'] . ' ' . $clientdata['Clientslastname'] : NULL)),				
				'disabled' => 'disabled',
			);
			$this->data['college_name'] = array(
				'name'  => 'college_name',
				'id'    => 'college_name',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('college_name') ? $this->form_validation->set_value('college_name') : (isset($clientdata) ? $clientdata['collegename'] : NULL)),
				'disabled' => 'disabled',
			);
			$this->data['passportnoclient'] = array(
				'name'  => 'passportnoclient',
				'id'    => 'passportnoclient',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('passportnoclient') ? $this->form_validation->set_value('passportnoclient') : (isset($clientdata) ? $clientdata['passportnoclient'] : NULL)),
				//(!empty($clientid) ? 'disabled' : '' ) => '',
			);
			$this->data['feesname'] = array(
				'fees1 '.$fees->fees1  => $this->lang->line('payment_fees_one_label'). '     =>     ' . (!in_array('fees1', $paidfees) ? $fees->fees1 : 'Paid') ,
				'fees2 '.$fees->fees2    => $this->lang->line('payment_fees_two_label'). '     =>     ' . (!in_array('fees2', $paidfees) ? $fees->fees2 : 'Paid') ,
				'fees3 '.$fees->fees3  => $this->lang->line('payment_fees_three_label'). '     =>     ' . (!in_array('fees3', $paidfees) ? $fees->fees3 : 'Paid') ,
				'fees4 '.$fees->fees4 => $this->lang->line('payment_fees_four_label'). '     =>     ' . (!in_array('fees4', $paidfees) ? $fees->fees4 : 'Paid') ,
				'fees5 '.$fees->fees5 => $this->lang->line('payment_fees_five_label'). '     =>     ' . (!in_array('fees5', $paidfees) ? $fees->fees5 : 'Paid') ,
			);
			$this->data['fees'] = array(
				'name'  => 'feesname',
				'selection'    => (empty($select) ? 'fees1' : $select . ' ' . (!in_array($select, $paidfees) ? $fees->$select : '')),
			);
			$this->data['pay_amount'] = array(
				'name'  => 'pay_amount',
				'id'    => 'pay_amount',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('pay_amount'),
				'disabled' => 'disabled',
			);
			$this->data['pay_type'] = array(
				'name'  => 'pay_type',
				'id'    => 'pay_type',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('pay_type'),
			);
			$this->data['pay_to'] = array(
				'name'  => 'pay_to',
				'id'    => 'pay_to',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('pay_to'),
			);
			$this->data['comments'] = array(
				'name'  => 'comments',
				'id'    => 'comments',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('comments'),
			);
			$this->data['id'] = array(
              'agentid'  => ($this->form_validation->set_value('agentid') ? $this->form_validation->set_value('agentid') : (isset($clientdata) ? $clientdata['agentid'] : NULL)),
              'clientid' => ($this->form_validation->set_value('clientid') ? $this->form_validation->set_value('clientid') : (isset($clientdata) ? $clientdata['clientid'] : NULL)),
              'collegeid' => ($this->form_validation->set_value('collegeid') ? $this->form_validation->set_value('collegeid') : (isset($clientdata) ? $clientdata['collegeid'] : NULL)),
              'select' => $select,
            );


			$this->load->view('aries_admin/apps/payment_add', $this->data);
		}

	}

	public function view(){

		$data['title'] = "AA Planetica" ;
		$data['activepage'] = "Payments Page" ;
		$page = 'Payment View';
		
		$viewtag =  $this->uri->segment(4);
        $tagid =  $this->uri->segment(5);
        



        if (!($viewtag == 'clientid' || $viewtag == 'payid' || $viewtag == NULL)){
        	$this->session->set_flashdata('message', 'No Parameter Founded to be checked');
        	redirect('errors', 'refresh');
        }

         if (!empty($viewtag)) {

         	if (!ctype_digit($tagid) || !isset($tagid)){
        	$this->session->set_flashdata('message', 'Parameter should be Numeric');
        	redirect('errors', 'refresh');
        	}
        }
        
        

		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('apps/payment/login', 'refresh');
			echo "Redirect to Login";
		}
		elseif ($this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			//echo "No Admin, only can can add clients";
			//return show_error('You must be an administrator to view this page.');
		

			if ($viewtag == 'clientid'){

				$this->data['client_payment'] = $this->yapps_model->payment_view_client($tagid);
				$this->data['message'] = ($this->yapps_model->errors() ? $this->yapps_model->errors() : $this->session->flashdata('message'));
				//var_dump($this->data['client_payment']);

			} 
			elseif ($viewtag == 'payid') {
				
				$this->data['payment'] = $this->yapps_model->payment_view_payid($tagid);
				//var_dump($this->data['payment']);
				$client = $this->aa_lib->get_array_data($this->data['payment']);
				$this->data['client'] = $this->aa_lib->get_array_data($this->yapps_model->client_data($client['clientid']));
				$this->data['message'] = ($this->yapps_model->errors() ? $this->yapps_model->errors() : $this->session->flashdata('message'));
				//var_dump($this->data['client']);
				$this->load->view('aries_admin/apps/payment_view_single', $this->data);
				
			} else {
				$this->data['all_payment'] = $this->yapps_model->payment_view_client($clientid=NULL);
				$this->data['message'] = ($this->yapps_model->errors() ? $this->yapps_model->errors() : $this->session->flashdata('message'));
				//var_dump($this->data['all_payment']);
				
				$this->load->view('aries_admin/apps/payment_view', $this->data);

			}
			
			//$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			//echo "Rest of the work as an Admin";

			//redirect('apps/payment/view'); 

		}

	}

	public function update($payid=NULL){

		$data['title'] = "AA Planetica" ;
		$data['activepage'] = "Clients Page" ;
		$page = 'index';
		

		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			//$this->session->set_userdata('last_page', current_url()); redirect('users/admin/login', 'refresh');
			echo "Redirect to Login";
		}
		elseif ($this->ion_auth->is_admin() && $this->yapps_model->id_check('payments', $payid)) // remove this elseif if you want to enable this for non-admins
		{
			if(!empty($_POST['submit']))
			{
				echo 'Form Submitted';
				
				$this->form_validation->set_rules('passportnoclient', $this->lang->line('payment_client_name_label'), 'xss_clean|callback_passport_check_client_check');

			} 
			else 
			{
				echo 'Show Form';
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$this->data['agent_name'] = array(
				'name'  => 'agent_name',
				'id'    => 'agent_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('agent_name'),
				);
				$this->data['agent_name'] = array(
				'name'  => 'agent_name',
				'id'    => 'agent_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('agent_name'),
				);
				$this->data['agent_name'] = array(
				'name'  => 'agent_name',
				'id'    => 'agent_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('agent_name'),
				);
				$this->data['agent_name'] = array(
				'name'  => 'agent_name',
				'id'    => 'agent_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('agent_name'),
				);
				$this->data['agent_name'] = array(
				'name'  => 'agent_name',
				'id'    => 'agent_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('agent_name'),
				);
			}

			echo "No Admin, only I can add clients";
			return show_error('You must be an administrator to view this page.');
		}
		else
		{
			
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			echo "Rest of the work as an Admin";
			die;
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
        $config["base_url"] = (isset($base_url)) ? base_url() . "$base_url" : base_url() . "apps/payment/index";
        $config["total_rows"] = $this->yapps_model->payment_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = (isset($base_url)) ? $uri_segment : "4";

        $this->pagination->initialize($config);

        $pagin['page'] = ($this->uri->segment($config["uri_segment"])) ? $this->uri->segment($config["uri_segment"]) : 0;
        $pagin['per_page'] = $config['per_page'];
        $pagin['links'] = $this->pagination->create_links();

        return $pagin;

    }

    public function passport_check_client_check($passportno)
	{


			//echo "Rest of the work as an Admin";
			$data = $this->yapps_model->client_passport_check($passportno);
			//var_dump($data);
			if ($data == 'false')
			{
								
				return TRUE;

			} else 
			{
				$this->form_validation->set_message('passport_check_client_check', 'The Passport No entered in the "%s" doesnt match to any Clients');

				return FALSE;
			}
	}

	
	public function fees_selection_verify($fees_selection){

		if( $this->input->post('fees_one') == 'accept') {return TRUE;}
		else if( $this->input->post('fees_two') == 'accept') {return TRUE;}
		else if( $this->input->post('fees_three') == 'accept') {return TRUE;}
		else if( $this->input->post('fees_four') == 'accept') {return TRUE;}
		else if( $this->input->post('fees_five') == 'accept') {return TRUE;}
		else {$this->form_validation->set_message('fees_selection_verify', ' "%s" Not Selected, select one of the following fees to add a Payment'); return FALSE;}

	}

	public function fees_paid_check($feesname, $clid){
		var_dump($feesname);
		var_dump($clid);
		
	}




	public function crud_test($page = 'crud_view'){

		$data['title'] = "AA Planetica" ;
		$data['activepage'] = "Clients Page" ;
		
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			$this->session->set_userdata('last_page', current_url()); redirect('users/admin/login', 'refresh');
			//echo "Redirect to Login";
		}
		elseif ($this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$crud = new grocery_CRUD();

			$crud->set_table('payments');
			$crud->set_subject('Payment');
			$crud->unset_columns('payname');
			//$crud->callback_column('buyPrice',array($this,'valueToEuro'));

			$this->data['output'] = $crud->render();
			

			$this->load->view('aries_admin/apps/crud_view', $this->data);

			

			//var_dump($this->data['test']);


			//$this->load->view('aries_admin/apps/'.$page, $this->data);
		}
		else
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
}