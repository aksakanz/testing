<?php
class InsertData extends CI_Model
{
    function addPresence($data, $table)
    {
        $this->db->insert($table, $data);
    }
}
