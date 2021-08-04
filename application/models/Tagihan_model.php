<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tagihan_model extends CI_model
{
	private $table = "tagihan";

	public function getPelangganById($id)
    {
        return $this->db->get_where('tagihan', ['user_id' => $id])->row_array();
    }

	public function update($data)
	{
		$this->db->update($this->table, $data);
	}
}
