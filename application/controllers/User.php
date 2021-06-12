<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public $biayaPerBulan = 15000;
	public $dendaPerHari = 2000;
	public $tanggalTelat = 7;

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}


	public function index()
	{
		$data['title'] = 'My Profile';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['pelanggan'] = $this->db->get_where('pelanggan', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
	}


	public function edit()
	{
		$data['title'] = 'Edit Profile';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['pelanggan'] = $this->db->get_where('pelanggan', ['email' =>
		$this->session->userdata('email')])->row_array();

		// var_dump($data['pelanggan']); die;

		$this->form_validation->set_rules('name', 'Full Name', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/edit', $data);
			$this->load->view('templates/footer');
		} else {
			$name = $this->input->post('name');
			$alamat = $this->input->post('alamat');
			$pekerjaan = $this->input->post('pekerjaan');

			//cek data jika ada gambar yang di upload
			if(!empty($_FILES['image']['name']))
			{
				$config['upload_path']          = './assets/img/profile/';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				$config['encrypt_name']         = true;
	
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('image')) {
					$this->session->set_flashdata('message', 'Terjadi kesalahan pada pemilihan gambar');
					return redirect('user/edit', 'refresh');
				} else {
					$old_image = $data['user']['image'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . 'assets/img/profile/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				}
			}

			// tabel user
			$this->db->set('name', $name);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('user');
			// tabel pelanggan
			$this->db->set('pekerjaan', $pekerjaan);
			$this->db->set('alamat', $alamat);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pelanggan');

			$this->session->set_flashdata('message', '<div class="alert alert-success" 
            role="alert"> Berhasil diupdate </div>');
			redirect('user/edit');
		}
	}


	public function changepassword()
	{
		$data['title'] = 'Change Password';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

		if ($this->form_validation->run() == false) {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/changepassword', $data);
			$this->load->view('templates/footer');
		} else {
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if (!password_verify($current_password, $data['user']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" 
                role="alert"> Password lama salah </div>');
				redirect('user/changepassword');
			} else {
				if ($current_password == $new_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" 
                    role="alert"> Password tidak boleh sama dengan password lama </div>');
					redirect('user/changepassword');
				} else {
					// password benar

					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');

					$this->session->set_flashdata('message', '<div class="alert alert-success" 
                    role="alert"> Password Berhasil Diubah </div>');
					redirect('user/changepassword');
				}
			}
		}
	}


	public function isipelanggan()
	{
		$data['title'] = 'Isi Data Pelanggan';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['datapelanggan'] = $this->db->get('pelanggan')->result_array();

		$this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[pelanggan.email]', [
			'is_unique' => 'Data sudah ada!'
		]);
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('nik', 'Nik', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/isipelanggan', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'email' => htmlspecialchars($this->input->post('email', true)),
				'name' => $this->input->post('name'),
				'nik' => $this->input->post('nik'),
				'alamat' => $this->input->post('alamat'),
				'pekerjaan' => $this->input->post('pekerjaan')

			];

			$this->db->insert('pelanggan', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" 
            role="alert"> Data berhasil ditambahkan </div>');
			redirect('user/isipelanggan');
		}
	}

	public function list()
	{
		$data['title'] = 'Histori Pembayaran';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['data'] = $this->db->get_where('payment', ['user_id' => $data['user']['id']])->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/list', $data);
		$this->load->view('templates/footer');
	}

	public function tanggalan($tglTagihan, $tglBayar, $output = "denda")
	{
		$earlier = new DateTime($tglTagihan);
		$later = new DateTime($tglBayar);
		$diff = $later->diff($earlier)->format("%r%a");

		$keterlambatan = 0;
		$denda = 0;
		if ($later > $earlier) {
			$keterlambatan = $diff * (-1);
			$denda = $this->dendaPerHari * $keterlambatan;
		}

		if($output == "denda"){
			return $denda;
		}else{
			return $keterlambatan;
		}
	}

	public function cekBiaya($out = null)
	{
		$biayaPerBulan = $this->biayaPerBulan;

		$this->form_validation->set_rules('tanggal', 'Name', 'required');
		$this->form_validation->set_rules('bulan', 'Nik', 'required');
		$this->form_validation->set_rules('tahun', 'Alamat', 'required');

		if ($this->form_validation->run() == false) {
			$data = "no";
		} else {
			$tanggalBayar = $this->input->post('tanggal');
			$bulan = $this->input->post('bulan');
			$tahun = $this->input->post('tahun');

			// untuk tagihan
			$untukTagihan = $tahun . "-" . $bulan . "-" . $this->tanggalTelat;

			$denda = $this->tanggalan($untukTagihan, $tanggalBayar);

			$data = [
				'tanggalBayar' => $tanggalBayar,
				'biaya' => $biayaPerBulan,
				'denda' => $denda,
				'total' => $biayaPerBulan + $denda,
				'diff' => $this->tanggalan($untukTagihan, $tanggalBayar, 1)
			];
		}


		echo json_encode($data);
	}

	public function pembayaran()
	{
		$data['title'] = 'Pembayaran';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['pelanggan'] = $this->db->get_where('pelanggan', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['pembayaran'] = $this->db->get('payment')->result_array();

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('date', 'Date', 'required|trim');
		// $this->form_validation->set_rules('bulan', 'Bulan', 'required|trim');
		// $this->form_validation->set_rules('tahun', 'Tahun', 'required|trim');
		$this->form_validation->set_rules('biaya', 'Biaya', 'required|trim');
		$this->form_validation->set_rules('denda', 'Denda', 'required|trim');
		$this->form_validation->set_rules('tagihan', 'Tagihan', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/pembayaran', $data);
			$this->load->view('templates/footer');
		} else {
			$config['upload_path']          = './assets/uploads/payments/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['encrypt_name']         = true;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('bukti')) {
				$this->session->set_flashdata('msg', 'Terjadi kesalahan pada pemilihan gambar');
				return redirect('user/pembayaran', 'refresh');
			} else {
				// untuk tagihan
				$untukTagihan = $this->input->post('tahun') . "-" . $this->input->post('bulan') . "-" . $this->tanggalTelat;

				$denda = $this->tanggalan($untukTagihan, $this->input->post('date'));

				$data = [
					'user_id' => $this->session->user_id,
					'name' => $this->input->post('name', true),
					'alamat' => $this->input->post('alamat'),
					'date' => $this->input->post('date'),
					'bulan' => $this->input->post('bulan'),
					'tahun' => $this->input->post('tahun'),
					'biaya' => $this->input->post('biaya'),
					'denda' => $denda,
					'tagihan' => $this->biayaPerBulan + $denda,
					'bukti' => "payments/" . $this->upload->data("file_name"),
	
				];

				$this->db->insert('payment', $data);

				$this->session->set_flashdata('msg', 'Data berhasil disimpan');
				return redirect('user/list');
			}

			// menghitung denda




			$this->db->insert('payment', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" 
            role="alert"> Pembayaran berhasil dikirim!! <b> Menunggu Konfirmasi Pembayaran </b> </div>');
			redirect('user/pembayaran');
		}
	}
}
