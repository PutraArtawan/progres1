<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    public function get_lokasi()
    {
        $this->db->join('tb_prodi', 'tb_lokasi.id_prodi=tb_prodi.id_prodi');
        $this->db->order_by('nama_prodi', 'desc');
        $lokasi = $this->db->get('tb_lokasi')->result_array();
        return $lokasi;
    }
    function get_lokasi_byId($id)
    {
        $this->db->join('tb_prodi', 'tb_lokasi.id_prodi=tb_prodi.id_prodi');
        $this->db->order_by('nama_prodi', 'desc');
        $this->db->where('id_lokasi=', $id);
        $lokasi = $this->db->get('tb_lokasi')->row_array();
        return $lokasi;
    }
    public function save_datalokasi($data, $table)
    {
        $this->db->insert($table, $data);
    }


    public function get_dataaset()
    {
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi=tb_aset.id_lokasi');
        $this->db->order_by('kode_aset', 'asc');
        $data = $this->db->get('tb_aset')->result_array();
        return $data;
    }
    public function get_aset_byId($id)
    {
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi=tb_aset.id_lokasi');
        $this->db->where('kode_aset=', $id);
        $aset = $this->db->get('tb_aset')->row_array();
        return $aset;
    }
    public function save_dataaset($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function update_dataaset($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }


    public function get_dataprodi()
    {
        $this->db->order_by('id_prodi', 'asc');
        $data = $this->db->get('tb_prodi')->result_array();
        return $data;
    }
    function get_prodi_byId($id)
    {
        $this->db->where('id_prodi=', $id);
        $prodi = $this->db->get('tb_prodi')->row_array();
        return $prodi;
    }
    public function update_dataprodi($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function save_dataprodi($data, $table)
    {
        $this->db->insert($table, $data);
    }


    public function get_datapengelola()
    {
        $this->db->order_by('id_pengelola', 'asc');
        $data = $this->db->get('tb_pengelola')->result_array();
        return $data;
    }

    public function get_datauser()
    {
        $this->db->order_by('user_id', 'asc');
        $data = $this->db->get('tb_user')->result_array();
        return $data;
    }
    public function get_user_byId($id)
    {
        $this->db->where('user_id=', $id);
        $user = $this->db->get('tb_user')->row_array();
        return $user;
    }
    public function save_datauser($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function update_datauser($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }


    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }



    public function get_datapelaporan()
    {
        $this->db->join('tb_user', 'tb_pelaporan.id_user=tb_user.id_user');
        $this->db->join('tb_aset', 'tb_pelaporan.kode_aset=tb_aset.kode_aset');
        //$this->db->order_by('id_laporan','asc');
        $data = $this->db->get('tb_pelaporan')->result_array();
        return $data;
    }

    public function save_datapelaporan($data, $table)
    {
        $this->db->insert($table, $data);
    }
}
