<?php

class Book_model extends CI_Model
{

	public function add_booking($data)
	{
		$this->db->insert("book-details", $data);
		return $this->db->insert_id();
	}

	public function add_emailQueue($data)
	{
		$this->db->insert("email_queue", $data);
		return $this->db->insert_id();
	}
	
	public function get_emailQueue()
	{
		return $this->db
					->where("status", 0)
					->get("email_queue");
	}

	public function update_emailQueue($id, $data)
	{
		$this->db->where("id", $id)->update("email_queue", $data);
	}

    public function showAll(){
		
      	$query = $this->db
       				->get('book-details');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }
}

?>
