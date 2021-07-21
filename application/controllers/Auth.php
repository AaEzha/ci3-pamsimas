<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function index()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['konten'] = "auth/login";
			$this->load->view('home/header', $data ?? "");
		} else {
			// validasinya success
			$this->_login();
		}
	}
	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		// jika usernya ada
		if ($user) {

			//jika usernya aktif
			if ($user['is_active'] == 1) {

				//cek password
				if (password_verify($password, $user['password'])) {

					$data = [
						'user_id' => $user['id'],
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('admin');
					} else if ($user['role_id'] == 3) {
						redirect('koordinator');
					} else {
						redirect('user');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" 
                    role="alert"> Wrong password </div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" 
            role="alert"> This email has not been activated </div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" 
            role="alert"> Email is not registered </div>');
			redirect('auth');
		}
	}


	public function registration()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'This email has already registered!'
		]);
		// $this->form_validation->set_rules('nik', 'NIK', 'required|trim|is_unique[pelanggan.nik]', [
		//     'is_unique' => 'This NIK has already registered!'
		// ]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
			'matches' => 'Password tidak sesuai!',
			'min_length' => 'Password terlalu pendek!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['konten'] = "auth/registration";
			$this->load->view('home/header', $data ?? "");

			// $this->load->view('templates/auth_header');
			// $this->load->view('auth/registration');
			// $this->load->view('templates/auth_footer');
		} else {
			$kode = md5($this->input->post('email', true) . $this->input->post('name', true));
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post("password1"), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 0,
				'kode' => $kode,
				'date_created' => time()

			];
			$this->db->insert('user', $data);

			$data = [
				'email' => htmlspecialchars($this->input->post('email', true)),
				'name' => htmlspecialchars($this->input->post('name', true)),
				'pekerjaan' => ''
			];
			$this->db->insert('pelanggan', $data);

			// kirim email verifikasi
			// Konfigurasi email
			$config = [
				'mailtype'  => 'html',
				'charset'   => 'utf-8',
				'protocol'  => 'smtp',
				'smtp_host' => 'smtp.gmail.com',
				'smtp_user' => 'yollaazura@gmail.com',  // Email gmail
				'smtp_pass'   => 'dvgjwkiotopxuyas',  // Password gmail
				'smtp_crypto' => 'ssl',
				'smtp_port'   => 465,
				'crlf'    => "\r\n",
				'newline' => "\r\n"
			];


			// Load library email dan konfigurasinya
			$this->load->library('email', $config);
			$this->email->initialize($config);

			// Email dan nama pengirim
			$this->email->from('no-reply@pamsimas.com', 'Pamsimas Nagari V Koto');

			// Email penerima
			$this->email->to(htmlspecialchars($this->input->post('email', true))); // Ganti dengan email tujuan

			// Subject email
			$this->email->subject('Verifikasi Email Anda | Pamsimas Nagari V Koto');

			// Isi email
			$this->email->message("Silahkan verifikasi alamat email Anda.<br><br> Klik <strong><a href='" . base_url('auth/verifikasi/' . $kode) . "' target='_blank' rel='noopener'>disini</a></strong> untuk proses selanjutnya.");

			// Tampilkan pesan sukses atau error
			if ($this->email->send()) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" 
				role="alert"> Congratulation! your account has been created. Please verify your email first.</div>');
			} else {
				$this->db->where('email', $this->input->post('email', true));
				$this->db->delete('pelanggan');
				$this->db->where('email', $this->input->post('email', true));
				$this->db->delete('user');
				$this->session->set_flashdata('message', '<div class="alert alert-success" 
				role="alert"> Error! Pendaftaran gagal, silahkan coba kembali!</div>');
			}



			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" 
        role="alert"> You have been logout!</div>');
		redirect('auth');
	}

	public function verifikasi($kode)
	{
		$this->db->set('is_active', 1);
		$this->db->where('kode', $kode);
		$this->db->update('user');
		echo "Congratulation! your account has been activated. Please <a href='".base_url('auth')."'>login</a>.";
	}

	public function blocked()
	{
		$this->load->view('auth/blocked');
	}
}
