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
		 $this->load->library('encryption');
		 $this->load->helper('cookie');
		 $this->load->model('gestionConnexion_model');
		 $this->load->library('form_validation');
		 
	 }
	 
	 public function index()
	 {
		echo("coucou");
		 
	 }

	 public function InscriptionAjax(){
		$this->form_validation->set_rules('mail', 'Mail', 'required|valid_email');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'required|max_length[30]|matches[password]');
		$this->form_validation->set_rules('FirstName', 'FirstName', 'required|alpha');
		$this->form_validation->set_rules('LastName', 'LastName', 'required|alpha');
		$this->form_validation->set_rules('Phone', 'Phone', 'required|min_length[10]|max_length[10]|numeric');
		$this->form_validation->set_rules('Street', 'Street', 'required');
		$this->form_validation->set_rules('City', 'City', 'required');
		$this->form_validation->set_rules('PostalCode', 'PostalCode', 'required|min_length[5]|max_length[5]|numeric');
		$this->form_validation->set_rules('Birthday', 'Birthday', 'required');
		if ($this->form_validation->run() == FALSE)
                {
					echo json_encode("erreur");
                }
                else
                {
					$data= $this->gestionConnexion_model->inscriptionClient();
					echo json_encode($data);
			 
                }
	 }
	 public function deconnecter(){
		delete_cookie("189CDS8CSDC98JCPDSCDSCDSCDSD8C9SD");
		delete_cookie("1C89DS7CDS8CD89CSD7CSDDSVDSIJPIOCDS");
		delete_cookie("289CDS8CSDC98JCPDSCDSCDSCDSD8C9SD");
		delete_cookie("2C89DS7CDS8CD89CSD7CSDDSVDSIJPIOCDS");
		redirect(site_url("welcome"));

	}
	public function encrypter($mdp){
		$mdp = $this->encryption->encrypt($mdp);
		die($mdp);
	}
}