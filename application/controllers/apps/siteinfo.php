<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ob_start();
class Siteinfo extends CI_Controller {

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
			redirect('apps/siteinfo/ops', 'refresh');
		}
		else
		{
			redirect('apps/siteinfo/ops', 'refresh');
			
		}

	}

	public function arduino($query = NULL){

		$this->output->unset_template('aries_layout');
		$data['title'] = "AA Planetica" ;
		$data['activepage'] = "Clients Page" ;
		$page = NULL;
		$type = 'arduino';
		
		$this->data['query'] = $query = $this->input->get('query');

		$this->yapps_model->arduino($query, $type);
		 echo '<br>' . "Thanks for the Query" . '</br>';
		 echo '<a href="http://aapf.tk/yapps/apps/siteinfo/get_arduino">View Data</a>';
	}

	public function get_arduino(){

		$this->output->unset_template('aries_layout');
		$data['title'] = "AA Planetica" ;
		$data['activepage'] = "Clients Page" ;
		$page = NULL;
		$type = 'arduino';
		

		$view = $this->yapps_model->get_arduino();
		//var_dump($view);
		foreach ($view as $key) {
			var_dump($key);
			echo '</br>';
		}
	}

	public function ops($page = 'crud_view'){

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

			$crud->set_theme('flexigrid');
			$crud->set_table('siteinfo');
			$crud->set_subject('Site Info');
			//$crud->columns('lastName','firstName','email','jobTitle');
			$crud->unset_columns('id');
			$crud->unset_fields('id','userid', 'date');
			$crud->field_type('description', 'text');
			$crud->field_type('name', 'string');
			$crud->display_as('userid', 'User ID');
			$crud->unset_delete();
			$crud->field_type('status','dropdown', array('1' => 'New', '2' => 'Current','3' => 'Done'));

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