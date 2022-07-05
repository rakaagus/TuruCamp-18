<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function index()
	{
		$data = array(
			'title' => "Dashboard | Home"
		);

		$this->load->view('Backend/layout/header', $data);
		$this->load->view('Backend/layout/sidebar');
		$this->load->view('Backend/dasboard/index');
		$this->load->view('Backend/layout/footer');
	}
}

?>