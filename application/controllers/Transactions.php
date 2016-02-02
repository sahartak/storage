<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions extends CI_Controller
{

	public $current_lang = 'english';

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('user_logged')) {
            redirect(site_url('login?return_url='.current_url()));
		}
		$this->lang->load('names', $this->current_lang);
		$this->load->library('braintree_lib');
		$this->load->model('transaction');
        $this->load->model('billing');
	}

	public function index()
	{
		$scripts = array(
			base_url('assets/global/scripts/datatable.js'),
			base_url('assets/global/plugins/datatables/datatables.min.js'),
			base_url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'),
			base_url('assets/pages/scripts/table-datatables-buttons.min.js'),
			base_url('assets/pages/scripts/transactions.js'),
			base_url('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'),
		);

		$styles = array(
			base_url('assets/global/plugins/datatables/datatables.min.cs'),
			base_url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')
		);

		$transactions = $this->transaction->get_transactions();
		$this->view_load->view('transactions/index', compact('scripts', 'styles', 'transactions'));
	}

	public function refund($transaction_id = '', $amount = null, $service_id=0)
	{
		$result = $this->braintree_lib->refund($transaction_id, $amount);
		if($result->success) {
			$transaction = $this->transaction->get_transaction_by_id($transaction_id);
			$this->transaction->add_transaction($result->transaction, $transaction->customer_id, $transaction->order_id);
			$this->session->set_flashdata('refund_success', true);
		} else {
			$this->session->set_flashdata('error_msg', $result->message);
		}
		redirect(site_url('transactions'));
	}

	public function view_transaction($id=0)
	{
		$id = abs((int)$id);
		if(!$id) {
			show_404();
		}
		$payment = $this->transaction->get_billing_payment($id);
		if(!$payment) {
			show_404();
		}
		$service_types = $this->billing->get_service_types();
		$this->view_load->view('transactions/single_transaction', compact('payment', 'service_types'));
	}

	public function payment_refund($payment_id)
	{

	}

	public function service_refund($service_id)
	{
		$result = $this->transaction->do_service_refund($service_id);
        $this->session->set_flashdata('result', $result);
        redirect($_SERVER['HTTP_REFERER']);
	}

}
