<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['title'] = "Home";
		$data['konten'] = "home/home";
		$this->load->view('home/header', $data);
	}

	public function about()
	{
		$data['title'] = "About PAMSIMAS";
		$data['konten'] = "home/about";
		$this->load->view('home/header', $data);
	}

	public function contact()
	{
		$data['title'] = "Contact PAMSIMAS";
		$data['konten'] = "home/contact";
		$this->load->view('home/header', $data);
	}

	public function cek()
	{
		$this->form_validation->set_rules('bulan', 'Bulan', 'required');

		if ($this->form_validation->run() == true){

			$this->session->set_flashdata('message', '');
			
			$biayaPerBulan = 15000;
			$tanggalBayar = date('Y-m-d');
			
			// untuk tagihan
			$untukTagihan = $this->input->post('bulan') . "-07" ;
			
			$denda = $this->tanggalan($untukTagihan, $tanggalBayar);
			// var_dump($untukTagihan); die;

			$data = [
				'tagihan' => $untukTagihan,
				'tanggalBayar' => $tanggalBayar,
				'biaya' => $biayaPerBulan,
				'denda' => $denda,
				'total' => $biayaPerBulan + $denda,
				'diff' => $this->tanggalan($untukTagihan, $tanggalBayar, 1)
			];

		}

		$data['title'] = "Cek Tagihan PAMSIMAS";
		$data['konten'] = "home/cek";
		$this->load->view('home/header', $data);
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
			$denda = 2000 * $keterlambatan;
		}

		if($output == "denda"){
			return $denda;
		}else{
			return $keterlambatan;
		}
	}
}
