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
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Login';
            $this->load->view('auth/template/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('auth/template/auth_footer');
        } else {
            //validasi nya sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();

        //user ada
        if ($user) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);

                    //redirect user & admin
                    if ($user['role_id'] == 1) {
                        redirect('Admin');
                    } else {
                        redirect('User');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata sandi salah!</div>');
                    redirect('Auth');
                } 

        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Login gagal! Email belum di registrasi!</div>');
            redirect('Auth');
        }
    }

    //trim untuk menghilangkan spasi pada belakang
    public function registration()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
            'is_unique' => 'Alamat Email sudah digunakan!'
        ]);
        $this->form_validation->set_rules('j_kelamin', 'J_kelamin', 'required|trim');

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Kata sandi tidak cocok!',
            'min_length' => 'Kata sandi terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Registrasi';
            $this->load->view('auth/template/auth_header', $data);
            $this->load->view('auth/registrasi');
            $this->load->view('auth/template/auth_footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'j_kelamin' => htmlspecialchars($this->input->post('j_kelamin', true)),
                'j_kelamin' => htmlspecialchars($this->input->post('j_kelamin', true)),
                'role_id' => 2,
                'tgl_buat' => time(),
                'gambar' => 'default.PNG'
            ];
            // var_dump($data);
            // die;
            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">akun selesai di buat. Silahkan login</div>');
            redirect('Auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('rore_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu sudah logout!</div>');
        redirect('Views');
    }


    // public function blocked()
    // {
    //     $this->load->view('auth/blocked');
    // }
}
