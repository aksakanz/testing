<?php
class MAuth extends CI_Model
{
    public function check_login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $result = $this->db->get('user');
        return $result;
    }
}
