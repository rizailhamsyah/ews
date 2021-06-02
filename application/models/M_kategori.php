<?php 
class M_kategori extends CI_Model{
	// Model function insert data
	public function save($data){
        $this->db->insert('tb_kategori',$data);
    }

	// Model function delete data
    public function delete($ID){
        return $this->db->delete('tb_kategori', array("ID" => $ID));
    	}
}
 ?>