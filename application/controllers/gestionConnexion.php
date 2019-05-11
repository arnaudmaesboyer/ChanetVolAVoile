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
		 $this->load->library('encrypt');
		 $this->load->helper('cookie');
         $this->load->model('gestionConnexion_model');
	 }
	 
	 public function index()
	 {
		echo("coucou");
		 
	 }
	 //penser a chack pas de doublon email
	 public function InscriptionAjax(){
		$data= $this->gestionConnexion_model->inscriptionClient();
		echo json_encode($data);
	 }
	 public function deconnecter(){
		delete_cookie("189CDS8CSDC98JCPDSCDSCDSCDSD8C9SD");
		delete_cookie("1C89DS7CDS8CD89CSD7CSDDSVDSIJPIOCDS");
		delete_cookie("289CDS8CSDC98JCPDSCDSCDSCDSD8C9SD");
		delete_cookie("2C89DS7CDS8CD89CSD7CSDDSVDSIJPIOCDS");
		redirect(site_url("welcome"));

	}
	public function encrypter(){
		$mdp = $this->encrypt->encode("qsdfgh");
		die($mdp);
	}
}