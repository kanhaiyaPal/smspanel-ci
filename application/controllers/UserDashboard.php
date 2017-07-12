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

		$data['dashboard'] = $this->load->view('userdashboard/dashboard','', TRUE);
		$data['templates'] = $this->load->view('userdashboard/templates','', TRUE);
		$data['content'] = $this->load->view('userdashboard/content','', TRUE);
		$data['compose'] = $this->load->view('userdashboard/compose','', TRUE);
		$data['history'] = $this->load->view('userdashboard/history','', TRUE);
		$data['offers'] = $this->load->view('userdashboard/offers','', TRUE);
		$data['idea'] = $this->load->view('userdashboard/idea','', TRUE);
		$data['report'] = $this->load->view('userdashboard/report','', TRUE);
		
        $this->load->view('templates/user_header', $data);
        $this->load->view('user_dashboard', $data);
        $this->load->view('templates/footer', $data);
	}
}
