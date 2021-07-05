<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_model extends CI_model
{
	public $masuk = "debet";
	public $keluar = "kredit";
	public $tabel_kas = "kas_harian";

	public function kas($bulan, $tahun, $tipe = "masuk")
	{
		$t = ($tipe == "masuk") ? $this->masuk : $this->keluar;
		$t2 = ($tipe == "masuk") ? $this->keluar : $this->masuk;
		$this->db->select('date, ket, '. $t . ' as nominal');
		$this->db->like('date', $tahun ."-". $bulan, 'after');
		return $this->db->get($this->tabel_kas)->result();
	}

	public function saldo_kas($bulan, $tahun)
	{
		$bulan = (int) $bulan;
		if($bulan == "1"){
			$bulan = "12";
			$tahun -= 1;
		}else{
			$bulan -= 1;
		}

		$bulan = str_pad($bulan,2,"0", STR_PAD_LEFT);

		$this->db->select('jumlah as nominal');
		$this->db->like('date', $tahun ."-". $bulan, 'after');
		$this->db->order_by('date', 'desc');
		$data = $this->db->get($this->tabel_kas)->row();
		if(is_null($data)){
			return $this->saldo_kas($bulan, $tahun);
		}else{
			return $data->nominal;
		}
	}

	public function get_bulan($b)
	{
		$bulan = ['','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
		return $bulan[$b];
	}
}
