<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserDashboard extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('authentication');
	}
	
	public function index($page = '')
	{

		if((!$this->authentication->logged_in_status()) && (!$this->session->has_userdata('user_session'))){
			redirect(base_url());
		}
		
		if($page == 'notification')
		{
			$data['pageset'] = 'notification';
			$dashdata['pageset'] = 'notification';
			
			if($this->uri->segment(4) && ($this->uri->segment(4)!= ''))
			{
				$nt_id = (int)$this->uri->segment(4);
				$this->marknotificationas_read($nt_id);
			}
		}
		
		if ( ! file_exists(APPPATH.'views/user_dashboard.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		$this->load->helper('form');
		
        $dashdata['title'] = ucfirst('GAP Infotech : Online SMS Panel'); // Capitalize the first letter
		
		/*Dashboard data*/
		$this->load->model('dashboard');
		$user_raw_data = $this->dashboard->get_userdata();
		$user_data = array();
		
		$this->load->model('notification');
		$count = $this->notification->count_notification_user($this->session->userdata('user_session')['uid'])['count'];
		$user_data = array(
			'remaining_credits' => $user_raw_data['current_credits'],
			'total_credit' => $user_raw_data['total_credits'],
			'notification_count' => $count,
			'expiry_date' => $user_raw_data['expiry_date'],
			'customer_support' => '+91- 124-4010990',
			'relationship_manager' => $user_raw_data['rm_name'],
			'relationship_manager_no' => $user_raw_data['rm_contact'],
			'username' => $user_raw_data['username'],
			'company_name' => $user_raw_data['company'],
			'address' => $user_raw_data['address'],
			'mobile' => $user_raw_data['mobile'],
			'email' => $user_raw_data['email'],
			'name' => $user_raw_data['name'],
			'user_id' => $user_raw_data['id'],
			'city' => $user_raw_data['city']
		);
		
		$dashdata['userdata'] = $user_data;
		$data['dashboard'] = $this->load->view('userdashboard/dashboard',$dashdata, TRUE);
		
		/*Template Data*/
		$this->load->model('templates');
		$templatedata['templates'] = $this->templates->get_templates();
		$data['templates'] = $this->load->view('userdashboard/templates',$templatedata, TRUE);
		
		/*Contact Data*/
		$this->load->model('contact');
		$contact['contacts'] = $this->contact->get_contacts();
		$data['content'] = $this->load->view('userdashboard/content',$contact, TRUE);
		
		/*Compose Data*/
		$this->load->model('usersms');
		$composedata['files'] = $this->usersms->get_userfiles();
		$composedata['limit_reached'] = $this->usersms->get_userlimit();
		$data['compose'] = $this->load->view('userdashboard/compose',$composedata, TRUE);
		
		/*SMS History Data*/
		$all_uhist = $this->usersms->get_usersmshistory();
		$fn_uhist = array();
		foreach($all_uhist as $hist)
		{
			$fn_uhist[] = array(
				'id' => $hist['id'],
				'file_name' => $this->contact->get_contactfiletitle_byid($hist['file_id']),
				'orig_file' => $this->contact->get_contactfilename_byid($hist['file_id']),
				'cont_count' => $this->usersms->get_numbers_count($this->contact->get_contactfilename_byid($hist['file_id'])),
				'sms' => $hist['content'],
				'schedule' => $hist['scheduled_on'].'/'.$hist['time'],				
			);
		}
		$smshistorydata['smsitems'] = $fn_uhist;
		$data['history'] = $this->load->view('userdashboard/history',$smshistorydata, TRUE);
		
		$offers['offers'] = $this->dashboard->get_offers();
		$ideas['ideas'] = $this->dashboard->get_smsideas();
		$data['offers'] = $this->load->view('userdashboard/offers',$offers, TRUE);
		$data['idea'] = $this->load->view('userdashboard/idea',$ideas, TRUE);
		
		/*User Reports Data*/
		$this->load->model('reports');
		$ret_reports = array();
		$raw_reps = $this->reports->get_reportsby_user(FALSE,$this->session->userdata('user_session')['uid']);
		foreach($raw_reps as $reps)
		{
			$ret_reports[] = array(
				'id' => $reps['id'],
				'name' => $this->usersms->get_userdetails($reps['user_id']),
				'date' => date('d-m-Y',strtotime($reps['date'])),
				'file_name' => $this->usersms->get_filedetails($reps['file_id'])
			);
		}
		$report['reports'] = $ret_reports;
		$data['report'] = $this->load->view('userdashboard/report',$report, TRUE);
		
		
		$notification['alldata'] = $this->notification->get_notifications();
		$notification['unreads'] = $this->notification->count_notification_user($this->session->userdata('user_session')['uid'])['ids'];
		$data['notification'] = $this->load->view('userdashboard/notification',$notification, TRUE);
		
        $this->load->view('templates/user_header', $dashdata);
        $this->load->view('user_dashboard', $data);
        $this->load->view('templates/footer', $data);
	}
	
	/*Dashboard function*/
	public function modify_userinfo()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('rmcopmany', 'Company', 'trim|required');
		$this->form_validation->set_rules('rmaddress', 'Address', 'trim|required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|numeric');
		$this->form_validation->set_rules('uemail', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		
		if ($this->form_validation->run() == FALSE){
			
			$this->session->set_flashdata('dashboard_error', validation_errors());
			redirect(base_url().'userdashboard','refresh');
		}
		else{
			$this->load->model('dashboard');
			$this->dashboard->modify_user();
			$this->session->set_flashdata('dashboard_success', 'User Information Modified Successfully');
			redirect(base_url().'userdashboard','refresh');
		}
	}
	
	private function marknotificationas_read($notification_id = 0)
	{
		if($notification_id){
			$this->load->model('notification');
			$retrun = $this->notification->mark_as_read($notification_id);
			if($retrun){
				exit('1');
			}
		}
	}
	
	public function changepassword()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('NewPass', 'Password', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('RePass', 'Confirm Password', 'trim|required|matches[NewPass]');
		
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('dashboard_error', validation_errors());
			redirect(base_url().'userdashboard','refresh');
		}else{
			$this->load->model('dashboard');
			$this->dashboard->update_password();
			$this->session->set_flashdata('dashboard_success', 'Password Changed Successfully');
			redirect(base_url().'userdashboard','refresh');
		}
	}
	
	public function logout()
	{
		$this->authentication->logout_current_user();
	}
	
	/*Template Functions*/
	public function add_new_template()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('template_name', 'Template Name', 'trim|required');
		$this->form_validation->set_rules('template_description', 'Template Description', 'trim|required');
		
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('template_error', validation_errors());
			redirect(base_url().'userdashboard','refresh');
		}else{
			$this->load->model('templates');
			$this->templates->set_templates();
			$this->session->set_flashdata('template_success', 'Template Added Successfully');
			redirect(base_url().'userdashboard','refresh');
		}
	}
	
	public function edit_template()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('template_name', 'Template Name', 'trim|required');
		$this->form_validation->set_rules('template_description', 'Template Description', 'trim|required');
		
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('template_error', validation_errors());
			redirect(base_url().'userdashboard','refresh');
		}else{
			$this->load->model('templates');
			$this->templates->set_templates($this->input->post('template_id'));
			$this->session->set_flashdata('template_success', 'Template Updated Successfully');
			redirect(base_url().'userdashboard','refresh');
		}
	}
	
	public function delete_template($id = 0)
	{
		if($id){
			$this->load->model('templates');
			$this->templates->delete_templates($id);
			$this->session->set_flashdata('template_success', 'Template Deleted Successfully');
			redirect(base_url().'userdashboard','refresh');
		}
	}
	
	/*Contacts Function*/
	public function addnew_contact_content()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('file_title', 'File Name', 'trim|required');
		
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('contact_error', validation_errors());
			redirect(base_url().'userdashboard','refresh');
		}else{
			$this->load->model('contact');
			$this->contact->set_contact();
			$this->session->set_flashdata('contact_success', 'Contact Saved Successfully');
			redirect(base_url().'userdashboard','refresh');
		}
	}
	
	public function deletecontact_content($id = 0)
	{
		if($id){
			$this->load->model('contact');
			$this->contact->delete_contact($id);
			$this->session->set_flashdata('contact_success', 'Contact Deleted Successfully');
			redirect(base_url().'userdashboard','refresh');
		}
	}
	
	/*Compose SMS Function*/
	public function addnew_user_sms()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('sms_txt', 'SMS Text', 'trim|required|max_length[160]');
		$this->form_validation->set_rules('sms_schedule', 'SMS Date', 'trim|required|callback_limitdate');
		$this->form_validation->set_rules('sms_slot', 'SMS Slot', 'trim|required');
		$this->form_validation->set_rules('file_type', 'Contacts', 'callback_validate_outofbounds');
		
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('compose_error', validation_errors());
			redirect(base_url().'userdashboard','refresh');
		}else{
			$this->load->model('usersms');
			$this->usersms->set_usersms();
			$this->session->set_flashdata('compose_success', 'SMS Saved Successfully');
			redirect(base_url().'userdashboard','refresh');
		}
	}
	
	public function validate_outofbounds()
	{
		$this->load->model('dashboard');
		$user_raw_data = $this->dashboard->get_userdata();
		$current_credit = $user_raw_data['current_credits'];
		$required_credit = 0;
		
		if($this->input->post('file_type') && ($this->input->post('file_type')=='textarea') && ($this->input->post('textarea_input_contacts')))
		{
			$required_credit = (substr_count($this->input->post('textarea_input_contacts'), "\n")+1);
		}else{
			$this->load->model('contact');
			$filenm = $this->contact->get_contactfilename_byid($this->input->post('select_file'));
			$required_credit = (substr_count(file_get_contents(UPLOAD_PATH_CONTACTS.$filenm), "\n")+1);
		}
		
		if($required_credit > $current_credit){
			$this->form_validation->set_message('validate_outofbounds', 'The number of contacts in file exceeds your available limit. Kindly upload new file/paste again');
			return FALSE;
		}else{
			return TRUE;
		}
		
	}
	
	public function limitdate($str)
	{
		$this->load->model('usersms');
		$is_tru = $this->usersms->get_date_limitation($str);
		
		if(!$is_tru){
			$this->form_validation->set_message('limitdate', 'Not More than 2 messages can be scheduled for a day');
			return FALSE;
		}else{
			return TRUE;
		}
	}
	
	public function send_report_requistion()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('report_request_period', 'Report Date', 'trim|required');
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('userreport_error', validation_errors());
			redirect(base_url().'userdashboard','refresh');
		}else{
			$this->load->model('reports');
			$this->reports->notify_admin();
			$this->session->set_flashdata('userreport_success', 'Request Sent Successfully');
			redirect(base_url().'userdashboard','refresh');
		}
	}
}
