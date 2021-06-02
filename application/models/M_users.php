<?php 
class M_users extends CI_Model{
	// Model function insert data
	public function save($data){
        $this->db->insert('tb_users',$data);
    }

	// Model function delete data
    public function delete($ID){
        return $this->db->delete('tb_users', array("ID" => $ID));
    	}
}
 ?>