<?php
class AdminDashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_data');
	}

	function home()
	{
		if ($this->session->userdata('role') === '2') {
			$data['title']      = "Dashboard";
			$data['content']    = 'admin/home';
			$this->load->view('admin/dashboard', $data);
		} else {
			echo "Tidak ada otoritas!";
		}
	}

	function peserta()
	{
		$where              = array('role' => 1, 'is_verified' => 0);
		$data['peserta']    = $this->Admin_data->getData($where, 'user')->result();
		$data['title']      = "Verifikasi Peserta";
		$data['content']    = 'admin/peserta/verif';
		$this->load->view('admin/dashboard', $data);
	}

	function pesertaView($userid)
	{
		$where = array('userid' => $userid);
		$data['content'] = 'admin/peserta/verifView';
		$data['title']  = "Data Peserta";
		$data['peserta'] = $this->Admin_data->pesertaView($where, 'user')->result();
		$this->load->view("admin/dashboard", $data);
	}

	function dbPesertaView($userid)
	{
		$where = array('userid' => $userid);
		$data['content'] = 'admin/peserta/dbVerifView';
		$data['title']  = "Data Peserta";
		$data['peserta'] = $this->Admin_data->pesertaView($where, 'user')->result();
		$this->load->view("admin/dashboard", $data);
	}

	function dbPeserta()
	{
		$where              = array('role' => 1, 'is_verified' => 1);
		$data['peserta']    = $this->Admin_data->getData($where, 'user')->result();
		$data['title']      = "Database Peserta";
		$data['content']    = 'admin/peserta/dbPeserta';
		$this->load->view('admin/dashboard', $data);
	}

	function verified()
	{
		$userid = $this->input->post('userid');
		$token = $this->input->post('token');
		$is_verified = "1";

		$where  = array(
			'userid' => $userid,
		);

		$data = array(
			'is_verified' => $is_verified,
		);
		$data2 = array(
			'userid' => $userid,
			'token' => $token,
		);
		$this->Admin_data->verifing($where, $data, 'user');
		$this->Admin_data->addClassSession($data2, 'class_session');
		redirect('AdminDashboard/peserta');
	}

	function token()
	{
		$combinedData = $this->Admin_data->getToken();

		if ($combinedData) {
			$data['title'] = "Token";
			$data['content'] = 'admin/sesiKelas/token';
			$data['token'] = $combinedData;
			$this->load->view('admin/dashboard', $data);
		} else {
			$data['title'] = "Token";
			$data['content'] = 'admin/sesiKelas/token';
			$data['token'] = $combinedData;
			$this->load->view('admin/dashboard', $data);
		}
	}

	function pesertaPass()
	{
		$combinedData = $this->Admin_data->getPassUser();

		if ($combinedData) {
			$data['title'] = "Hasil Psikotes";
			$data['content'] = 'admin/sesiKelas/pass';
			$data['data'] = $combinedData;
			$this->load->view('admin/dashboard', $data);
		} else {
			echo "No matching data found.";
		}
	}

	function delUser($userid)
	{
		$where = array('userid' => $userid);
		$this->Admin_data->delUser($where, 'user');
		$this->Admin_data->delUser($where, 'class_session');
		$this->Admin_data->delUser($where, 'interview_session');
		$this->Admin_data->delUser($where, 'process_history');
		redirect('AdminDashboard/dbPeserta');
	}

	function resetToken()
	{
		$userid     = $this->input->post('userid');
		$token      = $this->input->post('token');
		$is_used    = $this->input->post('is_used');

		$data = array(
			'token' => $token,
			'is_used' => $is_used,
		);

		$where  = array(
			'userid' => $userid,
		);

		$this->Admin_data->resetToken($where, $data, 'class_session');
		redirect('AdminDashboard/token');
	}

	function createInterview()
	{
		$where = array('user.role' => 1, 'user.is_interview' => 0, 'class_session.status' => 'Lulus');
		$combinedData = $this->Admin_data->createInterview($where);

		if ($combinedData) {
			$data['title'] = "Hasil Psikotes";
			$data['content'] = 'admin/interview/createInterview';
			$data['data'] = $combinedData;
			$this->load->view('admin/dashboard', $data);
		} else {
			$this->session->set_flashdata('message', 'Belum ada data.');
			$data['title'] = "Penjadwalan Interview";
			$data['content'] = 'admin/interview/createInterview';
			$data['data'] = $combinedData;
			$this->load->view('admin/dashboard', $data);
		}
	}

	function setInterviewDate($userid)
	{
		$where = array('user.userid' => $userid);
		$combinedData = $this->Admin_data->createInterview($where);

		if ($combinedData) {
			$data['title']  = "Penjadwalan Interview Peserta";
			$data['content'] = 'admin/interview/setInterviewDate';
			$data['peserta'] = $combinedData;
			$this->load->view('admin/dashboard', $data);
		} else {
			$this->session->set_flashdata('message', 'Belum ada data.');
			$data['title']  = "Penjadwalan Interview Peserta";
			$data['content'] = 'admin/interview/setInterviewDate';
			$data['peserta'] = $combinedData;
			$this->load->view('admin/dashboard', $data);
		}
	}

	function setInterview()
	{
		$userid             = $this->input->post('userid');
		$nama               = $this->input->post('nama');
		$job_title          = $this->input->post('job_title');
		$antrian            = $this->input->post('antrian');
		$tanggal            = $this->input->post('tanggal');
		$tempat             = $this->input->post('tempat');
		$persyaratan        = $this->input->post('persyaratan');
		$statusInterview    = $this->input->post('statusInterview');
		$is_inteview        = $this->input->post('is_interview');
		$domisili           = $this->input->post('domisili');
		$tanggal_ujian      = $this->input->post('tanggal_ujian');
		$nilai              = $this->input->post('nilai');


		$where = array('userid' => $userid);
		$postInterview = array(
			'userid' => $userid,
			'nama' => $nama,
			'job_title' => $job_title,
			'antrian' => $antrian,
			'tanggal' => $tanggal,
			'tempat' => $tempat,
			'persyaratan' => $persyaratan,
			'statusInterview' => $statusInterview,
			'domisili' => $domisili,
			'tanggal_ujian' => $tanggal_ujian,
			'nilai' => $nilai,
		);

		$data = array('is_interview' => $is_inteview);

		$this->Admin_data->updateIsInterview($where, $data, 'user');
		$this->Admin_data->addInterviewSess($postInterview, 'interview_session');
		redirect('AdminDashboard/createInterview');
	}

	function interviewing()
	{
		$data['title']      = "Interview";
		$data['content']    = 'admin/interview/interviewing';
		$data['data']       = $this->Admin_data->interviewing()->result();
		$this->load->view('admin/dashboard', $data);
	}

	function viewInterviewing($userid)
	{
		$combinedData = $this->Admin_data->viewInterviewing($userid);

		if ($combinedData) {
			$data['content'] = 'admin/interview/viewInterviewing';
			$data['title'] = "Interviewing Decision";
			$data['peserta'] = $combinedData;
			$this->load->view('admin/dashboard', $data);
		} else {
			$this->session->set_flashdata('message', 'Belum ada data.');
			$data['content'] = 'admin/interview/viewInterviewing';
			$data['title'] = "Interviewing Decision";
			$data['peserta'] = $combinedData;
			$this->load->view('admin/dashboard', $data);
		}
	}

	function setInterviewResult()
	{
		$userid          = $this->input->post('userid');
		$statusInterview = $this->input->post('statusInterview');
		$historyTitle    = $this->input->post('historyTitle');
		$historyDesc     = $this->input->post('historyDesc');
		$date            = $this->input->post('date');

		$where = array('userid' => $userid);
		$postInterviewResult = array(
			'userid' => $userid,
			'statusInterview' => $statusInterview,
		);

		$postProcessHistory = array(
			'userid' => $userid,
			'historyTitle' => $historyTitle,
			'historyDesc' => $historyDesc,
			'date' => $date,
		);

		$this->Admin_data->updateIsInterview($where, $postInterviewResult, 'interview_session');
		$this->Admin_data->addProcessHistory($postProcessHistory, 'process_history');
		redirect('AdminDashboard/interviewing');
	}

	function managementSoal()
	{
		$data['title']      = "Management Soal";
		$data['content']    = "admin/soal/management";
		$this->load->view('admin/dashboard', $data);
	}

	function downloadFile()
	{
		$file_path = './assets/soal/formatBankSoal.xlsx';
		if (file_exists($file_path)) {
			header('Content-Type: application/csv');
			header('Content-Disposition: attachment;filename="file.xlsx"');
			header('Cache-Control: max-age=0');
			readfile($file_path);
		} else {
			echo "File CSV tidak ditemukan.";
		}
	}

	function listSoal()
	{
		$data['list']    = $this->Admin_data->listSoal()->result();
		$data['title']      = "List Soal";
		$data['content']    = "admin/soal/list";
		$this->load->view('admin/dashboard', $data);
	}

	public function getSoalData()
	{
		$data = $this->Admin_data->getSoalData();
		echo json_encode($data);
	}

	public function uploadSoal()
	{
		$data = array();

		if ($this->input->post('import_data')) {
			$config['upload_path'] = './assets/soal/';
			$config['allowed_types'] = 'csv';
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('userfile')) {
				$upload_data = $this->upload->data();
				$file_path = $upload_data['full_path'];
				$csv_data = array_map('str_getcsv', file($file_path));
				array_shift($csv_data);
				foreach ($csv_data as $row) {
					$data = array(
						'question_text' => $row[0],
						'option_a' => $row[1],
						'option_b' => $row[2],
						'option_c' => $row[3],
						'option_d' => $row[4],
						'correct_option' => $row[5],
					);

					$this->Admin_data->insertQuestion($data);
				}

				$this->session->set_flashdata('msg', 'Semua data berhasil diupload.');

				unlink($file_path);
			} else {
				$data['error'] = $this->upload->display_errors();
			}
		}

		$data['title'] = "Management Soal";
		$data['content'] = "admin/soal/management";
		$this->load->view('admin/dashboard', $data);
	}

	public function deleteSoal()
	{
		$this->Admin_data->deleteSoal();
		$this->session->set_flashdata('success_message', 'Semua data berhasil dihapus.');
		redirect('AdminDashboard/managementSoal');
	}

	function jobVacancy()
	{
		$data['content'] = 'admin/jobv/list';
		$data['title']  = "Management Job Vacancy";
		$data['peserta'] = $this->Admin_data->jobVacancy('jobv')->result();
		$this->load->view("admin/dashboard", $data);
	}

	function addJobVacancy()
	{
		$data['content'] = 'admin/jobv/tambahLowongan';
		$data['title']  = "Tambah Job Vacancy";
		$this->load->view("admin/dashboard", $data);
	}

	function viewJobVacancy($jobv_id)
	{
		$where = array('jobv_id' => $jobv_id);
		$data['content'] = 'admin/jobv/view';
		$data['title']  = "Ubah Data Job Vacancy";
		$data['jobv'] = $this->Admin_data->viewJobVacancy($where, 'jobv')->result();
		$this->load->view("admin/dashboard", $data);
	}

	public function updateJobVacancy($jobv_id)
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$jobv_title = $this->input->post('jobv_title');
			$jobv_desc = $this->input->post('jobv_desc');
			$jobv_requirement = implode(', ', $this->input->post('jobv_requirement'));
			$jobv_major = implode(', ', $this->input->post('jobv_major'));
			$jobv_status = $this->input->post('jobv_status');

			$update_data = array(
				'jobv_title' => $jobv_title,
				'jobv_desc' => $jobv_desc,
				'jobv_requirement' => $jobv_requirement,
				'jobv_major' => $jobv_major,
				'jobv_status' => $jobv_status
			);

			$this->Admin_data->updateJobVacancy($jobv_id, $update_data);
			redirect('AdminDashboard/jobVacancy');
		}
	}

	function postJobVacancy()
	{
		$jobv_title         = $this->input->post('jobv_title');
		$jobv_desc          = $this->input->post('jobv_desc');
		$jobv_requirement   = implode(', ', $this->input->post('jobv_requirement'));
		$jobv_major         = implode(', ', $this->input->post('jobv_major'));
		$jobv_status        = $this->input->post('jobv_status');

		if (empty($jobv_title) || empty($jobv_desc)) {
			$this->session->set_flashdata('error', 'Isi semua kolom yang diperlukan');
			redirect('AdminDashboard/addJobVacancy');
			return;
		}

		$data = array(
			'jobv_title' => $jobv_title,
			'jobv_desc' => $jobv_desc,
			'jobv_requirement' => $jobv_requirement,
			'jobv_major' => $jobv_major,
			'jobv_status' => $jobv_status,
		);

		$this->Admin_data->addJobVacancy($data, 'jobv');

		$this->session->set_flashdata('message', 'Data Berhasil diupload');
		redirect('AdminDashboard/addJobVacancy');
	}

	function addUser()
	{
		$data['title']		= "Tambah Data User";
		$data['content']	= "admin/user/addUser";
		$this->load->view('admin/dashboard', $data);
	}

	function listUser()
	{
		$data['title'] 		= "List User";
		$data['content'] 	= "admin/user/list";
		$data['users']		= $this->Admin_data->getUserByRole(2);
		$this->load->view('admin/dashboard', $data);
	}

	function viewListUser($userid)
	{

		$where = array('userid' => $userid);
		$data['title']		= "Edit Data Admin";
		$data['content']	= "admin/user/viewDetailUser";
		$data['peserta'] = $this->Admin_data->pesertaView($where, 'user')->result();
		$this->load->view('admin/dashboard', $data);
	}

	function postUser()
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
				$nik                = $this->input->post('nik');
				$nama               = $this->input->post('nama');
				$gender             = $this->input->post('gender');
				$email              = $this->input->post('email');
				$password           = $this->input->post('password');
				$role				= $this->input->post('role');


				$data   = array(
					'userid' => $userid,
					'nik' => $nik,
					'nama' => $nama,
					'gender' => $gender,
					'email' => $email,
					'password' => $password,
					'role' => $role,
					'foto' => $foto,
				);
				$this->session->set_flashdata('message', 'Data berhasil ditambahkan');
				$this->Admin_data->add_user($data, 'user');
				redirect('AdminDashboard/addUser');
			}
		}
	}

	function delAdmin($userid)
	{
		$where = array('userid' => $userid);
		$this->Admin_data->delUser($where, 'user');
		redirect('AdminDashboard/listUser');
	}

	function updateUser()
	{
		$userid		= $this->input->post('userid');
		$foto		= $this->input->post('foto');
		$nik 		= $this->input->post('nik');
		$nama		= $this->input->post('nama');
		$gender		= $this->input->post('gender');
		$email		= $this->input->post('email');
		$password	= $this->input->post('password');

		$data   = array(
			'userid' => $userid,
			'foto' => $foto,
			'nik' => $nik,
			'nama' => $nama,
			'gender' => $gender,
			'email' => $email,
			'password' => $password,
		);

		$where  = array('userid' => $userid);

		$this->Admin_data->updateUser($where, $data, 'user');
		redirect('AdminDashboard/listUser');
	}

	function logUser()
	{
		$data['log']     = $this->Admin_data->logUser()->result();
		$data['title']      = "Log Aktifitas User";
		$data['content']    = 'admin/log';
		$this->load->view('admin/dashboard', $data);
	}
}
