<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH . 'modules/ADMINISTRATOR_Controller.php');
class GestionAdmin extends ADMINISTRATOR_Controller {
	

	public function __construct()
	 {
		 parent::__construct();
		 $this->load->library('encrypt');
		 $this->load->helper('cookie');
	 }

	public function index()
	{
		
        $data['isAdmin'] = parent::isAdmin();
        var_dump($data['isAdmin']);
		$data['isClient'] = parent::isClient();
        $this->load->model('monitor_model');
        $data['admin'] =$this->monitor_model->getIdMonitor($data['isAdmin']->mail);
        $data['infos'] =$this->monitor_model->infosMonitor($data['admin'][0]->idMonitor);
		$this->load->view('header', $data);
		$this->load->view('modifAdmin', $data);
		$this->load->view('footer', $data);
	}
}
