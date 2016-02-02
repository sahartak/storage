<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ads extends CI_Controller
{

	public $current_lang = 'english';

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('user_logged')) {
            redirect(site_url('login?return_url='.current_url()));
		}
		$this->lang->load('names', $this->current_lang);
		$this->load->model('ad');
	}

	public function index()
	{
		$scripts = array(
			base_url('assets/global/scripts/datatable.js'),
			base_url('assets/global/plugins/datatables/datatables.min.js'),
			base_url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'),
			base_url('assets/pages/scripts/table-datatables-buttons.min.js'),
		);

		$styles = array(
			base_url('assets/global/plugins/datatables/datatables.min.cs'),
			base_url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')
		);

		$active = 'ads';
		$ads = $this->ad->get_ads();
		$this->view_load->view('ads/index', compact('scripts', 'styles', 'ads', 'active'));
	}

	public function add()
	{
		$this->load->library('form_validation');
		$sizes = $this->ad->get_allowed_sizes();
		$rules = $this->ad->get_rules();
		$this->form_validation->set_rules($rules);
		$upload_error = '';
		if ($this->form_validation->run()) {

            if(isset($_FILES['userfile']['tmp_name']) && $_FILES['userfile']['tmp_name']) {

				$file_name = md5_file($_FILES['userfile']['tmp_name']);
				$config = $this->ad->get_upload_configs($file_name);

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('userfile')) {
					$upload = $this->upload->data();
					$size = $this->input->post('size');

					if($this->ad->get_ad_by_name($upload['file_name'])) {
						$upload_error = 'File already exist';

					} elseif($upload['image_width'] != $sizes[$size]['width'] || $upload['image_height'] != $sizes[$size]['height']) {
						unlink($upload['full_path']);
						$upload_error = $this->lang->line('not_allowed_size');

					} elseif($this->ad->add_new($upload['file_name'])) {
						$this->session->set_flashdata('added', true);
						redirect(site_url('ads'));
					}

				} else {
					$upload_error = $this->upload->display_errors();
				}

			}

		}
		$scripts = array(
			base_url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js'),
			base_url('assets/pages/scripts/add_employee.js')
		);
		$active = 'ads_add';

		$this->view_load->view('ads/add', compact('scripts', 'active', 'upload_error', 'sizes'));
	}

	public function delete($id=0)
	{
		$this->ad->delete($id);
		if($this->ad->delete($id))
			redirect(site_url('ads'));
	}

	public function edit($id=0)
	{
		$ad = $this->ad->get_ad_details($id);
		if(!$ad) {
			show_404();
		}

		$this->load->library('form_validation');

		$rules = $this->ad->get_rules();
		$this->form_validation->set_rules($rules);
		$sizes = $this->ad->get_allowed_sizes();
		if ($this->form_validation->run()) {

			if(isset($_FILES['userfile']['tmp_name']) && $_FILES['userfile']['tmp_name']) {

				$file_name = md5_file($_FILES['userfile']['tmp_name']);
				$config = $this->ad->get_upload_configs($file_name);

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('userfile')) {
					$upload = $this->upload->data();
					$size = $this->input->post('size');

					if($this->ad->get_ad_by_name($upload['file_name'])) {
						$upload_error = 'File already exist';

					} elseif($upload['image_width'] != $sizes[$size]['width'] || $upload['image_height'] != $sizes[$size]['height']) {
						unlink($upload['full_path']);
						$upload_error = $this->lang->line('not_allowed_size');

					} elseif($this->ad->update($id, $upload['file_name'])) {
						$this->session->set_flashdata('updated', true);
						redirect(site_url('ads'));
					}

				} else {
					$upload_error = $this->upload->display_errors();
				}

			} elseif($this->ad->update($id)) {
				$this->session->set_flashdata('updated', true);
				redirect(site_url('ads'));
			}
		}
		$scripts = array(
			base_url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js'),
			base_url('assets/pages/scripts/add_employee.js')
		);

		$this->view_load->view('ads/edit', compact('ad', 'scripts', 'sizes', 'upload_error'));
	}

	public function chart($ad_id = 0)
	{
		$ad_id = abs((int)$ad_id);
		$ad = $this->ad->get_ad_details($ad_id);
		if(!$ad) {
			show_404();
		}
		$scripts = array(
			base_url('assets/global/plugins/morris/morris.min.js'),
			base_url('assets/global/plugins/morris/raphael-min.js'),
			base_url('assets/pages/scripts/ad_views_chart.js')
		);
		$this->view_load->view('ads/chart', compact('ad', 'scripts'));
	}

	public function get_charts_view($ad_id = 0)
	{
		$views = $this->ad->get_ad_views($ad_id);
		echo json_encode($views);
	}

}
