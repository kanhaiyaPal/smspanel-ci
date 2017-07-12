<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userlist extends CI_Model {

	public function __construct()
	{
			parent::__construct();
	}
	
	public function set_user($id = 0)
	{
		$this->load->model('authentication');
		
		if(($this->input->post('password')) && ($this->input->post('password') != ''))
		{
			$hash_pass = $this->authentication->hash_password($this->input->post('password'));
		}else{
			$hash_pass = $this->input->post('old_password');
		}
		
		if(($this->input->post('current_credit')) && ($this->input->post('current_credit') != ''))
		{
			$curr_credits = $this->input->post('current_credit');
		}else{
			$curr_credits = $this->input->post('smsCredit');
		}
		
		//for registration enqiury converted to users
		if($this->input->post('enquiry_id') && ($this->input->post('enquiry_id') != ''))
		{
			$this->load->model('register');
			$this->register->delete_entry((int)$this->input->post('enquiry_id'));
		}
	
		$data = array(
            'username' => $this->input->post('username'),
			'password' => $hash_pass,
			'user_type' => $this->input->post('u_type'),
            'expiry_date' => $this->input->post('expiry_date'),
			'total_credits' =>	$this->input->post('smsCredit'),
			'current_credits' => $curr_credits,
			'name' => $this->input->post('name'),
			'email' => $this->input->post('uemail'),
			'mobile' => $this->input->post('mobile'),
			'address' => $this->input->post('rmaddress'),
			'city' => $this->input->post('rmcity'),
			'company' => $this->input->post('rmcopmany'),
			'rm_name' => $this->input->post('rmanager'),
			'rm_contact' => $this->input->post('rmnumber'),
			'rm_email' => $this->input->post('remail')
        );
		
        
        if ($id == 0) {
			$this->db->insert('users', $data);
			return $this->db->insert_id();
        } else {
            $this->db->where('id', $id);
            return $this->db->update('users', $data);
        }
	}
	
	public function get_users($id = FALSE,$type = '3')
    {
        if ($id === FALSE)
        {
            $query =  $this->db->order_by('id', 'ASC')->get_where('users', array('user_type' => $type));
            return $query->result_array();
        }
 
        $query = $this->db->order_by('id', 'ASC')->get_where('users', array('id' => $id,'user_type' => $type));
        return $query->row_array();
    }
		
	public function delete_user($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }
	
	public function update_user_status($user_id = 0, $status = 0)
	{
		if($user_id){
			$data = array(
				'status' => $status
			);
			$this->db->where('id', $user_id);
            return $this->db->update('users', $data);
		}
	}
}
