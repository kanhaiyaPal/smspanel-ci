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
		$data['notification'] = $this->load->view('admindashboard/notifications','', TRUE);
		$data['offers'] = $this->load->view('admindashboard/offers','', TRUE);
		$data['smsidea'] = $this->load->view('admindashboard/sms_idea','', TRUE);
		$data['usersms'] = $this->load->view('admindashboard/user_sms','', TRUE);
		$data['update_balance'] = $this->load->view('admindashboard/update_balance','', TRUE);
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
}
