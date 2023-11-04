<?php
class UpdateData extends CI_Model
{
    function checkOut($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
