<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GestionConnexion extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	 public function __construct()
	 {
		 parent::__construct();
         $this->load->database();
         $this->load->model('gestionConnexion_model');
	 }
	 
	 public function index()
	 {
		echo("coucou");
		 
	 }
	 public function InscriptionAjax(){
		$data= $this->gestionConnexion_model->inscriptionClient();
		echo json_encode($data);
	 }
}