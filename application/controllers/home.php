<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation','session','aa_lib'));
		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
		
		$this->_init();
		
		//$this->load->model('news_model');
		
	} 
	
	private function _init()
	{
		$this->output->set_template('aries_layout');
		
		//$this->load->css('assets/aries/css/stylesheets.css');
		//$this->load->css('assets/aries/css/stylesheets.css');
		
		//$this->load->js('assets/themes/default/js/jquery-1.9.1.min.js');
		//$this->load->js('assets/themes/default/hero_files/bootstrap-transition.js');
		//$this->load->js('assets/themes/default/hero_files/bootstrap-collapse.js');
		
	}



	public function Index($page = 'home'){
		if (!file_exists('application/views/aries_admin/home/'.$page.'.php'))
		{
		show_404();
		}
		
		$data['title'] = "AA Planetica" ;
		$data['activepage'] = "Home" ;
		
		//$this->output->set_template('aries_layout');
		$this->load->view('aries_admin/home/'.$page, $data);
	
	}
	
	

	/* public function about($page = 'about-me'){
		if (!file_exists('application/views/admin_aries/pages/'.$page.'.php'))
		{
		//Sorry
		show_404();
		}
		
		$data['title'] = "AA Planetica" ;
		$data['activepage'] = "About" ;
		
		$this->load->view('admin_aries/theme/autoload', $data);
		$this->load->view('admin_aries/theme/header', $data);
		$this->load->view('admin_aries/theme/topnav', $data);
		$this->load->view('admin_aries/pages/'.$page, $data);
		$this->load->view('admin_aries/theme/footer', $data);
	
	} */
}