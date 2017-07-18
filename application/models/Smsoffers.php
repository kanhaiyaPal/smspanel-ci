<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Smsoffers extends CI_Model {

	public function __construct()
	{
			parent::__construct();
	}
	
	public function get_mixed_data($id = FALSE,$type = 'idea')
    {
        if ($id === FALSE)
        {
            $query =  $this->db->order_by('id', 'ASC')->get_where('offers_smsideas',array('type' => $type));
            return $query->result_array();
        }
 
        $query = $this->db->order_by('id', 'ASC')->get_where('offers_smsideas',array('type' => $type));
        return $query->row_array();
    }
	
	public function set_mixed_data($id = 0,$type = 'idea')
	{
		$data = array(
            'name' => $this->input->post('mixdata_name'),
			'description' => $this->input->post('mixdata_description'),
			'type' => $type
        );
		
		if ($id == 0) {
			$this->db->insert('offers_smsideas', $data);
			return $this->db->insert_id();
        } else {
            $this->db->where('id', $id);
            return $this->db->update('offers_smsideas', $data);
        }
	}
	
	public function delete_mixed_data($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('offers_smsideas');
    }

}
