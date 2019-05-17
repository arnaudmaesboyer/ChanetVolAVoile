<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH . 'modules/Administrator_Controller.php');
class GestionPlaneurs extends Administrator_Controller {
	

	public function __construct()
	 {
		 parent::__construct();
         $this->load->library('encryption');
         $this->load->helper(array('form', 'url'));
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
        
        $file = 'assets/image/'.$idPlaneur.'.jpg';
 
        unlink($file);
		redirect(site_url('GestionPlaneurs/AffichageDeletePlaneur'));
    }
    public function AffichageAjoutPlaneur(){
        $data['isAdmin'] = parent::isAdmin();
		$data['isClient'] = parent::isClient();
        $this->load->view('header', $data);
		$this->load->view('AjoutPlaneurs_page', $data);
		$this->load->view('footer', $data);
    }
    public function AjoutPlaneur(){
        $data['isAdmin'] = parent::isAdmin();
        $data['isClient'] = parent::isClient();
                $config['upload_path']          = './assets/image/';
                $config['allowed_types']        = 'jpg';
                $config['max_size']             = 1000000;
                $config['max_width']            = 2500;
                $config['max_height']           = 2500;
                $config['file_name'] = $_POST['Registration'];

                $this->load->library('upload', $config);

                $this->upload->do_upload('Image');
        $this->GestionPlaneurs_model->AjoutPlaneur();
        redirect(site_url("GestionPLaneur"));

        
    }
}
