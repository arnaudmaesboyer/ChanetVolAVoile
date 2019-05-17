<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Initiation extends CI_Controller {

	 public function __construct()
	 {
		 parent::__construct();
         $this->load->database();
         $this->load->model('initiation_model');
	 }
	 
	 public function index()
	 {
		$this->affichageAjax();
		 
	 }
	 public function affichageAjax(){
		$data= $this->initiation_model->liste_initiation_ajax();
		echo json_encode($data);
	 }
}
