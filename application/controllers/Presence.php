<?php
class Presence extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('GetData');
        $this->load->model('InsertData');
        $this->load->model('UpdateData');
        $this->load->library('session');
    }

    public function search()
    {
        $year   = $this->input->post('year');
        $month  = $this->input->post('month');

        $data['presenceData'] = $this->GetData->getPresence($year, $month);

        $data['title']      = "Absensi Karyawan";
        $data['content']    = 'presence/indexAbsensi';
        $this->load->view('dashboard', $data);
    }

    public function Presence()
    {
        $employeeId = $this->input->post('employeeId');
        $date       = $this->input->post('date');
        $month      = $this->input->post('month');
        $year       = $this->input->post('year');
        $checkIn    = $this->input->post('checkIn');
        $checkOut   = $this->input->post('checkOut');
        $action     = $this->input->post('action');

        if ($employeeId && $date && $month && $year) {
            if ($action === 'absensi') {
                $absensi = array(
                    'employeeId' => $employeeId,
                    'date' => $date,
                    'month' => $month,
                    'year' => $year,
                    'status' => "1",
                    'checkIn' => $checkIn,
                );
                $this->InsertData->addPresence($absensi, 'presence');
                $this->session->set_flashdata('success', 'Absensi berhasil.');
            } elseif ($action === 'checkout') {
                if (!empty($checkOut)) {
                    $this->UpdateData->checkOut(array('employeeId' => $employeeId, 'date' => $date, 'month' => $month, 'year' => $year), array('checkOut' => $checkOut), 'presence');
                    $this->session->set_flashdata('success', 'Check Out berhasil.');
                } else {
                    $this->session->set_flashdata('error', 'Waktu Check Out tidak boleh kosong.');
                }
            } else {
                $this->session->set_flashdata('error', 'Tindakan tidak valid.');
            }
        } else {
            $this->session->set_flashdata('error', 'Semua kolom harus diisi.');
        }

        redirect('Index/Presence');
    }
}
