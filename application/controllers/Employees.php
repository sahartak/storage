<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends CI_Controller
{

	public $current_lang = 'english';

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('user_logged')) {
			redirect(site_url('login?return_url='.current_url()));
		}
		$this->lang->load('names', $this->current_lang);
		$this->load->model('employee');
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

        $active = 'employees';
		$employees = $this->employee->get_employees();
		$this->view_load->view('employees/index', compact('scripts', 'styles', 'employees', 'active'));
	}

	public function add()
	{
		if(!$this->session->employee->role) {
			show_404();
		}
		$this->load->library('form_validation');

		$rules = $this->employee->get_rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			if($this->employee->add_new()) {
				$this->session->set_flashdata('added', true);
				redirect(site_url('employees'));
			}
		}
		$scripts = array(
			base_url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js'),
			base_url('assets/pages/scripts/add_employee.js')
		);
        $active = 'employees_add';
		$this->view_load->view('employees/add', compact('scripts', 'active'));
	}

	public function delete($id=0)
	{
		if(!$this->session->employee->role) {
			show_404();
		}
		$this->employee->delete($id);
		if($this->employee->delete($id))
			redirect(site_url('employees'));
	}

	public function edit($id=0)
	{
		if(!$this->session->employee->role) {
			show_404();
		}
		$employee = $this->employee->get_employee_details($id);
		if(!$employee) {
			show_404();
		}

		$this->load->library('form_validation');

		$rules = $this->employee->get_edit_rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			if($this->employee->update($id)) {
				$this->session->set_flashdata('updated', true);
				redirect(site_url('employees'));
			}
		}
		$scripts = array(
			base_url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js'),
			base_url('assets/pages/scripts/add_employee.js')
		);
		$this->view_load->view('employees/edit', compact('employee', 'scripts'));

	}

}
