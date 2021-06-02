<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eror extends CI_Controller {
	public function index()
	{
		$data['title'] = "Eror 404 Not Found";
		$this->load->view('Eror/Index', $data);
	}
}
