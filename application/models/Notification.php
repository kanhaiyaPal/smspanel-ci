<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Model {

	public function __construct()
	{
			parent::__construct();
	}
	
	public function get_notifications($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query =  $this->db->order_by('id', 'ASC')->get('notifications');
            return $query->result_array();
        }
 
        $query = $this->db->order_by('id', 'ASC')->get('notifications');
        return $query->row_array();
    }
	
	public function set_notifications($id = 0)
	{
		$data = array(
            'name' => $this->input->post('notfy_name'),
			'description' => $this->input->post('notfy_description'),
        );
		
		if ($id == 0) {
			$this->db->insert('notifications', $data);
			return $this->db->insert_id();
        } else {
            $this->db->where('id', $id);
            return $this->db->update('notifications', $data);
        }
	}
	
	public function delete_notifications($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('notifications');
    }

}
