<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Model
{

	public function get_secure_pass($password)
	{
		$salt = 'secure_salt_';
		$salt = md5($salt.$password);
		$password = password_hash($password, PASSWORD_BCRYPT, array('salt' => $salt));
		return $password;
	}

	public function authenticate($login, $password)
	{
		$password = $this->get_secure_pass($password);
		$query = $this->db->get_where('employees', array('login' => $login, 'password' => $password));
		if($query->num_rows()) {
			$employee = $query->row();
			$this->session->set_userdata('employee', $employee);
			$this->session->set_userdata('user_logged', true);
			return true;
		}
		return false;
	}

	public function get_employees()
	{
		return $this->db->get('employees')->result_array();
	}

	public function get_rules()
	{
		$rules = array(
			array(
				'field' => 'login',
				'label' => $this->lang->line('login'),
				'rules' => 'trim|required|htmlspecialchars|is_unique[employees.login]'
			),
			array(
				'field' => 'password',
				'label' => $this->lang->line('password'),
				'rules' => 'trim|required|min_length[5]',
			),
			array(
				'field' => 'password_confirm',
				'label' => $this->lang->line('password_confirm'),
				'rules' => 'trim|required|matches[password]'
			),
            array(
                'field' => 'first_name',
                'label' => $this->lang->line('first_name'),
                'rules' => 'trim|required|htmlspecialchars'
            ),
            array(
                'field' => 'last_name',
                'label' => $this->lang->line('last_name'),
                'rules' => 'trim|required|htmlspecialchars'
            ),
			array(
				'field' => 'email',
				'label' => $this->lang->line('email'),
				'rules' => 'trim|required|valid_email'
			),
			array(
				'field' => 'phone',
				'label' => $this->lang->line('phone'),
				'rules' => 'trim|required|htmlspecialchars'
			),
            array(
                'field' => 'address',
                'label' => $this->lang->line('address'),
                'rules' => 'trim|required|htmlspecialchars'
            ),
            array(
                'field' => 'role',
                'label' => $this->lang->line('role'),
                'rules' => 'required|is_natural'
            ),
		);
		return $rules;
	}

    public function get_edit_rules()
    {
        $rules = array(
            array(
                'field' => 'login',
                'label' => $this->lang->line('login'),
                'rules' => 'trim|required|htmlspecialchars'
            ),
            array(
                'field' => 'password',
                'label' => $this->lang->line('password'),
                'rules' => 'trim|min_length[5]',
            ),
            array(
                'field' => 'password_confirm',
                'label' => $this->lang->line('password_confirm'),
                'rules' => 'trim|matches[password]'
            ),
            array(
                'field' => 'first_name',
                'label' => $this->lang->line('first_name'),
                'rules' => 'trim|required|htmlspecialchars'
            ),
            array(
                'field' => 'last_name',
                'label' => $this->lang->line('last_name'),
                'rules' => 'trim|required|htmlspecialchars'
            ),
            array(
                'field' => 'email',
                'label' => $this->lang->line('email'),
                'rules' => 'trim|required|valid_email'
            ),
            array(
                'field' => 'phone',
                'label' => $this->lang->line('phone'),
                'rules' => 'trim|required|htmlspecialchars'
            ),
            array(
                'field' => 'address',
                'label' => $this->lang->line('address'),
                'rules' => 'trim|required|htmlspecialchars'
            ),
            array(
                'field' => 'role',
                'label' => $this->lang->line('role'),
                'rules' => 'required|is_natural'
            ),
        );
        return $rules;
    }

    public function add_new()
    {
        $insert = array();
        $insert['login'] = $this->input->post('login', true);
        $insert['password'] = $this->get_secure_pass($this->input->post('password'));
        $insert['email'] = $this->input->post('email', true);
        $insert['phone'] = $this->input->post('phone', true);
        $insert['first_name'] = $this->input->post('first_name', true);
        $insert['last_name'] = $this->input->post('last_name', true);
        $insert['address'] = $this->input->post('address', true);
        $insert['role'] = $this->input->post('role', true);
        $this->db->insert('employees', $insert);
        return true;
    }

    public function delete($id)
    {
        $id = abs((int)$id);
        $this->db->where('id', $id);
        $this->db->delete('employees');
        return true;
    }

    public function get_employee_details($id)
    {
        $id = abs((int)$id);
        $query = $this->db->get_where('employees', array('id' => $id));
        if($query->num_rows()) {
            return $query->row_array();
        }
        return false;
    }

    public function update($id)
    {
        $id = abs((int)$id);
        $update = array();
        if($this->input->post('password')) {
            $update['password'] = $this->get_secure_pass($this->input->post('password'));
        }
        $update['login'] = $this->input->post('login', true);
        $update['email'] = $this->input->post('email', true);
        $update['phone'] = $this->input->post('phone', true);
        $update['first_name'] = $this->input->post('first_name', true);
        $update['last_name'] = $this->input->post('last_name', true);
        $update['address'] = $this->input->post('address', true);
        $update['role'] = $this->input->post('role', true);
        $this->db->where('id', $id);
        $this->db->update('employees', $update);
        return true;
    }
}