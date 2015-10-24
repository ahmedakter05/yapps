<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('googlemaps');
		
		
		
	}


	public function Index($page = 'contact-me'){
		if (!file_exists('application/views/exquiso/pages/'.$page.'.php'))
		{
		//Sorry
		show_404();
		}
		
		$data['title'] = "AA Planetica" ;
		$data['activepage'] = "Contact" ;
		
		$config['center'] = '23.762306, 90.428112';//23.762306, 90.428112
		$config['zoom'] = '16';
		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['position'] = $config['center'];
		$this->googlemaps->add_marker($marker);
		$data['map'] = $this->googlemaps->create_map();
		
		$this->load->view('exquiso/templates/autoload', $data);
		$this->load->view('exquiso/templates/header', $data);
		$this->load->view('exquiso/templates/topnav', $data);
		$this->load->view('exquiso/pages/'.$page, $data);
		$this->load->view('exquiso/templates/footer', $data);
	
	}
	
}