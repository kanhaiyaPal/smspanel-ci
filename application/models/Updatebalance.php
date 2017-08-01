<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Updatebalance extends CI_Model {

	public function __construct()
	{
			parent::__construct();
	}
	
	public function get_balance($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query =  $this->db->order_by('date_added', 'DESC')->get('update_balance');
            return $query->result_array();
        }
 
        $query = $this->db->order_by('date_added', 'DESC')->get('update_balance');
        return $query->row_array();
    }
	
	public function set_balance($id = 0)
	{
		//update in user table
		$this->load->model('userlist');
		$user_data = $this->userlist->get_users((int)$this->input->post('balance_user_id'));
		//$newbalance = ((int)$user_data['current_credits'] + (int)$this->input->post('balance_sms_count'));
		$newbalance = (int)$this->input->post('balance_sms_count');
		$this->db->where('id', (int)$this->input->post('balance_user_id'));
        $this->db->update('users', array('current_credits' => $newbalance));
		
		
		$data = array(
            'balance_updated' => $this->input->post('balance_sms_count'),
			'user_id' => $this->input->post('balance_user_id'),
			'updated_by' => $this->session->userdata('admin_session')['uid']
        );
		
		$this->db->set('date_added', 'NOW()', FALSE);
				
		if ($id == 0) {
			$this->db->insert('update_balance', $data);
			return $this->db->insert_id();
        } else {
            $this->db->where('id', $id);
            return $this->db->update('update_balance', $data);
        }
	}
	
	public function users_list()
	{
		$this->load->model('userlist');
		
		$user_array = $this->userlist->get_users();
		
		return $user_array;
	}
	
	public function delete_balance($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('sms');
    }
	
	public function get_current_balance($userid = 0)
	{
		if($userid){
			$query = $this->db->get_where('users',array('id' => $userid));
			$r_user = $query->row_array();
			return $r_user['current_credits'];
		}
	}
}
