<?php 
    class TmpWisata_model extends CI_Model {

        private $table = "tempat_wisata";
        private $view = "v_tempat_wisata";
        
        public function getAll(){
            $query = $this->db->get($this->view);
            return $query->result();
        }

        public function join(){
            // $query = "SELECT t.id, t.nama, t.alamat, t.latlong, t.deskripsi, t.skor_rating, t.harga_tiket, t.foto1, t.foto2, t.foto3, t.website, t.fasilitas, j.nama_jenis, k.nama_kecamatan
            // FROM tempat_wisata AS t
            // INNER JOIN jenis_wisata AS j ON t.jenis_wisata_id = j.id
            // INNER JOIN kecamatan AS k ON t.kecamatan_id = k.id";

                return $this->db->from('tempat_wisata')
                ->join('kecamatan', 'kecamatan.id = tempat_wisata.kecamatan_id')
                ->join('jenis_wisata', 'jenis_wisata.id = tempat_wisata.jenis_wisata_id')
                ->get()
                ->result();

            // return $query->result();
        }


        public function findById($id){
            // $sql = "SELECT t.id, t.nama, t.alamat, t.latlong, t.deskripsi, t.skor_rating, t.harga_tiket, t.foto1, t.foto2, t.foto3, t.website, t.fasilitas, j.nama_jenis, k.nama_kecamatan
            // FROM tempat_wisata AS t
            // INNER JOIN jenis_wisata AS j ON t.jenis_wisata_id = j.id
            // INNER JOIN kecamatan AS k ON t.kecamatan_id = k.id
            // having t.id=?";
            // $this->db->query($sql, $id);

            $this->db->where('id', $id);
            $query = $this->db->get($this->view);
            return $query->row();
        }

        public function cariId($id){
            $this->db->where('id', $id);
            $query = $this->db->get($this->table);
            return $query->row();
        }

        public function uploads($data){
            $sql = "UPDATE tempat_wisata SET foto1=?, foto2=?, foto3=? WHERE id=?";
            $this->db->query($sql, $data);
        }

        public function save($data){
            $sql = "INSERT INTO tempat_wisata (nama, alamat, latlong, jenis_wisata_id, deskripsi, skor_rating, harga_tiket, kecamatan_id, website, fasilitas, foto1, foto2, foto3) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $this->db->query($sql, $data);
        }

        public function update($data){
            $sql = "UPDATE tempat_wisata 
            SET nama=?, alamat=?, latlong=?, jenis_wisata_id=?, deskripsi=?, skor_rating=?, harga_tiket=?, kecamatan_id=?, website=?, fasilitas=?, foto1=?, foto2=?, foto3=? WHERE id=?";
            $this->db->query($sql, $data);
        }

        public function delete($id){
            $sql = "DELETE FROM tempat_wisata WHERE id=?";
            $this->db->query($sql, array($id));
        }
    }

?>