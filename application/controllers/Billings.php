<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billings extends CI_Controller
{

	public $current_lang = 'english';

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('user_logged')) {
            redirect(site_url('login?return_url='.current_url()));
		}
		$this->lang->load('names', $this->current_lang);
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
			base_url('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'),
			base_url('assets/custom_scripts/billings.js'),
		);

		$styles = array(
			base_url('assets/global/plugins/datatables/datatables.min.cs'),
			base_url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')
		);
		$active = 'billings';
		$this->view_load->view('billings/index', compact('active', 'scripts', 'styles'));
	}

	public function ajax_billings()
	{
		//print_r($_POST);
		//print_r($_REQUEST);
		$iTotalRecords = $this->billing->get_total();

		$iDisplayLength = intval($_REQUEST['length']);
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
		$iDisplayStart = intval($_REQUEST['start']);
		$sEcho = intval($_REQUEST['draw']);

		$records = array();
		$records["data"] = array();

		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;

		$result = $this->billing->get_billings($iDisplayStart, $iDisplayLength);
		$unbilled_date = strtotime($this->billing->get_unbilled_date());
		foreach($result as $billing) {

			$status_label = (strtotime($billing['last_aniv_bill_date']) < $unbilled_date) ? 'danger' : 'success';

			$records["data"][] = array(
				$billing['customer_id'],
				$billing['customer_name'],
				$billing['last_aniv_bill_date'],
				'<span class="label label-sm label-'.$status_label.'">'.($status_label == "success" ? "billed" : "unbilled").'</span>',
				($status_label == "success" ? "" : "<input type='checkbox' class='shoper_check' name='shopers[]' value='".$billing['id']."' data-id='".$billing['id']."'>"),
				$billing['transactions_total'],
				count($billing['shipments']),
				$billing['items_total'],
				$billing['total'],
				'<a class=" btn purple btn-outline sbold to_modal" data-toggle="modal" data-id="'.$billing['id'].'" href="#ajax_modal_'.$billing['id'].'"> Edit transactions </a>'
			);
		}
		if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
			$records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
			$records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}

		$records["draw"] = $sEcho;
		$records["recordsTotal"] = $iTotalRecords;
		$records["recordsFiltered"] = $iTotalRecords;

		echo json_encode($records);
	}

	public function ajax_modal()
	{
		$billings = $this->billing->get_billings_details();
		$service_types = $this->billing->get_service_types();
		if($billings) {
			$this->load->view('billings/modal_view', compact('billings', 'service_types'));
		}

	}

	public function do_billing()
	{
		if(!$this->input->post('shopers') || !$this->input->post('services_to_bill')) {
			redirect($_SERVER['HTTP_REFERER']);
		}
		$service_types = $this->billing->get_service_types();
		$billings = $this->billing->get_form_checked_billings();
		$active = 'billings';
		$this->view_load->view('billings/do_billing', compact('active', 'billings', 'service_types'));
	}

	public function update_service_checkbox_status()
	{
		$id = abs((int)$this->input->post('id'));
		$status = $this->input->post('status') == 'true' ? 1 : 0;
        $this->billing->updating_service_checkbox_status($id, $status);
	}

	public function update_parent_checkbox_status()
	{
		$id = abs((int)$this->input->post('id'));
        $status = abs((int)$this->input->post('status'));
        $this->billing->updating_parent_checkbox_status($id, $status);
	}

    public function process_billing()
    {
        if($this->input->post('customers_billings')) {
            $this->load->library('braintree_lib');
            $messages = $this->billing->process_billing($this->input->post('customers_billings'));
            $this->session->set_flashdata('messages', $messages);
            redirect(site_url('billings'));
        }
        show_404();
    }

}
