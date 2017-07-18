<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Model {

	public function __construct()
	{
			parent::__construct();
	}
	
	public function get_reports($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query =  $this->db->order_by('id', 'DESC')->get('reports');
            return $query->result_array();
        }
 
        $query = $this->db->order_by('id', 'DESC')->get('reports');
        return $query->row_array();
    }
	
	public function set_report($id = 0)
	{
		$f_id = 0;
		$data = array(
			'user_id' => $this->input->post('balance_user_id'),
			'date' => date('Y-m-d',strtotime($this->input->post('report_date'))),
			'file_id' => $f_id
        );
						
		if ($id == 0) {
			$this->db->insert('reports', $data);
			return $this->db->insert_id();
        } else {
            $this->db->where('id', $id);
            return $this->db->update('reports', $data);
        }
	}
	
	public function delete_report($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('reports');
    }

}
