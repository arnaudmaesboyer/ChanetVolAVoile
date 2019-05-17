<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH . 'modules/Administrator_Controller.php');
class AffichageErreur extends Administrator_Controller {
	

	public function __construct()
	 {
		 parent::__construct();
		 $this->load->model('AffichageErreur_model');
	 }

	public function index()
	{
		$data['isAdmin'] = parent::isAdmin();
		$data['isClient'] = parent::isClient();
		$data['erreur']= $this->AffichageErreur_model->getErreur();
		$this->load->view('header', $data);
		$this->load->view('AffichageErreur_page', $data);
		$this->load->view('footer', $data);
	}
}
