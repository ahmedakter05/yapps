<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ob_start();
class Page extends CI_Controller {

	

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
			$this->session->set_userdata('last_page', current_url()); redirect('home', 'refresh');
		}
		elseif (FALSE)
		{
			
			$this->session->set_userdata('last_page', current_url()); redirect('home', 'refresh');
		}

	}

	public function college_view()
	{

		$data['title'] = "AA Planetica" ;
		$data['activepage'] = "Clients Page" ;

		$page = 'client_view';

		$base_url = "apps/page/college_view";
		$uri_segment = '4';

		//$pagin = $this->yapps_pagination($uri_segment, $base_url);
		
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			$this->session->set_userdata('last_page', current_url()); redirect('users/admin/login', 'refresh');
			//echo "Redirect to Login";
		}
		elseif ($this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			
			$this->data['colleges'] = $this->yapps_model->get_college_name();
			$this->data['message'] =  $this->session->flashdata('message');
			
			//$this->data['links'] = $pagin['links'];
			

			//var_dump($this->data['colleges']);


			
		}
		

		$this->load->view('aries_admin/apps/college_view', $this->data);

	}
	
	public function college_add(){

		$data['title'] = "AA Planetica" ;
		$data['activepage'] = "Clients Page" ;
		$page = 'index';

		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			//$this->session->set_userdata('last_page', current_url()); redirect('users/admin/login', 'refresh');
			echo "Redirect to Login";
		}
		elseif ($this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			
			$this->form_validation->set_rules('collegename', $this->lang->line('college_name_label'), 'required|trim|xss_clean|is_unique[colleges.collegename]');
			$this->form_validation->set_rules('comments', $this->lang->line('comments'), 'trim|xss_clean');
		
			if($this->form_validation->run()==true)
			{
				$data = array(
					'collegename'  => $this->input->post('collegename'),
					'collegecomments'     => $this->input->post('comments'),
				);

				($this->yapps_model->college_add($data) ? $this->session->set_flashdata('message', 'College Name Added Successfully') : $this->session->set_flashdata('message', 'College Name Adding UnSuccessfull'));

				redirect("apps/page/college_view", 'refresh');

			} 
			else 
			{
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
				//var_dump($this->yapps_model->page_counter());

				$this->data['collegename'] = array(
					'name'	=> 'collegename',
					'id'	=> 'collegename',
					'type'	=> 'text',
					'value'	=> $this->form_validation->set_value('collegename'),
				);
				$this->data['comments'] = array(
					'name'	=> 'comments',
					'id'	=> 'comments',
					'type'	=> 'text',
					'value'	=> $this->form_validation->set_value('comments'),
				);

				$this->load->view('aries_admin/apps/college_add', $this->data);
			}

		}
		else
		{
			
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			echo "Rest of the work as an Admin";
		}

	}

	public function college_delete($collegeid=NULL)
	{
		$data['title'] = "AA Planetica" ;
		$data['activepage'] = "Clients Page" ;
		$page = 'index';


		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			$this->session->set_userdata('last_page', current_url()); redirect('users/admin/login', 'refresh');
			echo "Redirect to Login";
		}
		elseif ( $this->yapps_model->id_check('colleges', $collegeid) && $this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			
			($this->yapps_model->college_delete($collegeid) ? $this->session->set_flashdata('message', 'College Name Delete Successfully') : $this->session->set_flashdata('message', 'College Name Delete UnSuccessfull'));

				redirect("apps/page/college_view", 'refresh');
		}
	}
	public function edit($page = 'index'){

		$data['title'] = "AA Planetica" ;
		$data['activepage'] = "Clients Page" ;
		
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			//$this->session->set_userdata('last_page', current_url()); redirect('users/admin/login', 'refresh');
			echo "Redirect to Login";
		}
		elseif ($this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			
			echo "No Admin, only can can add clients";
			return show_error('You must be an administrator to view this page.');
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