<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
		
		$this->_init();
		
	} 
	
	private function _init()
	{
		$this->output->set_template('aries_layout');		
	}


	public function Index($page = 'test'){
		if (!file_exists('application/views/aries_admin/'.$page.'.php'))
		{
		//Sorry
		show_404();
		}
		
		$data['title'] = "AA Planetica" ;
		$data['activepage'] = "Test" ;
		
		
		$this->load->view('aries_admin/'.$page, $data);
		
	
	}
	
}