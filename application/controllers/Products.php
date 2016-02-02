<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller
{

	public $current_lang = 'english';

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('user_logged')) {
            redirect(site_url('login?return_url='.current_url()));
		}
		$this->lang->load('names', $this->current_lang);
		$this->load->model('product');
		$this->load->model('location');
		$this->load->model('carrier');
	}

	public function receive_packages_from_carrier()
	{
		$this->load->library('form_validation');
		$rules = $this->product->receive_packages_from_carrier_rules();
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run()) {
			$result = $this->product->receive_package_from_carrier();
			if($result['success']) {
				$this->session->set_flashdata('success_message', 'Item added. Item # '.$result['product']['item_id'].', Shipment # '. $result['product']['shipment_id']);
				if($this->input->post('next_shipment')) {
					$this->session->set_flashdata('shipment_id', $result['product']['shipment_id']);
					$this->session->set_flashdata('customer_id', $result['product']['customer_id']);
					$this->session->set_flashdata('carrier_id', $result['product']['carrier_id']);
					$this->session->set_flashdata('tracking_id', $result['product']['tracking_id']);
				}
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
		$scripts = array(
			base_url('assets/global/scripts/datatable.js'),
			base_url('assets/global/plugins/datatables/datatables.min.js'),
			base_url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'),
			base_url('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'),
			base_url('assets/custom_scripts/products.js'),
		);
		$active = 'receive_packages_from_carrier';
		$locations = $this->location->get_locations();
		$carriers = $this->carrier->get_carriers();
		$this->view_load->view('products/receive_packages_from_carrier', compact('scripts', 'active', 'locations', 'result', 'carriers'));
	}

	public function receive_package_from_customer()
	{
		$this->load->library('form_validation');
		$rules = $this->product->receive_packages_from_carrier_rules();
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run()) {
			$result = $this->product->receive_package_from_customer();
			if($result['success']) {
				$this->session->set_flashdata('success_message', 'Item added. Item # '.$result['product']['item_id'].', Shipment # '. $result['product']['shipment_id']);
				if($this->input->post('next_shipment')) {
					$this->session->set_flashdata('shipment_id', $result['product']['shipment_id']);
					$this->session->set_flashdata('customer_id', $result['product']['customer_id']);
					$this->session->set_flashdata('carrier_id', $result['product']['carrier_id']);
					$this->session->set_flashdata('tracking_id', $result['product']['tracking_id']);
				}
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
		$scripts = array(
			base_url('assets/custom_scripts/products.js')
		);
		$active = 'receive_package_from_customer';
		$locations = $this->location->get_locations();
		$carriers = $this->carrier->get_carriers();
		$this->view_load->view('products/receive_package_from_customer', compact('scripts', 'active', 'locations', 'result', 'carriers'));
	}

	public function check_tracking_number()
	{
		$tracking_number = $this->input->post('tracking_number');
		if(!$tracking_number) {
			show_404();
		}
		$product = $this->product->get_by_tracking($tracking_number);
		if($product) {
			$result = array('success' => true, 'product' => $product);
		} else {
			$result = array('success' => false, 'message' => 'tracking number not found');
		}
		echo json_encode($result);
	}

	public function check_customer_number()
	{
		$customer_number = $this->input->post('customer_number');
		$tracking_number = $this->input->post('tracking_number');
		if(!$customer_number) {
			show_404();
		}
		$product = $this->product->get_by_customer($customer_number, $tracking_number);
		if($product) {
			$result = array('success' => true, 'product' => $product);
		} else {
			$result = array('success' => false, 'message' => 'customer number not found');
		}
		echo json_encode($result);
	}

	public function get_price()
	{
		$weight = $this->input->post('weight');
		$size1 = $this->input->post('size1');
		$size2 = $this->input->post('size2');
		$size3 = $this->input->post('size3');
		echo $this->product->get_product_price($weight, $size1, $size2, $size3);
	}

	public function inventory()
	{
		if($_POST) {
			$items_id = $this->input->post('items_id');
			$next_locations = $this->input->post('next_locations');
			if($items_id && $next_locations) {
				$this->product->update_locations($items_id, $next_locations);
				$this->session->set_flashdata('success_message', 'Items locations updated');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
		$scripts = array(
			base_url('assets/global/scripts/datatable.js'),
			base_url('assets/global/plugins/datatables/datatables.min.js'),
			base_url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'),
			base_url('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'),
			base_url('assets/custom_scripts/products.js'),
		);

		$styles = array(
			base_url('assets/global/plugins/datatables/datatables.min.cs'),
			base_url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')
		);
		$active = 'inventory';
		$locations = $this->location->get_locations();
		$carriers = $this->carrier->get_carriers();
		$this->view_load->view('products/inventory', compact('scripts', 'styles', 'active', 'locations', 'result', 'carriers'));
	}

	public function ajax_get_list_packages()
	{
		$iTotalRecords = $this->product->get_total();

		$iDisplayLength = intval($_REQUEST['length']);

		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
		$iDisplayStart = intval($_REQUEST['start']);
		$sEcho = intval($_REQUEST['draw']);

		$records = array();
		$records["data"] = array();

		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;

		$result = $this->product->get_products($iDisplayStart, $iDisplayLength);
		//$unbilled_date = strtotime($this->billing->get_unbilled_date());

		$types = $this->product->get_items_types();
		$statuses = $this->product->get_items_statuses();

		foreach($result as $item) {

			$is_present = '<input type="checkbox" class="present_checkboxes" value="'.$item['id'].'" '.($item['is_present'] ? "checked" : "").' />';
			$action = $item['modified'] ? '<span class="label label-sm label-danger">Modified</span>' : '<input type="checkbox" name="items[]" class="items_check" data-shipment="'.$item['shipment_id'].'" value="'.$item['id'].'" />';
			$records["data"][] = array(
				$item['id'],
				$is_present,
				$item['shipment_id'],
				$item['item_id'],
				$item['tracking_id'],
				$item['carrier_id'],
				$item['customer_id'],
				$item['name'].' '.$item['last_name'].'<br />'.$item['address'],
				$item['location'],
				$item['created_on'],
				$types[$item['type']],
				$statuses[$item['status']],
				$action
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

	public function split_merge_url($action = '')
	{
		$items = $this->input->post('items');
		$shipment_id = $this->input->post('shipment_id');
		$result = array();
		if($items && $action) {
			switch($action) {

				case 'split':
					if($shipment_id) {
						if($this->product->split_items_shipments($shipment_id, $items)) {
							$result['success'] = true;
							$this->session->set_flashdata('success_message', 'Items successfully splitted');
						} else {
							$result['success'] = false;
							$result['message'] = 'items not splited';
						}
					}
				break;

				case 'merge':
					if($this->product->merge_items_shipments($items)) {
						$result['success'] = true;
						$this->session->set_flashdata('success_message', 'Items successfully merged');
					} else {
						$result['success'] = false;
						$result['message'] = 'items not merged';
					}
				break;

			}
			echo json_encode($result);
		}
	}

	public function give_package_to_carrier()
	{
		$this->load->library('form_validation');
		$rules = $this->product->give_package_to_carrier_rules();
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run()) {
			$this->product->give_packages_to_carrier();
			$this->session->set_flashdata('success_message', 'Packages given to carrier');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$scripts = array(
			base_url('assets/global/scripts/datatable.js'),
			base_url('assets/global/plugins/datatables/datatables.min.js'),
			base_url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'),
			base_url('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'),
			base_url('assets/custom_scripts/products.js'),
		);
		$active = 'receive_package_from_customer';
		$locations = $this->location->get_locations();
		$carriers = $this->carrier->get_carriers();
		$this->view_load->view('products/give_package_to_carrier', compact('scripts', 'active', 'locations', 'result', 'carriers'));
	}

	public function get_carrier_items()
	{
		if($this->input->post('carrier_id')) {
			$carrier_items = $this->product->get_products(null, null, true);
			if($carrier_items) {
				$types = $this->product->get_items_types();
				$statuses = $this->product->get_items_statuses();
				$this->load->view('products/carrier_items_view', compact('carrier_items', 'types', 'statuses'));
			}
		}
	}

	public function change_present_status()
	{
		$id = abs((int)$this->input->post('id'));
		$is_present = abs((int)$this->input->post('is_present'));
		if($id) {
			$this->product->change_present_status($id, $is_present);
		}
	}

	public function give_package_to_customer()
	{
		$this->load->library('form_validation');
		$rules = $this->product->give_package_to_carrier_rules();
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run()) {
			//$this->product->give_packages_to_carrier();
		   // $this->session->set_flashdata('success_message', 'Packages given to carrier');
		   // redirect($_SERVER['HTTP_REFERER']);
		}

		/*
		<script src="../assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
		<script src="../assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
		<script src="../assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
		<script src="../assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
		*/
		$scripts = array(
			base_url('assets/global/plugins/select2/js/select2.full.min.js'),
			base_url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js'),
			base_url('assets/global/plugins/jquery-validation/js/additional-methods.min.js'),
			base_url('assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js'),
			base_url('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'),
			base_url('assets/pages/scripts/form-wizard.min.js'),
			base_url('assets/custom_scripts/give_to_customer.js'),
		);
		$active = 'give_package_to_customer';
		$locations = $this->location->get_locations();
		$carriers = $this->carrier->get_carriers();
		$this->view_load->view('products/give_package_to_customer', compact('scripts', 'active', 'locations', 'result', 'carriers'));
	}

	public function get_customer_packages()
	{
		if($customer_number = $this->input->post('customer_number')) {
			$customer = $this->product->get_customer_packages($customer_number);
			if($customer) {
				$result = [
					'customer' => $customer,
					'success' => true
				];
			} else {
				$result = [
					'success' => false,
					'message' => 'Customer not found'
				];
			}
			echo json_encode($result);
		}
	}

}
