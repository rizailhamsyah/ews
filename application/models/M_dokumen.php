<?php 
class M_dokumen extends CI_Model{
	// Model function insert data
	public function save($data){
        $this->db->insert('tb_dokumen',$data);
    }

	// Model function delete data
    public function delete($ID){
        return $this->db->delete('tb_dokumen', array("ID" => $ID));
    	}

    // Model function TampilDokumen inner join tabel dokumen dengan tabel kategori
    public function TampilDokumen() 
    {
        $this->db->order_by('Tanggal_Awal', 'ASC');
        return $this->db->from('tb_dokumen')
          ->join('tb_kategori', 'tb_kategori.ID=tb_dokumen.ID_Kategori')
          ->get()
          ->result_array();
    }

    public function Dokumen() 
    {
        $this->db->order_by('Tanggal_Awal', 'ASC');
        return $this->db->from('tb_dokumen')
          ->join('tb_reminder', 'tb_reminder.ID_Dokumen=tb_dokumen.ID')
          ->get()
          ->result_array();
    }
}
 ?>