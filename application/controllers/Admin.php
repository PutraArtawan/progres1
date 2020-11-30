<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->helper('url');
        $this->load->model('M_admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Halaman Utama Admin';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/template/topbar', $data);
        $this->load->view('admin/homepage', $data);
        $this->load->view('admin/template/footer');
    }

    public function data_lokasi()
    {
        $data['title']     = "Halaman Lokasi Aset";
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data_lokasi'] = $this->M_admin->get_lokasi();
        $data['prodi']      = $this->db->get('tb_prodi')->result_array();
        $this->load->view('a_templates/header', $data);
        $this->load->view('a_templates/sidebar', $data);
        $this->load->view('a_templates/topbar', $data);
        $this->load->view('admin/data_lokasi', $data);
        $this->load->view('a_templates/footer');
    }

    public function save_datalokasi()
    {
        $id_prodi = $this->input->post('id_prodi');
        $nama_lab = $this->input->post('nama_lab');

        $data = array(
            'id_prodi' => $id_prodi,
            'nama_lab' => $nama_lab,
        );

        $this->M_admin->save_datalokasi($data, 'tb_lokasi');
        redirect('admin/data_lokasi');
    }
    public function delete_datalokasi($id)
    {
        $where = array('id_lokasi' => $id);
        $this->M_admin->delete_data($where, 'tb_lokasi');
        redirect('admin/data_lokasi');
    }
    public function update_datalokasi($id)
    {
        $data['title']     = "Halaman Lokasi Aset";
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data_lokasi'] = $this->M_admin->get_lokasi();
        $data['prodi']      = $this->db->get('tb_prodi')->result_array();
        $data['id_lokasi'] = $this->M_admin->get_lokasi_byId($id);
        $this->load->view('a_templates/header', $data);
        $this->load->view('a_templates/sidebar', $data);
        $this->load->view('a_templates/topbar', $data);
        $this->load->view('admin/update_datalokasi', $data);
        $this->load->view('a_templates/footer');
    }

    public function saveupdate_lokasi()
    {
        $id_prodi = $this->input->post('id_prodi');
        $nama_lab = $this->input->post('nama_lab');
        $id       = $this->input->post('id_lokasi');

        $data = array(
            'nama_lab' => $nama_lab,
            'id_prodi' => $id_prodi,
        );
        $where = array('id_lokasi' => $id);

        $this->M_admin->update_data($where, $data, 'tb_lokasi');

        redirect('admin/data_lokasi');
    }



    public function data_aset()
    {
        $data['title']     = "Halaman Data Aset";
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data_aset']  = $this->M_admin->get_dataaset();
        $data['lokasi']     = $this->db->get('tb_lokasi')->result_array();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/template/topbar', $data);
        $this->load->view('admin/data_aset', $data);
        $this->load->view('admin/template/footer');
    }

    public function update_dataaset($id)
    {
        $data['title']     = "Halaman Data Aset";
        $data['user']      = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data_aset']  = $this->M_admin->get_dataaset();
        $data['lokasi']     = $this->db->get('tb_lokasi')->result_array();
        $data['kode_aset']  = $this->M_admin->get_aset_byId($id);
        $this->load->view('a_templates/header', $data);
        $this->load->view('a_templates/sidebar', $data);
        $this->load->view('a_templates/topbar', $data);
        $this->load->view('admin/update_dataaset', $data);
        $this->load->view('a_templates/footer');
    }

    function save_dataaset()
    {
        $id_lokasi          = $this->input->post('id_lokasi');
        $nama_barang        = $this->input->post('nama_barang');
        $spesifikasi        = $this->input->post('spesifikasi');
        $jumlah             = $this->input->post('jumlah');
        $satuan             = $this->input->post('satuan');
        $keterangan         = $this->input->post('keterangan');
        $foto               = $_FILES['foto']['name'];

        $gambar             = $this->input->post('foto');

        if ($foto == '') {
            $image_cek = $gambar;
        } else {
            $image_cek = $foto;
            $konfigurasi = array(
                'allowed_types' => 'jpg|JPG|jpeg|gif|png|bmp',
                'upload_path'  => realpath('./assets/img/upload')
            );

            $this->load->library('upload', $konfigurasi);
            $this->upload->do_upload('foto');
        }
        $data = array(
            'id_lokasi'     => $id_lokasi,
            'nama_barang'   => $nama_barang,
            'spesifikasi'   => $spesifikasi,
            'jumlah'        => $jumlah,
            'satuan'        => $satuan,
            'keterangan'    => $keterangan,
            'foto'          => $image_cek,
        );
        $this->M_admin->save_dataaset($data, 'tb_aset');
        redirect('admin/data_aset');
    }

    function saveupdate_aset()
    {
        $id_lokasi          = $this->input->post('id_lokasi');
        $nama_barang        = $this->input->post('nama_barang');
        $spesifikasi        = $this->input->post('spesifikasi');
        $jumlah             = $this->input->post('jumlah');
        $satuan             = $this->input->post('satuan');
        $keterangan         = $this->input->post('keterangan');
        $foto               = $_FILES['gambar']['name'];
        $id                 = $this->input->post('kode_aset');

        if ($foto = '') {
        } else {
            $config['upload_path']     = './assets/img/upload';
            $config['allowed_types']   = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo "Gambar gagal diupload";
            } else {
                $foto = $this->upload->data('file_name');
            }
        }

        $data = array(
            'id_lokasi'     => $id_lokasi,
            'nama_barang'   => $nama_barang,
            'spesifikasi'   => $spesifikasi,
            'jumlah'        => $jumlah,
            'satuan'        => $satuan,
            'keterangan'    => $keterangan,
            'foto'          => $foto
        );
        $where = array('kode_aset' => $id);
        $this->M_admin->update_dataaset($where, $data, 'tb_aset');
        redirect('admin/data_aset');
    }

    public function delete_dataaset($id)
    {
        $where = array('kode_aset' => $id);
        $this->M_admin->delete_data($where, 'tb_aset');
        redirect('admin/data_aset');
    }

    public function profile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('a_templates/header', $data);
        $this->load->view('a_templates/sidebar', $data);
        $this->load->view('a_templates/topbar', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('a_templates/footer');
    }

    public function data_prodi()
    {
        $data['title']     = "Halaman Data Prodi";
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data_prodi']  = $this->M_admin->get_dataprodi();
        $this->load->view('a_templates/header', $data);
        $this->load->view('a_templates/sidebar', $data);
        $this->load->view('a_templates/topbar', $data);
        $this->load->view('admin/data_prodi', $data);
        $this->load->view('a_templates/footer');
    }

    public function delete_dataprodi($id)
    {
        $where = array('id_prodi' => $id);
        $this->M_admin->delete_data($where, 'tb_prodi');
        redirect('admin/data_prodi');
    }

    public function save_dataprodi()
    {
        $id_prodi = $this->input->post('id_prodi');
        $nama_prodi = $this->input->post('nama_prodi');
        $jurusan = $this->input->post('jurusan');
        $fakultas = $this->input->post('fakultas');

        $data = array(
            'id_prodi' => $id_prodi,
            'nama_prodi' => $nama_prodi,
            'jurusan' => $jurusan,
            'fakultas' => $fakultas,
        );

        $this->M_admin->save_dataprodi($data, 'tb_prodi');
        redirect('admin/data_prodi');
    }

    public function update_dataprodi($id)
    {
        $data['title']     = "Halaman Data Prodi";
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data_prodi']  = $this->M_admin->get_dataprodi();
        $data['id_prodi'] = $this->M_admin->get_prodi_byId($id);
        $this->load->view('a_templates/header', $data);
        $this->load->view('a_templates/sidebar', $data);
        $this->load->view('a_templates/topbar', $data);
        $this->load->view('admin/update_dataprodi', $data);
        $this->load->view('a_templates/footer');
    }

    public function saveupdate_prodi()
    {
        $id_prodi = $this->input->post('id_prodi');
        $nama_prodi = $this->input->post('nama_prodi');
        $jurusan = $this->input->post('jurusan');
        $fakultas = $this->input->post('fakultas');

        $data = array(
            'id_prodi' => $id_prodi,
            'nama_prodi' => $nama_prodi,
            'jurusan' => $jurusan,
            'fakultas' => $fakultas,
        );
        $where = array('id_prodi' => $id_prodi);
        $this->M_admin->update_data($where, $data, 'tb_prodi');
        redirect('admin/data_prodi');
    }

    public function list_pengelola()
    {
        $data['title']     = "Halaman Data User";
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data_pengelola']  = $this->M_admin->get_datapengelola();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/template/topbar', $data);
        $this->load->view('admin/list_pengelola', $data);
        $this->load->view('admin/template/footer');
    }
    public function list_user()
    {
        $data['title']     = "Halaman Data User";
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data_user']  = $this->M_admin->get_datauser();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/template/topbar', $data);
        $this->load->view('admin/list_user', $data);
        $this->load->view('admin/template/footer');
    }

    public function update_datauser($id)
    {
        $data['title']     = "Halaman Data Aset";
        $data['user']      = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data_user']  = $this->M_admin->get_datauser();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/template/topbar', $data);
        $this->load->view('admin/update_datauser', $data);
        $this->load->view('admin/template/footer');
    }

    function save_datauser()
    {
        $id_user            = $this->input->post('id_user');
        $nama               = $this->input->post('nama');
        $email              = $this->input->post('email');
        $j_kelamin          = $this->input->post('j_kelamin');
        $alamat           = $this->input->post('alamat');
        $password           = $this->input->post('password');
        $foto               = $_FILES['gambar']['name'];
        $id                 = $this->input->post('id_user');

        $gambar             = $this->input->post('image');

        if ($foto == '') {
            $image_cek = $gambar;
        } else {
            $image_cek = $foto;
            $konfigurasi = array(
                'allowed_types' => 'jpg|JPG|jpeg|gif|png|bmp',
                'upload_path'  => realpath('./assets/img/profile')
            );

            $this->load->library('upload', $konfigurasi);
            $this->upload->do_upload('image');
        }
        $data = array(
            'id_user'       => $id_user,
            'nama'          => $nama,
            'email'         => $email,
            'j_kelamin'       => $j_kelamin,
            'image'         => $image_cek,
        );
        $where = array('id_user' => $id);
        $this->M_admin->save_datauser($where, $data, 'tb_aset');
        redirect('admin/data_user');
    }

    function saveupdate_user()
    {
        $id_user            = $this->input->post('id_user');
        $nama               = $this->input->post('nama');
        $email              = $this->input->post('email');
        $jabatan            = $this->input->post('jabatan');
        $satuan             = $this->input->post('satuan');
        $foto               = $_FILES['image']['name'];
        $id                 = $this->input->post('id_user');

        if ($foto = '') {
        } else {
            $config['upload_path']     = './assets/img/upload';
            $config['allowed_types']   = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                echo "Gambar gagal diupload";
            } else {
                $foto = $this->upload->data('file_name');
            }
        }

        $data = array(
            'id_user'       => $id_user,
            'nama'          => $nama,
            'email'         => $email,
            'jabatan'       => $jabatan,
        );
        $where = array('id_user' => $id);
        $this->M_admin->update_datauser($where, $data, 'tb_user');
        redirect('admin/data_user');
    }

    public function delete_datauser($id)
    {
        $where = array('id_user' => $id);
        $this->M_admin->delete_data($where, 'tb_user');
        redirect('admin/data_user');
    }

    public function data_pelaporan()
    {
        $data['title']         = "Halaman Data Pelaporan";
        $data['user']          = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data_pelaporan'] = $this->M_admin->get_datapelaporan();
        $data['aset']           = $this->db->get('tb_aset')->result_array();
        $data['tb_user']        = $this->db->get('tb_user')->result_array();
        $this->load->view('a_templates/header', $data);
        $this->load->view('a_templates/sidebar', $data);
        $this->load->view('a_templates/topbar', $data);
        $this->load->view('admin/data_pelaporan', $data);
        $this->load->view('a_templates/footer');
    }

    public function update_pelaporan()
    {
        $data['title']     = "Halaman Data Pelaporan";
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data_pelaporan']  = $this->M_admin->get_datapelaporan();
        $data['aset']     = $this->db->get('tb_aset')->result_array();
        $data['tb_user']     = $this->db->get('tb_user')->result_array();
        $this->load->view('a_templates/header', $data);
        $this->load->view('a_templates/sidebar', $data);
        $this->load->view('a_templates/topbar', $data);
        $this->load->view('admin/update_datapelaporan', $data);
        $this->load->view('a_templates/admin_footer');
    }

    function save_datapelaporan()
    {
        $id_user            = $this->input->post('id_user');
        $tgl_lapor          = $this->input->post('tgl_lapor');
        $kode_aset          = $this->input->post('kode_aset');
        $deskripsi_laporan  = $this->input->post('deskripsi_laporan');
        $status             = $this->input->post('status');
        $tanggapan          = $this->input->post('tanggapan');


        $data = array(
            'id_user'           => $id_user,
            'tgl_lapor'         => $tgl_lapor,
            'kode_aset'         => $kode_aset,
            'deskripsi_laporan' => $deskripsi_laporan,
            'status'            => $status,
            'tanggapan'         => $tanggapan
        );
        $this->M_admin->save_datapelaporan($data, 'tb_pelaporan');
        redirect('admin/data_pelaporan');
    }
}
