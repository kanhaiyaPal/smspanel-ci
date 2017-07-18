<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminDashboard extends CI_Controller {
	
	public function __construct()
    {
		parent::__construct();
		$this->load->model('authentication');
	}

	public function index()
	{	
		if((!$this->authentication->logged_in_status()) && (!$this->session->has_userdata('admin_session'))){
			redirect(base_url());
		}
		
		if ( ! file_exists(APPPATH.'views/admin_dashboard.php'))
        {
			show_404();
        }
		
		$this->load->helper('form');
		
        $data['title'] = ucfirst('GAP Infotech : Online SMS Panel'); // Capitalize the first letter
		
		/*User list data*/
		$this->load->library('pagination');
		
		$this->load->model('userlist');
		$users['users'] = $this->userlist->get_users();
		$users['resellers'] = $this->userlist->get_users(FALSE,'2');
		$data['userlist'] = $this->load->view('admindashboard/user_list',$users, TRUE);
		
		/*Register Data*/
		$this->load->model('register');
		$register['entries'] = $this->register->get_entries();
				
		$data['registrations'] = $this->load->view('admindashboard/registration',$register, TRUE);
		
		/*Notification Data*/
		$this->load->model('notification');
		$notfic['notifications'] = $this->notification->get_notifications();
		
		$data['notification'] = $this->load->view('admindashboard/notifications',$notfic, TRUE);
		
		/*Offers Data*/
		$this->load->model('smsoffers');
		$offer['offers'] = $this->smsoffers->get_mixed_data(FALSE,'offer');
		
		$data['offers'] = $this->load->view('admindashboard/offers',$offer, TRUE);
		
		/*SMS Ideas Data*/
		$sms['smsideas'] = $this->smsoffers->get_mixed_data();
		
		$data['smsidea'] = $this->load->view('admindashboard/sms_idea',$sms, TRUE);
		
		/*User SMS Data*/
		$this->load->model('usersms');
		$show_data = array();
		$raw_data = $this->usersms->get_usersms();
		foreach($raw_data as $data)
		{
			$show_data[] = array(
				'id' => $data['id'],
				'text' => $data['content'],
				'date_time' => $data['scheduled_on'].'/'.$data['time'],
				'name' => $this->usersms->get_userdetails($data['user_id']),
				'file' => $this->usersms->get_filedetails($data['file_id'])
			);
		}
		$smsdata['smsdata'] = $show_data;
		
		$data['usersms'] = $this->load->view('admindashboard/user_sms',$smsdata, TRUE);
		
		/*Update Balance Data*/
		$this->load->model('updatebalance');
		
		$balances_array = array();
		$all_balc = $this->updatebalance->get_balance();
		foreach($all_balc as $si_bal)
		{
			$balances_array[] = array(
				'id' => $si_bal['id'],
				'name' => $this->usersms->get_userdetails($si_bal['user_id']),
				'updated_by' => $this->usersms->get_userdetails($si_bal['updated_by']),
				'balance_updated' => $si_bal['balance_updated'],
				'date_added' => $si_bal['date_added'],
			);
		}
		$bl_data['balances'] = $balances_array;
		$bl_data['users'] = $this->updatebalance->users_list();
		
		$data['update_balance'] = $this->load->view('admindashboard/update_balance',$bl_data, TRUE);
		
		/*Reports Data*/
		$this->load->model('reports');
		$ret_reports = array();
		$raw_reps = $this->reports->get_reports();
		foreach($raw_reps as $reps)
		{
			$ret_reports[] = array(
				'id' => $reps['id'],
				'name' => $this->usersms->get_userdetails($reps['user_id']),
				'date' => date('d-m-Y',strtotime($reps['date'])),
				'file_name' => $this->usersms->get_filedetails($reps['file_id'])
			);
		}
		$report['reports'] =
		
		$data['report'] = $this->load->view('admindashboard/reports','', TRUE);
		
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin_dashboard', $data);
        $this->load->view('templates/footer', $data);
	}
	
	public function logout()
	{
		$this->authentication->logout_current_user();
	}
	
	/*=======User List Functions==============*/
	public function register_user()
	{
		
		$this->load->library('form_validation');
		$this->load->model('userlist');
		
		$this->form_validation->set_rules('u_type', 'User Type', 'trim|required');
		$this->form_validation->set_rules('remail', 'RM Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('rmanager', 'RM', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');
		$this->form_validation->set_rules('rmnumber', 'RM Number', 'trim|required|numeric|min_length[10]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('rmaddress', 'RM Address', 'trim|required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|numeric|min_length[10]');
		$this->form_validation->set_rules('smsCredit', 'SMS Credit', 'trim|required|numeric');
		$this->form_validation->set_rules('rmcity', 'RM City', 'trim|required');
		$this->form_validation->set_rules('uemail', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('rmcopmany', 'Company Name', 'trim|required');
		$this->form_validation->set_rules('expiry_date', 'Expiry Date', 'trim|required');
		
		if ($this->form_validation->run() == FALSE){
			$this->index();
		}
		else{
			$this->userlist->set_user();
			$this->session->set_flashdata('admindash_success', 'User Created Successfully');
			redirect(base_url().'admindashboard','refresh');
		}
	}
	
	public function edit_user()
	{
		$this->load->library('form_validation');
		$this->load->model('userlist');
		
		$this->form_validation->set_rules('remail', 'RM Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('rmanager', 'RM', 'trim|required');
		$this->form_validation->set_rules('rmnumber', 'RM Number', 'trim|required|numeric|min_length[10]');
		$this->form_validation->set_rules('rmaddress', 'RM Address', 'trim|required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|numeric|min_length[10]');
		$this->form_validation->set_rules('rmcity', 'RM City', 'trim|required');
		$this->form_validation->set_rules('uemail', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('rmcopmany', 'Company Name', 'trim|required');
		$this->form_validation->set_rules('expiry_date', 'Expiry Date', 'trim|required');
		
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('admindash_success', validation_errors());
			redirect(base_url().'admindashboard','refresh');
		}
		else{
			$this->userlist->set_user($this->input->post('user_id'));
			$this->session->set_flashdata('admindash_success', 'User Edited Successfully');
			redirect(base_url().'admindashboard','refresh');
		}
	}
	
	public function delete_user($id = 0)
	{
		if($id){
			$this->load->model('userlist');
			
			$this->userlist->delete_user($id);
			$this->session->set_flashdata('admindash_success', 'User Deleted Successfully');
			redirect(base_url().'admindashboard','refresh');
		}
	}
	
	public function change_status()
	{
		$user_id = (int)$this->uri->segment(3);
		$new_status = (int)$this->uri->segment(4);
		
		if($user_id){
			$this->load->model('userlist');
			$this->userlist->update_user_status($user_id,$new_status);
			
			$this->session->set_flashdata('admindash_success', 'User Status Changed Successfully');
			redirect(base_url().'admindashboard','refresh');
		}
	}
	
	public function changestatus()
	{
		$this->load->model('userlist');
		
		if($this->input->post('activate')){  
			foreach($this->input->post('mass_upd') as $id)
			{
				$this->userlist->update_user_status($id,1);
			}
		}
		if($this->input->post('deactivate')){  
			foreach($this->input->post('mass_upd') as $id)
			{
				$this->userlist->update_user_status($id,0);
			}
		}
		
		if($this->input->post('activaters')){  
			foreach($this->input->post('mass_updres') as $id)
			{
				$this->userlist->update_user_status($id,1);
			}
		}
		if($this->input->post('deactivaters')){  
			foreach($this->input->post('mass_updres') as $id)
			{
				$this->userlist->update_user_status($id,0);
			}
		}
	}
	/*=======User List Functions end==========*/
	
	/*=======Registration Funtions============*/
	public function delete_enquiry($id = 0)
	{
		if($id){
			$this->load->model('register');
			$this->register->delete_entry((int)$id);
			
			$this->session->set_flashdata('admindash_success', 'Entry Deleted Successfully');
			redirect(base_url().'admindashboard','refresh');
		}
	}
	
	public function delete_bulk_enquiry()
	{
		if(count($this->input->post('mass_updreg'))>0){
			$this->load->model('register');
			foreach($this->input->post('mass_updreg') as $id)
			{
				$this->register->delete_entry((int)$id);
			}
			
			$this->session->set_flashdata('admindash_success', 'Entries Deleted Successfully');
			redirect(base_url().'admindashboard','refresh');
		}		
	}
	
	/*=======Registration Funtions ends=========*/
	
	/*=======Notifications Funtions============*/
	public function add_new_notification()
	{
		$this->load->library('form_validation');
		$this->load->model('notification');
		
		$this->form_validation->set_rules('notfy_name', 'Notification Name', 'trim|required');
		$this->form_validation->set_rules('notfy_description', 'Notification Description', 'trim|required');
		
		if ($this->form_validation->run() == FALSE){
			
			$this->session->set_flashdata('notify_errors', validation_errors());
			redirect(base_url().'admindashboard','refresh');
		}else{
			$this->notification->set_notifications();
			
			$this->session->set_flashdata('notify_success','Notification Created Successfully');
			redirect(base_url().'admindashboard','refresh');
		}
	}
	
	public function edit_notification()
	{
		if($this->input->post('notify_id') && ($this->input->post('notify_id')!= '0'))
		{
			$nid = $this->input->post('notify_id');
			$this->load->model('notification');
			$this->notification->set_notifications($nid);
			
			$this->session->set_flashdata('notify_success','Notification Edited Successfully');
			redirect(base_url().'admindashboard','refresh');
		}
	}
	
	public function delete_notification($id = 0)
	{
		if($id){
			$this->load->model('notification');
			$this->notification->delete_notifications($id);
			
			$this->session->set_flashdata('notify_success','Notification Deleted Successfully');
			redirect(base_url().'admindashboard','refresh');
		}
	}
	/*======Notifications Funtions ends========*/
	
	
	/*=======Offers Funtions============*/
	public function add_new_offer()
	{
		$this->load->library('form_validation');
		$this->load->model('smsoffers');
		
		$this->form_validation->set_rules('mixdata_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('mixdata_description', 'Description', 'trim|required');
		
		if ($this->form_validation->run() == FALSE){
			
			$this->session->set_flashdata('offer_errors', validation_errors());
			redirect(base_url().'admindashboard','refresh');
		}else{
			$this->smsoffers->set_mixed_data(0,'offer');
			
			$this->session->set_flashdata('offer_success','Offer Created Successfully');
			redirect(base_url().'admindashboard','refresh');
		}
	}
	
	public function edit_offer()
	{
		if($this->input->post('offer_id') && ($this->input->post('offer_id')!= '0'))
		{
			$oid = $this->input->post('offer_id');
			$this->load->model('smsoffers');
			$this->smsoffers->set_mixed_data($oid,'offer');
			
			$this->session->set_flashdata('offer_success','Offer Edited Successfully');
			redirect(base_url().'admindashboard','refresh');
		}
	}
	
	public function delete_offer($id = 0)
	{
		if($id){
			$this->load->model('smsoffers');
			$this->smsoffers->delete_mixed_data($id);
			
			$this->session->set_flashdata('offer_success','Offer Deleted Successfully');
			redirect(base_url().'admindashboard','refresh');
		}
	}
	/*=======Offers Funtions Ends============*/
	
	
	/*=======SMS Ideas Funtions============*/
	public function add_new_smsidea()
	{
		$this->load->library('form_validation');
		$this->load->model('smsoffers');
		
		$this->form_validation->set_rules('mixdata_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('mixdata_description', 'Description', 'trim|required');
		
		if ($this->form_validation->run() == FALSE){
			
			$this->session->set_flashdata('sms_errors', validation_errors());
			redirect(base_url().'admindashboard','refresh');
		}else{
			$this->smsoffers->set_mixed_data();
			
			$this->session->set_flashdata('sms_success','SMS Idea Created Successfully');
			redirect(base_url().'admindashboard','refresh');
		}
	}
	
	public function edit_smsidea()
	{
		if($this->input->post('sms_id') && ($this->input->post('sms_id')!= '0'))
		{
			$sid = $this->input->post('sms_id');
			$this->load->model('smsoffers');
			$this->smsoffers->set_mixed_data($sid);
			
			$this->session->set_flashdata('sms_success','SMS Idea Edited Successfully');
			redirect(base_url().'admindashboard','refresh');
		}
	}
	
	public function delete_smsidea($id = 0)
	{
		if($id){
			$this->load->model('smsoffers');
			$this->smsoffers->delete_mixed_data($id);
			
			$this->session->set_flashdata('sms_success','SMS Idea Deleted Successfully');
			redirect(base_url().'admindashboard','refresh');
		}
	}
	
	/*=======SMS Ideas Funtions Ends=========*/
	
	/*=======User SMS Functions==============*/
	
	public function delete_usersms($id = 0)
	{
		if($id){
			$this->load->model('usersms');
			$this->smsoffers->delete_usersms($id);
			
			$this->session->set_flashdata('usersms_success','User SMS Deleted Successfully');
			redirect(base_url().'admindashboard','refresh');
		}
	}
	
	public function delete_bulk_usersms()
	{
		if(count($this->input->post('mass_updusms'))>0){
			$this->load->model('usersms');
			foreach($this->input->post('mass_updusms') as $id)
			{
				$this->usersms->delete_usersms((int)$id);
			}
			
			$this->session->set_flashdata('usersms_success','User SMS Deleted Successfully');
			redirect(base_url().'admindashboard','refresh');
		}
	}
	/*=======User SMS Funtions Ends=========*/
	
	/*=======Update Balance Funtions =========*/
	public function add_new_updbalance()
	{
		$this->load->library('form_validation');
		$this->load->model('updatebalance');
		
		$this->form_validation->set_rules('balance_user_id', 'User', 'trim|required');
		$this->form_validation->set_rules('balance_sms_count', 'SMS Count', 'trim|required|greater_than[0]');
		
		if ($this->form_validation->run() == FALSE){
			
			$this->session->set_flashdata('balance_errors', validation_errors());
			redirect(base_url().'admindashboard','refresh');
		}else{
			$this->updatebalance->set_balance();
			
			$this->session->set_flashdata('balance_success','Balance Updated Successfully');
			redirect(base_url().'admindashboard','refresh');
		}
	}
	
	/*=======Update Balance Funtions Ends=====*/
	
	/*=======Reports Funtions ================*/
	public function addnew_report()
	{
		$this->load->library('form_validation');
		$this->load->model('reports');
		
		$this->form_validation->set_rules('report_user_id', 'User', 'trim|required');
		$this->form_validation->set_rules('report_date', 'Report Date', 'trim|required');
	}
	
	public function delete_reportgen($id = 0)
	{
		if($id){
			$this->load->model('reports');
			$this->reports->delete_report($id);
			
			$this->session->set_flashdata('report_success','Report Deleted Successfully');
			redirect(base_url().'admindashboard','refresh');
		}
	}
	/*=======Reports Funtions Ends ==========*/
}
