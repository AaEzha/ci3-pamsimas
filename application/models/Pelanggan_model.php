<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_model extends CI_model
{

    public function cariDataPelanggan()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('name', $keyword);
        $this->db->or_like('alamat', $keyword);
        $this->db->or_like('pekerjaan', $keyword);
        return $this->db->get('pelanggan')->result_array();
    }

    public function getKasById($id)
    {
        return $this->db->get_where('kas_harian', ['id' => $id])->row_array();
    }

    public function editDataKas()
    {
        $data = [
            'date' => $this->input->post('date'),
            'ket' => $this->input->post('ket'),
            'debet' => $this->input->post('debet'),
            'kredit' => $this->input->post('kredit')

        ];
        $this->db->set($data);
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('kas_harian');
    }

    public function getPelangganById($id)
    {
        return $this->db->get_where('pelanggan', ['id' => $id])->row_array();
    }

    public function editDataPelanggan()
    {
        $data = [

            'name' => $this->input->post('name'),
            'nik' => $this->input->post('nik'),
            'alamat' => $this->input->post('alamat'),
            'pekerjaan' => $this->input->post('pekerjaan')

        ];

        $this->db->set($data);
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('pelanggan');
    }

    public function getSubmenuById($id)
    {
        return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
    }

    public function editDataSubmenu()
    {
        $data = [
            'title' => $this->input->post('title'),
            'menu_id' => $this->input->post('menu_id'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'is_active' => $this->input->post('is_active')

        ];

        $this->db->set($data);
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_sub_menu');
    }

    public function getMenuById($id)
    {
        return $this->db->get_where('user_menu', ['id' => $id])->row_array();
    }

    public function editDataMenu()
    {
        $data = [
            'menu' => $this->input->post('menu'),

        ];

        $this->db->set($data);
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_menu');
    }

    public function getRoleById($id)
    {
        return $this->db->get_where('user_role', ['id' => $id])->row_array();
    }

    public function editDataRole()
    {
        $data = [

            'role' => $this->input->post('role')

        ];

        $this->db->set($data);
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_role');
    }
}
