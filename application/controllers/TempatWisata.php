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
        $data = [];
        $this->load->model('TmpWisata_model', 'wisata');

        $jumlahData = count($_FILES['foto']['name']);

        //validasi rule nama
        $_nama = $this->input->post('nama');
        $this->form_validation->set_rules('nama', 'nama wisata', 'required|is_unique[tempat_wisata.nama]|min_length[5]',
        array(
            'required' => 'Field %s Harus diisi',
            'is_unique' => 'Data '.$_nama.' Ini Sudah Ada Harap Masukan Data Baru',
            'min_length' => 'Field %s Harus Meiliki Setidaknya 5 Karakter'
        )
        );

        //validasi rule alamat
        $_alamat = $this->input->post("alamat");
        $this->form_validation->set_rules('alamat', 'alamat', 'required|min_length[3]',
        array(
            'required' => 'Field %s Harus diisi',
            'min_length' => 'Field %s Harus Lebih dari Satu Karakter'
        )
        );
        
        //validasi latlong
        $_latlong = $this->input->post('latlong');
        $this->form_validation->set_rules('latlong', 'latlong', 'required|min_length[3]',
        array(
            'required' => 'Field %s Harus diisi',
            'min_length' => 'Field %s Harus Lebih dari Satu Karakter'
        )
        );

        //validasi jenis wisata
        $_jnsWisata = $this->input->post('jnswisata');
        $this->form_validation->set_rules('jnswisata', 'jnswisata', 'required',
        array(
            'required' => 'Field %s Harus diisi'
        )
        );

        //validasi kecamatan
        $_kecamatan = $this->input->post('kecamatan');
        $this->form_validation->set_rules('kecamatan', 'kecamatan', 'required',
        array(
            'required' => 'Field %s Harus diisi'
        )
        );

        //validasi rating
        $_rating = $this->input->post('rating');
        $this->form_validation->set_rules('rating', 'rating', 'required|max_length[1]|numeric',
        array(
            'required' => 'Field %s Harus diisi',
            'max_length' => 'Filed %s ini hanya boleh satu karakter',
            'numeric' => 'Filed %s harus di isi dengan number'
        )
        );

        //validasi rating
        $_harga = $this->input->post('harga');
        $this->form_validation->set_rules('harga', 'harga', 'required|min_length[1]|numeric',
        array(
            'required' => 'Field %s Harus diisi',
            'min_length' => 'Filed %s tidak boleh di isi dengan satu karakter',
            'numeric' => 'Filed %s harus di isi dengan number'
        )
        );
        
        //validasi website
        $_website = $this->input->post('website');
        $this->form_validation->set_rules('website', 'website', 'required',
        array(
            'required' => 'Field %s Harus diisi'
        )
        );

        //validasi fasilitas
        $_fasilitas = $this->input->post('fasilitas');
        $this->form_validation->set_rules('fasilitas', 'fasilitas', 'required',
        array(
            'required' => 'Field %s Harus diisi'
        )
        );

        $_deskripsi = $this->input->post('deskripsi');
        $this->form_validation->set_rules('latlong', 'latlong', 'required|min_length[3]',
        array(
            'required' => 'Field %s Harus diisi',
            'min_length' => 'Field %s Harus Lebih dari Satu Karakter'
        )
        );

        if ($this->form_validation->run() == FALSE){
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

            $this->session->set_flashdata("error", "Gagal Periksa Kembali Field");
        }else{
            $_idedit = $this->input->post('id_edit');
            $_foto1 = $this->input->post('foto1');
            $_foto2 = $this->input->post('foto2');
            $_foto3 = $this->input->post('foto3');
            
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
    
            if($jumlahData > 3){
                $this->session->set_flashdata("error", "Upload Data Tidak Boleh Lebih dari 3 file");
                redirect(base_url().'index.php/tempatwisata/create', 'refresh');
                die();
            }else if($jumlahData == 1){
                $data[] = $_foto1;
                $data[] = $_foto2;
                $data[] = $_foto3;
                
            }else{
                if(!$_foto1 == NULL && !$_foto2 == NULL && !$_foto3 == NULL){
                    $path_foto1 = './uploads/wisata/'.$_foto1;
                    $path_foto2 = './uploads/wisata/'.$_foto2;
                    $path_foto3 = './uploads/wisata/'.$_foto3;
            
                    unlink($path_foto1);
                    unlink($path_foto2);
                    unlink($path_foto3);
    
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
            }
    
            if(isset($_idedit)){
                //update
                $data[] = $_idedit;
                $this->wisata->update($data);
                $this->session->set_flashdata("success", "Berhasil Update Data");
            } else {
                // add data
                $this->wisata->save($data);
                $this->session->set_flashdata("success", "Berhasil Tambah Data Data");
            }
    
            redirect(base_url().'index.php/tempatwisata/','refresh');
        }
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
        $data = [];
        $_id = $this->input->post('id');
        $_nama = $this->input->post("nama");
        $_foto1 = $this->input->post('foto1');
        $_foto2 = $this->input->post("foto2");
        $_foto3 = $this->input->post("foto3");

        $jumlahData = count($_FILES['foto']['name']);

        
        if($jumlahData > 3){
            $this->session->set_flashdata("error", "Upload Data Tidak Boleh Lebih dari 3 file");
            redirect(base_url().'index.php/tempatwisata/detail?id='.$_id, 'refresh');
            die();
        }else{
            if(!$_foto1 == NULL && !$_foto2 == NULL && !$_foto3 == NULL){
                $path_foto1 = './uploads/wisata/'.$_foto1;
                $path_foto2 = './uploads/wisata/'.$_foto2;
                $path_foto3 = './uploads/wisata/'.$_foto3;
        
                unlink($path_foto1);
                unlink($path_foto2);
                unlink($path_foto3);

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
        }

        $data[4] = $_id;

		// var_dump($data);
		// die();

		$this->load->model('TmpWisata_model', 'wisata');
		$this->wisata->uploads($data);

        $this->session->set_flashdata("success", "Berhasil Update Foto Wisata");
		redirect(base_url().'index.php/tempatwisata/detail?id='.$_id, 'refresh');
    }

    public function edit(){
        $_id = $this->input->get('id');
        $this->load->model("TmpWisata_model", 'wisata');
        $wisata = $this->wisata->cariId($_id);

        //untuk kecamatan & jenis wisata
        $this->load->model("Kecamatan_model", "kecamatan");
        $this->load->model("JenisWisata_model", "jnsWisata");

        $data = array(
            'title' => "Update Data Tempat Wisata | Dasboard",
            'wisata' => $wisata,
            'list_kecamatan' => $this->kecamatan->getAll(),
            'list_jenisWisata' => $this->jnsWisata->getAll()
        );

        $this->load->view('Backend/layout/header.php', $data);
		$this->load->view('Backend/layout/navbar.php');
		$this->load->view('Backend/layout/sidebar.php');
		$this->load->view('Backend/tempatWisata/edit.php');
		$this->load->view('Backend/layout/footer.php');
    }

    public function delete(){
        $_id = $this->input->get('id');
        $this->load->model('TmpWisata_model', 'wisata');

        $cariData = $this->wisata->cariId($_id);
        if($cariData->foto1 != NULL && $cariData->foto2 && $cariData->foto3){
            $foto1 = $cariData->foto1;
            $foto2 = $cariData->foto2;
            $foto3 = $cariData->foto3;
            
            $path_foto1 = './uploads/wisata/'.$foto1;
            $path_foto2 = './uploads/wisata/'.$foto2;
            $path_foto3 = './uploads/wisata/'.$foto3;
    
            unlink($path_foto1);
            unlink($path_foto2);
            unlink($path_foto3);
        }else{
            $this->session->set_flashdata("error", "Gagal Hapus Data, Periksa File Data");

            redirect(base_url().'index.php/tempatwisata/', 'refresh');
        }
        
        $this->wisata->delete($_id);
        $this->session->set_flashdata("success", "Berhasil Hapus Data");

        redirect(base_url().'index.php/tempatwisata/', 'refresh');
    }
}

?>