<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usersms extends CI_Model {

	public function __construct()
	{
			parent::__construct();
	}
	
	public function get_usersms($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query =  $this->db->order_by('id', 'ASC')->get('sms');
            return $query->result_array();
        }
 
        $query = $this->db->order_by('id', 'ASC')->get('sms');
        return $query->row_array();
    }
	
	public function set_usersms($id = 0)
	{
		$data = array(
            'name' => $this->input->post('notfy_name'),
			'description' => $this->input->post('notfy_description'),
        );
		
		if ($id == 0) {
			$this->db->insert('sms', $data);
			return $this->db->insert_id();
        } else {
            $this->db->where('id', $id);
            return $this->db->update('sms', $data);
        }
	}
	
	public function delete_usersms($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('sms');
    }
	
	public function get_userdetails($id = 0)
	{
		if($id){
			$query = $this->db->get_where('users',array('id' => $id));
			$user = $query->row_array();
			return $user['name'];
		}
	}
	
	public function get_filedetails($id = 0)
	{
		if($id){
			$query = $this->db->get_where('contacts',array('id' => $id));
			$file = $query->row_array();
			return $file['file_name'];
		}
	}
	
}
