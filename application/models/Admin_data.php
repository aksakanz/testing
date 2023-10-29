<?php
class Admin_data extends CI_Model
{
	function getData($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	function verifing($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function pesertaView($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	function delUser($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	function addClassSession($data, $table)
	{
		$this->db->insert($table, $data);
	}

	function interviewDateView($where, $table)
	{
		$query = $this->db->get_where($table, $where);

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return array();
		}
	}

	function addInterviewSess($data, $table)
	{
		$this->db->insert($table, $data);
	}

	function viewInterviewing($userid)
	{
		$this->db->select('user.*, interview_session.*');
		$this->db->from('interview_session');
		$this->db->join('user', 'user.userid = interview_session.userid', 'left');

		$this->db->where('user.userid', $userid);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}


	function addProcessHistory($data, $table)
	{
		$this->db->insert($table, $data);
	}

	function updateIsInterview($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function updateInterviewResult($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function resetToken($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function getToken()
	{
		$this->db->select('user.nama, class_session.*');
		$this->db->from('class_session');
		$this->db->join('user', 'user.userid = class_session.userid', 'left');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}

	public function getPassUser()
	{
		$this->db->select('user.nama, class_session.*');
		$this->db->from('class_session');
		$this->db->join('user', 'user.userid = class_session.userid', 'left');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}

	public function createInterview($where)
	{
		$this->db->select('user.*, class_session.*');
		$this->db->from('class_session');
		$this->db->join('user', 'user.userid = class_session.userid', 'left');

		if ($where) {
			$this->db->where($where);
		}

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}

	function setInterviewDate($where)
	{
		$this->db->select('user.*, class_session.*');
		$this->db->from('class_session');
		$this->db->join('user', 'user.userid = class_session.userid', 'left');

		if ($where) {
			$this->db->where($where);
		}

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}

	function listSoal()
	{
		return $this->db->get('questions');
	}

	public function getSoalData()
	{
		$query = $this->db->get('questions');
		return $query->result();
	}


	public function deleteSoal()
	{
		$this->db->empty_table('questions');
	}

	public function interviewing()
	{
		return $this->db->get('interview_session');
	}

	public function insertQuestion($data)
	{
		$this->db->insert('questions', $data);
		return $this->db->insert_id();
	}

	function jobVacancy($table)
	{
		return $this->db->get($table);
	}

	function viewJobVacancy($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function updateJobVacancy($jobv_id, $data)
	{
		$this->db->where('jobv_id', $jobv_id);
		$this->db->update('jobv', $data);
	}

	function addJobVacancy($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function getUserByRole($role)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('role', $role);
		$query = $this->db->get();
		return $query->result();
	}

	function add_user($data, $table)
	{
		$this->db->insert($table, $data);
	}

	function updateUser($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function logUser()
	{
		return $this->db->get('process_history');
	}
}
