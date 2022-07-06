<?php 
    class JenisWisata_model extends CI_Model {
        private $table = "jenis_wisata";
        
        public function getAll(){
            $query = $this->db->get($this->table);
            return $query->result();
        }

        public function findById($id){
            $this->db->where('id', $id);
            $query = $this->db->get($this->table);
            return $query->row();
        }

        public function save($data){
            $sql = "INSERT INTO jenis_wisata (nama_jenis) VALUES (?)";
            $this->db->query($sql, $data);
        }

        public function update($data){
            $sql = "UPDATE jenis_wisata SET nama_jenis=? WHERE id=?";
            $this->db->query($sql, $data);
        }

        public function delete($id){
            $sql = "DELETE FROM jenis_wisata WHERE id=?";
            $this->db->query($sql, array($id));
        }
    }

?>