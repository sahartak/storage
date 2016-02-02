<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ad extends CI_Model
{

	public function get_ads()
	{
		return $this->db->get('ads')->result_array();
	}

	public function get_rules()
	{
		$rules = array(
			array(
				'field' => 'url',
				'label' => $this->lang->line('landing_page_url'),
				'rules' => 'trim|required|valid_url'
			),
			array(
				'field' => 'size',
				'label' => 'Size',
				'rules' => 'required|is_natural_no_zero'
			),
		);
		return $rules;
	}

	public function add_new($image)
	{
		$insert = array();
		$insert['image'] = $image;
		$insert['url'] = $this->input->post('url');
		$insert['visible'] = (int)$this->input->post('visible');
		$insert['size'] = $this->input->post('size');
		$this->db->insert('ads', $insert);
		return true;
	}

	public function delete($id)
	{
		$id = abs((int)$id);
		$name = $this->db->select('image')->get_where('ads', array('id' => $id))->row()->image;
		unlink('upload/ads/'.$name);
		$this->db->where('id', $id);
		$this->db->delete('ads');
		return true;
	}

	public function get_ad_details($id)
	{
		$id = abs((int)$id);
		$query = $this->db->get_where('ads', array('id' => $id));
		if($query->num_rows()) {
			return $query->row_array();
		}
		return false;
	}

	public function update($id, $image='')
	{
		$id = abs((int)$id);
		$update = array();
		if($image){
			$name = $this->db->select('image')->get_where('ads', array('id' => $id))->row()->image;
			unlink('upload/ads/'.$name);
			$update['image'] = $image;
			$update['size'] = $this->input->post('size');
		}
		$update['url'] = $this->input->post('url');
		$update['visible'] = (int)$this->input->post('visible');
		$this->db->where('id', $id);
		$this->db->update('ads', $update);
		return true;
	}

	public function get_allowed_sizes()
	{
		$sizes = [
			1 => [
				'width' => 300,
				'height' => 100
			],
			2 => [
				'width' => 728,
				'height' => 90
			],
			3 => [
				'width' => 468,
				'height' => 60
			],
			4 => [
				'width' => 234,
				'height' => 60
			]
		];
		return $sizes;
	}

	public function is_allowed_size($width, $height)
	{
		$this->db->select('name');
		$query = $this->db->get_where('ads_sizes', array('width' => $width, 'height' => $height));
		if($query->num_rows()) {
			return $query->row()->name;
		}
		return false;
	}

	public function get_ad_views($ad_id)
	{
		$date = new DateTime(date('Y-m-d'));
		$date->modify('-14 day');
		$min_date = $date->format('Y-m-d');

		$query = $this->db->get_where('ads_views', array('ad_id' => $ad_id, 'date >' => $min_date));
		if($query->num_rows()) {
			return $query->result_array();
		}
		return false;
	}

	public function get_upload_configs($file_name='')
	{
		$config = array();
		$config['upload_path']          = './upload/ads/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 2000;
		$config['max_width']            = 2000;
		$config['max_height']           = 2000;
		$config['overwrite']            = true;
		$config['file_ext_tolower']     = true;
		if($file_name) {
			$config['file_name'] = $file_name;
		}
		return $config;
	}

	public function get_ad_by_name($name)
	{
		return $this->db->get_where('ads', array('image' => $name))->row_array();
	}

}