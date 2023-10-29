<?php
class Testing extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Exam_model');
    }

    function home()
    {

        $userId = $this->session->userdata('userid');
        $data['title'] = "BrainProfiler PT Infomedia Nusantara";
        $data['content'] = "user/exam/home";
        $where = array('userid' => $userId);
        $data['profile'] = $this->Exam_model->getProfile($where, 'user')->result();
        $this->load->view('user/exam/dashboard', $data);
    }

    public function exam()
    {
        if ($this->session->userdata('exam_completed')) {
            redirect('UserDashboard/home');
        }

        $questions = $this->db->get('questions')->result();
        shuffle($questions);

        $data['questions'] = $questions;
        $data['title'] = "BrainProfiler PT Infomedia Nusantara";
        $data['content'] = "user/exam/exam";
        $this->load->view('user/exam/dashboard', $data);
    }

    public function submit()
    {
        $score = 0;
        $total_questions = $this->db->count_all('questions');
        $user_answers = $this->input->post();
        unset($user_answers['submit']);

        foreach ($user_answers as $question_id => $user_answer) {
            $question = $this->Exam_model->get_question_by_id($question_id);
            if ($question && $user_answer == $question->correct_option) {
                $score++;
            }
        }

        $percentage = ($score / $total_questions) * 100;

        $passing_grade = 65;
        $is_passed = ($percentage >= $passing_grade);

        if ($is_passed) {
            $this->session->set_flashdata('message', 'Selamat, Anda lulus!');
        } else {
            $this->session->set_flashdata('message', 'Maaf, Anda tidak lulus.');
        }

        $this->session->set_userdata('exam_completed', true);

        $data['score'] = $percentage;

        $userId = $this->session->userdata('userid');
        $where = array('userid' => $userId);
        $data['profile'] = $this->Exam_model->getProfile($where, 'user')->result();
        $data['title'] = "Hasil Ujian";
        $data['content'] = "user/exam/result";
        $this->load->view('user/exam/dashboard', $data);
    }

    public function postScore()
    {
        $userid         = $this->input->post('userid');
        $score          = $this->input->post('score');
        $status         = $this->input->post('status');
        $historyTitle   = $this->input->post('historyTitle');
        $histodyDesc    = $this->input->post('historyDesc');
        $date           = $this->input->post('date');

        $updateClassSession  = array(
            'userid' => $userid,
            'score' => $score,
            'date' => $date,
            'status' => $status,
        );

        $addProcessHistory = array(
            'userid' => $userid,
            'historyTitle' => $historyTitle,
            'date' => $date,
            'historyDesc' => $histodyDesc,
        );

        $where  = array('userid' => $userid);

        $this->Exam_model->postTimeLine($addProcessHistory, 'process_history');
        $this->Exam_model->updateClassSession($where, $updateClassSession, 'class_session');
        redirect('UserDashboard/home');
    }
}
