<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'cart'));
		$this->load->model('app');
	}

	public function index($offset=0)
	{

		$this->load->library('pagination');
      //configure
      $config['base_url'] = base_url().'home/index';
      $config['total_rows'] = $this->app->get_all('tbl_item')->num_rows();
      $config['per_page'] = 9;
      $config['uri_segment'] = 3;

      $this->pagination->initialize($config);

      $data['link']  = $this->pagination->create_links();

		if ($this->session->userdata('user_login') == TRUE)
		{
			$data['fav'] = $this->app->get_where('tbl_favorit', ['id_user' => $this->session->userdata('user_id')]);
		}

      $data['data'] 		= $this->app->select_where_limit('tbl_item', ['aktif' => 1], $config['per_page'], $offset);
		$this->template->olshop('home', $data);

	}

	public function search()
	{
		if ($this->input->post('search', TRUE))
		{

			$this->session->set_userdata(['s' => $this->input->post('search', TRUE)]);
			$search = $this->session->userdata('s');

		} else {

			$search = $this->uri->segment(3);

		}

		if (!$this->uri->segment(4))
		{

			$offset = 0;

		} else {

			$offset = $this->uri->segment(4);

		}

		$this->load->library('pagination');
      //configure
      $config['base_url'] = base_url().'home/search/'.$search;
      $config['total_rows'] = $this->app->get_like('tbl_item', ['aktif' => 1], ['nama_item' => $search])->num_rows();
      $config['per_page'] = 9;
      $config['uri_segment'] = 4;

      $this->pagination->initialize($config);

      $data['link']  = $this->pagination->create_links();
      $data['data'] 	= $this->app->select_like('tbl_item', ['aktif' => 1], ['nama_item' => $search], $config['per_page'], $offset);
		$data['search'] = $search;
		$this->template->olshop('home', $data);

	}

	public function price()
	{

		if ($this->input->post('submit', TRUE) == 'Filter')
		{

			$this->session->set_userdata([
				'min' => $this->input->post('min', TRUE),
				'max' => $this->input->post('max', TRUE)
			]);

			$min = str_replace('.','',$this->session->userdata('min'));
			$max = str_replace('.','',$this->session->userdata('max'));

		} else {

			$min = $this->uri->segment(3);
			$max = $this->uri->segment(4);

		}

		if (!is_numeric($min) || !is_numeric($max))
		{

			redirect('home');

		}

		if (!$this->uri->segment(5))
		{

			$offset = 0;

		} else {

			$offset = $this->uri->segment(5);

		}

		$where = ['harga >=' => $min, 'harga <=' => $max, 'aktif' => 1];

		$this->load->library('pagination');
      //configure
      $config['base_url'] = base_url().'home/price/'.$min.'/'.$max;
      $config['total_rows'] = $this->app->get_where('tbl_item', $where)->num_rows();
      $config['per_page'] = 9;
      $config['uri_segment'] = 5;

      $this->pagination->initialize($config);

      $data['link']  = $this->pagination->create_links();
      $data['data'] 	= $this->app->select_where_limit('tbl_item', $where, $config['per_page'], $offset);
		$this->template->olshop('home', $data);

	}

	public function kategori()
	{

		if (!$this->uri->segment(3))
		{
			redirect('home');
		}

		$offset = (!$this->uri->segment(4)) ? 0 : $this->uri->segment(4);

		$url = strtolower(str_replace([' ','%20','_'], '-', $this->uri->segment(3)));

		$table = 'tbl_kategori k
						JOIN tbl_detail_kategori rk ON (k.id_kategori = rk.id_kategori)
						JOIN tbl_item i ON (rk.id_item = i.id_item)';
		//load library pagination
		$this->load->library('pagination');
		//configure
		$config['base_url'] 		= base_url().'home/kategori/'.$this->uri->segment(3);
		$config['total_rows'] 	= $this->app->get_where($table, ['i.aktif' => 1, 'k.url' => $url])->num_rows();
		$config['per_page'] 		= 9;
		$config['uri_segment'] 	= 4;

		$this->pagination->initialize($config);

		$data['link']  = $this->pagination->create_links();
		$data['data'] 	= $this->app->select_where_limit($table, ['i.aktif' => 1, 'k.url' => $url], $config['per_page'], $offset);
		$data['url'] = ucwords(str_replace(['-','%20','_'], ' ', $this->uri->segment(3)));

		$this->template->olshop('home', $data);

	}

	public function detail()
	{

		if (is_numeric($this->uri->segment(3)))
		{

			$id = $this->uri->segment(3);

			$items = $this->app->get_where('tbl_item', array('link' => $id));
			$get = $items->row();

			$table = "tbl_detail_kategori rk
							JOIN tbl_kategori k ON (k.id_kategori = rk.id_kategori)";

			$data['kat'] 	= $this->app->get_where($table, array('rk.id_item' => $get->id_item));
			$data['data'] 	= $items;
			$data['img'] 	= $this->app->get_where('tbl_img', ['id_item' => $get->id_item]);

			$this->template->olshop('item_detail', $data);

		} else {

			redirect('home');

		}

	}

	public function favorite()
	{
		//paksa login
		if ($this->session->userdata('user_login') != TRUE)
		{
			redirect('home/login');
		}
		//validasi link
		if (!is_numeric($this->uri->segment(3)))
		{
			redirect('home');
		}
		//ambil data
		$get = $this->app->get_where('tbl_item', ['link' => $this->uri->segment(3)])->row();

		//cek data
		$where = [
			'id_user' => $this->session->userdata('user_id'),
			'id_item' => $get->id_item
		];

		$cek = $this->app->get_where('tbl_favorit', $where)->num_rows();

		if ($cek > 0)
		{
			$this->session->set_flashdata('alert', 'Item dihapus dari daftar favorite');
			//hapus data
			$this->app->delete('tbl_favorit', $where);
		} else {
			//masukkan data ke variabel
			$data = array(
				'id_user' => $this->session->userdata('user_id'),
				'id_item' => $get->id_item
			);

			$this->session->set_flashdata('success', 'Item ditambahkan ke daftar favorite');
			//insert DataBase
			$this->app->insert('tbl_favorit', $data);
		}

		echo '<script type="text/javascript">window.history.go(-1)</script>';
	}

	public function list_fav()
	{
		if (!$this->session->userdata('user_login'))
      {
         redirect('home/login');
      }

		//ambil data
		$table = 'tbl_favorit f
						JOIN tbl_item i ON (f.id_item = i.id_item)';

		$data['data'] = $this->app->get_where($table, ['aktif' => 1, 'f.id_user' => $this->session->userdata('user_id')]);

		$data['fav'] = $this->app->get_where('tbl_favorit', ['id_user' => $this->session->userdata('user_id')]);

		$this->template->olshop('fav', $data);

	}

	public function registrasi()
	{

		if($this->input->post('submit', TRUE) == 'Submit')
		{

			$this->load->library('form_validation');

			$this->form_validation->set_rules('nama1', 'Nama Depan', "required|min_length[3]|regex_match[/^[a-zA-Z'.]+$/]");
			$this->form_validation->set_rules('nama2', 'Nama Belakang', "regex_match[/^[a-zA-Z'.]+$/]");
			$this->form_validation->set_rules('user', 'Username', "required|min_length[5]|regex_match[/^[a-zA-Z0-9]+$/]");
			$this->form_validation->set_rules('email', 'Email', "required|valid_email");
			$this->form_validation->set_rules('pass1', 'Password', "required|min_length[5]");
			$this->form_validation->set_rules('pass2', 'Konfirmasi Password', "required|matches[pass1]");
			$this->form_validation->set_rules('telp', 'No. Handphone', "required|min_length[8]|numeric");
			$this->form_validation->set_rules('alamat', 'Alamat', "required|min_length[8]");

			if ($this->form_validation->run() == TRUE)
			{
				$data = array(
					'username' 	=> $this->input->post('user', TRUE),
					'nama_user' => $this->input->post('nama1', TRUE).' '.$this->input->post('nama2', TRUE),
					'email' 	=> $this->input->post('email', TRUE),
					'password' 	=> password_hash($this->input->post('pass1', TRUE), PASSWORD_DEFAULT, ['cost' => 10]),
					'telp' 		=> $this->input->post('telp', TRUE),
					'alamat' 	=> $this->input->post('alamat', TRUE)
				);

				if ($this->app->insert('tbl_user', $data))
				{
					$halaman = 'reg_success';
				} 
				else {
					echo '<script type="text/javascript">alert("Username / Email sudah digunakan!");</script>';
					$halaman = 'register';
				}

			} else {

				$halaman = 'register';

			}

		} else {

			$halaman = 'register';

		}

		if ($this->session->userdata('user_login') == TRUE)
      {
         redirect('home');
      }

		$data = array(
			'user' 	=> $this->input->post('user', TRUE),
			'nama1' 	=> $this->input->post('nama1', TRUE),
			'nama2' 	=> $this->input->post('nama2', TRUE),
			'email' 	=> $this->input->post('email', TRUE),
			'telp' 	=> $this->input->post('telp', TRUE),
			'alamat' => $this->input->post('alamat', TRUE),
		);

		$this->template->olshop($halaman, $data);

	}

	public function login()
	{

		if ($this->input->post('submit') == 'Submit')
      {

         $user  = $this->input->post('username', TRUE);
         $pass  = $this->input->post('password', TRUE);
			$where = "( username = '".$user."' || email = '".$user."' )";

			$cek 	 = $this->app->get_where('tbl_user', $where);
			
         if ($cek->num_rows() > 0)
			{

            $data = $cek->row();

            if (password_verify($pass, $data->password))
            {

               $datauser = array (
						'user_id' 		=> $data->id_user,
                  'name' 			=> $data->nama_user,
                  'user_login' 	=> TRUE
               );

               $this->session->set_userdata($datauser);

               redirect('home');

            } else {

               echo '<script type="text/javascript">alert("Password ditolak");</script>';

            }

         } else {

				echo '<script type="text/javascript">alert("Username tidak dikenali");</script>';

			}

		}

      if ($this->session->userdata('user_login') == TRUE)
      {
         redirect('home');
      }

		$profil['data'] = $this->app->get_all('tbl_profil_toko');

		$this->load->view('login', $profil);

	}

	public function profil()
	{

		if (!$this->session->userdata('user_login'))
      {
         redirect('home/login');
      }

		$get = $this->app->get_where('tbl_user', array('id_user' => $this->session->userdata('user_id')))->row();

		if($this->input->post('submit', TRUE) == 'Submit')
		{

			$this->load->library('form_validation');

			$this->form_validation->set_rules('nama1', 'Nama Depan', "required|min_length[3]|regex_match[/^[a-zA-Z'.]+$/]");
			$this->form_validation->set_rules('nama2', 'Nama Belakang', "regex_match[/^[a-zA-Z'.]+$/]");
			$this->form_validation->set_rules('pass', 'Masukkan Password Anda', "required|min_length[5]");
			$this->form_validation->set_rules('telp', 'Telp', "required|min_length[8]|numeric");
			$this->form_validation->set_rules('alamat', 'Alamat', "required|min_length[10]");

			if ($this->form_validation->run() == TRUE)
			{

				if (password_verify($this->input->post('pass', TRUE), $get->password))
				{

					$data = array(
						'nama_user' 	=> $this->input->post('nama1', TRUE).' '.$this->input->post('nama2', TRUE),
						'telp' 		=> $this->input->post('telp', TRUE),
						'alamat' 	=> $this->input->post('alamat', TRUE)
					);
					$where = ['id_user' => $this->session->userdata('user_id')];

					if ($this->app->update('tbl_user', $data, $where))
					{

						$this->session->set_userdata(array('name' => $this->input->post('nama1', TRUE).' '.$this->input->post('nama2', TRUE)));

						redirect('home');

					} else {

						echo '<script type="text/javascript">alert("Username / Email tidak tersedia");</script>';

					}

				} else {

					echo '<script type="text/javascript">alert("Password Salah...");window.location.replace("'.base_url().'/home/logout")</script>';

				}

			}

		}

		$name 			= explode(' ', $get->nama_user);
		$data['nama1'] = $name[0];
		$data['nama2'] = $name[1];
		$data['user'] 	= $get->username;
		$data['email'] = $get->email;
		$data['telp'] 	= $get->telp;
		$data['alamat']= $get->alamat;

		$this->template->olshop('user_profil', $data);

	}

	public function password()
	{

		if (!$this->session->userdata('user_login'))
      {
         redirect('home/login');
      }

		if ($this->input->post('submit', TRUE) == 'Submit')
		{

			$this->load->library('form_validation');
			//validasi form
			$this->form_validation->set_rules('pass1', 'Password Baru', 'required|min_length[5]');
			$this->form_validation->set_rules('pass2', 'Ketik Ulang Password Baru', 'required|matches[pass1]');
			$this->form_validation->set_rules('pass3', 'Password Lama', 'required');

			if ($this->form_validation->run() == TRUE)
			{

				$get_data = $this->app->get_where('tbl_user', array('id_user' => $this->session->userdata('user_id')))->row();

				if (!password_verify($this->input->post('pass3',TRUE), $get_data->password))
				{

					echo '<script type="text/javascript">alert("Password lama yang anda masukkan salah");window.location.replace("'.base_url().'home/logout")</script>';

				} else {

					$pass = $this->input->post('pass1', TRUE);
					$data['password'] = password_hash($pass, PASSWORD_DEFAULT, ['cost' => 10]);
					$cond = array('id_user' => $this->session->userdata('user_id'));

					$this->app->update('tbl_user', $data, $cond);

					redirect('home/logout');

				}

			}

		}

		$this->template->olshop('pass');

	}

	public function transaksi()
	{

		if (!$this->session->userdata('user_id'))
		{
			redirect('home');
		}

		$table		 = "tbl_order o JOIN tbl_user u ON (o.email = u.email)";
		$data['get'] = $this->app->get_where($table, ['id_user' => $this->session->userdata('user_id')]);

		$this->template->olshop('transaksi', $data);

	}

	public function detail_transaksi()
	{

		if (!is_numeric($this->uri->segment(3)))
		{
			redirect('home');
		}

		$table = "tbl_order o
						LEFT JOIN tbl_detail_order do ON (o.id_order = do.id_order)
						LEFT JOIN tbl_item i ON (do.id_item = i.id_item)";

		$data['get'] = $this->app->get_where($table, ['o.id_order' => $this->uri->segment(3)]);

		//echo $this->db->last_query();
		//die();
		$this->template->olshop('detail_transaksi', $data);

	}

	public function hapus_transaksi()
	{

		if (!is_numeric($this->uri->segment(3)))
		{
			redirect('home');
		}
		//kembalikan stok
		$table 	= 'tbl_detail_order do
							JOIN tbl_item i ON (do.id_item = i.id_item)';
		$get 		= $this->app->get_where($table, ['id_order' => $this->uri->segment(3)]);

		foreach ($get->result() as $key) {
			//jumlahkan stok
			$stok = ($key->qty + $key->stok);
			//update stok
			$this->app->update('tbl_item', ['stok' => $stok], ['id_item' => $key->id_item]);
		}

		$tables = array('tbl_order', 'tbl_detail_order');
		$this->app->delete($tables, ['id_order' => $this->uri->segment(3)]);

		redirect('home/transaksi');

	}

	public function transaksi_selesai()
	{

		if (!is_numeric($this->uri->segment(3)))
		{
			redirect('home');
		}

		$this->app->update('tbl_order', ['status_proses' => 'selesai'], ['id_order' => $this->uri->segment(3)]);

		redirect('home/transaksi');

	}

	public function upload_bukti()
	{
		if ($this->input->post('submit', TRUE) == 'Submit')
		{
			$this->load->library('form_validation');

			$this->form_validation->set_rules('id_invoice', 'No. Invoice / Id Pemesanan', 'required|min_length[10]');

			if ($this->form_validation->run() == TRUE)
         	{
				//cek data
				$get = $this->app->get_where('tbl_order', ['id_order' => $this->input->post('id_invoice', TRUE)]);
				$hitung = $get->num_rows();

				if ($hitung > 0)
				{
					//fetch data
					$detail = $get->row();

					$config['upload_path'] = './assets/bukti/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = '2048';
					$config['file_name'] = 'bukti'.$detail->id_order;

					$this->load->library('upload', $config);

					if ($this->upload->do_upload('bukti'))
					{
						$gbr = $this->upload->data();
						//proses insert data item
			         $bukti = array ('bukti' => $gbr['file_name']);
						$where = array ('id_order' => $detail->id_order);
						//update data
						$update = $this->app->update('tbl_order', $bukti, $where);

						if ($update)
						{
							$admin 	= $this->app->get_where('tbl_admin', ['id_admin' => 1])->row();
							$profil 	= $this->app->get_where('tbl_profil_toko', ['id_profil' => 1])->row();

							//proses
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
							$tanggal = date('d - m - Y');

			            $this->email->from($profil->email_toko, $profil->nama_toko);
			            $this->email->to($admin->email_admin);
			            $this->email->subject('Status Pembayaran');
			            $this->email->message(
			               'Pesanan dengan ID. '.$detail->id_order.' Telah dibayar pada tanggal '.$tanggal.', silahkan cek menu transaksi untuk melihat bukti pembayaran
								'
			            );

							if ($this->email->send())
							{
								'<script type="text/javascript">alert("Bukti Pembayaran Berhasil Diunggah...");window.location.replace("'.base_url().'")</script>';
							}

						} else {

							echo '<script type="text/javascript">alert("Maaf Telah Terjadi Kesalahan... silahkan ulangi lagi")</script>';

						}

					} else {

						echo '<script type="text/javascript">alert("Bukti Gagal Diunggah...")</script>';

					}

				} else {

					echo '<script type="text/javascript">alert("Id Pemesanan Tidak dikenali..")</script>';

				}
			}
		}

		$data['id_invoice'] = $this->input->post('id_invoice', TRUE);
		$this->template->olshop('up_bukti', $data);
	}

	public function logout()
	{

		$this->session->sess_destroy();
		redirect('home');

	}
}
