<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan extends CI_Controller{

    public function index(){
        $this->load->model("Kecamatan_model", "kecamatan");

        $data = array(
            'title' => "Kecamatan | Dashboard",
            'list_data' => $this->kecamatan->getAll()
        );

        $this->load->view('Backend/layout/header.php', $data);
		$this->load->view('Backend/layout/navbar.php');
		$this->load->view('Backend/layout/sidebar.php');
		$this->load->view('Backend/kecamatan/index.php');
		$this->load->view('Backend/layout/footer.php');
    }

    public function save(){
        $this->load->model("Kecamatan_model", 'kecamatan');

        $_nama = $this->input->post('nama');
        //validasi rule
        $this->form_validation->set_rules('nama', 'nama_kecamatan', 'required|is_unique[kecamatan.nama_kecamatan]',
        array(
            'required' => 'Field %s Harus diisi',
            'is_unique' => 'Data '.$_nama.' Ini Sudah Ada Harap Masukan Data Baru'
        )
        );

        if ($this->form_validation->run() == FALSE){

            $data = array(
                'title' => "Kecamatan | Dashboard",
                'list_data' => $this->kecamatan->getAll()
            );

            $this->session->set_flashdata("error", "Gagal Periksa Kembali Field");

            $this->load->view('Backend/layout/header.php', $data);
            $this->load->view('Backend/layout/navbar.php');
            $this->load->view('Backend/layout/sidebar.php');
            $this->load->view('Backend/kecamatan/index.php');
            $this->load->view('Backend/layout/footer.php');

        }else{
            $_idedit = $this->input->post('id_edit');

            $data_kecamatan[] = $_nama;
            
            if(isset($_idedit)){
                //update
                $data_kecamatan[] = $_idedit;
                $this->kecamatan->update($data_kecamatan);
                $this->session->set_flashdata("success", "Berhasil Update Data");
            } else {
                // add data
                $this->kecamatan->save($data_kecamatan);
                $this->session->set_flashdata("success", "Berhasil Tambah Data");
            }
            
            redirect(base_url().'index.php/kecamatan/','refresh');
        }
    }

    public function delete(){
        $_id = $this->input->get('id');
        $this->load->model("Kecamatan_model", 'kecamatan');

        $this->kecamatan->delete($_id);
        $this->session->set_flashdata("success", "Berhasil Delete Data");

        redirect(base_url().'index.php/kecamatan/', 'refresh');
    }
}


?>