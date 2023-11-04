<?php
class Index extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('');
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function presence()
	{
		$this->load->view('presence');
	}
}
