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
        $email       = $this->input->post('email', TRUE);
        $password    = $this->input->post('password', TRUE);
        $validate    = $this->MAuth->check_login($email, $password);

        if ($validate->num_rows() > 0) {
            $data           = $validate->row_array();
            $userid         = $data['userid'];
            $nama           = $data['nama'];
            $email          = $data['email'];
            $role        = $data['role'];
            $sesdata    = array(
                'userid' => $userid,
                'nama' => $nama,
                'email' => $email,
                'role' => $role,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($sesdata);

            if ($role === '1') {
                $this->session->set_flashdata('alert', 'Selamat beraktifitas.');
                $this->session->set_userdata('nama', $nama);
                redirect('access/user');
            } elseif ($role === '2') {
                $this->session->set_flashdata('alert', 'Selamat beraktifitas.');
                $this->session->set_userdata('nama', $nama);
                redirect('access/admin');
            }
        } else {
            $this->session->set_flashdata('msg', 'Email / password salah!');
            redirect('index/login');
        }
    }

    function forgetPassword(){
        $email  = $this->input->post('email');
        $password  = $this->input->post('password');
    
        $array = array(
            'email' => $email,
            'password' => $password,
        );
    
        $where = array('email' => $email);
        $this->MAuth->updateUser($where, $array, 'user');
        redirect('Index/login');
    }
    

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('index');
    }
}
