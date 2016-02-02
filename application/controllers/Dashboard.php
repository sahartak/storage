<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public $current_lang = 'english';

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('user_logged')) {
            redirect(site_url('login'));
        }
    }

	public function index()
	{
        redirect(site_url('employees'));
	}


}
