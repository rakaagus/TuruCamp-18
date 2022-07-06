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
        $this->form_validation->set_rules('nama', 'nama_jenis', 'required|is_unique[jenis_wisata.nama_jenis]',
        array(
            'required' => 'Field %s Harus diisi',
            'is_unique' => 'Data '.$_nama.' Ini Sudah Ada Harap Masukan Data Baru'
        )
        );

        if ($this->form_validation->run() == FALSE){

            $data = array(
                'title' => "Jenis Wisata | Dashboard",
                'list_data' => $this->jnswisata->getAll()
            );

            $this->session->set_flashdata("error", "Gagal Periksa Kembali Field");
    
            $this->load->view('Backend/layout/header.php', $data);
            $this->load->view('Backend/layout/navbar.php');
            $this->load->view('Backend/layout/sidebar.php');
            $this->load->view('Backend/jeniswisata/index.php');
            $this->load->view('Backend/layout/footer.php');

            }else{
                $_idedit = $this->input->post('id_edit');

                $data_jns[] = $_nama;

                if(isset($_idedit)){
                    //update
                    $data_jns[] = $_idedit;
                    $this->jnswisata->update($data_jns);
                    $this->session->set_flashdata("success", "Berhasil Update Data");
                } else {
                    // add data
                    $this->jnswisata->save($data_jns);
                    $this->session->set_flashdata("success", "Berhasil Tambah Data");
                }

                redirect(base_url().'index.php/jeniswisata/','refresh');
            }
    }

    public function delete(){
        $_id = $this->input->get('id');
        $this->load->model("JenisWisata_model", 'jnswisata');

        $this->jnswisata->delete($_id);
        $this->session->set_flashdata("success", "Berhasil Delete Data");

        redirect(base_url().'index.php/jeniswisata/', 'refresh');
    }
}


?>