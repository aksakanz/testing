<?php
class MAuth extends CI_Model
{
    public function check_login($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $result = $this->db->get('user', 1);
        return $result;
    }

    function updateUser($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
}
