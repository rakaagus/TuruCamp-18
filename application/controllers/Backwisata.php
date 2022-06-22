<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backwisata extends CI_Controller {
	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
        //content
		$this->load->view('backend/manage/wisata/tmp_wisata');
        

		$this->load->view('layout/footer');
	}
	public function jwisata()
	{
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
        //content
		$this->load->view('backend/manage/wisata/ref_jwisata');
        

		$this->load->view('layout/footer');
	}

	public function rkecamatan()
	{
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
        //content
		$this->load->view('backend/manage/wisata/ref_kecamatan');
        

		$this->load->view('layout/footer');
	}
	
	public function komentar()
	{
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
        //content
		$this->load->view('backend/manage/wisata/komentar');
        

		$this->load->view('layout/footer');
	
	}

	public function form()
	{
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
        //content
		$this->load->view('backend/input/wisata/form_wisata');
        

		$this->load->view('layout/footer');
	}
}