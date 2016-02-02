<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends CI_Controller
{

	public $current_lang = 'english';

	public function __construct()
	{
		parent::__construct();
		$this->load->library('braintree_lib');
		$this->load->model('transaction');
	}


	public function pay_form()
	{
		/* custom data */
		$this->session->set_userdata('order_id', 10);
		$this->session->set_userdata('customer_id', 50);
		/* ---- */

		if(!$this->session->userdata('order_id') || !$this->session->userdata('customer_id')) {
			show_404();
		}

		$amount = 1000; //getting by order_id from db

		$clientToken = $this->braintree_lib->create_token();
		$this->load->view('payments/card_payment_view', compact('clientToken', 'amount'));
	}

	public function refund()
	{
		$result = $this->braintree_lib->refund('5vxrpc');
		echo '<pre>';
		print_r($result);
	}

	public function index(){
		echo '<pre>';
		$result = $this->braintree_lib->get_transactions();
		foreach($result as $transaction) {
			print_r($transaction);
			echo "\n";
		}
		//$this->braintree_lib->test();
	}

	public function checkout()
	{
		if(!$this->input->post('payment_method_nonce') || !$this->session->userdata('order_id') || !$this->session->userdata('customer_id')) {
			show_404();
		}
		$order_id = $this->session->userdata('order_id');
		$amount = 1000; //getting by order_id from db
		$nonce = $this->input->post('payment_method_nonce', true);
		$result = $this->braintree_lib->add_sale($order_id, $amount, $nonce);
		if($result->success) {
			if($this->transaction->add_transaction($result->transaction, $this->session->userdata('customer_id'), $this->session->userdata('order_id'))) {
				redirect(site_url('payments/success'));
			}
		}
		$this->session->set_flashdata('error', $result->message);
		redirect('payments/pay_form');
	}

	public function success()
	{
		$this->load->view('payments/success');
	}
}
