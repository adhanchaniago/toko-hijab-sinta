<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lost_Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
      $this->load->model('admin');
	}

   public function index()
   {
      if ($this->input->post('submit', TRUE) == 'Submit')
      {
         $this->form_validation->set_rules('email_admin', 'Email', 'required|valid_email');

         if ($this->form_validation->run() == TRUE)
         {
            $get = $this->admin->get_where('tbl_admin', array('email_admin' => $this->input->post('email_admin', TRUE)));

            if ($get->num_rows() > 0)
            {
               //proses
					$profil = $this->admin->get_where('tbl_profil_toko', ['id_profil' => 1])->row();
               $this->load->library('email');

               $config['charset'] = 'utf-8';
               $config['useragent'] = $profil->nama_toko;
               $config['protocol'] = 'smtp';
               $config['mailtype'] = 'html';
               $config['smtp_host'] = 'ssl://smtp.gmail.com';
               $config['smtp_port'] = '465';
               $config['smtp_timeout'] = '5';
               $config['smtp_user'] = $profil->email_toko; //isi dengan email gmail
               $config['smtp_pass'] = $profil->pass_toko; //isi dengan password
               $config['crlf'] = "\r\n";
               $config['newline'] = "\r\n";
               $config['wordwrap'] = TRUE;

               $this->email->initialize($config);

               $key = md5(md5(time()));

               $this->email->from($profil->email_toko, $profil->nama_toko);
               $this->email->to($this->input->post('email_admin', TRUE));
               $this->email->subject('Reset Password');
               $this->email->message(
                  '<h4>Salam Admin</h4><br>
                  Anda telah melakukan permintaan untuk mereset password akun Tokohijab . Untuk melanjutkan prosesnya, <a href="'.base_url().'lost_admin/reset/'.$key.'">silahkan mengikuti link ini.</a> . <br>Namun bila anda tidak pernah meminta proses ini, maka kami berharap anda mengabaikan email ini.<br><br>
                  Terimakasih,<br>
                  Tokohijab'
               );

               if ($this->email->send())
               {
                  $data['reset_admin'] = $key;
                  $cond['email_admin'] = $this->input->post('email_admin', TRUE);
                  $this->admin->update('tbl_admin', $data, $cond);

                  $this->session->set_flashdata('success', "Email berhasil dikirim.. silahkan cek email anda");
               } else {
                  $this->session->set_flashdata('alert', "Email gagal dikirim... silahkan coba lagi..");
               }

            } else {
               //pesan
               $this->session->set_flashdata('alert', "email yang anda masukkan tidak terdaftar");
            }
         }
      }
		$data['data'] = $this->admin->get_all('tbl_profil_toko');
		$this->load->view('admin/lost_pass_admin', $data);
   }

	public function reset()
	{
		if ($this->uri->segment(3))
		{
			$this->load->view('admin/reset_form');

			if ($this->input->post('submit', TRUE) == 'Submit')
			{
				$this->form_validation->set_rules('pass1', 'Password Baru', 'required|min_length[5]');
				$this->form_validation->set_rules('pass2', 'Ketik Ulang Password', 'required|matches[pass1]');

				if ($this->form_validation->run() == TRUE)
				{
					$pass = $this->input->post('pass1', TRUE);
					$data['password'] = password_hash($pass, PASSWORD_DEFAULT, ['cost' => 10]);
					$data['reset_admin'] = '';

					$cond['reset_admin'] = $this->uri->segment(3);

					$this->admin->update('tbl_admin', $data, $cond);

					$this->session->set_flashdata('success', "Password berhasil diperbarui");

					redirect('login');
				}
			}
		} else {
			redirect('lost_admin');
		}
	}
}
