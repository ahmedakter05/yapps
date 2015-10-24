<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aa_lib
{
	
	public function __construct()
	{
		$CI =& get_instance();

		//$CI->load->library(array('session', 'breadcrumbs', 'ion_auth'));
		//$CI->load->helper(array('cookie', 'url', 'language'));
		//$CI->lang->load('aa');
		//$CI->load->model('aa_model');
		
	}

	public function aa($data)
	{
		return $data;
		//return $this->aa_model->test();
	}

	public function get_array_data($get_data)
	{
		unset($clientdata);
		$clientdata = array();
		if(count($get_data)>0){
			foreach ($get_data as $key=>$values)
				{
				  $clientdata[$key] = $values;  // better methodology to retrieve and store multiple records in arrays in loop
				}

				return $clientdata;

		} else { 
			return $clientdata; 
		}
	}

	



}