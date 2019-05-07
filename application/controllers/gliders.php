<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gliders extends CI_Controller {

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
	 }
	 
	 public function index()
	 {
		$data=array();
		$this->load->model('gliders_model');
		$data['planeurs'] = $this->gliders_model->liste_gliders();
		$this->load->view('header');
		$this->load->view('viewGliders', $data);
		$this->load->view('footer');
		 
	 }
}
