<?php
class Operational extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UpdateData');
        $this->load->library('session');
    }

    function updateOps()
    {
        $opId           = $this->input->post('opId');
        $dayFrom        = $this->input->post('dayFrom');
        $dayTo          = $this->input->post('dayTo');
        $checkInOp      = $this->input->post('checkInOp');
        $checkOutOp     = $this->input->post('checkOutOp');

        $data = array(
            'dayFrom' => $dayFrom,
            'dayTo' => $dayTo,
            'checkInOp' => $checkInOp,
            'checkOutOp' => $checkOutOp,
        );

        $where = array('opId' => $opId);

        $this->UpdateData->checkOut($where, $data, 'operational');
        redirect('Dashboard/Operational');
    }
}
