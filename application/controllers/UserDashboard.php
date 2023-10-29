<?php
class UserDashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_data');
    }

    function home()
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

    function scores()
    {
        if ($this->session->userdata('role') === '1') {
            $userId             = $this->session->userdata('userid');
            $data['score']      = $this->User_data->scoresTest($userId);
            $data['interview']  = $this->User_data->interviewInfo($userId);
            $data['title']      = "Hasil Test";
            $data['content']    = 'user/scores';
            $this->load->view('user/dashboard', $data);
        } else {
            echo "Tidak ada otoritas!";
        }
    }

    function profile()
    {
        if ($this->session->userdata('role') === '1') {
            $userId             = $this->session->userdata('userid');
            $data['detail']     = $this->User_data->detailDashboard($userId);
            $data['title']      = "Profile";
            $data['content']    = 'user/profile';
            $this->load->view('user/dashboard', $data);
        } else {
            echo "Tidak ada otoritas!";
        }
    }

    function test()
    {
        $userid = $this->input->post('userid');
        $token = $this->input->post('token');
        $current_is_used = $this->User_data->getIsUsed($userid);
        $historyTitle = "Kamu Telah Memakai Token ($token)";
        $date = date('d M y');
        $historyDesc = "Kamu sudah memakai token kamu, dan tidak dapat dipakai kembali, jika ada masalah harap hubungi pihak penyelenggara";

        if ($this->User_data->isTokenValid($userid, $token)) {
            if ($current_is_used == 0) {
                $is_used = 1;

                $data = array(
                    'userid' => $userid,
                    'token' => $token,
                    'is_used' => $is_used,
                );

                $data2 = array(
                    'userid' => $userid,
                    'historyTitle' => $historyTitle,
                    'date' => $date,
                    'historyDesc' => $historyDesc,
                );

                $this->load->model('JobVacancy');
                $where = array('userid' => $userid);
                $this->User_data->updateToken($where, $data, 'class_session');
                $this->JobVacancy->add_history($data2, 'process_history');
                $this->session->unset_userdata('exam_completed');
                redirect('Testing/home');
            } elseif ($current_is_used == 1) {
                $this->session->set_flashdata('message', 'Token sebelumnya sudah digunakan');
                redirect('UserDashboard/home');
            }
        } else {
            $this->session->set_flashdata('message', 'Token tidak valid.');
            redirect('UserDashboard/home');
        }
    }
}
