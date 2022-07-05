<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TempatWisata extends CI_Controller{

    public function index(){
        $this->load->model("TmpWisata_model", "wisata");

        $data = array(
            'title' => "Tempat Wisata | Dashboard",
            'list_data' => $this->wisata->getAll()
        );

        $this->load->view('Backend/layout/header.php', $data);
		$this->load->view('Backend/layout/navbar.php');
		$this->load->view('Backend/layout/sidebar.php');
		$this->load->view('Backend/tempatWisata/index.php');
		$this->load->view('Backend/layout/footer.php');
    }

    public function create(){
        $this->load->model("Kecamatan_model", "kecamatan");
        $this->load->model("JenisWisata_model", "jnsWisata");

        $data = array(
            'title' => 'Create Tempat Wisata | Dashboard',
            'list_kecamatan' => $this->kecamatan->getAll(),
            'list_jnsWisata' => $this->jnsWisata->getAll()
        );

        $this->load->view('Backend/layout/header.php', $data);
		$this->load->view('Backend/layout/navbar.php');
		$this->load->view('Backend/layout/sidebar.php');
		$this->load->view('Backend/tempatWisata/create.php');
		$this->load->view('Backend/layout/footer.php');
    }

    public function save(){
        $this->load->model('TmpWisata_model', 'wisata');

        $_nama = $this->input->post('nama');
        $_alamat = $this->input->post("alamat");
        $_latlong = $this->input->post('latlong');
        $_jnsWisata = $this->input->post('jnswisata');
        $_kecamatan = $this->input->post('kecamatan');
        $_rating = $this->input->post('rating');
        $_harga = $this->input->post('harga');
        $_website = $this->input->post('website');
        $_fasilitas = $this->input->post('fasilitas');
        $_deskripsi = $this->input->post('deskripsi');

        $_idedit = $this->input->post('id_edit');
        
        $data[] = $_nama;
        $data[] = $_alamat;
        $data[] = $_latlong;
        $data[] = $_jnsWisata;
        $data[] = $_deskripsi;
        $data[] = $_rating;
        $data[] = $_harga;
        $data[] = $_kecamatan;
        $data[] = $_website;
        $data[] = $_fasilitas;

        if(isset($_idedit)){
            //update
            $data[] = $_idedit;
            $this->wisata->update($data);
        } else {
            // add data
            $this->wisata->save($data);
        }

        redirect(base_url().'index.php/tempatwisata/','refresh');
    }

    public function detail(){
        $_id = $this->input->get("id");
        $this->load->model("TmpWisata_model", "wisata");

        $data = array(
            'title' => 'Detail Tempat Wisata',
            'wisata' => $this->wisata->findById($_id)
        );

        $this->load->view('Backend/layout/header.php', $data);
		$this->load->view('Backend/layout/navbar.php');
		$this->load->view('Backend/layout/sidebar.php');
		$this->load->view('Backend/tempatWisata/detail.php');
		$this->load->view('Backend/layout/footer.php');
    }

    public function uploads(){
        $_id = $this->input->post('id');
        $_nama = $this->input->post("nama");
        $data = [];
		$jumlahData = count($_FILES['foto']['name']);

        if($jumlahData > 3){
            redirect(base_url().'index.php/tempatwisata/detail?id='.$_id, 'refresh');
            die();
        }else{
            for($i = 0; $i < $jumlahData; $i++):
                $_FILES['file']['name'] = $_FILES['foto']['name'][$i];
                $_FILES['file']['type'] = $_FILES['foto']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['foto']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['foto']['error'][$i];
                $_FILES['file']['size'] = $_FILES['foto']['size'][$i];
                
                $config['upload_path'] = './uploads/wisata/'; 
                $config['allowed_types'] = '*';
                $config['max_size'] = '5000'; // max_size in kb
    
                $array = explode('.', $_FILES["foto"]['name'][$i]);
                $extension = end($array);
    
                $new_name = $_nama.'_'.$i.'.'.$extension;
                //die($new_name);
                $config['file_name'] = $new_name;
    
                $this->load->library('upload', $config);
                if($this->upload->do_upload('file')){
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
        
                    $data[] = $filename;
                }
            endfor;	
        }

        $data[4] = $_id;

		// var_dump($data);
		// die();

		$this->load->model('TmpWisata_model', 'wisata');
		$this->wisata->uploads($data);
		redirect(base_url().'index.php/tempatwisata/detail?id='.$_id, 'refresh');
    }
}

?>