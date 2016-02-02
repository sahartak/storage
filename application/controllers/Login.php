<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

	public $current_lang = 'english';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('employee');
	}

	public function index()
	{
		if ($this->session->userdata('user_logged')) {
			redirect(site_url());
		}
		$this->lang->load('names', $this->current_lang);
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run()) {
			if ($this->employee->authenticate($this->input->post('username', true), $this->input->post('password'))) {
				$url = $this->input->get('return_url') ? $this->input->get('return_url') : site_url();
				redirect($url);
			}
			$msg = $this->lang->line('invalid_username_or_password');
		}
		$this->load->view('login_view', compact('msg'));

	}

	public function logout()
	{
		$login_url = ($return_url = $this->input->get('return_url')) ? 'login?return_url='.$return_url : 'login';
		$this->session->sess_destroy();
		redirect(site_url($login_url));
	}

}
