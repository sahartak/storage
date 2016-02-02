<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrier extends CI_Model
{

	public function get_carriers()
	{
		return $this->db->get('carriers')->result_array();
	}

}