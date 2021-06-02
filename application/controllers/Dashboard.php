<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('Role') !=TRUE){
            $url=base_url();
            redirect($url);
        };
        $this->load->model('M_dokumen');
        date_default_timezone_set("Asia/Jakarta");
    }
	public function index()
	{
		$data['title'] = "Dashboard";
		$date = date('Y-m-d');
		$data['Kategori'] = $this->db->get('tb_kategori')->num_rows();
		$data['Dokumen'] = $this->db->get('tb_dokumen')->num_rows();
		$data['Users'] = $this->db->get('tb_users')->num_rows();
		$data['Log'] = $this->db->get('tb_log')->num_rows();
		$data['Dokumen_Users'] = $this->db->get_where('tb_dokumen', ['ID_Users' => $this->session->userdata('ID')])->num_rows();
		$data['Reminder'] = $this->db->get_where('tb_reminder', ['ID_Users' => $this->session->userdata('ID')])->num_rows();
		$data['Kirim'] = $this->db->get_where('tb_reminder', ['ID_Users' => $this->session->userdata('ID') , 'Status' => 1])->num_rows();
		$data['Pending'] = $this->db->get_where('tb_reminder', ['ID_Users' => $this->session->userdata('ID') , 'Status' => null])->num_rows();
		$data['Hari'] = $this->M_dokumen->Dokumen();
		$data['Month_Week'] = $this->db->get('tb_dokumen')->result_array();
		$this->load->view('Layout/Header', $data);
		$this->load->view('Layout/Sidebar', $data);
		$this->load->view('Dashboard/Index', $data);
		$this->load->view('Layout/Footer', $data);
	}
}
