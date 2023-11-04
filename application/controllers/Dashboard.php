<?php
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('GetData');
        $this->load->library('session');
    }

    public function index()
    {
        $data['title']      = "Dashboard";
        $data['content']    = 'home';
        $this->load->view('dashboard', $data);
    }

    function MasterPegawai()
    {
        $data['getEmp']     = $this->GetData->getData('employee')->result();
        $data['title']      = "Master Pegawai";
        $data['content']    = 'master_pegawai/indexMasterPegawai';
        $this->load->view('dashboard', $data);
    }

    function Payroll()
    {
        $data['title']      = "Payroll Karyawan";
        $data['content']    = 'payroll/indexPayroll';
        $this->load->view('dashboard', $data);
    }

    function Operational()
    {
        $data['getOps']     = $this->GetData->getOps('operational')->result();
        $data['title']      = "Hari Kerja dan Jam Kerja";
        $data['content']    = 'operasional/hariMasuk';
        $this->load->view('dashboard', $data);
    }

    function Presence()
    {
        $data['title']      = "Absensi Karyawan";
        $data['content']    = 'presence/indexAbsensi';
        $this->load->view('dashboard', $data);
    }
}
