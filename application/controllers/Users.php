<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('Role') != 1){
            $url=base_url('Dashboard');
            redirect($url);
        }
        $this->load->model('M_users');
        $this->load->model('M_log');
        date_default_timezone_set("Asia/Jakarta");
    }
	// Controller function view data users 
	public function index()
	{
		$data['title'] = "Data User";
		$data['users'] = $this->db->get('tb_users')->result_array();
		$this->load->view('Layout/Header', $data);
		$this->load->view('Layout/Sidebar', $data);
		$this->load->view('Users/Index', $data);
		$this->load->view('Layout/Footer', $data);
	}

	// Controller function insert data users
	public function save(){
        $data = $this->input->post();
        $data = array(
            'ID' => '',
            'Nama' => $data['Nama'],
            'Email' => $data['Email'],
            'Username' => $data['Username'],
            'Password' => md5($data['Password']),
            'Role' => $data['Role'],
            'Status' => $data['Status']
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
            'Aktivitas' => "Data user atas nama ".$data['Nama']." berhasil ditambahkan",
            'User' => $this->session->userdata("Username"),
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
			Data User<span class="font-weight-semibold"> Berhasil</span> Disimpan
			</div>');

        redirect('Users');
    }

    public function update($ID){
        $data = $this->input->post();
        
        $data = array(
            'Nama' => $data['Nama'],
            'Email' => $data['Email'],
            'Username' => $data['Username'],
            'Role' => $data['Role'],
            'Status' => $data['Status']
        );

        $result = $this->db->where('ID', $ID)->update('tb_users', $data);

        // Proses merekam data pada log aktivitas start
        if ($this->agent->is_browser()){
            $agent = $this->agent->browser().' '.$this->agent->version();
        }elseif ($this->agent->is_mobile()){
            $agent = $this->agent->mobile();
            }

        $arr = array(
            'ID' => $this->M_log->kode(),
            'Tanggal_Waktu' => date('Y-m-d H:i:s'),
            'Aktivitas' => "Data user atas nama ".$data['Nama']." berhasil diubah",
            'User' => $this->session->userdata("Username"),
            'Sistem_Operasi' => $this->agent->platform(),
            'Aplikasi' => $agent,
            'IP_Address' => $this->input->ip_address(),
            'Status' => 2
        );

        $this->M_log->save($arr,'tb_log');
        // Proses merekam data pada log aktivitas end

        $this->session->set_flashdata('notif', '<div class="alert alert-success border-0 alert-dismissible">
			<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
			Data User<span class="font-weight-semibold"> Berhasil</span> Diupdate
			</div>');

        redirect('Users');
    }

    public function Reset($ID){
    	$Nama = $this->db->get_where('tb_users', ['ID' => $ID])->row_array();
        $data = $this->input->post();
        
        $data = array(
            'Password' => md5('pupukkujang')
        );

        $result = $this->db->where('ID', $ID)->update('tb_users', $data);

        // Proses merekam data pada log aktivitas start
        if ($this->agent->is_browser()){
            $agent = $this->agent->browser().' '.$this->agent->version();
        }elseif ($this->agent->is_mobile()){
            $agent = $this->agent->mobile();
            }

        $arr = array(
            'ID' => $this->M_log->kode(),
            'Tanggal_Waktu' => date('Y-m-d H:i:s'),
            'Aktivitas' => "Data user atas nama ".$Nama['Nama']." berhasil direset",
            'User' => $this->session->userdata("Username"),
            'Sistem_Operasi' => $this->agent->platform(),
            'Aplikasi' => $agent,
            'IP_Address' => $this->input->ip_address(),
            'Status' => 2
        );

        $this->M_log->save($arr,'tb_log');
        // Proses merekam data pada log aktivitas end

        $this->session->set_flashdata('notif', '<div class="alert alert-success border-0 alert-dismissible">
			<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
			Password Data User<span class="font-weight-semibold"> Berhasil</span> Direset menjadi <span class="font-weight-semibold">pupukkujang</span>
			</div>');

        redirect('Users');
    }

    public function Delete($ID=null){
    	$Nama = $this->db->get_where('tb_users', ['ID' => $ID])->row_array();
        if (!isset($ID)) show_404();
        if ($this->M_users->delete($ID)) {

        // Proses merekam data pada log aktivitas start
        if ($this->agent->is_browser()){
            $agent = $this->agent->browser().' '.$this->agent->version();
        }elseif ($this->agent->is_mobile()){
            $agent = $this->agent->mobile();
            }

        $arr = array(
            'ID' => $this->M_log->kode(),
            'Tanggal_Waktu' => date('Y-m-d H:i:s'),
            'Aktivitas' => "Data user atas nama ".$Nama['Nama']." berhasil dihapus",
            'User' => $this->session->userdata("Username"),
            'Sistem_Operasi' => $this->agent->platform(),
            'Aplikasi' => $agent,
            'IP_Address' => $this->input->ip_address(),
            'Status' => 3
        );

        $this->M_log->save($arr,'tb_log');
        // Proses merekam data pada log aktivitas end
      
        $this->session->set_flashdata('notif', '<div class="alert alert-danger border-0 alert-dismissible">
			<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
			Data User<span class="font-weight-semibold"> Berhasil</span> Dihapus
			</div>');
        redirect('Users');
        }
    }
}
