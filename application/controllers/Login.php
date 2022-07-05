<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

    public function index(){

        $data = array(
            'title' => "Login",
        );

		$this->load->view('Frontend/login', $data);
    }

    public function auth(){
        $this->load->model("User_model", 'user');
        $_username = $this->input->post('username');
        $_password = $this->input->post('password');

        $row = $this->user->auth($_username, $_password);

        if(isset($row)){
            $this->session->set_userdata("IDUSER", $row->id);
            $this->session->set_userdata('USERNAME', $row->username);
            $this->session->set_userdata('ROLE', $row->role);
            $this->session->set_userdata('USER', $row);
            redirect(base_url(),'refresh');
        } else {
            redirect(base_url()."index.php/login?status=f",'refresh');
        }
    }

    public function logout(){
        $this->session->unset_userdata("IDUSER");
        $this->session->unset_userdata('USERNAME');
        $this->session->unset_userdata('ROLE');
        $this->session->unset_userdata('USER');
        redirect(base_url()."index.php/login",'refresh');
    }

}


?>