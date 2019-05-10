<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gliders extends CI_Controller {

	public function __construct()
	 {
		 parent::__construct();
		 $this->load->database();
		 $this->load->model('gliders_model');
	 }
	 
	 public function index()
	 {
		$data=array();
		$data['planeurs'] = $this->gliders_model->liste_gliders();
		$this->load->view('header');
		$this->load->view('viewGliders', $data);
		$this->load->view('footer');
		 
	 }
}
