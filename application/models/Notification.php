<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Model {

	public function __construct()
	{
			parent::__construct();
	}
	
	public function get_notifications($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query =  $this->db->order_by('id', 'ASC')->get('notifications');
            return $query->result_array();
        }
 
        $query = $this->db->order_by('id', 'ASC')->get('notifications');
        return $query->row_array();
    }
	
	public function set_notifications($id = 0)
	{
		$data = array(
            'name' => $this->input->post('notfy_name'),
			'description' => $this->input->post('notfy_description'),
        );
		
		if ($id == 0) {
			$this->db->insert('notifications', $data);
			return $this->db->insert_id();
        } else {
            $this->db->where('id', $id);
            return $this->db->update('notifications', $data);
        }
	}
	
	public function delete_notifications($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('notifications');
    }
	
	public function mark_as_read($notif_id)
	{
		$query =  $this->db->get_where('notifications',array('id' => $notif_id));
        $notif = $query->row_array();
		$user_id =$this->session->userdata('user_session')['uid'];
		
		$new_user_list = '';
		if($notif['opened_by']!=''){
			$users = explode(',',$notif['opened_by']);
			if(!in_array($user_id,$users)){
				$users[] = $user_id;
				$new_user_list = implode(',',$users);
			}else{
				$new_user_list = implode(',',$users);
			}
		}else{
			$users[] = $user_id;
			$new_user_list = implode(',',$users);
		}
		
		$data = array('opened_by' => $new_user_list);
		$this->db->where('id', $notif_id);
		return $this->db->update('notifications', $data);
	}
	
	public function count_notification_user($userid = 0)
	{
		$final_count = 0;
		$unread_notif = array();
		if($userid){
			$query =  $this->db->get('notifications');
            $all_notif = $query->result_array();
			foreach($all_notif as $notif)
			{
				$found = 0;
				if($notif['opened_by']!=''){
					$users = explode(',',$notif['opened_by']);
					foreach($users as $user){
						if($user == $userid){
							$found = 1;
							break;
						}
					}
				}
				
				if($found == 0){
					$final_count++;
					$unread_notif[] = $notif['id'];
				}
			}
		}
		return array('count' => $final_count,'ids' => $unread_notif);
	}
}
