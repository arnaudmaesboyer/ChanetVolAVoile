<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH . 'modules/ADMINISTRATOR_Controller.php');
class GestionPlaneurs extends ADMINISTRATOR_Controller {
	

	public function __construct()
	 {
		 parent::__construct();
		 $this->load->library('encrypt');
         $this->load->helper('cookie');
         $this->load->model('GestionPlaneurs_model');
         $this->load->model('client_model');
	 }

	public function index()
	{
		
        $data['isAdmin'] = parent::isAdmin();
		$data['isClient'] = parent::isClient();
		$this->load->view('header', $data);
		$this->load->view('GestionPlaneurs_page', $data);
		$this->load->view('footer', $data);
    }
    public function AffichageDeletePlaneur(){
        $data['isAdmin'] = parent::isAdmin();
		$data['isClient'] = parent::isClient();
        $this->load->model('gliders_model');
        $data['planeurs'] = $this->gliders_model->liste_glidersTous();
        $this->load->view('header', $data);
		$this->load->view('DeletePlaneurs_page', $data);
		$this->load->view('footer', $data);
    }
    public function DeletePlaneur($idPlaneur){
        $data['isAdmin'] = parent::isAdmin();
		$data['isClient'] = parent::isClient();
		$data['Registration'] = $idPlaneur;
		$this->GestionPlaneurs_model->DeletePlaneur($data);
		redirect(site_url('GestionPlaneur/AffichageDeletePlaneur'));
	}
}
