<?php

class login_model extends CI_Model {
    // Constructor de la clase
    public function __construct(){
        parent::__construct();
    }

    // Función para obtener todos los usuarios de la BD
    public function getAllUsers(){
        $query = 'SELECT * FROM usuario';
        $result = $this->db->query($query);

        return array(
            "total"=> $result->num_rows(),
            "data"=> $result->result_array()
        );
        //$this->db->select('title, content, date'); Consultar ciertos campos
        //$query = $this->db->get('usuario'); // SELECT * FROM table
    }

    // Insertar usuario en la bd, recibe un array con la información del usuario
    public function insertUser($nombre, $correo, $contrasenia){
        $query = "INSERT INTO usuario  (nombre,correo,contrasenia,estatus) VALUES('".$nombre."', '".$correo."' , '".$contrasenia."', 1)";
        $result = $this->db->query($query);
        if($result = true){
            return true;
        } else {
            return false;
        }
        //$this->db->insert('mytable');
    }

    // Obtener usuario por id
    public function getUserById($id) {
        $query = "SELECT * FROM usuario WHERE id = ?";
        $result = $this->db->query($query, array($id));
    
        if ($result->num_rows() == 1) {
            return $result->row();
        } else {
            return null; 
        }
    }

    // Modificar la información de un usuario
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

    public function deleteUser($id) {
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
} 