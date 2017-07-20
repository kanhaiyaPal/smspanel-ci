<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Model {

	public function __construct()
	{
			parent::__construct();
	}
	
	public function get_userdata()
	{
		$id = $this->session->userdata('user_session')['uid'];
		if($id)
		{
			$query = $this->db->get_where('users',array('id'=> $id));
			return $query->row_array();
			
		}else{ return false; }
	}
	
	public function modify_user()
	{
		$user_id = $this->session->userdata('user_session')['uid'];
		if($user_id){
			
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('uemail'),
				'mobile' => $this->input->post('mobile'),
				'address' => $this->input->post('rmaddress'),
				'company' => $this->input->post('rmcopmany')
			);
		
        	$this->db->where('id',$user_id);
			return $this->db->update('users', $data);
			
		}
	}
	
	public function update_password()
	{
		$user_id = $this->session->userdata('user_session')['uid'];
		if($user_id){
			
			$this->load->model('authentication');
			$new_pass = $this->authentication->hash_password($this->input->post('NewPass'));
			$data = array(
				'password' => $new_pass
			);
		
        	$this->db->where('id',$user_id);
			return $this->db->update('users', $data);
			
		}
	}
	
	public function get_offers()
	{
		 $query =  $this->db->order_by('id', 'ASC')->get_where('offers_smsideas',array('type' => 'offer'));
         return $query->result_array();
	}
	
	public function get_smsideas()
	{
		 $query =  $this->db->order_by('id', 'ASC')->get_where('offers_smsideas',array('type' => 'idea'));
         return $query->result_array();
	}
}
