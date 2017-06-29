<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		if ( ! file_exists(APPPATH.'views/landing_page.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		$this->load->helper('form');
		
        $data['title'] = ucfirst('GAP Infotech : Online SMS Panel'); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('landing_page', $data);
        $this->load->view('templates/footer', $data);
	}
}
