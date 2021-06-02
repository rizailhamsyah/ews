<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('Role') != 1){
            $url=base_url('Dashboard');
            redirect($url);
        }
        date_default_timezone_set("Asia/Jakarta");
    }
	public function index()
	{
		$data['title'] = "Log Aktivitas";
		$data['log'] = $this->db->get('tb_log')->result_array();
		$this->load->view('Layout/Header', $data);
		$this->load->view('Layout/Sidebar', $data);
		$this->load->view('Log/Index', $data);
		$this->load->view('Layout/Footer', $data);
	}
}
