<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function index()
	{
		$data['title'] = "PraBu Buleleng";

		$this->load->view('front_end/no_login/template/header', $data);
		$this->load->view('front_end/no_login/index', $data);
		$this->load->view('front_end/no_login/template/footer');
	}
}
