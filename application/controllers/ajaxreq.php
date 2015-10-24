<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ajaxreq extends CI_Controller {

	//protected $sms = array();

	public function __construct(){

		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation','session','pagination'));
		$this->load->helper(array('url','language'));

		$this->lang->load('auth');
		$this->lang->load('clients');
		
		$this->_init();
		
		//$this->load->model('news_model');
		
	} 
	
	private function _init(){

		//$this->load->model('yapps_model');

		$this->output->set_template('aries_layout');
					
	}
	
	


	public function Index($get = NULL)
	{
		echo $get . 'index';
		//echo $_GET['query'];	
		$this->data['message'] = $get;
		(!empty($get) ? $this->output->set_template('none') : NULL);
		(empty($get) ? $this->load->view('aries_admin/apps/ajax_query.php', $this->data) : NULL);
	}
	public function aa($aa=NULL, $get = NULL)
	{
		echo $get . 'aa';
		if ($get == 'client'){
			echo    '<select name="type">
		                <option value="client">Clients</option>
		                <option value="agent">Agents</option>
		                <option value="payment">Payments</option>
		                <option value="level">Level</option>                              
		            </select>';
	    }
		$this->data['message'] = $get;
		(!empty($get) ? $this->output->set_template('none') : NULL);
		(empty($get) ? $this->load->view('aries_admin/apps/ajax_query.php', $this->data) : NULL);
	}

	public function ab($get = NULL)
	{
		echo $get . 'ab';
		if ($get == 'client'){
			echo    '<select name="type">
		                <option value="client">Clients</option>
		                <option value="agent">Agents</option>
		                <option value="payment">Payments</option>
		                <option value="level">Level</option>                              
		            </select>';
	    }
		$this->data['message'] = $get;
		(!empty($get) ? $this->output->set_template('none') : NULL);
		(empty($get) ? $this->load->view('aries_admin/apps/ajax_query.php', $this->data) : NULL);
	}

}