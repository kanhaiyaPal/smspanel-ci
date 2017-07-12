<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function __construct()
	{
			parent::__construct();
			$this->load->model('authentication');
	}

	public function index()
	{
		if ( ! file_exists(APPPATH.'views/landing_page.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		$this->load->helper('form');
		
		$data['logged'] = $this->authentication->logged_in_status();
		
        $data['title'] = ucfirst('GAP Infotech : Online SMS Panel'); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('landing_page', $data);
        $this->load->view('templates/footer', $data);
	}
	
	public function register()
	{
		if ( ! file_exists(APPPATH.'views/register_request.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		
		$data['logged'] = $this->authentication->logged_in_status();
		 
		$this->load->helper('form');
		
        $data['title'] = ucfirst('GAP Infotech : Online SMS Panel'); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('register_request', $data);
        $this->load->view('templates/footer', $data);
	}
	
	public function forgotpassword()
	{
		if ( ! file_exists(APPPATH.'views/forgot_password.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		$this->load->helper('form');
		
		$data['logged'] = $this->authentication->logged_in_status();
		
        $data['title'] = ucfirst('GAP Infotech : Online SMS Panel'); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('forgot_password', $data);
        $this->load->view('templates/footer', $data);
	}
	
	public function login()
	{
		$this->load->library('form_validation');
		
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required',array('required'=> 'Username Required'));
		$this->form_validation->set_rules('lpassword', 'Password', 'trim|required',array('required'=> 'Password Required'));
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->index();
		}
		else
		{
			$user_valid = $this->authentication->verify_username($this->input->post('username'));
			if($user_valid)
			{
				if($this->authentication->verify_pass($this->input->post('lpassword'),$user_valid['password']))
				{
					$user_data = $this->authentication->get_userdata($user_valid['uid']);
					$this->authentication->generate_sessions($user_data);					
				}else{
					$this->session->set_flashdata('login_error', 'Username/Password is incorrect');
					redirect(base_url(),'refresh');
				}
			}
		}
	}
	
	public function register_submit()
	{
		//function to handle the form submission of register form
		$this->load->library('form_validation');
		$this->load->model('register');
		
		$this->form_validation->set_rules('aname', 'Name', 'trim|required');
		$this->form_validation->set_rules('aemailid', 'Email', 'trim|required|valid_email');
		
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('register_error', validation_errors());
			redirect(base_url().'register','refresh');
		}
		else{
			$this->register->set_entry();
			$this->session->set_flashdata('register_success', 'Thank you Registering With SMS Plus, One of our Support Executive will get back to you Soon!!');
			redirect(base_url().'register','refresh');
		}
	}
	
	public function forgotpass_submit()
	{
		//function to handle the form submission of forgot password
	}
}
