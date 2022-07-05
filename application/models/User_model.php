<?php 
    class User_model extends CI_Model{
        private $table = "user";

        public function findById($id){
            $this->db->where("id", $id);
            $query = $this->db->get($this->table);
            return $query->row();
        }

        public function auth($uname, $pass){
            $sql = "SELECT * FROM user WHERE username=? AND password=MD5(?)";
            $data = [$uname, $pass];
            $query = $this->db->query($sql, $data);
            return $query->row();
        }
    }

?>