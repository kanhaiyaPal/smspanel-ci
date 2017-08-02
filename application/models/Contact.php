<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Model {

	public function __construct()
	{
			parent::__construct();
	}
	
	public function get_contacts($id = FALSE)
    {
		$user_id = $this->session->userdata('user_session')['uid'];
        if ($id === FALSE)
        {
            $query =  $this->db->order_by('id', 'DESC')->get_where('contacts',array('user_id' => $user_id));
            return $query->result_array();
        }
 
        $query = $this->db->order_by('id', 'DESC')->get_where('contacts',array('user_id' => $user_id));
        return $query->row_array();
    }
		
	public function set_contact($id = 0)
	{
		$file_id = 0;
		
		$config['upload_path']          = UPLOAD_PATH_CONTACTS;
		$config['allowed_types']        = 'txt';
		$config['max_size']             = 10000;
		$config['encrypt_name']         = TRUE;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('contact_file'))
		{
				$error = array('error' => $this->upload->display_errors());
				print_r($error);
				exit;
				return false;
		}
		else
		{
				$file_data = $this->upload->data();
				
				$fdata = array(
					'file_name' => $file_data['file_name'],
					'user_id' => $this->session->userdata('user_session')['uid'],
					'file_title' => str_replace($file_data['file_ext'],"",$file_data['client_name']).'_'.date('d-m-Y')
				);
				$this->db->insert('contacts', $fdata);
				$file_id = $this->db->insert_id();
		}
	}
	
	public function delete_contact($id)
    {

		$query = $this->db->get_where('contacts',array('id' => $id));
        $file_delinf = $query->row_array();
		
		unlink(UPLOAD_PATH_CONTACTS.$file_delinf['file_name']);
		
        $this->db->where('id', $id);
        return $this->db->delete('contacts');
    }

	public function get_contactfilename_byid($id = FALSE)
	{
		if($id){
			$query = $this->db->get_where('contacts',array('id' => $id));
			$file_delinf = $query->row_array();
			return $file_delinf['file_name'];
		}
	}
	
	public function get_contactfiletitle_byid($id = FALSE)
	{
		if($id){
			$query = $this->db->get_where('contacts',array('id' => $id));
			$file_delinf = $query->row_array();
			return $file_delinf['file_title'];
		}
	}
}
