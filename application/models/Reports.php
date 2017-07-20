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
	
	public function get_reportsby_user($id = FALSE,$userid = 0)
    {
        if ($id === FALSE)
        {
            $query =  $this->db->order_by('id', 'DESC')->get_where('reports',array('user_id' => $userid));
            return $query->result_array();
        }
 
        $query = $this->db->order_by('id', 'DESC')->get_where('reports',array('user_id' => $userid));
        return $query->row_array();
    }
	
	public function do_upload($fil_conf = array())
	{
			$config['upload_path']          = $fil_conf['path'];
			$config['allowed_types']        = $fil_conf['allowed'];
			$config['max_size']             = $fil_conf['size'];
			$config['max_width']            = $fil_conf['width'];
			$config['max_height']           = $fil_conf['height'];

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('userfile'))
			{
					$error = array('error' => $this->upload->display_errors());

					$this->load->view('upload_form', $error);
			}
			else
			{
					$data = array('upload_data' => $this->upload->data());

					$this->load->view('upload_success', $data);
			}
	}
	
	public function set_report($id = 0)
	{
		$file_id = 0;
		
		$config['upload_path']          = UPLOAD_PATH_REPORTS;
		$config['allowed_types']        = 'csv|xls|xlsx';
		$config['max_size']             = 10000;
		$config['encrypt_name']         = TRUE;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('report_file'))
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
					'user_id' => $this->session->userdata('admin_session')['uid']
				);
				$this->db->insert('contacts', $fdata);
				$file_id = $this->db->insert_id();
		}
		
		$data = array(
			'user_id' => $this->input->post('report_user_id'),
			'date' => date('Y-m-d',strtotime($this->input->post('report_date'))),
			'file_id' => $file_id
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
		$query = $this->db->get_where('reports',array('id' => $id));
        $file_inf = $query->row_array();
		
		$query = $this->db->get_where('contacts',array('id' => $file_inf['file_id']));
        $file_delinf = $query->row_array();
		
		unlink(UPLOAD_PATH_REPORTS.$file_delinf['file_name']);
		$this->db->where('id', $file_inf['file_id']);
		$this->db->delete('contacts');
		
        $this->db->where('id', $id);
        return $this->db->delete('reports');
    }
	
	public function notify_admin()
	{
		$this->load->library('email');

		$this->email->from(FROM_EMAIL);
		$this->email->to(ADMIN_EMAIL);
		//$this->email->cc('another@another-example.com');
		//$this->email->bcc('them@their-example.com');

		$this->email->subject('Report Request - '.$this->session->userdata('user_session')['username'].'<'.$this->session->userdata('user_session')['email'].'>');
		
		$email_cont = 'The User has requested SMS Report for the date:'.$this->input->post('report_request_period');
		if($this->input->post('report_request_notes') && ($this->input->post('report_request_notes')!= ''))
		{
			$email_cont .= 'Additional notes by user: '.$this->input->post('report_request_notes');
		}
		$this->email->message($email_cont);

		$this->email->send();
	}

}
