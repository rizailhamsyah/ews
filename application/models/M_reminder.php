<?php 
class M_reminder extends CI_Model{
	// Model function insert data
	public function save($data){
        $this->db->insert('tb_reminder',$data);
    }

	// Model function delete data
    public function delete($ID_Reminder){
        return $this->db->delete('tb_reminder', array("ID_Reminder" => $ID_Reminder));
    	}
}
 ?>