<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {
	public function index()
	{
		$data['title'] = "Log Aktivitas";
		$this->load->view('api/login', $data);
	}
}
