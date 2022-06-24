<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jeniswisata extends CI_Controller{

    public function index(){
        $this->load->model("JenisWisata_model", "jnswisata");

        $data = array(
            'title' => "Jenis Wisata | Dashboard",
            'list_data' => $this->jnswisata->getAll()
        );

        $this->load->view('Backend/layout/header.php', $data);
		$this->load->view('Backend/layout/navbar.php');
		$this->load->view('Backend/layout/sidebar.php');
		$this->load->view('Backend/jeniswisata/index.php');
		$this->load->view('Backend/layout/footer.php');
    }

    public function save(){
        $this->load->model("JenisWisata_model", 'jnswisata');

        $_nama = $this->input->post('nama');
        $_idedit = $this->input->post('id_edit');

        $data_jns[] = $_nama;

        if(isset($_idedit)){
            //update
            $data_jns[] = $_idedit;
            $this->jnswisata->update($data_jns);
        } else {
            // add data
            $this->jnswisata->save($data_jns);
        }

        redirect(base_url().'index.php/jeniswisata/','refresh');
    }

    public function delete(){
        $_id = $this->input->get('id');
        $this->load->model("JenisWisata_model", 'jnswisata');

        $this->jnswisata->delete($_id);

        redirect(base_url().'index.php/jeniswisata/', 'refresh');
    }
}


?>