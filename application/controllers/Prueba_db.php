<?php
class Prueba_db extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->database();
        if ($this->db->conn_id) {
            echo "Conexión exitosa a la base de datos.";
        } else {
            echo "No se pudo establecer la conexión a la base de datos.";
        }
    }
}
?>
