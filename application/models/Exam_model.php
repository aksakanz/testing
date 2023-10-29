<?php
class Exam_model extends CI_Model
{

    function getProfile($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function get_question_by_id($question_id)
    {
        $query = $this->db->get_where('questions', array('id' => $question_id));
        return $query->row();
    }

    public function postTimeLine($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function updateClassSession($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
