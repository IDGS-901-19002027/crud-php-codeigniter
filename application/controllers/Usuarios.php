<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('Usuario_model');
    }

    public function index()
    {
        $this->load->view('usuarios_list');
    }

    public function insert()
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('correo', 'Correo', 'required|valid_email');
            $this->form_validation->set_rules('contrasenia', 'Contrasenia', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data = array('response' => 'error', 'message' => validation_errors());
            } else {
                $ajax_data = $this->input->post();
                if ($this->Usuario_model->insert($ajax_data)) {
                    $data = array('response' => 'success', 'message' => 'Usuario registrado con éxito.');
                } else {
                    $data = array('response' => 'error', 'message' => 'Usuario no registrado.');
                }
            }
        } else {
            echo 'No direct script access allowed';
        }

        echo json_encode($data);
    }

    public function getAll()
    {
        if ($this->input->is_ajax_request()) {
            $users = $this->Usuario_model->getAllUsers();
            echo json_encode($users);
        }
    }

    public function update()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');

            $data = $this->Usuario_model->update($id);

            echo json_encode($data);
        }
    }

    public function updateUser()
    {
        if ($this->input->is_ajax_request()) {


            $id = $this->input->post('id');
            $nombre = $this->input->post('nombre');
            $correo = $this->input->post('correo');
            $contrasenia = $this->input->post('contrasenia');


            if ($this->Usuario_model->updateUser($nombre, $correo, $contrasenia, $id)) {
                $data = array('response' => 'success', 'message' => 'Usuario actualizado con éxito.');
            } else {
                $data = array('response' => 'error', 'message' => 'Usuario no actualizado.');
            }
        } else {
            echo 'No direct script access allowed';
        }

        echo json_encode($data);
    }

    public function delete()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');

            $data = $this->Usuario_model->delete($id);

            echo json_encode($data);
        }
    }

    public function reactive()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');

            $data = $this->Usuario_model->reactive($id);

            echo json_encode($data);
        }
    }

    public function getUserByEmail()
    {
        if ($this->input->is_ajax_request()) {
            $correo = $this->input->post('correo');

            $data = $this->Usuario_model->getUserByEmail($correo);

            echo json_encode($data);
        }
    }
}
