<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Destime extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->helper('url');

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
	}
	
	public function index()
	{
		$data['title'] = "DET - Download Estimated Time Apps" ;
		$data['activepage'] = "DET Apps" ;
		$data['size'] = $data['dwldspd'] = $data['dwldspds'] = $data['estime'] = $data['errspds'] = null ;
		//echo '<b> Download Estimated Time Apps</b><br />';
		
		$this->form_validation->set_rules('size', 'Est Size', 'number|required|greater_than[0]');
		$this->form_validation->set_rules('speeds', 'Speeds', 'number|greater_than[0]');
		$this->form_validation->set_rules('speed', 'Speed', 'number|greater_than[0]');
		
		if($this->form_validation->run() == TRUE){
		$data['size'] = ($this->input->post('size'))*1024;
		$data['dwldspd'] = $this->input->post('speed');
		$data['dwldspds'] = $this->input->post('speeds');
		
		if ($data['dwldspds']){
		$est = $data['size']/($data['dwldspds']/8);
		$data['estime'] = $est / 60;
		} elseif($data['dwldspd']){
		$est = $data['size']/($data['dwldspd']);
		$data['estime'] = $est / 60;
		} else {
		$data['errspds'] = "NetSpeed is Missing <br />";
		$data['size'] = $data['dwldspd'] = $data['dwldspds'] = $data['estime'] = null ;
		}
		}
		
		
		$this->load->view('exquiso/templates/autoload', $data);
		$this->load->view('exquiso/templates/header', $data);
		$this->load->view('exquiso/templates/topnav', $data);
		$this->load->view('exquiso/apps/destime', $data);
		$this->load->view('exquiso/templates/footer', $data);
	}
	
	
}