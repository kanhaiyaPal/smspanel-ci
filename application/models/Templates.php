<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Templates extends CI_Model {

	public function __construct()
	{
			parent::__construct();
	}
	
	public function get_templates($id = FALSE)
    {
		$user_id = $this->session->userdata('user_session')['uid'];
        if ($id === FALSE)
        {
            $query =  $this->db->order_by('id', 'ASC')->get_where('templates',array('user_id' => $user_id));
            return $query->result_array();
        }
 
        $query = $this->db->order_by('id', 'ASC')->get_where('templates',array('user_id' => $user_id,'id' => $id));
        return $query->row_array();
    }
	
	public function set_templates($id = 0)
	{
		$user_id = $this->session->userdata('user_session')['uid'];
		$data = array(
            'name' => $this->input->post('template_name'),
			'description' => $this->input->post('template_description'),
			'user_id' => $user_id
        );
		
		if ($id == 0) {
			$this->db->insert('templates', $data);
			return $this->db->insert_id();
        } else {
            $this->db->where('id', $id);
            return $this->db->update('templates', $data);
        }
	}
	
	public function delete_templates($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('templates');
    }

}
