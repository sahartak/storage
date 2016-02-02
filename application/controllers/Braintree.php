<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Braintree extends CI_Controller
{

    public $current_lang = 'english';


    public function index()
    {
        $this->load->library('braintree_lib');
    }


}
