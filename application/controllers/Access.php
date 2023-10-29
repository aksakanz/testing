<?php
class Access extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_data');

        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('login');
        }
    }

    function index()
    {
        $this->load->view('dashboard');
    }

    function user()
    {
        if ($this->session->userdata('role') === '1') {
            $userId             = $this->session->userdata('userid');
            $data['detail']     = $this->User_data->detailDashboard($userId);
            $data['token']      = $this->User_data->getToken($userId);
            $data['tl']         = $this->User_data->timeline($userId);
            $data['title']      = "Dashboard";
            $data['content']    = 'user/home';
            $this->load->view('user/dashboard', $data);
        } else {
            echo "Tidak ada otoritas!";
        }
    }

    function admin()
    {
        if ($this->session->userdata('role') === '2') {
            $userId             = $this->session->userdata('userid');
            $data['detail']     = $this->User_data->detailDashboard($userId);
            $data['token']      = $this->User_data->getToken($userId);
            $data['tl']         = $this->User_data->timeline($userId);
            $data['title']      = "Dashboard";
            $data['content']    = 'admin/home';
            $this->load->view('admin/dashboard', $data);
        } else {
            echo "Tidak ada otoritas!";
        }
    }
}
