<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// use global_assets\js\plugins\PhpSpreadsheet\Spreadsheet;
// use global_assets\js\plugins\PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Dokumen extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('Role') == 1){
            $url=base_url('Dashboard');
            redirect($url);
        }
        $this->load->library('upload');
        $this->load->library('email');
        $this->load->model('M_dokumen');
        $this->load->model('M_reminder');
        $this->load->model('M_log');
        date_default_timezone_set("Asia/Jakarta");
    }
	// Controller function view data dokumen 
	public function index()
	{
		$data['title'] = "Data Dokumen";
        $data['dokumen'] = $this->db->get_where('tb_dokumen', ['ID_Users' => $this->session->userdata('ID')])->result_array();
		$data['reminder'] = $this->db->get('tb_reminder')->result_array();
		$this->load->view('Layout/Header', $data);
		$this->load->view('Layout/Sidebar', $data);
		$this->load->view('Dokumen/Index', $data);
		$this->load->view('Layout/Footer', $data);
	}

    // Controller function add data dokumen 
    public function tambah_data()
    {
        $data['title'] = "Tambah Data Dokumen";
        $data['kategori'] = $this->db->get('tb_kategori')->result_array();
        $this->load->view('Layout/Header', $data);
        $this->load->view('Layout/Sidebar', $data);
        $this->load->view('Dokumen/Tambah_Data', $data);
        $this->load->view('Layout/Footer', $data);
    }

    // Controller function update data dokumen 
    public function edit_data($ID)
    {
        $data['title'] = "Edit Data Dokumen";
        $data['dokumen'] = $this->db->get_where('tb_dokumen', ['ID' => $ID])->row_array();
        $data['kategori'] = $this->db->get('tb_kategori')->result_array();
        $this->load->view('Layout/Header', $data);
        $this->load->view('Layout/Sidebar', $data);
        $this->load->view('Dokumen/Edit_Data', $data);
        $this->load->view('Layout/Footer', $data);
    }

	// Controller function insert data dokumen
	public function save(){
        $data = $this->input->post();
        $config['upload_path']      = './global_assets/Lampiran'; //path folder
        $config['allowed_types']    = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name']     = TRUE; //nama yang terupload nantinya
        $this->upload->initialize($config);
            
        if($this->upload->do_upload("Lampiran")){
            $file = $this->upload->data();
            $data['Lampiran'] =  $file['file_name'];
            
        }else{
            $data['Lampiran'] = '';
        }
        $data = array(
            'ID' => '',
            'ID_Users' => $this->session->userdata('ID'),
            'No_Dokumen' => $data['No_Dokumen'],
            'Deskripsi' => $data['Deskripsi'],
            'ID_Kategori' => $data['ID_Kategori'],
            'Pihak_Terkait' => $data['Pihak_Terkait'],
            'Email' => $data['Email'],
            'Tanggal_Awal' => $data['Tanggal_Awal'],
            'Tanggal_Akhir' => $data['Tanggal_Akhir'],
            'Lampiran' => $data['Lampiran']
        );

        $this->M_dokumen->save($data,'tb_dokumen');

        // Proses merekam data pada log aktivitas start
        if ($this->agent->is_browser()){
            $agent = $this->agent->browser().' '.$this->agent->version();
        }elseif ($this->agent->is_mobile()){
            $agent = $this->agent->mobile();
            }

        $arr = array(
            'ID' => $this->M_log->kode(),
            'Tanggal_Waktu' => date('Y-m-d H:i:s'),
            'Aktivitas' => "Data dokumen dengan nomor dokumen ".$data['No_Dokumen']." berhasil ditambahkan",
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
			Data Dokumen<span class="font-weight-semibold"> Berhasil</span> Disimpan
			</div>');

        redirect('Dokumen');
    }

    // Controller function insert data reminder
    public function save_reminder(){
        $data = $this->input->post();
        $data = array(
            'ID_Dokumen' => $data['ID_Dokumen'],
            'ID_Users' => $this->session->userdata('ID'),
            'Tanggal' => $data['Tanggal']
        );

        $this->M_reminder->save($data,'tb_reminder');

        // Proses merekam data pada log aktivitas start
        if ($this->agent->is_browser()){
            $agent = $this->agent->browser().' '.$this->agent->version();
        }elseif ($this->agent->is_mobile()){
            $agent = $this->agent->mobile();
            }

        $arr = array(
            'ID' => $this->M_log->kode(),
            'Tanggal_Waktu' => date('Y-m-d H:i:s'),
            'Aktivitas' => "Data reminder berhasil ditambahkan",
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
            Data Reminder<span class="font-weight-semibold"> Berhasil</span> Disimpan
            </div>');

        redirect('Dokumen');
    }

    // Controller function update data dokumen
    public function update($ID){
        $data = $this->input->post();
        $file = $this->db->get_where('tb_dokumen', ['ID'=> $ID])->row();
        $config['upload_path']      = './global_assets/Lampiran'; //path folder
        $config['allowed_types']    = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name']     = TRUE; //nama yang terupload nantinya
        $this->upload->initialize($config);
            
        if($this->upload->do_upload("Lampiran")){
            $file = $this->upload->data();
            $data['Lampiran'] =  $file['file_name'];
            
        }else{
            $data['Lampiran'] = $file->Lampiran;
        }
        $data = array(
            'No_Dokumen' => $data['No_Dokumen'],
            'Deskripsi' => $data['Deskripsi'],
            'ID_Kategori' => $data['ID_Kategori'],
            'Pihak_Terkait' => $data['Pihak_Terkait'],
            'Email' => $data['Email'],
            'Tanggal_Awal' => $data['Tanggal_Awal'],
            'Tanggal_Akhir' => $data['Tanggal_Akhir'],
            'Lampiran' => $data['Lampiran']
        );

        $result = $this->db->where('ID', $ID)->update('tb_dokumen', $data);

        // Proses merekam data pada log aktivitas start
        if ($this->agent->is_browser()){
            $agent = $this->agent->browser().' '.$this->agent->version();
        }elseif ($this->agent->is_mobile()){
            $agent = $this->agent->mobile();
            }

        $arr = array(
            'ID' => $this->M_log->kode(),
            'Tanggal_Waktu' => date('Y-m-d H:i:s'),
            'Aktivitas' => "Data dokumen dengan nomor dokumen ".$data['No_Dokumen']." berhasil diubah",
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
			Data Dokumen<span class="font-weight-semibold"> Berhasil</span> Diupdate
			</div>');

        redirect('Dokumen');
    }

    // Controller function update data reminder
    public function update_reminder($ID_Reminder){
        $data = $this->input->post();
        $data = array(
            'Tanggal' => $data['Tanggal']
        );

        $result = $this->db->where('ID_Reminder', $ID_Reminder)->update('tb_reminder', $data);

        // Proses merekam data pada log aktivitas start
        if ($this->agent->is_browser()){
            $agent = $this->agent->browser().' '.$this->agent->version();
        }elseif ($this->agent->is_mobile()){
            $agent = $this->agent->mobile();
            }

        $arr = array(
            'ID' => $this->M_log->kode(),
            'Tanggal_Waktu' => date('Y-m-d H:i:s'),
            'Aktivitas' => "Data reminder berhasil diubah",
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
            Data Reminder<span class="font-weight-semibold"> Berhasil</span> Diupdate
            </div>');

        redirect('Dokumen');
    }

    // Controller function delete data dokumen
    public function Delete($ID=null){
    	$Nama = $this->db->get_where('tb_dokumen', ['ID' => $ID])->row_array();
        if (!isset($ID)) show_404();
        if ($this->M_dokumen->delete($ID)) {

        // Proses merekam data pada log aktivitas start
        if ($this->agent->is_browser()){
            $agent = $this->agent->browser().' '.$this->agent->version();
        }elseif ($this->agent->is_mobile()){
            $agent = $this->agent->mobile();
            }

        $arr = array(
            'ID' => $this->M_log->kode(),
            'Tanggal_Waktu' => date('Y-m-d H:i:s'),
            'Aktivitas' => "Data dokumen dengan nomor dokumen ".$Nama['No_Dokumen']." berhasil dihapus",
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
			Data Dokumen<span class="font-weight-semibold"> Berhasil</span> Dihapus
			</div>');
        redirect('Dokumen');
        }
    }

    // Controller function delete data reminder
    public function Delete_Reminder($ID_Reminder=null){
        if (!isset($ID_Reminder)) show_404();
        if ($this->M_reminder->delete($ID_Reminder)) {

        // Proses merekam data pada log aktivitas start
        if ($this->agent->is_browser()){
            $agent = $this->agent->browser().' '.$this->agent->version();
        }elseif ($this->agent->is_mobile()){
            $agent = $this->agent->mobile();
            }

        $arr = array(
            'ID' => $this->M_log->kode(),
            'Tanggal_Waktu' => date('Y-m-d H:i:s'),
            'Aktivitas' => "Data reminder berhasil dihapus",
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
            Data Reminder<span class="font-weight-semibold"> Berhasil</span> Dihapus
            </div>');
        redirect('Dokumen');
        }
    }

    // Controller function export data
    public function export(){
        $data['dokumen'] = $this->M_dokumen->TampilDokumen();
        $j = 1; 
        $i = 2;

        $spreadsheet = new Spreadsheet();
        $Excel_writer = new Xlsx($spreadsheet);

        $spreadsheet->getProperties()->setCreator('Riza Ilhamsyah')->setLastModifiedBy('Pupuk Kujang')->setTitle('Office 2007 XLSX Test Document')->setSubject('Office 2007 XLSX Test Document')->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')->setKeywords('office 2007 openxml php')->setCategory('Test result file');
         
        $spreadsheet->setActiveSheetIndex(0);
        $activeSheet = $spreadsheet->getActiveSheet();
         
        $activeSheet->setCellValue('A1', 'No');
        $activeSheet->setCellValue('B1', 'No. Dokumen');
        $activeSheet->setCellValue('C1', 'Deskripsi');
        $activeSheet->setCellValue('D1', 'Kategori');
        $activeSheet->setCellValue('E1', 'Pihak Terkait');
        $activeSheet->setCellValue('F1', 'Masa Berlaku');

        foreach ($data['dokumen'] as $dokumen) {
            if ($dokumen['ID_Users'] == $this->session->userdata['ID']){    
            $activeSheet->setCellValue('A'.$i , $j);
            $activeSheet->setCellValue('B'.$i , $dokumen['No_Dokumen']);
            $activeSheet->setCellValue('C'.$i , $dokumen['Deskripsi']);
            $activeSheet->setCellValue('D'.$i , $dokumen['Kategori']);
            $activeSheet->setCellValue('E'.$i , $dokumen['Pihak_Terkait']);
            $activeSheet->setCellValue('F'.$i , date('d-m-Y', strtotime($dokumen['Tanggal_Awal']))." - ".date('d-m-Y', strtotime($dokumen['Tanggal_Akhir'])));
            $i++;
            $j++;
            }
        }
         
        $filename = 'Rekap Data Dokumen ['.date('d-m-Y').'].xlsx';
         
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename='. $filename);
        header('Cache-Control: max-age=0');
        $Excel_writer->save('php://output');

        // Proses merekam data pada log aktivitas start
            if ($this->agent->is_browser()){
            $agent = $this->agent->browser().' '.$this->agent->version();
            }elseif ($this->agent->is_mobile()){
                $agent = $this->agent->mobile();
            }

            $arr = array(
                'ID' => $this->M_log->kode(),
                'Tanggal_Waktu' => date('Y-m-d H:i:s'),
                'Aktivitas' => "Username ".$this->session->userdata('Username')." berhasil export data dokumen pada tanggal ".date('d-m-Y'),
                'User' => $this->session->userdata("Username"),
                'Sistem_Operasi' => $this->agent->platform(),
                'Aplikasi' => $agent,
                'IP_Address' => $this->input->ip_address(),
                'Status' => 1
                );

            $this->M_log->save($arr,'tb_log');
        // Proses merekam data pada log aktivitas end
    }

    public function EmailCustom()
    {
        $data['Dokumen'] = $this->M_dokumen->Dokumen();
        $this->load->library('PHPMailer_load'); //Load Library PHPMailer
        $mail = $this->phpmailer_load->load(); // Mendefinisikan Variabel Mail
        $mail->isSMTP();  // Mengirim menggunakan protokol SMTP
        $mail->Host = 'smtp.gmail.com'; // Host dari server SMTP
        $mail->SMTPAuth = true; // Autentikasi SMTP
        $mail->Username = 'rizailhamsyah021@gmail.com';
        $mail->Password = 'hyperdownload28';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $i = 0;
        $j = 1;
        foreach ($data['Dokumen'] as $dokumen) {
        if ($dokumen['Tanggal'] == date('Y-m-d') && $dokumen['Status'] != 1 && $j <= 100) {
        $start_date = new DateTime($dokumen['Tanggal']);
        $end_date = new DateTime($dokumen['Tanggal_Akhir']);
        $interval = $start_date->diff($end_date);
        if(strlen($dokumen['Lampiran']) == 0){
            $url = "#";
        }else{
            $url = "https://cisantana.id/download/Pelayanan_PDF_REQKTP202104049.pdf";
            }
        $datas['No_Dokumen'] = $dokumen['No_Dokumen'];
        $datas['Hari'] = $interval->days." Hari";
        $datas['Url'] = $url;
        $mail->setFrom('admin@pupukkujang.com', 'Reminder Dokumen'); // Sumber email
        $mail->AddAddress($dokumen['Email'] ,'Karyawan'); // Masukkan alamat email dari variabel $email
        $mail->Subject = "Reminder Dokumen"; // Subjek Email
        $mail->msgHtml($this->load->view('Dokumen/Email', $datas, TRUE)); // Isi email dengan format HTML

        if (!$mail->send()) {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                } else {
                    $data = array(
                        'Status' => 1
                    );

                    $result = $this->db->where('ID_Reminder', $dokumen['ID_Reminder'])->update('tb_reminder', $data);
                    $i++;
                    $j++;
                } // Kirim email dengan cek kondisi
           }   
        }

        // Proses merekam data pada log aktivitas start
            if ($this->agent->is_browser()){
            $agent = $this->agent->browser().' '.$this->agent->version();
            }elseif ($this->agent->is_mobile()){
                $agent = $this->agent->mobile();
            }

            $arr = array(
                'ID' => $this->M_log->kode(),
                'Tanggal_Waktu' => date('Y-m-d H:i:s'),
                'Aktivitas' => $i." Reminder berhasil dikirim ke email",
                'User' => $this->session->userdata("Username"),
                'Sistem_Operasi' => $this->agent->platform(),
                'Aplikasi' => $agent,
                'IP_Address' => $this->input->ip_address(),
                'Status' => 1
                );

            $this->M_log->save($arr,'tb_log');
        // Proses merekam data pada log aktivitas end

    }

    public function EmailMonth()
    {
        $data['Dokumen'] = $this->db->get('tb_dokumen')->result_array();
        $this->load->library('PHPMailer_load'); //Load Library PHPMailer
        $mail = $this->phpmailer_load->load(); // Mendefinisikan Variabel Mail
        $mail->isSMTP();  // Mengirim menggunakan protokol SMTP
        $mail->Host = 'smtp.gmail.com'; // Host dari server SMTP
        $mail->SMTPAuth = true; // Autentikasi SMTP
        $mail->Username = 'rizailhamsyah021@gmail.com';
        $mail->Password = 'hyperdownload28';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $date = date('Y-m-d');
        $i = 0;
        $j = 1;
        foreach ($data['Dokumen'] as $dokumen) {
        $date1=date_create($date);
        $date2=date_create($dokumen['Tanggal_Akhir']);
        $diff=date_diff($date1,$date2);
        if ($diff->format("%m") == 1 && $dokumen['Status_Month'] != 1 && $j <= 100) {
        if(strlen($dokumen['Lampiran']) == 0){
            $url = "#";
        }else{
            $url = "https://cisantana.id/download/Pelayanan_PDF_REQKTP202104049.pdf";
            }
        $datas['No_Dokumen'] = $dokumen['No_Dokumen'];
        $datas['Hari'] = $diff->days." Hari";
        $datas['Url'] = $url;
        $mail->setFrom('admin@pupukkujang.com', 'Reminder Dokumen'); // Sumber email
        $mail->addAddress($dokumen['Email'] ,'Karyawan'); // Masukkan alamat email dari variabel $email
        $mail->Subject = "Reminder Dokumen"; // Subjek Email
        $mail->msgHtml($this->load->view('Dokumen/Email', $datas, TRUE)); // Isi email dengan format HTML

        if (!$mail->send()) {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                } else {
                    $data = array(
                        'Status_Month' => 1
                    );

                    $result = $this->db->where('ID', $dokumen['ID'])->update('tb_dokumen', $data);
                    $i++;
                    $j++;
                } // Kirim email dengan cek kondisi
           }   
        }
        // Proses merekam data pada log aktivitas start
            if ($this->agent->is_browser()){
            $agent = $this->agent->browser().' '.$this->agent->version();
            }elseif ($this->agent->is_mobile()){
                $agent = $this->agent->mobile();
            }

            $arr = array(
                'ID' => $this->M_log->kode(),
                'Tanggal_Waktu' => date('Y-m-d H:i:s'),
                'Aktivitas' => $i." Reminder berhasil dikirim ke email",
                'User' => $this->session->userdata("Username"),
                'Sistem_Operasi' => $this->agent->platform(),
                'Aplikasi' => $agent,
                'IP_Address' => $this->input->ip_address(),
                'Status' => 1
                );

            $this->M_log->save($arr,'tb_log');
        // Proses merekam data pada log aktivitas end
    }

    public function EmailWeek()
    {
        $data['Dokumen'] = $this->db->get('tb_dokumen')->result_array();
        $this->load->library('PHPMailer_load'); //Load Library PHPMailer
        $mail = $this->phpmailer_load->load(); // Mendefinisikan Variabel Mail
        $mail->isSMTP();  // Mengirim menggunakan protokol SMTP
        $mail->Host = 'smtp.gmail.com'; // Host dari server SMTP
        $mail->SMTPAuth = true; // Autentikasi SMTP
        $mail->Username = 'rizailhamsyah021@gmail.com';
        $mail->Password = 'hyperdownload28';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $date = date('Y-m-d');
        $i = 0;
        $j = 1;
        foreach ($data['Dokumen'] as $dokumen) {
        $date1=date_create($date);
        $date2=date_create($dokumen['Tanggal_Akhir']);
        $diff=date_diff($date1,$date2);
        if ($diff->days == 7 && $dokumen['Status_Week'] != 1 && $j <= 100) {
        if(strlen($dokumen['Lampiran']) == 0){
            $url = "#";
        }else{
            $url = "https://cisantana.id/download/Pelayanan_PDF_REQKTP202104049.pdf";
            }
        $datas['No_Dokumen'] = $dokumen['No_Dokumen'];
        $datas['Hari'] = $diff->days." Hari";
        $datas['Url'] = $url;
        $mail->setFrom('admin@pupukkujang.com', 'Reminder Dokumen'); // Sumber email
        $mail->addAddress($dokumen['Email'] ,'Karyawan'); // Masukkan alamat email dari variabel $email
        $mail->Subject = "Reminder Dokumen"; // Subjek Email
        $mail->msgHtml($this->load->view('Dokumen/Email', $datas, TRUE)); // Isi email dengan format HTML

        if (!$mail->send()) {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                } else {
                    $data = array(
                        'Status_Week' => 1
                    );

                    $result = $this->db->where('ID', $dokumen['ID'])->update('tb_dokumen', $data);
                    $i++;
                    $j++;
                } // Kirim email dengan cek kondisi
           }   
        }
        // Proses merekam data pada log aktivitas start
            if ($this->agent->is_browser()){
            $agent = $this->agent->browser().' '.$this->agent->version();
            }elseif ($this->agent->is_mobile()){
                $agent = $this->agent->mobile();
            }

            $arr = array(
                'ID' => $this->M_log->kode(),
                'Tanggal_Waktu' => date('Y-m-d H:i:s'),
                'Aktivitas' => $i." Reminder berhasil dikirim ke email",
                'User' => $this->session->userdata("Username"),
                'Sistem_Operasi' => $this->agent->platform(),
                'Aplikasi' => $agent,
                'IP_Address' => $this->input->ip_address(),
                'Status' => 1
                );

            $this->M_log->save($arr,'tb_log');
        // Proses merekam data pada log aktivitas end
    }

    public function EmailToday()
    {
        $data['Dokumen'] = $this->db->get('tb_dokumen')->result_array();
        $this->load->library('PHPMailer_load'); //Load Library PHPMailer
        $mail = $this->phpmailer_load->load(); // Mendefinisikan Variabel Mail
        $mail->isSMTP();  // Mengirim menggunakan protokol SMTP
        $mail->Host = 'smtp.gmail.com'; // Host dari server SMTP
        $mail->SMTPAuth = true; // Autentikasi SMTP
        $mail->Username = 'rizailhamsyah021@gmail.com';
        $mail->Password = 'hyperdownload28';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $date = date('Y-m-d');
        $i = 0;
        $j = 1;
        foreach ($data['Dokumen'] as $dokumen) {
        $date1=date_create($date);
        $date2=date_create($dokumen['Tanggal_Akhir']);
        $diff=date_diff($date1,$date2);
        if ($diff->days == 1 && $dokumen['Status_Today'] != 1 && $j <= 100) {
        if(strlen($dokumen['Lampiran']) == 0){
            $url = "#";
        }else{
            $url = "https://cisantana.id/download/Pelayanan_PDF_REQKTP202104049.pdf";
            }
        $datas['No_Dokumen'] = $dokumen['No_Dokumen'];
        $datas['Hari'] = $diff->days." Hari";
        $datas['Url'] = $url;
        $mail->setFrom('admin@pupukkujang.com', 'Reminder Dokumen'); // Sumber email
        $mail->addAddress($dokumen['Email'] ,'Karyawan'); // Masukkan alamat email dari variabel $email
        $mail->Subject = "Reminder Dokumen"; // Subjek Email
        $mail->msgHtml($this->load->view('Dokumen/Email', $datas, TRUE)); // Isi email dengan format HTML

        if (!$mail->send()) {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                } else {
                    $data = array(
                        'Status_Today' => 1
                    );

                    $result = $this->db->where('ID', $dokumen['ID'])->update('tb_dokumen', $data);
                    $i++;
                    $j++;
                } // Kirim email dengan cek kondisi
           }   
        }
        // Proses merekam data pada log aktivitas start
            if ($this->agent->is_browser()){
            $agent = $this->agent->browser().' '.$this->agent->version();
            }elseif ($this->agent->is_mobile()){
                $agent = $this->agent->mobile();
            }

            $arr = array(
                'ID' => $this->M_log->kode(),
                'Tanggal_Waktu' => date('Y-m-d H:i:s'),
                'Aktivitas' => $i." Reminder berhasil dikirim ke email",
                'User' => $this->session->userdata("Username"),
                'Sistem_Operasi' => $this->agent->platform(),
                'Aplikasi' => $agent,
                'IP_Address' => $this->input->ip_address(),
                'Status' => 1
                );

            $this->M_log->save($arr,'tb_log');
        // Proses merekam data pada log aktivitas end
    }

    public function Email(){
        $this->EmailCustom();
        $this->EmailMonth();
        $this->EmailWeek();
        $this->EmailToday();
    }
}
