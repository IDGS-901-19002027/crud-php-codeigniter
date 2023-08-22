<?php

class Usuario_model extends CI_Model {
    // Constructor de la clase
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getAllUsers(){
        $query = 'SELECT * FROM usuario'; 
        $result = $this->db->query($query);

        return array(
            "total"=> $result->num_rows(),
            "data"=> $result->result_array()
        ); 
    }

    public function getUserByEmail($correo) {
        $query = "SELECT * FROM usuario WHERE correo = '".$correo."' ";
        $result = $this->db->query($query);

        return array(
            "total"=> $result->num_rows(),
            "data"=> $result->result_array()
        );

    }

    public function insert($data) {
        return $this->db->insert('usuario', $data);
    }

    public function update($id) {
        $this->db->select("*");
        $this->db->from('usuario');
        $this->db->where("id", $id);

        $query = $this->db->get();

        if (count($query->result()) > 0){
            return $query->row();
        }
    }

    public function updateUser($id, $nombre, $correo, $contrasenia){
        $query = "UPDATE usuario SET 
        nombre= ?, correo= ?, contrasenia = ?
        WHERE id = ?
        ";

        $result = $this->db->query($query, array($id, $nombre, $correo, $contrasenia));
        if($result = true) {
            return $result;
        } else {
            return false;
        }
    }

    public function delete($id) {
        $query = "UPDATE usuario SET 
        estatus = 0 
        WHERE id = $id
        "; 

        $result = $this->db->query($query);
        if($result = true) {
            return true;
        } else {
            return false;
        }
    }

    public function reactive($id) {
        $query = "UPDATE usuario SET
        estatus = 1
        WHERE id = $id
        ";

        $result = $this->db->query($query);
        if($result = true) {
            return true;
        } else {
            return false;
        }
    }
}

?>
