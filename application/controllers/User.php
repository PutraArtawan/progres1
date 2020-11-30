<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function index()
	{
		$data['title'] = "Halaman Awal";

		$this->load->view('user/login/template/header', $data);
		$this->load->view('user/login/homepage', $data);
		$this->load->view('user/login/template/footer');
	}

	public function about()
	{
		$data['title'] = "About";

		$this->load->view('user/no_login/template/header', $data);
		$this->load->view('user/no_login/about', $data);
		$this->load->view('user/no_login/template/footer');
	}
	public function destination()
	{
		$data['title'] = "Destination";

		$this->load->view('user/no_login/template/header', $data);
		$this->load->view('user/no_login/destination', $data);
		$this->load->view('user/no_login/template/footer');
	}
	public function blog()
	{
		$data['title'] = "Blog";

		$this->load->view('user/no_login/template/header', $data);
		$this->load->view('user/no_login/blog', $data);
		$this->load->view('user/no_login/template/footer');
	}
	public function news()
	{
		$data['title'] = "News";

		$this->load->view('user/no_login/template/header', $data);
		$this->load->view('user/no_login/news', $data);
		$this->load->view('user/no_login/template/footer');
	}
	public function contact()
	{
		$data['title'] = "Contact";

		$this->load->view('user/no_login/template/header', $data);
		$this->load->view('user/no_login/contact', $data);
		$this->load->view('user/no_login/template/footer');
	}
}
