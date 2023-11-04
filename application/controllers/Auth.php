<?php
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MAuth');
        $this->load->library('session');
    }

    public function login()
    {
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);
        $validate = $this->MAuth->check_login($username, $password);

        if ($validate->num_rows() > 0) {
            $data = $validate->row_array();
            $userid = $data['userid'];
            $nama = $data['nama'];
            $username = $data['username'];
            $sesdata = array(
                'userid' => $userid,
                'nama' => $nama,
                'username' => $username,
            );
            $this->session->set_userdata($sesdata);
            $this->session->set_flashdata('alert', 'Selamat beraktifitas.');
            $this->session->set_userdata('nama', $nama);
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('msg', 'Username / password salah!');
            redirect('index');
        }
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect('index');
    }
}
