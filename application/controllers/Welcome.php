<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(array('login_model' => "lm"));
	}

	//$this->load->model(array('LoginModel'=>"lm"))

	public function index() {
		$obtenerUsuarios = $this->lm->getAllUsers();
		$this->load->view('users', $obtenerUsuarios);
	}

	public function addUser() {
		$addUser = $this->lm->insertUser(
			$this->input->post("nombre"),
			$this->input->post("correo"),
			$this->input->post("contrasenia")
		);

		if (!$addUser) {
			$this->load->view('error');
		} else {
			$this->index();
		}
	}

	public function updateUser() {
		$id = $this->input->get("id");
		$actualizarUsuario["user"] = $this->lm->getUserById($id);
	
		// if ($this->input->post("submit")) {
		// 	$user = $this->lm->updateUser(
		// 		$this->input->post("id"),
		// 		$this->input->post("nombre"),
		// 		$this->input->post("correo"),
		// 		$this->input->post("contrasenia")
		// 	);
			
		$this->load->view('user_update', $actualizarUsuario);
	}

	public function formUpdate() {
		$user = $this->lm->updateUser(
			$this->input->post("nombre"),
			$this->input->post("correo"),
			$this->input->post("contrasenia"),
			$this->input->post("id")
		);

		if ($user) {
			redirect('welcome','refresh');
			// redirect($this->load->view('users',$obtenerUsuarios));
		} else {
			echo "Ocurrió un error al actualizar el usuario";
		}
	
	}
	

	public function deleteUser() {
		$user = $this->lm->deleteUser(
			$this->input->get("id")
		);

		if (!$user) {
			$this->load->view('error');
		} else {
			$this->index();
		}
	}
}
