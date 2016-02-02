<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Model
{


	public function add_transaction($transaction, $customer_id, $order_id=0)
	{
		$insert = array();
		$insert['transaction_id'] = $transaction->id;
		$insert['customer_id'] = $customer_id;
		$insert['order_id'] = $order_id;
		$insert['type'] = $transaction->type;
		$insert['amount'] = $transaction->amount;
		$insert['currencyIsoCode'] = $transaction->currencyIsoCode;
		$insert['creditCardNumber'] = $transaction->creditCardDetails->maskedNumber;
		$this->db->insert('transactions', $insert);
		return $this->db->insert_id();
	}

	public function get_transactions()
	{
		$search_fields = array('id', 'transaction_id', 'customer_id', 'order_id', 'type', 'amount', 'currencyIsoCode', 'creditCardNumber');
		foreach($search_fields as $field) {
			if($value = $this->input->get($field)) {
				$this->db->where($field, $value, 'none');
			}
		}
		if($value = $this->input->get('date_from')) {
			$this->db->where('created_date >', $value);
		}
		if($value = $this->input->get('date_to')) {
			$this->db->where('created_date <', $value);
		}
		$query = $this->db->get('transactions');
		return $query->result();
	}

	public function get_transaction_by_id($transaction_id)
	{
		$query = $this->db->get_where('transactions', array('transaction_id' => $transaction_id));
		return $query->row();
	}


	public function get_billing_payment($id)
	{
		$payment = array();
		$query = $this->db  ->select('bp.*, c.name')
							->join('customers as c', 'c.id=bp.customer_id')
							->where('bp.id', $id)
							->get('billing_payments as bp');
		if($query->num_rows()) {
			$payment = $query->row_array();
			$payment['services'] = $this->db->select('bps.service_id, stb.*, sbr.shipment_id, sbr.item_id')
											->join('services_to_bill as stb', 'stb.id=bps.service_id')
											->join('shopper_billing_records as sbr', 'sbr.record_id = stb.billing_record_id')
											->where('bps.payment_id', $id)
											->get('billing_payment_services as bps')
											->result_array();
            $payment['transactions'] = $this->db->get_where('transactions', array('order_id' => $id))->result();
		}
		return $payment;
	}

    public function do_service_refund($service_id)
    {
        $result_message = array();
        $service = $this->db ->select('charge')
                            ->where(array('id' => $service_id, 'billed' => 1))
                            ->get('services_to_bill')
                            ->row();
        if($service) {
            $payment_id = $this->db ->select('payment_id')
                                    ->where('service_id', $service_id)
                                    ->group_by('service_id')
                                    ->order_by('id', 'desc')
                                    ->get('billing_payment_services')
                                    ->row()
                                    ->payment_id;

            $transaction = $this->db ->select('transaction_id, customer_id')
                                     ->where(array('order_id' => $payment_id, 'type' => 'sale'))
                                     ->get('transactions')
                                     ->row();

            $result = $this->braintree_lib->refund($transaction->transaction_id, $service->charge);
            if($result->success) {
                $this->db->where('id', $service_id);
                $this->db->update('services_to_bill', array('billed' => 2));
                $this->add_transaction($result->transaction, $transaction->customer_id, $payment_id);
                $result_message['success'] = true;
                $result_message['message'] = 'successfully refunded';
            } else {
                $result_message['success'] = false;
                $result_message['message'] = $result->message;
            }
        } else {
            $result_message['success'] = false;
            $result_message['message'] = 'service not founded';
        }
        return $result_message;
    }

}