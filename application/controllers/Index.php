<?php

class Index extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('JobVacancy'); 
	}

	public function index()
	{
		$data['items'] = $this->JobVacancy->get_data();

		foreach ($data['items'] as $result) {
			$result->jobv_major = explode(',', $result->jobv_major);
			$result->jobv_requirement = explode(',', $result->jobv_requirement);
		}

		$this->load->view('index', $data);
	}

	public function applyJob($jobv_id)
	{
		$where = array('jobv_id' => $jobv_id);
		$data['jobvDetail'] = $this->JobVacancy->getJobvById($where, 'jobv')->result();
		$jobv_id = $this->input->get('jobv_id');
		$this->load->view('formApply', $data);
	}

	function apply()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->load->library('upload');
			$config['upload_path']      = './assets/img/profile/';
			$config['allowed_types']    = 'jpg|jpeg|png';
			$config['max_size']         = 2048;
			$config['file_name']        = uniqid();

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('foto')) {
				$error = $this->upload->display_errors();
				echo $error;
			} else {
				$image_data     	= $this->upload->data();
				$foto   			= $image_data['file_name'];

				$userid				= $this->input->post('userid');
				$date				= $this->input->post('date');
				$job_title          = $this->input->post('job_title');
				$nik                = $this->input->post('nik');
				$nama               = $this->input->post('nama');
				$gender             = $this->input->post('gender');
				$tlp                = $this->input->post('tlp');
				$email              = $this->input->post('email');
				$tgl_lhr            = $this->input->post('tgl_lhr');
				$ktp_provinsi       = $this->input->post('ktp_provinsi');
				$ktp_kota           = $this->input->post('ktp_kota');
				$ktp_kecamatan      = $this->input->post('ktp_kecamatan');
				$ktp_kelurahan      = $this->input->post('ktp_kelurahan');
				$ktp_alamat_jalan   = $this->input->post('ktp_alamat_jalan');
				$dom_provinsi       = $this->input->post('dom_provinsi');
				$dom_kota           = $this->input->post('dom_kota');
				$dom_kecamatan      = $this->input->post('dom_kecamatan');
				$dom_kelurahan      = $this->input->post('dom_kelurahan');
				$dom_alamat_jalan   = $this->input->post('dom_alamat_jalan');
				$agama              = $this->input->post('agama');
				$s_marital          = $this->input->post('s_marital');
				$last_major         = $this->input->post('last_major');
				$institusi          = $this->input->post('institusi');
				$last_ipk           = $this->input->post('last_ipk');
				$tahun_lulus        = $this->input->post('tahun_lulus');
				$keahlian           = $this->input->post('keahlian');
				$last_job           = $this->input->post('last_job');
				$inst_name          = $this->input->post('inst_name');
				$last_pos           = $this->input->post('last_pos');
				$from_year          = $this->input->post('from_year');
				$to_year            = $this->input->post('to_year');
				$gaji               = $this->input->post('gaji');
				$password           = $this->input->post('password');
				$role				= "1";
				$historyTitle		= "Kamu Telah Terdaftar Di Sistem Kami";
				$historyDesc		= "Silahkan tunggu sampai kamu mendapatkan token untuk mengakses psikotes secara online";


				$data   = array(
					'userid' => $userid,
					'job_title' => $job_title,
					'nik' => $nik,
					'nama' => $nama,
					'gender' => $gender,
					'tlp' => $tlp,
					'email' => $email,
					'tgl_lhr' => $tgl_lhr,
					'ktp_provinsi' => $ktp_provinsi,
					'ktp_kota' => $ktp_kota,
					'ktp_kecamatan' => $ktp_kecamatan,
					'ktp_kelurahan' => $ktp_kelurahan,
					'ktp_alamat_jalan' => $ktp_alamat_jalan,
					'dom_provinsi' => $dom_provinsi,
					'dom_kota' => $dom_kota,
					'dom_kecamatan' => $dom_kecamatan,
					'dom_kelurahan' => $dom_kelurahan,
					'dom_alamat_jalan' => $dom_alamat_jalan,
					'agama' => $agama,
					's_marital' => $s_marital,
					'last_major' => $last_major,
					'institusi' => $institusi,
					'last_ipk' => $last_ipk,
					'tahun_lulus' => $tahun_lulus,
					'keahlian' => $keahlian,
					'last_job' => $last_job,
					'inst_name' => $inst_name,
					'last_pos' => $last_pos,
					'from_year' => $from_year,
					'to_year' => $to_year,
					'gaji' => $gaji,
					'password' => $password,
					'role' => $role,
					'foto' => $foto,
				);

				$data2	= array(
					'userid' => $userid,
					'date' => $date,
					'historyTitle' => $historyTitle,
					'historyDesc' => $historyDesc,

				);


				$this->JobVacancy->add_user($data, 'user');
				$this->JobVacancy->add_history($data2, 'process_history');
				redirect('index/successRegist');
			}
		}
	}

	public function contact()
	{
		$this->load->view('contact');
	}

	public function company()
	{
		$this->load->view('company');
	}

	public function successRegist()
	{
		$this->load->view('successregist');
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function forget(){
		$this->load->view('forget.php');
	}
}
