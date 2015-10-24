<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stream extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->helper('url');
		
	}

	public function index($chl = null){
		redirect('apps/stream/tv');
	}

	
	public function tv($chl = null)
	{
		$data['title'] = "Live TV - Watch TV Live" ;
		$data['activepage'] = "Live TV" ;
		$defaulttvurl = 'http://172.27.27.23/tv';

		$data['layout'] = "fullwidthpg";
		$data['tvurl'] = '';


		if ($chl == "tv1"){
			$data['layout'] = "pglftsb";
			$data['tvurl'] = $chl . '.html';
		}else if ($chl == "tv2"){
			$data['layout'] = "pglftsb";
			$data['tvurl'] = $chl . '.html';
		}else if ($chl == "tv3"){
			$data['layout'] = "pglftsb";
			$data['tvurl'] = $chl . '.html';
		}else if ($chl == "tv4"){
			$data['layout'] = "pglftsb";
			$data['tvurl'] = $chl . '.html';
		}else if ($chl == "tv5"){
			$data['layout'] = "pglftsb";
			$data['tvurl'] = $chl . '.html';
		}else if ($chl == "tv6"){
			$data['layout'] = "pglftsb";
			$data['tvurl'] = $chl . '.html';
		}else if ($chl == "tv7"){
			$data['layout'] = "pglftsb";
			$data['tvurl'] = $chl . '.html';
		}else if ($chl == "tv8"){
			$data['layout'] = "pglftsb";
			$data['tvurl'] = $chl . '.html';
		}else if ($chl == "tv9"){
			$data['layout'] = "pglftsb";
			$data['tvurl'] = $chl . '.html';
		}

		
		
		
				
		
		$this->load->view('exquiso/templates/autoload', $data);
		$this->load->view('exquiso/templates/header', $data);
		$this->load->view('exquiso/templates/topnav', $data);
		$this->load->view('exquiso/apps/tvlive', $data);
		$this->load->view('exquiso/templates/footer', $data);
	}
	
	
}