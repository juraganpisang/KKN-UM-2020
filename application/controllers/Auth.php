<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header_auth');
			$this->load->view('login');
			$this->load->view('templates/footer_auth');
		} else {
			$this->do_login();
		}
	}

	public function do_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->auth_model->getUser($username);
		//cek user
		if ($user) {
			//cek password
			if (password_verify($password, $user['password'])) {
				$data = [
					'id' => $user['id'],
					'username' => $user['username'],
					'password' => $user['password']
				];
				//set di session
				$this->session->set_userdata($data);

				redirect('arsip');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password salah. </div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Akun tidak terdaftar. </div>');
			redirect('auth');
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		$data['title'] = "TAMBAH USER";

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header_page');
			$this->load->view('templates/sidebar_page');
			$this->load->view('templates/topbar_page');
			$this->load->view('register', $data);
			$this->load->view('templates/footer_page');
		} else {
			$this->do_register();
		}
	}

	public function do_register()
	{
		$username = $this->input->post('username');

		$user = $this->auth_model->getUser($username);

		//cek username
		if ($user) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Username sudah terdaftar. Ganti yang lain. </div>');

			redirect('auth/register');
		} else {
			$data = [
				'username' => $username,
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
			];

			$this->auth_model->createUser($data);

			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Akun '. $username .' berhasil didaftarkan. </div>');

			redirect('auth/register');
		}
	}


	public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Anda berhasil Keluar. </div>');

		redirect('auth');
	}
}
