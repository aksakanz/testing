<?php
class Payroll extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('GetData');
        $this->load->library('session');
    }

    function search()
    {
        $year   = $this->input->post('year');
        $month  = $this->input->post('month');

        $data['presenceData'] = $this->GetData->getPresence($year, $month);

        $data['title']      = "Payroll Karyawan";
        $data['content']    = 'payroll/indexPayroll';
        $this->load->view('dashboard', $data);
    }

    public function detail($employeeId)
    {
        $data['employeeName']       = $this->GetData->getEmployeeName($employeeId);
        $data['employeePosition']   = $this->GetData->getEmployeePosition($employeeId);
        $data['payrollData']        = $this->GetData->getPayrollDetails($employeeId);

        // Menambahkan penanganan jika countPresenceByEmployeeId mengembalikan 0
        $countHadir = $this->GetData->countPresenceByEmployeeId($employeeId);
        $data['countHadir'] = $countHadir;

        $data['title'] = "Detail Payroll";
        $data['content'] = 'payroll/detailPayroll';
        $this->load->view('dashboard', $data);
    }
}
