<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billing extends CI_Model
{

	public function get_unbilled_date()
	{
		$date = date('Y-m-d', strtotime('-1 month',strtotime('+1 day', time())));
		return $date;
	}

	private function init_where()
	{
		if($value = $this->input->post('customer_id')) {
			$this->db->where('b.customer_id', $value);
		}
		if($value = $this->input->post('customer_name')) {
			$this->db->where('c.name', $value);
		}
		if($value = $this->input->post('date_from')) {
			$this->db->where('b.last_aniv_bill_date >=', $value);
		}
		if($value = $this->input->post('date_to')) {
			$this->db->where('b.last_aniv_bill_date <=', $value);
		}

		if($value = (int)$this->input->post('status')) {
			$unbilled_date = $this->get_unbilled_date();
			if($value < 0) {
				$this->db->where('b.last_aniv_bill_date <', $unbilled_date);
			} else {
				$this->db->where('b.last_aniv_bill_date >=', $unbilled_date);
			}
		}
	}

    public function get_service_types()
    {
        return array(
            1 => 'receive package',
            2 => 'pakage storage 2 days',
            3 => 'home delivery',
            4 => $this->lang->line('receive_packages_from_carrier'),
            5 => $this->lang->line('receive_package_from_customer')
        );
    }

	public function get_billings($start=null, $end=null)
	{
		$this->db->select('c.name as customer_name, b.*');
		$this->init_where();
		$this->db->join('customers as c', 'c.id=b.customer_id', 'left');

		//echo $start; die;
		if($start !== null && $end !== null) {
			$this->db->limit($end, $start);
		}
		$query = $this->db->get('billing_dates as b');

		$billings = array();
		if($query->num_rows()) {
			$billings = $query->result_array();
			foreach($billings as &$billing) {

				$billing['shipments'] = $this->get_customer_shipments($billing['customer_id']);
				$billing['total'] = 0;
				$billing['items_total'] = 0;
				$billing['transactions_total'] = 0;

				foreach($billing['shipments'] as &$shipment) {
					$shipment['line_items'] = $this->get_shoper_billing_records($billing['customer_id'], $shipment['shipment_id']);
					$billing['items_total'] += count($shipment['line_items']);

					foreach($shipment['line_items'] as &$line_item) {
						$line_item['services'] = $this->db->get_where('services_to_bill', array('billing_record_id' => $line_item['record_id']))->result_array();
						$line_item['transactions'] = count($line_item['services']);
						$billing['transactions_total'] += $line_item['transactions'];
						$line_item['total'] = 0;
						foreach($line_item['services'] as $service) {
							$line_item['total'] += $service['charge'];
						}
						$billing['total'] += $line_item['total'];
					}
				}
			}
		}
		return $billings;
	}

	public function get_total()
	{
		$this->init_where();
		$this->db->join('customers as c', 'c.id=b.customer_id', 'left');
		$count = $this->db->count_all_results('billing_dates as b');
		return $count;
	}

	public function get_billings_details()
	{

		$billings = array();
		if($billings_list = $this->input->post('id_list')) {
			foreach($billings_list as &$billing) {
				$billing = (int)$billing;
				if(!$billing) {
					return false;
				}
			}
			$this->db->where_in('b.id', $billings_list);

			$this->db->select('c.name as customer_name, b.*');
			$this->db->join('customers as c', 'c.id=b.customer_id', 'left');

			$query = $this->db->get('billing_dates as b');
			if($query->num_rows()) {
				$billings = $query->result_array();

				foreach($billings as &$billing) {
					$billing['shipments'] = $this->get_customer_shipments($billing['customer_id']);
					$billing['total'] = 0;

					$billing['items_total'] = 0;
					$billing['transactions_total'] = 0;
					foreach($billing['shipments'] as &$shipment) {
                        $shipment['line_items'] = $this->get_shoper_billing_records($billing['customer_id'], $shipment['shipment_id']);
						$billing['items_total'] += count($shipment['line_items']);

						foreach($shipment['line_items'] as &$line_item) {
							$line_item['services'] = $this->get_services_by_record($line_item['record_id']);
							$line_item['transactions'] = count($line_item['services']);
							$billing['transactions_total'] += $line_item['transactions'];
							$line_item['total'] = 0;
							foreach($line_item['services'] as $service) {
								$line_item['total'] += $service['charge'];
							}
							$billing['total'] += $line_item['total'];
						}
					}
				}
			}
		}
		return $billings;
	}

    public function get_customer_shipments($customer_id)
    {
        return $this->db->select('shipment_id')
                        ->where(array('customer_id' => $customer_id))
                        ->group_by('shipment_id')
                        ->get('shopper_billing_records')
                        ->result_array();
    }

	public function get_services_by_record($record_id)
	{
		return $this->db->where('billing_record_id', $record_id)
						->get('services_to_bill')
						->result_array();
	}

	public function get_shoper_billing_records($customer_id, $shipment_id)
	{
	   return $this->db ->select('carriers.name as carrier_name, s.*')
						->from('shopper_billing_records as s')
						->join('carriers', 'carriers.id = s.in_carrier_id', 'left')
						->where(array('s.customer_id' => $customer_id, 's.shipment_id' => $shipment_id))
						->get()
                        ->result_array();
	}

	public function get_form_checked_billings()
	{
		$shopers = $this->input->post('shopers');
		$services_to_bill = $this->input->post('services_to_bill');

		$this->db->select('c.name as customer_name, b.*');
		$this->db->join('customers as c', 'c.id=b.customer_id', 'left');
		$this->db->where_in('b.id', $shopers);
		$query = $this->db->get('billing_dates as b');
		$result = array();
		$result['charge_minus'] = 0;
		$result['line_items_minus'] = 0;
		$result['transactions_minus'] = 0;
		$result['shipments_minus'] = 0;
		if($query->num_rows()) {
			$result['billings_list'] = $query->result_array();
			$billings = &$result['billings_list'];

			foreach($billings as &$billing) {

				$billing['charge_minus'] = 0;
				$billing['line_items_minus'] = 0;
				$billing['transactions_minus'] = 0;
				$billing['shipments_minus'] = 0;

				$billing['shipments'] = $this->db   ->select('shipment_id')
					->where(array('billed' => 0, 'customer_id' => $billing['customer_id']))
					->group_by('shipment_id')
					->get('shopper_billing_records')
					->result_array();
				$billing['total'] = 0;

				$billing['items_total'] = 0;
				$billing['transactions_total'] = 0;
				foreach($billing['shipments'] as $shipments_key => &$shipment) {
					$query = $this->db  ->select('carriers.name as carrier_name, s.*')
						->from('shopper_billing_records as s')
						->join('carriers', 'carriers.id = s.in_carrier_id', 'left')
						->where(array('s.billed' => 0, 's.customer_id' => $billing['customer_id'], 'shipment_id' => $shipment['shipment_id']))
						->get();
					$shipment['line_items'] = $query->result_array();


					foreach($shipment['line_items'] as $key_line_items => &$line_item) {
						$line_item['services'] = $this->db->get_where('services_to_bill', array('billing_record_id' => $line_item['record_id']))->result_array();
						$line_item['transactions'] = count($line_item['services']);
						$line_item['total'] = 0;

						foreach($line_item['services'] as $key_services => $service) {
							if(in_array($service['id'], $services_to_bill)) {
								$line_item['total'] += $service['charge'];
							} else {
								unset($line_item['services'][$key_services]);
								$billing['charge_minus'] += $service['charge'];
								$billing['transactions_minus']++;
								$line_item['transactions']--;
							}
						}
						if(count($line_item['services'])) {
							$billing['total'] += $line_item['total'];
							$billing['transactions_total'] += $line_item['transactions'];
						} else {
							unset($shipment['line_items'][$key_line_items]);
							$billing['line_items_minus']++;
						}
					}

					$billing['items_total'] += count($shipment['line_items']);
					if(!count($shipment['line_items'])) {
						unset($billing['shipments'][$shipments_key]);
						$billing['shipments_minus']++;
					}
				}
				$result['charge_minus'] += $billing['charge_minus'];
				$result['shipments_minus'] += $billing['shipments_minus'];
				$result['transactions_minus'] += $billing['transactions_minus'];
				$result['line_items_minus'] += $billing['line_items_minus'];
			}
		}
		return $result;
	}


	public function updating_service_checkbox_status($id, $status)
	{
		$this->db->where('id', $id);
		$this->db->update('services_to_bill', array('billed_checkbox' => $status));
	}

	public function updating_parent_checkbox_status($id, $status)
	{
		$this->db->where('record_id', $id);
		$this->db->update('shopper_billing_records', array('billed_checkbox' => $status));
		if(!$status || $status==1) {
			$this->db->where('billing_record_id', $id);
			$this->db->update('services_to_bill', array('billed_checkbox' => $status));
		}
	}

	public function process_billing($customer_billings)
	{
		$messages = array();
		foreach($customer_billings as &$customer_id) {
			$customer_id = abs((int)$customer_id);

			$query = $this->db  ->select('b.last_aniv_bill_date, c.name, c.braintree_token')
								->where('b.customer_id', $customer_id)
								->join('customers as c', 'c.id=b.customer_id')
								->get('billing_dates as b');

			if($query->num_rows()) {
				$customer = $query->row();
				$aniv_date = $customer->last_aniv_bill_date;
				$items = $this->db->select('record_id')->where('customer_id', $customer_id)->get('shopper_billing_records')->result_array();
				if($items) {
					$sum = 0;
					$record_id_list = array();
                    $service_id_list = array();
					$payment_insert_data = array();
					foreach($items as &$item) {
						$record_id_list[] = $item['record_id'];
					}
					$services_to_bill = $this->db   ->select('id, charge')
													->where('billed_checkbox', 1)
													->where('billed', 0)
													->where_in('billing_record_id', $record_id_list)
													->get('services_to_bill')
													->result_array();
					if($services_to_bill) {

						foreach($services_to_bill as &$service) {
							$sum += $service['charge'];
						}

						$this->db->insert('billing_payments', array('customer_id' => $customer_id, 'type' => 1, 'status' => 0, 'amount' => $sum));
						$payment_id = $this->db->insert_id();

						foreach($services_to_bill as &$service) {
                            $service_id_list[] = $service['id'];
							$payment_insert_data[] = array('service_id' => $service['id'], 'payment_id' => $payment_id);
						}
						$this->db->insert_batch('billing_payment_services', $payment_insert_data);
						$result = $this->braintree_lib->add_payment($payment_id, $sum, $customer->braintree_token);

						if($result->success) {

                            $this->db->where_in('id', $service_id_list);
                            $this->db->update('services_to_bill', array('last_payment_id' => $payment_id));

							$this->transaction->add_transaction($result->transaction, $customer_id, $payment_id);
							$this->db->where('id', $payment_id);
							$this->db->update('billing_payments', array('status' => 1));
							$messages[] = array(
								'message' => $customer->name.' successfully paid, amount: '.$sum,
								'success' => true
							);

							foreach($items as &$item) {

								$this->db   ->where(array('billing_record_id' => $item['record_id'], 'billed_checkbox' => 1))
									->update('services_to_bill', array('billed' => 1));

								$no_billed_count = $this->db->where(array('billing_record_id' => $item['record_id'], 'billed' => 0))->count_all_results('services_to_bill');
								if(!$no_billed_count) {
									$this->db   ->where('record_id', $item['record_id'])
										->update('shopper_billing_records', array('billed' => 1, 'billed_checkbox' => 1));
								}
							}
							$no_billed_count = $this->db->where(array('customer_id' => $customer_id, 'billed' => 0))->count_all_results('shopper_billing_records');
							if(!$no_billed_count) {
								$date = date('Y-m-d', strtotime('+1 month', strtotime($aniv_date)));
								$this->db->where('customer_id', $customer_id)->update('billing_dates', array('last_aniv_bill_date' => $date));
							}

						} else {
							$messages[] = array(
								'message' => $customer->name.' payment error, amount: '.$sum.' <br /> '.$result->message,
								'success' => false
							);
						}
					}
				}
			}
		}
		return $messages;
	}


}