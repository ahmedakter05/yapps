<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		
	}


	public function Index($page = 'about-me'){
		if (!file_exists('application/views/exquiso/pages/'.$page.'.php'))
		{
		//Sorry
		show_404();
		}
		
		$data['title'] = "AA Planetica" ;
		$data['activepage'] = "About" ;
		
		$this->load->view('exquiso/templates/autoload', $data);
		$this->load->view('exquiso/templates/header', $data);
		$this->load->view('exquiso/templates/topnav', $data);
		$this->load->view('exquiso/pages/'.$page, $data);
		$this->load->view('exquiso/templates/footer', $data);
	
	}
	
}