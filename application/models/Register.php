<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Model {

	public function __construct()
	{
			parent::__construct();
	}
	
	public function get_entries($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query =  $this->db->order_by('id', 'ASC')->get('registrations');
            return $query->result_array();
        }
 
        $query = $this->db->order_by('id', 'ASC')->get('registrations');
        return $query->row_array();
    }
	
	public function set_entry($id = 0)
	{
		$data = array(
            'name' => $this->input->post('aname'),
			'email' => $this->input->post('aemailid'),
			'mobile' => $this->input->post('amob'),
			'address' => $this->input->post('adescption'),
			'sms_count' => $this->input->post('quantity'),
        );
		
        $this->db->set('date_added', 'NOW()', FALSE);
        
		if ($id == 0) {
			$this->db->insert('registrations', $data);
			return $this->db->insert_id();
        } else {
            $this->db->where('id', $id);
            return $this->db->update('registrations', $data);
        }
	}
	
	public function delete_entry($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('registrations');
    }

}
