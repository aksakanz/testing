<?php
class User_data extends CI_Model
{
    public function detailDashboard($userId)
    {
        $this->db->where('userid', $userId);
        $query  = $this->db->get('user');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function timeline($userId)
    {
        $this->db->select('*');
        $this->db->from('process_history');
        $this->db->where('userid', $userId);
        $this->db->order_by('date', 'ASC');
        return $this->db->get()->result_array();
    }

    public function getToken($userId)
    {
        $this->db->select('token');
        $this->db->where('userid', $userId);
        $query = $this->db->get('class_session');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->token;
        } else {
            return null;
        }
    }

    public function getIsUsed($userid)
    {
        $this->db->select('is_used');
        $this->db->where('userid', $userid);
        $query = $this->db->get('class_session');

        if ($query->num_rows() > 0) {
            return $query->row()->is_used;
        } else {
            return 0;
        }
    }

    function updateToken($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function isTokenValid($userid, $token)
    {
        $this->db->where('userid', $userid);
        $this->db->where('token', $token);
        $query = $this->db->get('class_session');

        return $query->num_rows() > 0;
    }

    public function scoresTest($userId)
    {
        $this->db->where('userid', $userId);
        $query  = $this->db->get('class_session');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function interviewInfo($userId)
    {
        $this->db->where('userid', $userId);
        $query  = $this->db->get('interview_session');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
}
