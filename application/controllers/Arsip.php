<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arsip extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
        $data['title'] = "DASHBOARD";
        $data['username'] = "Minion";

		$this->load->view('templates/header_page');
        $this->load->view('templates/sidebar_page');
        $this->load->view('templates/topbar_page');
		$this->load->view('arsip/index', $data);
		$this->load->view('templates/footer_page');
    }

	public function arsip_baru()
	{
        $data['title'] = "DASHBOARD";
        $data['username'] = "Minion";

		$this->load->view('templates/header_page');
        $this->load->view('templates/sidebar_page');
        $this->load->view('templates/topbar_page');
		$this->load->view('arsip/arsip_baru', $data);
		$this->load->view('templates/footer_page');
    }

	public function peminjaman()
	{
        $data['title'] = "DASHBOARD";
        $data['username'] = "Minion";
        $data['peminjam'] = $this->arsip_model->getPeminjam();

		$this->load->view('templates/header_page');
        $this->load->view('templates/sidebar_page');
        $this->load->view('templates/topbar_page');
		$this->load->view('arsip/peminjaman', $data);
		$this->load->view('templates/footer_page');
    }
    
    
	public function manajemen_arsip()
	{
        $data['title'] = "DASHBOARD";
        $data['username'] = "Minion";
        $data['arsip'] = $this->arsip_model->getArsip();

		$this->load->view('templates/header_page');
        $this->load->view('templates/sidebar_page');
        $this->load->view('templates/topbar_page');
		$this->load->view('arsip/manajemen_arsip', $data);
		$this->load->view('templates/footer_page');
    }
    
	public function percobaan()
	{
        $data['title'] = "DASHBOARD";
        $data['username'] = "Minion";

		$this->load->view('templates/header_page');
        $this->load->view('templates/sidebar_page');
        $this->load->view('templates/topbar_page');
		$this->load->view('arsip/percobaan', $data);
		$this->load->view('templates/footer_page');
    }
}
