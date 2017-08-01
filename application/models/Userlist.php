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
		
        $this->send_user_welcome_mail();
		
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
	
	private function send_user_welcome_mail()
	{
		$this->load->library('email');
		
		$config['mailtype'] = 'html';

		$this->email->initialize($config);

		$this->email->from(ADMIN_EMAIL, 'SMS Plus');
		$this->email->to(ADMIN_EMAIL);
		$this->email->bcc($this->input->post('uemail'));
		
		$body='<table width="600"  border="0" cellspacing="0" cellpadding="15" style="border:solid 3px #0000CC; color:#333"><tr><td bgcolor="#0000FF"><a href="www.sms.smsplus.in/"><img src="'.base_url().'assets/images/logo1.png" alt="SMS Plus" /></a></td></tr><tr><td style="font-family:Arial, Helvetica, sans-serif; font-size:12px;"><table>
		<tr>
        <td width="37%" align="left"><strong>User Name:</strong></td>
        <td width="63%" align="left"><span style="float:left; width:270px;">'.$this->input->post('name').'</span></td>
		</tr>
		<tr>
		<tr>
		<td width="37%" align="left"><strong> User Id:</strong></td>
		<td width="63%" align="left"><span style="float:left; width:270px;">'.$this->input->post('username').'</span></td>
		</tr>
		<tr>
        <td width="37%" align="left"><strong> Password:</strong></td>
		<td width="63%" align="left"><span style="float:left; width:270px;">'.$this->input->post('password').'</span></td>
		</tr>	
		<tr>
        <td align="left"><strong>Mobile Number: </strong></td>
        <td align="left"><span style="float:left; width:270px;">'.$this->input->post('mobile').'</span></td>
      </tr>
      <tr>
        <td align="left"><strong>Quantity for SMS:</strong></td>
        <td align="left"><span style="float:left; width:270px;">'.$this->input->post('smsCredit').'</span></td>
      </tr>	    
	  <tr>
        <td width="37%" align="left"><strong>Email:</strong></td>
        <td width="63%" align="left"><span style="float:left; width:270px;">'.$this->input->post('uemail').'</span></td>
      </tr>	
	  <tr>
        <td width="37%" align="left"><strong>Expiry Date:</strong></td>
        <td width="63%" align="left"><span style="float:left; width:270px;">'.$this->input->post('expiry_date').'</span></td>
      </tr>	
	  <tr>
        <td width="37%" align="left"><strong>RM Email id:</strong></td>
        <td width="63%" align="left"><span style="float:left; width:270px;">'.$this->input->post('remail').'</span></td>
      </tr>	
	  <tr>
        <td width="37%" align="left"><strong>Relationship Manager:</strong></td>
        <td width="63%" align="left"><span style="float:left; width:270px;">'.$this->input->post('rmanager').'</span></td>
      </tr>	      
	  <tr>
        <td width="37%" align="left"><strong>R.M. Number:</strong></td>
        <td width="63%" align="left"><span style="float:left; width:270px;">'.$this->input->post('rmnumber').'</span></td>
      </tr>
	  <tr>
        <td width="37%" align="left"><strong>Client Address:</strong></td>
        <td width="63%" align="left"><span style="float:left; width:270px;">'.$this->input->post('rmaddress').'</span></td>
      </tr>	
	  <tr>
        <td width="37%" align="left"><strong>Client City:</strong></td>
        <td width="63%" align="left"><span style="float:left; width:270px;">'.$this->input->post('rmcity').'</span></td>
      </tr>	
	  <tr>
        <td width="37%" align="left"><strong>Client Company Name:</strong></td>
        <td width="63%" align="left"><span style="float:left; width:270px;">'.$this->input->post('rmaddress').'</span></td>
      </tr>	  	    
	</table>	
    </td>
	</tr>
	<tr>
	  <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
	  <p><strong>      Warm Regards</strong></p>
		<p style="font-size:14px; color:#0000FF"><strong>SMS Plus</strong></p><br>
		Email:- sales@smsplus.in<br>
		Mobile:- 9911560808<br>
		Web:- <a href="www.sms.smsplus.in/">SMS Plus</a><br>
	  </td>
	</tr>
	</table>'; 

		$this->email->subject('Action required - recharge your SMS Panel immediately"');
		$this->email->message($body);

		$this->email->send();
		
		return true;
	}
}
