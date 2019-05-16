<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH . 'modules/ADMINISTRATOR_Controller.php');
class ChercherGlider extends ADMINISTRATOR_Controller {
	

	public function __construct()
	 {
		 parent::__construct();
		 $this->load->library('encryption');
		 $this->load->helper('cookie');
		 $this->load->model('ChercherGlider_model');
	 }

	public function index()
	{
    }
    public function recherche($ecriture){
        $data['isAdmin'] = parent::isAdmin();
        $data['isClient'] = parent::isClient();
        if($ecriture == "1234"){
            $data['glider'] =$this->ChercherGlider_model->RechercheGlider("");
    
          }
          else{
        $data['glider'] =$this->ChercherGlider_model->RechercheGlider(urldecode($ecriture));
          }
		echo json_encode($data);
    }
}
