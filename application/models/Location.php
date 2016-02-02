<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends CI_Model
{

	public function get_locations()
	{
		return $this->db->get('locations')->result_array();
	}

}