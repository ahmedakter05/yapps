<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ob_start();
class Level extends CI_Controller {

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

		$page = 'level_view';

		
		
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			$this->session->set_userdata('last_page', current_url()); redirect('users/admin/login', 'refresh');
			//echo "Redirect to Login";
		}
		elseif ($this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['levels'] = $this->yapps_model->level_view();

			//var_dump($this->data['levels']);

			
			

			


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

	

	public function edit($levelid=NULL)
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

		$levelid = (!empty($_POST['levelid']) ? $_POST['levelid'] : (isset($levelid) ? $levelid : '0'));

		if (!$this->yapps_model->id_check('levels', $levelid))
		{
			$this->session->set_flashdata('message', '<p> No Level ID Selected or doesnt match to our Database </p>');
			redirect("errors", 'refresh');
			//echo "Redirect to Login";
		} 


		elseif ($this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{

			$this->form_validation->set_rules('levelid', $this->lang->line('level_id_label'), 'xss_clean|required');
			$this->form_validation->set_rules('levelname', $this->lang->line('level_levelname_label'), 'xss_clean|required');
			$this->form_validation->set_rules('fees1', $this->lang->line('Fees 1'), 'xss_clean|required');
			$this->form_validation->set_rules('fees2', $this->lang->line('Fees 2'), 'xss_clean|required');
			$this->form_validation->set_rules('fees3', $this->lang->line('Fees 3'), 'xss_clean|required');
			$this->form_validation->set_rules('fees4', $this->lang->line('Fees 4'), 'xss_clean|required');
			$this->form_validation->set_rules('fees5', $this->lang->line('Fees 5'), 'xss_clean|required');
			$this->form_validation->set_rules('discounts', $this->lang->line('discounts'), 'xss_clean|required');
			$this->form_validation->set_rules('clientsrequired', $this->lang->line('level_clientsrequired_label'), 'xss_clean|required');
			$this->form_validation->set_rules('comments', $this->lang->line('level_comments_label'), 'xss_clean');

			if($this->form_validation->run() == true)
			{
				$additional_data = array(
				'levelid' => $this->input->post('levelid'),
				'levelname'  => $this->input->post('levelname'),
				'fees1'    => $this->input->post('fees1'),
				'fees2'    => $this->input->post('fees2'),
				'fees3'    => $this->input->post('fees3'),
				'fees4'    => $this->input->post('fees4'),
				'fees5'    => $this->input->post('fees5'),
				'discounts'      => $this->input->post('discounts'),
				'clientsrequired'      => $this->input->post('clientsrequired'),
				'comments'      => $this->input->post('comments')
				);

				$this->yapps_model->level_edit($levelid, $additional_data) ? $this->session->set_flashdata('message','Client Updated') : $this->session->set_flashdata('message','Client not Updated');
				redirect('apps/level/index', 'refresh');

			} else
			{
				
				$level = $this->yapps_model->level_data($levelid);

				//var_dump($level);
				

				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$this->data['levelname'] = array(
				'name'  => 'levelname',
				'id'    => 'levelname',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('levelname') ? $this->form_validation->set_value('levelname') : $level->levelname),
				);
				$this->data['fees1'] = array(
				'name'  => 'fees1',
				'id'    => 'fees1',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('fees1') ? $this->form_validation->set_value('fees1') : $level->fees1),
				);
				$this->data['fees2'] = array(
				'name'  => 'fees2',
				'id'    => 'fees2',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('fees2') ? $this->form_validation->set_value('fees2') : $level->fees2),
				);
				$this->data['fees3'] = array(
				'name'  => 'fees3',
				'id'    => 'fees3',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('fees3') ? $this->form_validation->set_value('fees3') : $level->fees3),
				);
				$this->data['fees4'] = array(
				'name'  => 'fees4',
				'id'    => 'fees4',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('fees4') ? $this->form_validation->set_value('fees4') : $level->fees4),
				);
				$this->data['fees5'] = array(
				'name'  => 'fees5',
				'id'    => 'fees5',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('fees5') ? $this->form_validation->set_value('fees5') : $level->fees5),
				);
				$this->data['discounts'] = array(
				'name'  => 'discounts',
				'id'    => 'discounts',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('discounts') ? $this->form_validation->set_value('discounts') : $level->discounts),
				);
				$this->data['clientsrequired'] = array(
				'name'  => 'clientsrequired',
				'id'    => 'clientsrequired',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('clientsrequired') ? $this->form_validation->set_value('clientsrequired') : $level->clientsrequired),
				);
				$this->data['comments'] = array(
				'name'  => 'comments',
				'id'    => 'comments',
				'type'  => 'text',
				'value' => ($this->form_validation->set_value('comments') ? $this->form_validation->set_value('comments') : $level->comments),
				);
				
				$this->data['id'] = array(
	          	'levelid'  => $level->levelid,
	        	);

	        	$this->load->view('aries_admin/apps/level_edit', $this->data);
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
        $config["per_page"] = 3;
        $config["uri_segment"] = (isset($base_url)) ? $uri_segment : "4";

        $this->pagination->initialize($config);

        $pagin['page'] = ($this->uri->segment($config["uri_segment"])) ? $this->uri->segment($config["uri_segment"]) : 0;
        $pagin['per_page'] = $config['per_page'];
        $pagin['links'] = $this->pagination->create_links();

        return $pagin;

    }

    
			
}