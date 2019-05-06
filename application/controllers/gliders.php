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
		$this->load->helper(array('url', 'assets'));
	 }
	 
	 public function index()
	 {
		 $this->affichage();
	 }
 
	public function affichage()
	{
        $this->load->model('gliders');
		$resultat = $this->gliders->liste_gliders();
	    var_dump($resultat);
		$this->load->view('header');
		$this->load->view('viewGliders', 'resultat'));
		$this->load->view('footer');
	}
}
