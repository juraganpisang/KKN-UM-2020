<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendataan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

	public function input_data()
	{
        $data['title'] = "DASHBOARD";

		$this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
		$this->load->view('pendataan/input_data', $data);
		$this->load->view('templates/footer');
    }
    
	public function manajemen_data()
	{
        $data['title'] = "DASHBOARD";

		$this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
		$this->load->view('pendataan/manajemen_data', $data);
		$this->load->view('templates/footer');
	}
}
