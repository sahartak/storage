<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_load
{

	private $CI;

	public function __construct()
	{
		$this->CI = &get_instance();
	}

	public function view($view, $data=null)
	{
		$this->CI->load->view('layouts/header', $data);
		$this->CI->load->view('layouts/sidebar');
		$this->CI->load->view($view.'_view');
		$this->CI->load->view('layouts/right_sidebar');
		$this->CI->load->view('layouts/footer');
	}

}