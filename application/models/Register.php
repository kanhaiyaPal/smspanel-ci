<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Model {

	public function __construct()
	{
			parent::__construct();
	}
	
	public function get_entries($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query =  $this->db->order_by('id', 'ASC')->get('registrations');
            return $query->result_array();
        }
 
        $query = $this->db->order_by('id', 'ASC')->get('registrations');
        return $query->row_array();
    }
	
	public function set_entry($id = 0)
	{
		$data = array(
            'name' => $this->input->post('aname'),
			'email' => $this->input->post('aemailid'),
			'mobile' => $this->input->post('amob'),
			'address' => $this->input->post('adescption'),
			'sms_count' => $this->input->post('quantity'),
        );
		
        $this->db->set('date_added', 'NOW()', FALSE);
        
		if ($id == 0) {
			$this->db->insert('registrations', $data);
			return $this->db->insert_id();
        } else {
            $this->db->where('id', $id);
            return $this->db->update('registrations', $data);
        }
	}
	
	public function delete_entry($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('registrations');
    }
	
	public function reset_pass($useremail = FALSE)
	{
		$this->load->helper('string');
		/*for random_string function */
		
		if($useremail){
			$row_res = $this->db->get_where('users',array('email' => $useremail));
			if(count($row_res)>0)
			{
				$this->load->model('authentication');
				$new_pass = random_string('alnum', 8);
				$hash_new_pass = $this->authentication->hash_password($new_pass);
				$this->db->where('id', $row_res['id']);
				$this->db->update('registrations', array('password' => $hash_new_pass));
				$this->send_forgetpass_email($row_res['email'],$new_pass);
				return true;
			}else{
				return false;
			}
		}
	}
	
	private function send_forgetpass_email($email = FALSE,$pass = FALSE)
	{
		if($email && $pass){
			$this->load->library('email');
		
			$config['mailtype'] = 'html';

			$this->email->initialize($config);

			$this->email->from(ADMIN_EMAIL, 'SMS Plus');
			$this->email->to($email);
			
			$query = $this->db->get_where('users',array('email' => $email));
			$user_det = $query->row_array();
			
			$html_msg = '<table width="600"  border="0" cellspacing="0" cellpadding="15" style="border:solid 3px #0000CC; color:#333"><tr><td bgcolor="#0000FF"><a href="www.sms.smsplus.in/"><img src="'.base_url().'assets/images/logo1.png" alt="SMS Plus" /></a></td></tr><tr><td style="font-family:Arial, Helvetica, sans-serif; font-size:12px;"><table width="600"  border="0" cellspacing="0" cellpadding="15">';
			$html_msg .= '<tr><td colspan="2">Dear '.$user_det['name'].', <br/> Your password has been reset.You can now login using the password below and change it as per your needs.</td></tr>';
			$html_msg .= '<tr>';
			$html_msg .= '<td>New Password : </td><td>'.$pass.'</td>';
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
			
			$this->email->subject('Password Reset');
			$this->email->message($html_msg);

			$this->email->send();
			
			return true;
		}
	}
}
