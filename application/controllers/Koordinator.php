<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Koordinator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
		$this->load->model('Report_model','mreport');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('koordinator/index', $data);
        $this->load->view('templates/footer');
    }

    public function Report()
    {
		$data['bln'] = [
			['id' => '01', 'bulan' => 'Januari'],
			['id' => '02', 'bulan' => 'Februari'],
			['id' => '03', 'bulan' => 'Maret'],
			['id' => '04', 'bulan' => 'April'],
			['id' => '05', 'bulan' => 'Mei'],
			['id' => '06', 'bulan' => 'Juni'],
			['id' => '07', 'bulan' => 'Juli'],
			['id' => '08', 'bulan' => 'Agustus'],
			['id' => '09', 'bulan' => 'September'],
			['id' => '10', 'bulan' => 'Oktober'],
			['id' => '11', 'bulan' => 'November'],
			['id' => '12', 'bulan' => 'Desember'],
		];
        $data['title'] = 'Report';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('bulan', 'Bulan', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('koordinator/report', $data);
			$this->load->view('templates/footer');
		} else {
			$bulan = ['','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
			$data['title'] = 'Laporan Keuangan';
			$data['bulan'] = $this->input->post('bulan');
			$b = (int) $this->input->post('bulan');
        	$data['tahun'] = $this->input->post('tahun');
			$data['bulannya'] = $bulan[$b];
			$data['kas_masuk'] = $this->mreport->kas($data['bulan'], $data['tahun'], "masuk");
			$data['kas_keluar'] = $this->mreport->kas($data['bulan'], $data['tahun'], "keluar");
			$data['saldo_kas'] = $this->mreport->saldo_kas($data['bulan'], $data['tahun']);
			// var_dump($bulan[$b]); die;
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('koordinator/report_output', $data);
			$this->load->view('templates/footer');
		}
    }
}
