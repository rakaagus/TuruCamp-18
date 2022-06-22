<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backuser extends CI_Controller {
	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
        //content
		$this->load->view('backend/manage/user/index');
        

		$this->load->view('layout/footer');
	}
	public function form()
	{
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
        //content
		$this->load->view('backend/input/user/form_user');
        

		$this->load->view('layout/footer');
	}
}



