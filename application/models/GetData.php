<?php
class GetData extends CI_Model
{

    function getData($table)
    {
        return $this->db->get($table);
    }

    function getOps($table)
    {
        return $this->db->get($table);
    }

    public function getPresence($year, $month)
    {
        $this->db->select('*');
        $this->db->from('presence');
        $this->db->join('employee', 'employee.employeeId = presence.employeeId', 'left');
        $this->db->where('year', $year);
        $this->db->where('month', $month);

        $query = $this->db->get();
        return $query->result();
    }

    public function getEmployeeName($employeeId)
    {
        $this->db->select('fullName');
        $this->db->from('employee');
        $this->db->where('employeeId', $employeeId);
        $query = $this->db->get();
        $result = $query->row();
        return ($result) ? $result->fullName : '';
    }

    public function getEmployeePosition($employeeId)
    {
        $this->db->select('position');
        $this->db->where('employeeId', $employeeId);
        $query = $this->db->get('employee');
        $result = $query->row();
        return ($result) ? $result->position : '';
    }

    public function getPayroll($year, $month)
    {
        $this->db->select('presence.employeeId, employee.fullName, SUM(presence.workHours) AS totalWorkHours');
        $this->db->from('presence');
        $this->db->join('employee', 'employee.employeeId = presence.employeeId', 'left');
        $this->db->where('year', $year);
        $this->db->where('month', $month);
        $this->db->group_by('presence.employeeId, employee.fullName');

        $query = $this->db->get();
        return $query->result();
    }

    public function getPayrollDetails($employeeId)
    {
        $this->db->select('*');
        $this->db->from('presence');
        $this->db->where('employeeId', $employeeId);
        $query = $this->db->get();
        return $query->result();
    }

    public function countPresenceByEmployeeId($employeeId)
    {
        $this->db->select('COUNT(*) as countHadir');
        $this->db->from('presence');
        $this->db->where('employeeId', $employeeId);
        $this->db->where('status', '1');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->countHadir;
        } else {
            return 0;
        }
    }

    public function getEmployee($fullName)
    {
        $this->db->select('*');
        $this->db->from('employee');

        if (!empty($fullName)) {
            $this->db->like('fullName', $fullName);
        }

        $query = $this->db->get();
        return $query->result();
    }
}
