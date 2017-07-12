<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Model {

	public function __construct()
	{
			parent::__construct();
	}
	
	public function verify_username($username = '')
	{
		if($username != '')
		{
			$query = $this->db->get_where('users',array('username'=> $username));
			$result_count = $query->num_rows();
			$result_row = $query->row_array();
			
			if($result_count > 0){
				return array('uid' => $result_row['id'],'password' => $result_row['password']);
			}else{
				return false;
			}
			
		}else{
			return false;
		}
	}
	
	public function get_userdata($id = 0)
	{
		if($id)
		{
			$query = $this->db->get_where('users',array('id'=> $id));
			return $query->row_array();
			
		}else{ return false; }
	}
	
	public function hash_password($password){
	   return password_hash($password, PASSWORD_BCRYPT);
	}
	
	public function verify_pass($password,$hash){
		return password_verify($password,$hash);
	}
	
	public function logged_in_status()
	{
		 if(($this->session->has_userdata('admin_session')) || ($this->session->has_userdata('subadmin_session')) || ($this->session->has_userdata('user_session'))){
			 
			 return true;
		 }else{
			 return false;
		 }
	}
	
	public function generate_sessions($user_data)
	{
		switch($user_data['user_type']){
			case '1':{
						$admindata = array(
								'uid' => $user_data['id'],
								'username'  => $user_data['username'],
								'email'     => $user_data['email'],
								'utype' 	=> $user_data['user_type'],
								'logged_in' => TRUE
						);
						$this->session->set_userdata('admin_session',$admindata);
						redirect(base_url().'AdminDashboard');
						break; 
					}
			case '2':{
						$subadmindata = array(
								'uid' => $user_data['id'],
								'username'  => $user_data['username'],
								'email'     => $user_data['email'],
								'utype' 	=> $user_data['user_type'],
								'mobile'     => $user_data['mobile'],
								'logged_in' => TRUE
						);
						$this->session->set_userdata('subadmin_session',$subadmindata);
						redirect(base_url().'UserDashboard');
						break; 
					}
			case '3':{
						$userdata = array(
								'uid' => $user_data['id'],
								'username'  => $user_data['username'],
								'email'     => $user_data['email'],
								'utype' 	=> $user_data['user_type'],
								'mobile'     => $user_data['mobile'],
								'logged_in' => TRUE
						);
						$this->session->set_userdata('user_session',$userdata);
						redirect(base_url().'UserDashboard');
						break; 
					}
		}
		return false;
	}
	
	public function logout_current_user()
	{
		$is_loged = $this->logged_in_status();
		if($is_loged){
			
			if($this->session->has_userdata('admin_session')){
				$this->session->unset_userdata('admin_session');
			}
			if($this->session->has_userdata('subadmin_session')){
				$this->session->unset_userdata('subadmin_session');
			}
			if($this->session->has_userdata('user_session')){
				$this->session->unset_userdata('user_session');
			}
			
			redirect(base_url());
		}
	}
}
