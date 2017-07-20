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
		$user_id = $this->session->userdata('user_session')['uid'];
		$this->load->helper('file');
		$this->load->helper('string');
		
		$contacts_count = 0;
		$file_id = 0;
		
		/*create txt file for textarea*/
		if($this->input->post('file_type') == 'textarea'){
			$content = $this->input->post('textarea_input_contacts');
			$file_name = strtolower(random_string('alnum', 32));
			if ( ! write_file(UPLOAD_PATH_CONTACTS.$file_name.'.txt', $content)){
				echo 'Unable to write the file';
				exit();
			}
			else
			{ 
				$file_data = array(
					'user_id' => '9', //admin user id
					'file_name' => $file_name.'.txt',
					'file_title' => date('d-m-Y-H-i-s').'_autogenerate'
				);
				$this->db->insert('contacts', $file_data);
				$file_id = $this->db->insert_id();
				$contacts_count = $this->get_numbers_count($file_name.'.txt');
			}
		}else{
			$file_id = (int)$this->input->post('select_file');
			$query = $this->db->get_where('contacts',array('id' => $file_id));
			$file_det = $query->row_array();
			$contacts_count = $this->get_numbers_count($file_det['file_name']);
		}
		
		/*Debit SMS count from user account*/
		$query = $this->db->get_where('users',array('id' => $user_id));
		$user_det = $query->row_array();
		$upd_crd = (int)$user_det['current_credits'] - (int)$contacts_count;
		$ur_dt = array('current_credits' => $upd_crd);
		$this->db->where('id', $user_id);
		$this->db->update('users', $ur_dt);
		
		/*Update SMS table*/
		$data = array(
			'content' => $this->input->post('sms_txt'),
			'scheduled_on' => $this->input->post('sms_schedule'),
			'time' => $this->input->post('sms_slot'),
			'user_id' => $user_id,
			'file_id' => $file_id,
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
		$query = $this->db->get_where('sms',array('id' => $id));
		$sms_det = $query->row_array();
		
		$query = $this->db->get_where('contacts',array('id' => $sms_det['file_id']));
        $file_delinf = $query->row_array();
		
		if($file_delinf['user_id'] == '9'){
			unlink(UPLOAD_PATH_CONTACTS.$file_delinf['file_name']);
			$this->db->where('id', $file_delinf['id']);
			$this->db->delete('contacts');
		}
		
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
	
	public function get_userfiles()
	{
		$user_id = $this->session->userdata('user_session')['uid'];
		$query =  $this->db->order_by('id', 'DESC')->get_where('contacts',array('user_id' => $user_id));
        return $query->result_array();
	}
	
	public function get_userlimit()
	{
		$user_id = $this->session->userdata('user_session')['uid'];
		//check for available credits
		$query = $this->db->get_where('users',array('id' => $user_id));
		$user_det = $query->row_array();
		if($user_det['current_credits']>0){
			return true;
		}else{
			return false; //credits not available
		}
	}
	
	public function get_date_limitation($date = '')
	{
		$user_id = $this->session->userdata('user_session')['uid'];
		$query = $this->db->get_where('sms',array('user_id' => $user_id,'scheduled_on' => $date));
		$user_det = $query->result_array();
		if(count($user_det) < 2){
			return true;
		}else{
			return false;
		}
	}
	
	public function get_usersmshistory($id = FALSE)
	{
		$user_id = $this->session->userdata('user_session')['uid'];
		 if ($id === FALSE)
        {
            $query =  $this->db->order_by('id', 'ASC')->get_where('sms',array('user_id' => $user_id));
            return $query->result_array();
        }
 
        $query = $this->db->order_by('id', 'ASC')->get_where('sms',array('user_id' => $user_id));
        return $query->row_array();
	}

	public function get_numbers_count($file = FALSE)
	{
		return (substr_count(file_get_contents(UPLOAD_PATH_CONTACTS.$file), "\n")+1);
	}
}
