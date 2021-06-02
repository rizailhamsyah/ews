<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('Role') != 1){
            $url=base_url('Dashboard');
            redirect($url);
        }
        $this->load->model('M_kategori');
        $this->load->model('M_log');
        date_default_timezone_set("Asia/Jakarta");
    }
	// Controller function view data kategori 
	public function index()
	{
		$data['title'] = "Data Kategori";
		$data['kategori'] = $this->db->get('tb_kategori')->result_array();
		$this->load->view('Layout/Header', $data);
		$this->load->view('Layout/Sidebar', $data);
		$this->load->view('Kategori/Index', $data);
		$this->load->view('Layout/Footer', $data);
	}

	// Controller function insert data kategori
	public function save(){
        $data = $this->input->post();
        $data = array(
            'ID' => '',
            'Kategori' => $data['Kategori']
        );

        $this->M_kategori->save($data,'tb_kategori');

        // Proses merekam data pada log aktivitas start
        if ($this->agent->is_browser()){
            $agent = $this->agent->browser().' '.$this->agent->version();
        }elseif ($this->agent->is_mobile()){
            $agent = $this->agent->mobile();
            }

        $arr = array(
            'ID' => $this->M_log->kode(),
            'Tanggal_Waktu' => date('Y-m-d H:i:s'),
            'Aktivitas' => "Kategori ".$data['Kategori']." berhasil ditambahkan",
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

        redirect('Kategori');
    }

    public function update($ID){
        $data = $this->input->post();
        
        $data = array(
            'Kategori' => $data['Kategori']
        );

        $result = $this->db->where('ID', $ID)->update('tb_kategori', $data);

        // Proses merekam data pada log aktivitas start
        if ($this->agent->is_browser()){
            $agent = $this->agent->browser().' '.$this->agent->version();
        }elseif ($this->agent->is_mobile()){
            $agent = $this->agent->mobile();
            }

        $arr = array(
            'ID' => $this->M_log->kode(),
            'Tanggal_Waktu' => date('Y-m-d H:i:s'),
            'Aktivitas' => "Kategori ".$data['Kategori']." berhasil diubah",
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

        redirect('Kategori');
    }

    public function Delete($ID=null){
    	$Nama = $this->db->get_where('tb_kategori', ['ID' => $ID])->row_array();
        if (!isset($ID)) show_404();
        if ($this->M_kategori->delete($ID)) {

        // Proses merekam data pada log aktivitas start
        if ($this->agent->is_browser()){
            $agent = $this->agent->browser().' '.$this->agent->version();
        }elseif ($this->agent->is_mobile()){
            $agent = $this->agent->mobile();
            }

        $arr = array(
            'ID' => $this->M_log->kode(),
            'Tanggal_Waktu' => date('Y-m-d H:i:s'),
            'Aktivitas' => "Kategori ".$Nama['Kategori']." berhasil dihapus",
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
        redirect('Kategori');
        }
    }
}
