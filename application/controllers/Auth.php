<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	function __construct(){
		parent::__construct();	
		$this->load->model('M_auth');
		$this->load->model('M_log');
		$this->load->model('M_users');
		$this->load->library('form_validation');
        date_default_timezone_set("Asia/Jakarta");

	}
	public function index()
	{
		$data['title'] = "Login";
		$this->load->view('Auth/Index', $data);
	}

	public function Registrasi()
	{
		$data['title'] = "Registrasi";
		$this->load->view('Auth/Registrasi', $data);
	}

	public function Validasi()
	{
		$data = $this->input->post();
		$this->form_validation->set_rules('Nopek','No. Pekerja','is_unique[tb_users.Username]', ['is_unique'=>'<div class="alert alert-danger border-0 alert-dismissible">
			<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
			No. Pekerja Yang Anda Masukkan Telah<span class="font-weight-semibold"> Terdaftar!</span>
			</div>']);
        if($this->form_validation->run() === FALSE){
        	$data['title'] = "Registrasi";
            $this->load->view('Auth/Registrasi', $data);
        }else{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://portal.pupuk-kujang.co.id/apps/api_hr/public/api/master/emp/'.$data['Nopek'],
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
		    'Authorization: 356a192b7913b04c54574d18c28d46e6395428ab'
		  ),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		$data['title'] = "Registrasi";
		$data['result'] = json_decode($response,true);
		$this->load->view('Auth/Validasi_Registrasi', $data);
		}
	}

	public function authentication(){
		$username = $this->input->post('Username');
		$password = $this->input->post('Password');
		$where = array(
			'Username' => $username,
			'Password' => md5($password)
			);
		$cek = $this->M_auth->cek_login("tb_users",$where);
		$result = $this->M_auth->cek_login("tb_users",$where)->row();
		if($cek->num_rows() > 0){
			if($result->Status == 0){
				// Proses merekam data pada log aktivitas start
		        if ($this->agent->is_browser()){
		            $agent = $this->agent->browser().' '.$this->agent->version();
		        }elseif ($this->agent->is_mobile()){
		            $agent = $this->agent->mobile();
		            }

		        $arr = array(
		            'ID' => $this->M_log->kode(),
		            'Tanggal_Waktu' => date('Y-m-d H:i:s'),
		            'Aktivitas' => "Username ".$username." gagal login, karena username tersebut tidak aktif",
		            'User' => $username,
		            'Sistem_Operasi' => $this->agent->platform(),
		            'Aplikasi' => $agent,
		            'IP_Address' => $this->input->ip_address(),
		            'Status' => 2
		        );

		        $this->M_log->save($arr,'tb_users');
		        // Proses merekam data pada log aktivitas end

				$this->session->set_flashdata('notif', '<div class="alert alert-success border-0 alert-dismissible">
			<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
			Username yang anda masukkan<span class="font-weight-semibold"> Tidak Aktif!</span>
			</div>');

				redirect(base_url("Auth"));				
			}else{
			$data_session = array(
				'ID' => $result->ID,
				'Nama' => $result->Nama,
				'Username' => $result->Username,
				'Email' => $result->Email,
				'Role' => $result->Role
				);

			$this->session->set_userdata($data_session);

			// Proses merekam data pada log aktivitas start
	        if ($this->agent->is_browser()){
	            $agent = $this->agent->browser().' '.$this->agent->version();
	        }elseif ($this->agent->is_mobile()){
	            $agent = $this->agent->mobile();
	            }

	        $arr = array(
	            'ID' => $this->M_log->kode(),
	            'Tanggal_Waktu' => date('Y-m-d H:i:s'),
	            'Aktivitas' => "Username ".$username." berhasil login",
	            'User' => $username,
	            'Sistem_Operasi' => $this->agent->platform(),
	            'Aplikasi' => $agent,
	            'IP_Address' => $this->input->ip_address(),
	            'Status' => 1
	        );

	        $this->M_log->save($arr,'tb_users');
	        // Proses merekam data pada log aktivitas end

			redirect(base_url("Dashboard"));
			}
		}else{

			// Proses merekam data pada log aktivitas start
	        if ($this->agent->is_browser()){
	            $agent = $this->agent->browser().' '.$this->agent->version();
	        }elseif ($this->agent->is_mobile()){
	            $agent = $this->agent->mobile();
	            }

	        $arr = array(
	            'ID' => $this->M_log->kode(),
	            'Tanggal_Waktu' => date('Y-m-d H:i:s'),
	            'Aktivitas' => "Username ".$username." gagal login, karena username / password salah",
	            'User' => 'None',
	            'Sistem_Operasi' => $this->agent->platform(),
	            'Aplikasi' => $agent,
	            'IP_Address' => $this->input->ip_address(),
	            'Status' => 3
	        );

	        $this->M_log->save($arr,'tb_users');
	        // Proses merekam data pada log aktivitas end

			$this->session->set_flashdata('notif', '<div class="alert alert-danger border-0 alert-dismissible">
			<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
			Username / Password yang anda masukkan<span class="font-weight-semibold"> Salah!</span>
			</div>');

			redirect(base_url("Auth"));
		}
	}

	function logout(){
		// Proses merekam data pada log aktivitas start
	        if ($this->agent->is_browser()){
	            $agent = $this->agent->browser().' '.$this->agent->version();
	        }elseif ($this->agent->is_mobile()){
	            $agent = $this->agent->mobile();
	            }

	        $arr = array(
	            'ID' => $this->M_log->kode(),
	            'Tanggal_Waktu' => date('Y-m-d H:i:s'),
	            'Aktivitas' => "Username ".$this->session->userdata("Username")." berhasil logout",
	            'User' => $this->session->userdata("Username"),
	            'Sistem_Operasi' => $this->agent->platform(),
	            'Aplikasi' => $agent,
	            'IP_Address' => $this->input->ip_address(),
	            'Status' => 1
	        );

	        $this->M_log->save($arr,'tb_users');
	        // Proses merekam data pada log aktivitas end

		$this->session->sess_destroy();
		redirect(base_url());
	}

	// Controller function insert akun
	public function save(){
        $data = $this->input->post();
        $this->form_validation->set_rules('Nopek','No. Pekerja','is_unique[tb_users.Username]', ['is_unique'=>'No. Pekerja Telah Terdaftar Pada Sistem!']);
        if($this->form_validation->run() === FALSE){
        	$data['title'] = "Registrasi";
            $this->load->view('Auth/Registrasi', $data);
        }else{
            $data = array(
            'ID' => '',
            'Nama' => $data['Nama'],
            'Email' => $data['Email'],
            'Username' => $data['Username'],
            'Password' => md5($data['Username']),
            'Role' => 2,
            'Status' => 1
        );

        $this->M_users->save($data,'tb_users');

        // Proses merekam data pada log aktivitas start
        if ($this->agent->is_browser()){
            $agent = $this->agent->browser().' '.$this->agent->version();
        }elseif ($this->agent->is_mobile()){
            $agent = $this->agent->mobile();
            }

        $arr = array(
            'ID' => $this->M_log->kode(),
            'Tanggal_Waktu' => date('Y-m-d H:i:s'),
            'Aktivitas' => "Data user atas nama ".$data['Nama']." berhasil diregistrasi",
            'User' => $data['Username'],
            'Sistem_Operasi' => $this->agent->platform(),
            'Aplikasi' => $agent,
            'IP_Address' => $this->input->ip_address(),
            'Status' => 1
        );

        $this->M_log->save($arr,'tb_log');
        // Proses merekam data pada log aktivitas end

        // Flashdata notifikasi
        $this->session->set_flashdata('notif', '<div class="alert alert-success border-0 alert-dismissible">
			<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
			Registrasi Akun<span class="font-weight-semibold"> Berhasil</span> Dengan Username <b>'.$data['Username'].'</b> Dan Password <b>'.$data['Username'].'</b>
			</div>');

        redirect('Auth');
        }
    }
}
