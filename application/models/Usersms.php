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
		
		$email_dt = array(
			'content' => $this->input->post('sms_txt'),
			'scheduled_on' => $this->input->post('sms_schedule'),
			'time' => $this->input->post('sms_slot'),
			'file_id' => $file_id,
			'user_id' => $user_id,
			'contact_count' => (int)$contacts_count
		);
		
		$this->send_sms_mail($email_dt);
		
		if((int)$upd_crd <= 2000){
			$this->send_lowbalance_mail($email_dt);
		}
		
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
	
	private function send_sms_mail($req_data = array())
	{
		$this->load->library('email');
		
		$config['mailtype'] = 'html';

		$this->email->initialize($config);

		$user_email = $this->session->userdata('user_session')['email'];
		$this->email->from(ADMIN_EMAIL, 'SMS Plus');
		$this->email->to(ADMIN_EMAIL);
		
		$query = $this->db->get_where('contacts',array('id' => $req_data['file_id']));
		$file_det = $query->row_array();
		
		$html_msg = '<table width="600"  border="0" cellspacing="0" cellpadding="15" style="border:solid 3px #0000CC; color:#333"><tr><td bgcolor="#0000FF"><a href="www.sms.smsplus.in/"><img src="'.base_url().'assets/images/logo1.png" alt="SMS Plus" /></a></td></tr><tr><td style="font-family:Arial, Helvetica, sans-serif; font-size:12px;"><table width="600"  border="0" cellspacing="0" cellpadding="15">';
		$html_msg .= '<tr><td colspan="2">A new SMS has been scheduled by '.$this->session->userdata('user_session')['username'].'</td></tr>';
		$html_msg .= '<tr>';
		$html_msg .= '<td>File : </td><td><a href="'.base_url().'uploads/contacts/'.$file_det['file_name'].'" >Click to view uploaded file</a></td>';
		$html_msg .= '</tr><tr>';
		$html_msg .= '<td>SMS Content: </td><td>'.$req_data['content'].'</td>';
		$html_msg .= '</tr><tr>';
		$html_msg .= '<td>SMS Count: </td><td>'.$req_data['contact_count'].'</td>';
		$html_msg .= '</tr><tr>';
		$html_msg .= '<td>Scheduled On: </td><td>'.$req_data['scheduled_on'].'</td>';
		$html_msg .= '</tr><tr>';
		$html_msg .= '<td>Scheduled At: </td><td>'.$req_data['time'].'</td>';
		$html_msg .= '</tr>';
		$html_msg .= '<tr>
					  <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px;"><br><br>
						<p><strong>Warm Regards</strong></p>
						<p style="font-size:14px; color:#0000FF"><strong>SMS Plus</strong></p><br>
						Email:- sales@smsplus.in<br>
						Mobile:- 9911560808<br>
						Web:- <a href="www.sms.smsplus.in/">SMS Plus</a><br>
					  </td>
					</tr>';
		$html_msg .= '</table></table>';
		
		$this->email->subject('New SMS Scheduled By '.$this->session->userdata('user_session')['username']);
		$this->email->message($html_msg);
		$this->email->attach(base_url().'uploads/contacts/'.$file_det['file_name']);

		$this->email->send();
		
		return true;
	}
	
	private function send_lowbalance_mail($req_data = array())
	{
		$this->load->library('email');
		
		$config['mailtype'] = 'html';

		$this->email->initialize($config);

		$user_email = $this->session->userdata('user_session')['email'];
		$this->email->from(ADMIN_EMAIL, 'SMS Plus');
		$this->email->to($user_email);
		
		$query = $this->db->get_where('users', array('id' => $req_data['user_id']));
		$rm_info = $query->row_array();
		
		$html_msg = '<table width="600"  border="0" cellspacing="0" cellpadding="15" style="border:solid 3px #0000CC; color:#333"><tr><td bgcolor="#0000FF"><a href="www.sms.smsplus.in/"><img src="'.base_url().'assets/images/logo1.png" alt="SMS Plus" /></a></td></tr><tr><td style="font-family:Arial, Helvetica, sans-serif; font-size:12px;"><table width="600"  border="0" cellspacing="0" cellpadding="15">';
		$html_msg .= '<tr><td colspan="2">It is a information that you have less than 2 SMS in your account. So Please recharge immediately or contact your relationship manage.<br></td></tr>';
		$html_msg .= '<tr>';
		$html_msg .= '<td>RM Name : </td><td>'.$rm_info['rm_name'].'</td>';
		$html_msg .= '</tr><tr>';
		$html_msg .= '<td>RM Phone: </td><td>'.$req_data['rm_contact'].'</td>';
		$html_msg .= '</tr><tr>';
		$html_msg .= '<td>RM Email: </td><td>'.$req_data['rm_email'].'</td>';
		$html_msg .= '</tr>';
		$html_msg .= '<tr>
					  <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px;"><br><br>
						<p><strong>Warm Regards</strong></p>
						<p style="font-size:14px; color:#0000FF"><strong>SMS Plus</strong></p><br>
						Email:- sales@smsplus.in<br>
						Mobile:- 9911560808<br>
						Web:- <a href="www.sms.smsplus.in/">SMS Plus</a><br>
					  </td>
					</tr>';
		$html_msg .= '</table></table>';
		
		$this->email->subject('Action required - recharge your SMS Panel immediately"');
		$this->email->message($html_msg);

		$this->email->send();
		
		return true;
	}
}
