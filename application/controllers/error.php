<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('session'));
		$this->load->helper(array('url','language'));

		$this->lang->load('auth');
		
		$this->_init();
		
		//$this->load->model('news_model');
		
	} 
	
	private function _init()
	{
		$this->output->set_template('aries_layout');
		
		
		
	}


	public function Index($page = 'error_404'){
		if (!file_exists('application/views/aries_admin/error/'.$page.'.php'))
		{
		//Sorry
		show_404();
		}
		
		$data['title'] = "AA Planetica" ;
		$data['activepage'] = "Error" ;
		
		$data['message'] = $this->session->flashdata('message');
		
		$this->load->view('aries_admin/error/'.$page, $data);
		
	
	}
	
}