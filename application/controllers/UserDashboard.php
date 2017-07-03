<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserDashboard extends CI_Controller {

	public function index()
	{
		if ( ! file_exists(APPPATH.'views/user_dashboard.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		$this->load->helper('form');
		
        $data['title'] = ucfirst('GAP Infotech : Online SMS Panel'); // Capitalize the first letter

        $this->load->view('templates/user_header', $data);
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
		
        $data['title'] = ucfirst('GAP Infotech : Online SMS Panel'); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('forgot_password', $data);
        $this->load->view('templates/footer', $data);
	}
}
