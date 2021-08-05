<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}


	public function role()
	{
		$data['title'] = 'Role';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get('user_role')->result_array();

		$this->form_validation->set_rules('role', 'Role', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/role', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'role' => $this->input->post('role'),

			];
			$this->db->insert('user_role', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" 
            role="alert"> Data Role berhasil ditambahkan </div>');
			redirect('admin/role');
		}
	}


	public function hapusrole($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user_role');
		$this->session->set_flashdata('message', '<div class="alert alert-success" 
        role="alert"> Data Role berhasil dihapus </div>');
		redirect('admin/role');
	}

	public function editRole($id)
	{
		$this->load->model('Pelanggan_model');
		$data['title'] = 'Edit Data Role';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['user_role'] = $this->Pelanggan_model->getRoleById($id);

		$this->form_validation->set_rules('role', 'Role', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('Admin/editrole', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Pelanggan_model->editDataRole();
			$this->session->set_flashdata('message', '<div class="alert alert-success" 
            role="alert"> Data Role berhasil diupdate </div>');
			redirect('admin/role');
		}
	}



	public function roleAccess($role_id)
	{
		$data['title'] = 'Role Access';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role-access', $data);
		$this->load->view('templates/footer');
	}


	public function changeaccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if ($result->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		} else {
			$this->db->delete('user_access_menu', $data);
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" 
        role="alert"> Akses berhasil diubah!</div>');
	}


	public function kasharian()
	{
		$this->kas();
		$data['title'] = 'Kas Harian';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['kas'] = $this->db->get('kas_harian')->result_array();

		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('ket', 'Ket', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/kas', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$debet = 0;
			$kredit = 0;

			switch ($this->input->post('jenis')) {
				case 'debet':
					$debet = (int) $this->input->post('nominal');
					break;

				default:
					$kredit = (int) $this->input->post('nominal');
					break;
			}
			$data = [
				'date' => $this->input->post('date'),
				'ket' => $this->input->post('ket'),
				'debet' => $debet,
				'kredit' => $kredit,

			];
			$this->db->insert('kas_harian', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" 
            role="alert"> Data berhasil ditambahkan </div>');
			redirect('admin/kasharian');
		}
	}

	public function filterkas()
	{
		$this->form_validation->set_rules('bulan', 'Bulan', 'required');
		if ($this->form_validation->run() == false) {
			redirect('admin/kasharian');
		} else {
			$data['title'] = 'Kas Harian';
			$data['user'] = $this->db->get_where('user', ['email' =>
			$this->session->userdata('email')])->row_array();

			$bulan = $this->input->post('bulan');
			$this->db->like('date', $bulan, 'after');
			$data['kas'] = $this->db->get('kas_harian')->result_array();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/kas', $data);
			$this->load->view('templates/footer');
		}
	}

	public function hapus($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('kas_harian');
		$this->session->set_flashdata('message', '<div class="alert alert-success" 
        role="alert"> Data Kas berhasil dihapus </div>');
		redirect('admin/kasharian');
	}

	public function editKas($id)
	{
		$this->load->model('Pelanggan_model');
		$data['title'] = 'Edit Data Kas Harian';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['kas_harian'] = $this->Pelanggan_model->getKasById($id);

		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('ket', 'Ket', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/editkas', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Pelanggan_model->editDataKas();
			$this->session->set_flashdata('message', '<div class="alert alert-success" 
            role="alert"> Data Kas berhasil diupdate </div>');
			redirect('admin/kasharian');
		}
	}

	public function kas()
	{
		$this->db->order_by('date', 'asc');
		$data = $this->db->get('kas_harian')->result();
		$jumlah = 0;
		foreach ($data as $d) {
			$jumlah = $jumlah + $d->debet - $d->kredit;
			$this->db->set('jumlah', $jumlah);
			$this->db->where('id', $d->id);
			$this->db->update('kas_harian');
		}
	}

	public function Pelanggan()
	{

		$this->load->model('Pelanggan_model');
		$data['title'] = 'Pelanggan';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['datapelanggan'] = $this->db->get('pelanggan')->result_array();
		if ($this->input->post('keyword')) {
			$data['datapelanggan'] = $this->Pelanggan_model->cariDataPelanggan();
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/datapelanggan', $data);
		$this->load->view('templates/footer');
	}

	public function hapuspelanggan($id)
	{
		// ambil detail pelanggan
		$this->db->where('id', $id);
		$p = $this->db->get('pelanggan')->row();
		$email = $p->email;
		
		// ambil detail user
		$this->db->where('email', $email);
		$p = $this->db->get('user')->row();
		$user_id = $p->id;
		
		// hapus tabel pelanggan
		$this->db->where('id', $id);
		$this->db->delete('pelanggan');

		// hapus tabel tagihan
		$this->db->where('user_id', $user_id);
		$this->db->delete('tagihan');

		// hapus tabel payment
		$this->db->where('user_id', $user_id);
		$this->db->delete('payment');
		
		// hapus tabel user
		$this->db->where('email', $email);
		$this->db->delete('user');

		$this->session->set_flashdata('message', '<div class="alert alert-success" 
        role="alert"> Data Pelanggan berhasil dihapus </div>');
		redirect('admin/pelanggan');
	}

	public function editPelanggan($id)
	{
		$this->load->model('Pelanggan_model');
		$this->load->model('Tagihan_model');
		$data['title'] = 'Edit Data Pelanggan';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['pelanggan'] = $this->Pelanggan_model->getPelangganById($id);

		// ambil user_id
		$this->db->where('email', $data['pelanggan']['email']);
		$user = $this->db->get_where('user', ['email' => $data['pelanggan']['email']])->row();
		// var_dump($user); die;
		$data['tagihan'] = $this->Tagihan_model->getPelangganById($user->id);
		$data['user_id'] = $user->id;


		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('nik', 'Nik', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/editpelanggan', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Pelanggan_model->editDataPelanggan();
			$this->session->set_flashdata('message', '<div class="alert alert-success" 
            role="alert"> Data Pelanggan berhasil diupdate </div>');
			redirect('admin/pelanggan');
		}
	}


	public function payment()
	{
		$data['title'] = 'Payment';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->db->order_by('id', 'desc');
		$data['data'] = $this->db->get('payment')->result();
		$data['js'] = 'admin/js';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/payment', $data);
		$this->load->view('templates/footer', $data);
	}

	public function batal()
	{
		$this->db->set('alasan', $this->input->post('alasan'));
		$this->db->set('status', 3);
		$this->db->where('id', $this->input->post('vid'));
		$this->db->update('payment');

		// ambil data payment
		$this->db->where('id', $this->input->post('vid'));
		$data = $this->db->get('payment');
		$r = $data->row();
		$user_id = $r->user_id;

		// ambil data user
		$this->db->where('id', $user_id);
		$data = $this->db->get('user');
		$r = $data->row();

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
		$this->email->to(htmlspecialchars($r->email)); // Ganti dengan email tujuan

		// Subject email
		$this->email->subject('Pembayaran Anda Ditolak | Pamsimas Nagari V Koto');

		// Isi email
		$this->email->message("Pembayaran Anda ditolak dengan alasan " . $this->input->post('alasan'));

		// Tampilkan pesan sukses atau error
		if ($this->email->send()) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" 
			role="alert"> Email berhasil dikirim</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success" 
			role="alert"> Email gagal dikirim!</div>');
		}

		redirect('admin/payment');
	}

	public function filterpayment()
	{
		$this->form_validation->set_rules('bulan', 'Bulan', 'required');
		if ($this->form_validation->run() == false) {
			redirect('admin/payment');
		} else {
			$data['title'] = 'Payment';
			$data['user'] = $this->db->get_where('user', ['email' =>
			$this->session->userdata('email')])->row_array();

			$bulan = $this->input->post('bulan');
			$this->db->like('date', $bulan, 'after');
			$this->db->order_by('date', 'desc');
			$data['data'] = $this->db->get('payment')->result();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/payment', $data);
			$this->load->view('templates/footer');
		}
	}

	public function payment_ubah($id, $status, $tunggakan = 0)
	{

		$this->db->where('id', $id);
		if (md5("1") == $status) {
			//ambil data payment
			$q = $this->db->query("select * from payment where id='" . $id . "'");
			$data = $q->row();

			$d = [
				'date' => date('Y-m-d'),
				'ket' => 'Pembayaran Air '.$data->bulan.'/'.$data->tahun.' a/n ' . $data->name,
				'debet' => $data->tagihan,
				'kredit' => '0'
			];
			// var_dump($d); die;
			$this->db->insert('kas_harian', $d);

			$this->db->set('alasan', null);
			$this->db->set('status', 1);
			$this->db->update('payment');


			// ambil data payment
			$this->db->where('id', $id);
			$data = $this->db->get('payment');
			$r = $data->row();
			$user_id = $r->user_id;

			// ambil data user
			$this->db->where('id', $user_id);
			$data = $this->db->get('user');
			$ru = $data->row();

			// hapus tagihan lama
			$this->db->where('user_id', $user_id);
			$this->db->delete('tagihan');

			// buat tagihan baru
			$bulan = $r->bulan + 1;
			$tahun = ($bulan == 13) ? $r->tahun + 1 : $r->tahun;
			$bulan = ($bulan == 13) ? 1 : $bulan;
			$data = [
				'user_id' => $user_id,
				'bulan' => $bulan,
				'tahun' => $tahun,
				'tunggakan' => $tunggakan
			];
			$this->db->insert('tagihan', $data);

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
			$this->email->to(htmlspecialchars($ru->email)); // Ganti dengan email tujuan

			// Subject email
			$this->email->subject('Pembayaran Anda Diterima | Pamsimas Nagari V Koto');

			// Isi email
			$this->email->message("Terima kasih telah membayar tagihan Anda tepat waktu");

			// Tampilkan pesan sukses atau error
			if ($this->email->send()) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" 
			role="alert"> Email berhasil dikirim</div>');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-success" 
			role="alert"> Email gagal dikirim!</div>');
			}
		} elseif (md5("0") == $status) {
			$this->db->set('alasan', null);
			$this->db->set('status', 0);
			$this->db->update('payment');
		} elseif (md5("2") == $status) {
			$this->db->set('status', 2);
			$this->db->update('payment');
		} elseif (md5("3") == $status) {
			$this->db->set('status', 3);
			$this->db->update('payment');
		} else {
			return redirect('admin/payment');
		}


		redirect('admin/payment');
	}

	public function email()
	{
		$this->form_validation->set_rules('pesan', 'Name', 'required|trim');
		if ($this->form_validation->run() == true) {
			// ambil data user
			$this->db->where('role_id', 2);
			$this->db->where('is_active', 1);
			$data = $this->db->get('user');
			$r = $data->result();

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

			$no = 1;

			foreach ($r as $d) :

				// Email dan nama pengirim
				$this->email->from('no-reply@pamsimas.com', 'Pamsimas Nagari V Koto');

				// Email penerima
				$this->email->to(htmlspecialchars($d->email)); // Ganti dengan email tujuan

				// Subject email
				$this->email->subject('Notifikasi Email | Pamsimas Nagari V Koto');

				// Isi email
				$this->email->message($this->input->post('pesan'));

				// Tampilkan pesan sukses atau error
				if ($this->email->send()) {
					$no++;
				} else {
					$no--;
				}

			endforeach;
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> ' . $no . ' Email berhasil dikirim</div>');

			redirect('admin/email');
		} else {
			$data['title'] = 'Notifikasi Email';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/email', $data);
			$this->load->view('templates/footer');
		}
	}

	public function payment_kurang($id)
	{
		$this->form_validation->set_rules('id', 'ID', 'required|trim');
		$this->form_validation->set_rules('kurang', 'ID', 'required|trim');
		if ($this->form_validation->run() == true) {
			$this->payment_ubah($id, md5('1'), $this->input->post('kurang'));
		} else {
			$this->db->where('id', $id);
			$q = $this->db->query("select * from payment where id='" . $id . "'");
			$data['data'] = $q->row();
			$data['id'] = $id;
			$data['title'] = 'Payment - Kurang';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/paymentkurang', $data);
			$this->load->view('templates/footer');
		}
	}

	public function ubah_tagihan()
	{
		$this->form_validation->set_rules('id', 'ID', 'required|trim');
		$this->form_validation->set_rules('bulan', 'Bulan', 'required|trim');
		$this->form_validation->set_rules('tahun', 'Tahun', 'required|trim');
		$this->form_validation->set_rules('tunggakan', 'Tunggakan', 'required|trim');
		if ($this->form_validation->run() == true) {
			// cek ada atau tidak
			$this->db->where('user_id', $this->input->post('id'));
			$cek = $this->db->get('tagihan')->row();
			$data = [
				'bulan' => $this->input->post('bulan'),
				'tahun' => $this->input->post('tahun'),
				'tunggakan' => $this->input->post('tunggakan'),
			];
			if (!$cek) {
				$this->db->set('user_id', $this->input->post('id'));
				$this->db->insert('tagihan', $data);
			} else {
				$this->db->where('user_id', $this->input->post('id'));
				$this->db->update('tagihan', $data);
			}
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengaturan tagihan sudah diubah.</div>');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Ada kesalahan pada pengaturan tagihan</div>');
		}
		return redirect('admin/pelanggan');
	}
}
