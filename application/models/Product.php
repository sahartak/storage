<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model
{

	public function get_by_tracking($tracking_number)
	{
		return $this->db->select('c.name, c.address, r.*')
						->join('customers as c', 'c.customer_number = r.customer_id')
						->where('r.tracking_id', $tracking_number)
						->get('received_products as r')
						->row_array();
	}

	public function get_by_customer($customer_number, $tracking_number)
	{
		$query = $this->db->get_where('customers', array('customer_number' => $customer_number));
		if($query->num_rows()) {
			$customer = $query->row();
			$result = array();
			$result['shipment_id'] = $this->generate_shipment_id();
			$result['item_id'] = $this->generate_item_id();
			$result['name'] = $customer->name;
			$result['address'] = $customer->address;
			return $result;
		}
	}

	private function generate_shipment_id()
	{
		$this->load->helper('string');
		do {
			$string = strtoupper('S'.random_string());
		}
		while($this->check_shipment_id($string));
		return $string;
	}

	private function check_shipment_id($shipment_id)
	{
		return $this->db->select('id')
						->get_where('received_products', array('shipment_id' => $shipment_id))
						->num_rows();
	}

	private function generate_item_id()
	{
		$this->load->helper('string');
		do {
			$string = strtoupper('I'.random_string());
		}
		while($this->check_item_id($string));
		return $string;
	}

	private function check_item_id($shipment_id)
	{
		return $this->db->select('id')
			->get_where('received_products', array('item_id' => $shipment_id))
			->num_rows();
	}

	public function get_product_price($weight, $size1, $size2, $size3)
	{
		$prices = [1.99, 2.99, 3.99];
		$size = $size1 + $size2 + $size3;
		if($weight <= 15) {
			$weight_price_index = 0;
		} else if($weight <= 70) {
			$weight_price_index = 1;
		} else {
			$weight_price_index = 2;
		}

		if($size <= 36) {
			$size_price_index = 0;
		} else if($size <= 70) {
			$size_price_index = 1;
		} else {
			$size_price_index = 2;
		}
		return $prices[max($size_price_index, $weight_price_index)];
	}

	public function receive_package_from_carrier()
	{
		$result = array();
		$product = array();
		$customer_id = $this->input->post('customer_id');
		$customer = $this->db->select('id')->get_where('customers', array('customer_number' => $customer_id))->row();
		if(!$customer) {
			$result['success'] = false;
			$result['message'] = 'Customer not found';
			return $result;
		}

		$product['item_id'] = $this->generate_item_id();
		$product['tracking_id'] = $this->input->post('tracking_id');
		$product['carrier_id'] = $this->input->post('carrier_id');
		$product['customer_id'] = $this->input->post('customer_id');
		$product['current_stock_loc_id'] = $this->input->post('current_stock_loc_id');
		$product['age_restriction'] = (int)$this->input->post('age_restriction');
		$product['store_weight'] = $this->input->post('store_weight');
		$product['store_size1'] = $this->input->post('store_size1');
		$product['store_size2'] = $this->input->post('store_size2');
		$product['store_size3'] = $this->input->post('store_size3');
		if($this->input->post('shipment_id')) {
			$product['shipment_id'] = $this->input->post('shipment_id');
		} else {
			$product['shipment_id'] = $this->generate_shipment_id();
		}

		$this->db->insert('received_products', $product);

		$insert = array(
			'customer_id' => $customer->id,
			'shipment_id' => $product['shipment_id'],
			'item_id' => $product['item_id'],
			'in_tracking_id' => $product['tracking_id'],
			'billed_checkbox' => 1
		);
		$this->db->insert('shopper_billing_records', $insert);

		$insert = array(
			'billing_record_id' => $this->db->insert_id(),
			'service_type' => 4,
			'charge' => $this->get_product_price($product['store_weight'], $product['store_size1'], $product['store_size2'], $product['store_size3']),
			'billed_checkbox' => 1
		);
		$this->db->insert('services_to_bill', $insert);

		$result['success'] = true;
		$result['product'] = $product;

		return $result;

	}

	public function receive_package_from_customer()
	{
		$result = array();
		$product = array();
		$customer_id = $this->input->post('customer_id');
		$customer = $this->db->select('id')->get_where('customers', array('customer_number' => $customer_id))->row();
		if(!$customer) {
			$result['success'] = false;
			$result['message'] = 'Customer not found';
			return $result;
		}

		$product['item_id'] = $this->generate_item_id();
		$product['tracking_id'] = $this->input->post('tracking_id');
		$product['carrier_id'] = $this->input->post('carrier_id');
		$product['customer_id'] = $this->input->post('customer_id');
		$product['current_stock_loc_id'] = $this->input->post('current_stock_loc_id');
		$product['store_weight'] = $this->input->post('store_weight');
		$product['store_size1'] = $this->input->post('store_size1');
		$product['store_size2'] = $this->input->post('store_size2');
		$product['store_size3'] = $this->input->post('store_size3');
		$product['type'] = 1;

		if($this->input->post('shipment_id')) {
			$product['shipment_id'] = $this->input->post('shipment_id');
		} else {
			$product['shipment_id'] = $this->generate_shipment_id();
		}

		$this->db->insert('received_products', $product);

		$insert = array(
			'customer_id' => $customer->id,
			'shipment_id' => $product['shipment_id'],
			'item_id' => $product['item_id'],
			'in_tracking_id' => $product['tracking_id'],
			'billed_checkbox' => 1
		);
		$this->db->insert('shopper_billing_records', $insert);

		$insert = array(
			'billing_record_id' => $this->db->insert_id(),
			'service_type' => 5,
			'charge' => $this->get_product_price($product['store_weight'], $product['store_size1'], $product['store_size2'], $product['store_size3']),
			'billed_checkbox' => 1
		);
		$this->db->insert('services_to_bill', $insert);

		$result['success'] = true;
		$result['product'] = $product;

		return $result;
	}

	private function init_where()
	{
		if($value = trim($this->input->post('id'))) {
			$this->db->where('p.id', $value);
		}

		if($value = trim($this->input->post('shipment_id'))) {
			$this->db->where('p.shipment_id', $value);
		}
		if($value = trim($this->input->post('item_id'))) {
			$this->db->where('p.item_id', $value);
		}
		if($value = trim($this->input->post('tracking_id'))) {
			if($value == 'no') {
				$value = '';
			}
			$this->db->where('p.tracking_id', $value);
		}
		if($value = trim($this->input->post('carrier_id'))) {
			$this->db->where('p.carrier_id', $value);
		}

		if($value = trim($this->input->post('location'))) {
			$this->db->where('p.current_stock_loc_id', $value);
		}

		if($value = trim($this->input->post('customer_id'))) {
			$this->db->where('p.customer_id', $value);
		}

		if($value = trim($this->input->post('date_from'))) {
			$this->db->where('p.created_on >=', $value);
		}

		if($value = trim($this->input->post('date_to'))) {
			$this->db->where('p.created_on <=', $value.' 23:59:59');
		}

		if($value = trim($this->input->post('type'))) {
			$value--;
			$this->db->where('p.type', $value);
		}

		if($value = trim($this->input->post('status'))) {
			$value--;
			$this->db->where('p.status', $value);
		}

	}

	public function get_total()
	{
		$this->init_where();
		$count = $this->db->count_all_results('received_products as p');
		return $count;
	}

	public function get_items_types()
	{
		$types = array(
			'FROM CARRIER',
			'FROM CUSTOMER'
		);
		return $types;
	}

	public function get_items_statuses()
	{
		$statuses = array(
			'received at location',
			'PICKUP',
			'DELIVERED',
			'RECEIVED',
			'given to carrier'
		);
		return $statuses;
	}

	public function get_products($start=null, $end=null, $carrier_items = false)
	{
		$this->init_where();
		if($carrier_items) {
			$this->db->where('status !=', 4);
		}
		if($start !== null && $end !== null) {
			$this->db->limit($end, $start);
		}
		return $this->db->select('p.*, c.name, c.last_name, c.address, l.name as location')
						->join('customers as c', 'c.customer_number=p.customer_id')
						->join('locations as l', 'l.id=p.current_stock_loc_id')
						->get('received_products as p')->result_array();
		//echo $this->db->last_query();die;
	}

	public function split_items_shipments($shipment_id, $items_id)
	{
		$items = $this->db->where('shipment_id', $shipment_id)->where_in('id', $items_id)->get('received_products')->result_array();
		if($items) {
			foreach($items as $item) {
				unset($item['id']);
				$item['shipment_id'] = $this->generate_shipment_id();
				$item['updated_on'] = date('Y-m-d H:i:s');
				$this->db->insert('received_products', $item);
			}
			$this->db->where('shipment_id', $shipment_id)->where_in('id', $items_id)->update('received_products', array('modified' => 1));
			return true;
		}
		return false;
	}

	public function merge_items_shipments($items_id)
	{
		$items = $this->db->where_in('id', $items_id)->get('received_products')->result_array();
		if($items) {
			$shipment_id = $this->generate_shipment_id();
			foreach($items as $item) {
				unset($item['id']);
				$item['shipment_id'] = $shipment_id;
				$item['updated_on'] = date('Y-m-d H:i:s');
				$this->db->insert('received_products', $item);
			}
			$this->db->where_in('id', $items_id)->update('received_products', array('modified' => 1));
			return true;
		}
		return false;
	}

	public function update_locations($items_id, $next_locations)
	{
		for($i=0; $i<count($items_id); $i++) {
			if($items_id[$i] && $next_locations[$i]) {
				$this->db->where('id', $items_id[$i]);
				$this->db->update('received_products', array('current_stock_loc_id' => $next_locations[$i], 'updated_on' => date('Y-m-d H:i:s')));
			}
		}
	}

	public function change_present_status($id, $is_present)
	{
		$this->db->where('id', $id)->update('received_products', array('is_present' => $is_present));
	}

	public function give_packages_to_carrier()
	{
		$this->db   ->where('carrier_id', $this->input->post('carrier_id'))
					->where_in('id', $this->input->post('items'))
					->update('received_products', array('updated_on' => date('Y-m-d H:i:s'), 'status' => 4));
	}

	public function receive_packages_from_carrier_rules()
	{
		return [
			[
				'field' => 'tracking_id',
				'label' => 'Tracking number',
				'rules' => 'trim|alpha_numeric'
			],

			[
				'field' => 'customer_id',
				'label' => 'Customer number',
				'rules' => 'trim|required|alpha_numeric|exact_length[6]'
			],

			[
				'field' => 'carrier_id',
				'label' => 'Carrier',
				'rules' => 'trim|required'
			],

			[
				'field' => 'shipment_id',
				'label' => 'Shipment number',
				'rules' => 'trim|alpha_numeric|exact_length[9]'
			],

			[
				'field' => 'current_stock_loc_id',
				'label' => 'Stock location',
				'rules' => 'trim|required|is_natural_no_zero'
			],

			[
				'field' => 'store_weight',
				'label' => 'Weight',
				'rules' => 'trim|required|numeric|abs'
			],

			[
				'field' => 'store_size1',
				'label' => 'Size1',
				'rules' => 'trim|required|numeric|abs'
			],

			[
				'field' => 'store_size2',
				'label' => 'Size2',
				'rules' => 'trim|required|numeric|abs'
			],

			[
				'field' => 'store_size3',
				'label' => 'Size3',
				'rules' => 'trim|required|numeric|abs'
			],
		];
	}

	public function give_package_to_carrier_rules()
	{
		return [
			[
				'field' => 'carrier_id',
				'label' => 'Carrier',
				'rules' => 'trim|required'
			],

			[
				'field' => 'items[]',
				'label' => 'items',
				'rules' => 'trim|required|numeric'
			],

		];
	}

	public function get_customer_packages($customer_number)
	{
		$customer = $this->db   ->select('name, last_name, customer_number, address')
								->where('customer_number', $customer_number)
								->get('customers')
								->row_array();
		if($customer) {
			$customer['packages'] = $this->db->get_where('received_products', array('customer_id' => $customer_number, 'status !=' => 5))->result_array();
			foreach($customer['packages'] as &$package) {
				if($package['age_restriction']) {
					$package['age_restriction_date'] = date('Y-m-d', strtotime('-'.$package['age_restriction'].' year', time()));
				}
			}
			return $customer;
		}
		return false;
	}

}