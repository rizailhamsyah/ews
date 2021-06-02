  <?php 
class M_log extends CI_Model{
	// Model function insert data
	public function save($arr){
        $this->db->insert('tb_log',$arr);
    }

    // Model function generate code field ID
 	public function kode(){
		  $this->db->select('RIGHT(tb_log.ID,8) as ID', FALSE);
		  $this->db->order_by('ID','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('tb_log');  //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
			   //cek kode jika telah tersedia    
			   $data = $query->row();      
			   $kode = intval($data->ID) + 1; 
		  }
		  else{      
			   $kode = 1;  //cek jika kode belum terdapat pada table
		  }
			  $tgl=date('Y'); 
			  $batas = str_pad($kode, 8, "0", STR_PAD_LEFT);    
			  $kodetampil = "LOG".$tgl.$batas;  //format kode
			  return $kodetampil;  
		 }
}
?>