<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation'));
		$this->load->model('admin');
	}

	public function index()
	{
		$this->cek_login();

		$data['user'] = $this->admin->count('tbl_user');
		$data['tag'] = $this->admin->count('tbl_kategori');
		$data['item'] = $this->admin->count('tbl_item');
		$data['trans'] = $this->admin->count_where('tbl_order', ['status_proses' => 'proses']);
		$data['last'] = $this->admin->last('tbl_order', 3, 'tgl_pesan');

		$this->template->admin('admin/home', $data);
	}

	public function edit_profil()
	{
		$this->cek_login();

		if ($this->input->post('submit', TRUE) == 'Submit')
		{
			//validasi form
			$this->form_validation->set_rules('username_admin', 'username_admin', 'required|trim|min_length[3]');
			$this->form_validation->set_rules('nama_admin', 'Nama Admin', "required|trim|min_length[3]|regex_match[/^[a-z A-Z.']+$/]");
			$this->form_validation->set_rules('email_admin', 'Email Admin', 'required|trim|valid_email');
			$this->form_validation->set_rules('password_admin', 'Password Admin', 'required');

			if ($this->form_validation->run() == TRUE)
			{
				$get_data = $this->admin->get_where('tbl_admin', array('id_admin' => $this->session->userdata('admin')))->row();

				if (!password_verify($this->input->post('password_admin',TRUE), $get_data->password_admin))
				{
					echo '<script type="text/javascript">alert("Password yang anda masukkan salah");window.location.replace("'.base_url().'login/logout")</script>';
				} else {

					$data = array(
						'username_admin' => $this->input->post('username_admin', TRUE),
						'nama_admin' => $this->input->post('nama_admin', TRUE),
						'email_admin' => $this->input->post('email_admin', TRUE),
					);

					$cond = array('id_admin' => $this->session->userdata('admin'));

					$this->admin->update('tbl_admin', $data, $cond);

					redirect('administrator');
				}
			}

		}

		$get = $this->admin->get_where('tbl_admin', array('id_admin' => $this->session->userdata('admin')))->row();

		$data['username_admin'] = $get->username_admin;
		$data['nama_admin'] = $get->nama_admin;
		$data['email_admin'] = $get->email_admin;

		$this->template->admin('admin/edit_profil', $data);
	}

	public function update_password()
	{
		$this->cek_login();

		if ($this->input->post('submit', TRUE) == 'Submit')
		{
			//validasi form

			$this->form_validation->set_rules('password1', 'Password Baru', 'required');
			$this->form_validation->set_rules('password2', 'Password Lama', 'required');

			if ($this->form_validation->run() == TRUE)
			{
				$get_data = $this->admin->get_where('tbl_admin', array('id_admin' => $this->session->userdata('admin')))->row();

				if (!password_verify($this->input->post('password2',TRUE), $get_data->password_admin))
				{
					echo '<script type="text/javascript">alert("Password lama yang anda masukkan salah");window.location.replace("'.base_url().'login/logout")</script>';

				} else {

					$pass = $this->input->post('password1', TRUE);
					$data['password_admin'] = password_hash($pass, PASSWORD_DEFAULT, ['cost' => 10]);
					$cond = array('id_admin' => $this->session->userdata('admin'));

					$this->admin->update('tbl_admin', $data, $cond);

					redirect('login/logout');
				}
			}
		}
		$this->template->admin('admin/update_pass');
	}

	public function report()
	{
		$data = $this->admin->report();

		foreach ($data->result() as $key) {
			echo ($key->total - $key->biaya);
		}
	}

	function cek_login()
	{
		if (!$this->session->userdata('admin'))
		{
			redirect('login');
		}
	}
}
