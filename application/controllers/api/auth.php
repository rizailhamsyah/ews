<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';  
require APPPATH . '/libraries/php-jwt/src/JWT.php';

// use namespace
use Restserver\Libraries\REST_Controller;
use Firebase\JWT\JWT;

class auth extends REST_Controller {
    public function __construct() {
        parent::__construct();
        // Load User Model
        $this->load->model('M_users');
        $this->load->model('M_log');   
    }
    public function login_get(){
    	// $data = $this->post();
    	// $username = $this->post('username');
    	// $password = $this->post('password');
    	$curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://wbs.pupuk-kujang.co.id:8089/hrdmobile/app/login-v2/',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => 'username=3082625&password=3082625',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

		$respon = json_decode($response,true);

		$key = '1f59e66e-37ff-11ea-978f-2e728ce88125';

		// $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE1ODI2ODc2NzYsIm5iZiI6MTU4MjY4NzY3NiwianRpIjoiNTFhOTM4YWMtYTgzYy00YTI1LTgzM2QtNDlhYTJhZTI2N2UyIiwiaWRlbnRpdHkiOnsiU1VQRVJVU0VSIjpmYWxzZSwiRU1QTE9ZRUVJRCI6IjMwNTI0MTAiLCJFTVBMT1lFRU5BTUUiOiJBcmllZiBSYWhtYW4gSGFraW0iLCJFTVBMT1lFRVBJQ1RVUkUiOiJodHRwOi8vcG9ydGFsLnB1cHVrLWt1amFuZy5jby5pZC9hcHBzL3BpY2VtcC8zMDUyNDEwLmpwZyIsIlBBUkVOVFBFUlNPTiI6dHJ1ZSwiUEFSRU5USUQiOiJDMDAzMTkwMDAwIiwiUEFSRU5UTkFNRSI6IlN0YWYgR00uVGVrJkJhbmcmIFNJIFBlbnVnYXNhbiBUSSBQSSBQS0MiLCJDSElMRFJFTlMiOlt7IkVNUExPWUVFSUQiOiIzMDcyNTI4IiwiRU1QTE9ZRUVOQU1FIjoiRmVycnkgU2lzd2FudG8iLCJFTVBMT1lFRVBJQ1RVUkUiOiJodHRwOi8vcG9ydGFsLnB1cHVrLWt1amFuZy5jby5pZC9hcHBzL3BpY2VtcC8zMDcyNTI4LmpwZyJ9LHsiRU1QTE9ZRUVJRCI6IjMwNzI1MjkiLCJFTVBMT1lFRU5BTUUiOiJBZGUgRWthIFB1dHJhIiwiRU1QTE9ZRUVQSUNUVVJFIjoiaHR0cDovL3BvcnRhbC5wdXB1ay1rdWphbmcuY28uaWQvYXBwcy9waWNlbXAvMzA3MjUyOS5qcGcifSx7IkVNUExPWUVFSUQiOiIzMDcyNTMwIiwiRU1QTE9ZRUVOQU1FIjoiUHV0cmkgWXVuaWtldSIsIkVNUExPWUVFUElDVFVSRSI6Imh0dHA6Ly9wb3J0YWwucHVwdWsta3VqYW5nLmNvLmlkL2FwcHMvcGljZW1wLzMwNzI1MzAuanBnIn0seyJFTVBMT1lFRUlEIjoiMzA4MjYyNSIsIkVNUExPWUVFTkFNRSI6IlRvbm8gU2FydG9ubyIsIkVNUExPWUVFUElDVFVSRSI6Imh0dHA6Ly9wb3J0YWwucHVwdWsta3VqYW5nLmNvLmlkL2FwcHMvcGljZW1wLzMwODI2MjUuanBnIn0seyJFTVBMT1lFRUlEIjoiMzA0MjMxMiIsIkVNUExPWUVFTkFNRSI6IkFvcyBXYXN1bGZhbGFoIiwiRU1QTE9ZRUVQSUNUVVJFIjoiaHR0cDovL3BvcnRhbC5wdXB1ay1rdWphbmcuY28uaWQvYXBwcy9waWNlbXAvMzA0MjMxMi5qcGcifSx7IkVNUExPWUVFSUQiOiIzMTIzMjAwIiwiRU1QTE9ZRUVOQU1FIjoiSGVybGFtYmFuZyBBZGkgQnVkaW1hbiIsIkVNUExPWUVFUElDVFVSRSI6Imh0dHA6Ly9wb3J0YWwucHVwdWsta3VqYW5nLmNvLmlkL2FwcHMvcGljZW1wLzMxMjMyMDAuanBnIn0seyJFTVBMT1lFRUlEIjoiMzE1MzM0NCIsIkVNUExPWUVFTkFNRSI6IkkgTWFkZSBXaXJhdGFtYSBNYXVsYW5hIFl1c3VwIiwiRU1QTE9ZRUVQSUNUVVJFIjoiaHR0cDovL3BvcnRhbC5wdXB1ay1rdWphbmcuY28uaWQvYXBwcy9waWNlbXAvMzE1MzM0NC5qcGcifSx7IkVNUExPWUVFSUQiOiIzMDgyNTUxIiwiRU1QTE9ZRUVOQU1FIjoiU3Vtb25vIiwiRU1QTE9ZRUVQSUNUVVJFIjoiaHR0cDovL3BvcnRhbC5wdXB1ay1rdWphbmcuY28uaWQvYXBwcy9waWNlbXAvMzA4MjU1MS5qcGcifV19LCJmcmVzaCI6ZmFsc2UsInR5cGUiOiJhY2Nlc3MifQ.HPaykspYL5avKz6hxeSmfspJg3JrAYmgSHp2GbnjhwQ';

		// $token = $respon['access_token'];
		// curl_close($curl);
		// echo $response;
		// $decoded = JWT::decode($token, $key, array('HS256'));
		// $json = json_encode($decoded, true);
		// $cek = $this->db->get_where('tb_users', ['Username' => $respon['EMPLOYEID']])->num_rows();
		// if ($cek > 0) {
		// 	$arr = array(
  //           'ID' => '',
  //           'Nama' => $respon['NAMA'],
  //           'Email' => $respon['EMPLOYEID'].'@pkc.com',
  //           'Username' => $respon['EMPLOYEID'],
  //           'Password' => md5($respon['EMPLOYEID']),
  //           'Role' => 2,
  //           'Status' => 1
  //       	);

		// 	$this->M_users->save($data,'tb_users');

  //       // Proses merekam data pada log aktivitas start
  //       if ($this->agent->is_browser()){
  //           $agent = $this->agent->browser().' '.$this->agent->version();
  //       }elseif ($this->agent->is_mobile()){
  //           $agent = $this->agent->mobile();
  //           }

  //       $arr = array(
  //           'ID' => $this->M_log->kode(),
  //           'Tanggal_Waktu' => date('Y-m-d H:i:s'),
  //           'Aktivitas' => "Data user atas nama ".$respon['NAMA']." berhasil diregistrasi",
  //           'User' => $respon['NAMA'], 
  //           'Sistem_Operasi' => $this->agent->platform(),
  //           'Aplikasi' => $agent,
  //           'IP_Address' => $this->input->ip_address(),
  //           'Status' => 1
  //       );

  //       $this->M_log->save($arr,'tb_log');
  //       // Proses merekam data pada log aktivitas end

		// }else{
			
		// }

		// if (!empty($json))
  //           {
  //               $this->response($json, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
  //           }
  //           else
  //           {
  //               $this->response([
  //                   'status' => FALSE,
  //                   'message' => 'User could not be found'
  //               ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
  //           }
		// $this->response($json, 200);
		// print_r($json);
    }
}
?>