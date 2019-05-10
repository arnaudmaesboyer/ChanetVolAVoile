<?php
('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH . 'modules/ADMINISTRATOR_Controller.php');
class GlidersAjax extends ADMINISTRATOR_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('gliders_model');
    }
public function affichageAjax(){
        $data[0]= $this->gliders_model->liste_gliders_ajax();
        $data[1]= parent::get_is_Admin();
		echo json_encode($data);
	 }
	 public function afficher_idGlid(){
		echo json_encode($_GET['Registration']);
	  }
	public function glidersInfo($idGliders){
		$gliders= $this->gliders_model->get_planeur_ref($idGliders);
		echo json_encode($gliders);
    }
}