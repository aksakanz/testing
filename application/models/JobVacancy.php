<?php
class JobVacancy extends CI_Model
{
    public function get_data()
    {
        return $this->db->get('jobv')->result();
    }

    function getJobvById($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function add_user($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function add_history($data, $table)
    {
        $this->db->insert($table, $data);
    }
}
