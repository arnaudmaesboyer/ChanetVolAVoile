<?php
('BASEPATH') OR exit('No direct script access allowed');


class GlidersAjax extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('gliders_model');
    }
public function affichageAjax(){
        $data[0]= $this->gliders_model->liste_gliders_ajax();
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